<?php
/**
 * طلب عرض السعر: حفظ في الداشبورد + إرسال إلى info@qeema-group.com + التوجيه لصفحة الشكر
 */

defined('ABSPATH') || exit;

const QEEMA_QUOTATION_EMAIL   = 'info@qeema-group.com';
const QEEMA_QUOTATION_ACTION  = 'qeema_quotation_submit';

// تسميات نوع المشروع والميزانية والجدول والخدمات (للعرض في الداشبورد والإيميل)
function qeema_quotation_labels()
{
    return array(
        'project_type' => array(
            'residential'  => 'سكني',
            'commercial'   => 'تجاري',
            'industrial'   => 'صناعي',
            'hospitality'  => 'ضيافة',
            'healthcare'   => 'صحي',
            'educational'  => 'تعليمي',
        ),
        'budget' => array(
            'under500k' => 'أقل من 500,000 ريال',
            '500k-1m'   => '500,000 - 1,000,000 ريال',
            '1m-5m'     => '1,000,000 - 5,000,000 ريال',
            '5m-10m'    => '5,000,000 - 10,000,000 ريال',
            'over10m'   => 'أكثر من 10,000,000 ريال',
        ),
        'timeline' => array(
            'immediate'  => 'فوري (خلال شهر)',
            '1-3months'  => '1-3 أشهر',
            '3-6months'  => '3-6 أشهر',
            '6months+'   => 'أكثر من 6 أشهر',
        ),
        'services' => array(
            'interior'      => 'التصميم الداخلي والتشطيبات',
            'architectural' => 'التصميم المعماري والإنشائي',
            'mep'           => 'أنظمة الإليكتروميكانيكال (MEP)',
            'surveying'     => 'هندسة المساحة والرفع المساحي',
            'supervision'   => 'الإشراف الهندسي',
            'consultation'  => 'الاستشارات الهندسية',
        ),
        'service_popup' => array(
            'interior'      => 'التصميم الداخلي والتشطيبات',
            'architectural' => 'التصميم المعماري والإنشائي',
            'mep'           => 'أنظمة الإليكتروميكانيكال',
            'surveying'     => 'هندسة المساحة',
        ),
    );
}

// إنشاء صفحة الشكر تلقائياً إن لم تكن موجودة (لتجنب 404)
function qeema_ensure_thank_you_page()
{
    $by_template = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'page-thank-you.php',
        'post_status'    => 'publish',
    ));
    if (!empty($by_template)) {
        return $by_template[0]->ID;
    }
    $by_slug = get_page_by_path('thank-you');
    if ($by_slug) {
        update_post_meta($by_slug->ID, '_wp_page_template', 'page-thank-you.php');
        return $by_slug->ID;
    }
    $page_id = wp_insert_post(array(
        'post_title'   => __('شكراً', 'qeema-theme'),
        'post_name'    => 'thank-you',
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_content' => '',
    ), true);
    if (!is_wp_error($page_id)) {
        update_post_meta($page_id, '_wp_page_template', 'page-thank-you.php');
        flush_rewrite_rules(false);
        return $page_id;
    }
    return 0;
}

// رابط صفحة الشكر (يُنشئ الصفحة تلقائياً إن لم تكن موجودة)
function qeema_get_thank_you_url()
{
    $page_id = qeema_ensure_thank_you_page();
    if ($page_id) {
        return get_permalink($page_id);
    }
    return home_url('/thank-you');
}

// تسجيل نوع المنشور: طلبات عرض السعر
function qeema_register_quotation_request_cpt()
{
    $labels = array(
        'name'               => __('طلبات عرض السعر', 'qeema-theme'),
        'singular_name'      => __('طلب عرض سعر', 'qeema-theme'),
        'menu_name'          => __('طلبات عرض السعر', 'qeema-theme'),
        'add_new'            => __('إضافة', 'qeema-theme'),
        'add_new_item'       => __('طلب جديد', 'qeema-theme'),
        'edit_item'          => __('عرض الطلب', 'qeema-theme'),
        'view_item'          => __('عرض الطلب', 'qeema-theme'),
        'search_items'       => __('بحث', 'qeema-theme'),
        'not_found'          => __('لا توجد طلبات', 'qeema-theme'),
        'not_found_in_trash' => __('لا توجد طلبات في المحذوفات', 'qeema-theme'),
    );

    register_post_type('quotation_request', array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-clipboard',
        'menu_position'       => 26,
        'capability_type'     => 'post',
        'capabilities'        => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap'        => true,
        'supports'            => array('title', 'editor'),
        'has_archive'         => false,
        'rewrite'             => false,
        'query_var'           => false,
    ));
}
add_action('init', 'qeema_register_quotation_request_cpt');

// أعمدة قائمة طلبات عرض السعر
function qeema_quotation_request_columns($columns)
{
    $new = array();
    $new['cb'] = $columns['cb'];
    $new['title'] = __('الطلب / المرسل', 'qeema-theme');
    $new['quotation_email'] = __('البريد', 'qeema-theme');
    $new['quotation_phone'] = __('الجوال', 'qeema-theme');
    $new['quotation_type']  = __('النوع', 'qeema-theme');
    $new['date'] = $columns['date'];
    return $new;
}
add_filter('manage_quotation_request_posts_columns', 'qeema_quotation_request_columns');

function qeema_quotation_request_column_content($column, $post_id)
{
    switch ($column) {
        case 'quotation_email':
            echo esc_html(get_post_meta($post_id, '_quotation_email', true));
            break;
        case 'quotation_phone':
            echo esc_html(get_post_meta($post_id, '_quotation_phone', true));
            break;
        case 'quotation_type':
            echo esc_html(get_post_meta($post_id, '_quotation_source', true) === 'popup' ? __('نافذة منبثقة', 'qeema-theme') : __('صفحة الطلب', 'qeema-theme'));
            break;
    }
}
add_action('manage_quotation_request_posts_custom_column', 'qeema_quotation_request_column_content', 10, 2);

// إزالة زر "إضافة جديد"
function qeema_quotation_request_hide_add_new()
{
    global $submenu;
    if (isset($submenu['edit.php?post_type=quotation_request'])) {
        foreach ($submenu['edit.php?post_type=quotation_request'] as $k => $item) {
            if ($item[2] === 'post-new.php?post_type=quotation_request') {
                unset($submenu['edit.php?post_type=quotation_request'][$k]);
                break;
            }
        }
    }
}
add_action('admin_menu', 'qeema_quotation_request_hide_add_new', 999);

// صندوق بيانات الطلب في صفحة التحرير
function qeema_quotation_request_meta_boxes()
{
    add_meta_box(
        'qeema_quotation_details',
        __('بيانات الطلب والمرسل', 'qeema-theme'),
        'qeema_quotation_request_meta_box_cb',
        'quotation_request',
        'normal'
    );
}

function qeema_quotation_request_meta_box_cb($post)
{
    $labels = qeema_quotation_labels();
    $name    = get_post_meta($post->ID, '_quotation_name', true);
    $email   = get_post_meta($post->ID, '_quotation_email', true);
    $phone   = get_post_meta($post->ID, '_quotation_phone', true);
    $company = get_post_meta($post->ID, '_quotation_company', true);
    $project_type = get_post_meta($post->ID, '_quotation_project_type', true);
    $budget  = get_post_meta($post->ID, '_quotation_budget', true);
    $timeline = get_post_meta($post->ID, '_quotation_timeline', true);
    $services = get_post_meta($post->ID, '_quotation_services', true);
    $service_popup = get_post_meta($post->ID, '_quotation_service_popup', true);
    $source  = get_post_meta($post->ID, '_quotation_source', true);

    if (is_string($services)) {
        $services = $services ? explode(',', $services) : array();
    }
    $project_type_label = isset($labels['project_type'][$project_type]) ? $labels['project_type'][$project_type] : $project_type;
    $budget_label = isset($labels['budget'][$budget]) ? $labels['budget'][$budget] : $budget;
    $timeline_label = isset($labels['timeline'][$timeline]) ? $labels['timeline'][$timeline] : $timeline;
    ?>
    <table class="form-table">
        <tr><th><?php esc_html_e('الاسم', 'qeema-theme'); ?></th><td><?php echo esc_html($name); ?></td></tr>
        <tr><th><?php esc_html_e('البريد', 'qeema-theme'); ?></th><td><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></td></tr>
        <tr><th><?php esc_html_e('الجوال', 'qeema-theme'); ?></th><td><a href="tel:<?php echo esc_attr($phone); ?>" dir="ltr"><?php echo esc_html($phone); ?></a></td></tr>
        <?php if ($company) { ?><tr><th><?php esc_html_e('الشركة', 'qeema-theme'); ?></th><td><?php echo esc_html($company); ?></td></tr><?php } ?>
        <?php if ($project_type) { ?><tr><th><?php esc_html_e('نوع المشروع', 'qeema-theme'); ?></th><td><?php echo esc_html($project_type_label); ?></td></tr><?php } ?>
        <?php if ($budget) { ?><tr><th><?php esc_html_e('الميزانية', 'qeema-theme'); ?></th><td><?php echo esc_html($budget_label); ?></td></tr><?php } ?>
        <?php if ($timeline) { ?><tr><th><?php esc_html_e('الجدول الزمني', 'qeema-theme'); ?></th><td><?php echo esc_html($timeline_label); ?></td></tr><?php } ?>
        <?php if ($service_popup) { ?><tr><th><?php esc_html_e('الخدمة (نافذة)', 'qeema-theme'); ?></th><td><?php echo esc_html(isset($labels['service_popup'][$service_popup]) ? $labels['service_popup'][$service_popup] : $service_popup); ?></td></tr><?php } ?>
        <?php if (!empty($services)) {
            $svc_labels = array();
            foreach ($services as $s) {
                $svc_labels[] = isset($labels['services'][$s]) ? $labels['services'][$s] : $s;
            }
            echo '<tr><th>' . esc_html__('الخدمات المطلوبة', 'qeema-theme') . '</th><td>' . esc_html(implode('، ', $svc_labels)) . '</td></tr>';
        } ?>
        <tr><th><?php esc_html_e('المصدر', 'qeema-theme'); ?></th><td><?php echo $source === 'popup' ? esc_html__('نافذة منبثقة', 'qeema-theme') : esc_html__('صفحة طلب عرض السعر', 'qeema-theme'); ?></td></tr>
    </table>
    <?php
}
add_action('add_meta_boxes', 'qeema_quotation_request_meta_boxes');

// بناء نص الإيميل من بيانات الطلب
function qeema_quotation_build_email_body($data, $labels)
{
    $body = "الاسم: " . $data['name'] . "\n";
    $body .= "البريد: " . $data['email'] . "\n";
    $body .= "الجوال: " . $data['phone'] . "\n";
    if (!empty($data['company'])) {
        $body .= "الشركة: " . $data['company'] . "\n";
    }
    if (!empty($data['project_type'])) {
        $body .= "نوع المشروع: " . (isset($labels['project_type'][$data['project_type']]) ? $labels['project_type'][$data['project_type']] : $data['project_type']) . "\n";
    }
    if (!empty($data['services'])) {
        $svc = array();
        foreach ((array) $data['services'] as $s) {
            $svc[] = isset($labels['services'][$s]) ? $labels['services'][$s] : $s;
        }
        $body .= "الخدمات المطلوبة: " . implode('، ', $svc) . "\n";
    }
    if (!empty($data['service_popup'])) {
        $body .= "الخدمة: " . (isset($labels['service_popup'][$data['service_popup']]) ? $labels['service_popup'][$data['service_popup']] : $data['service_popup']) . "\n";
    }
    if (!empty($data['budget'])) {
        $body .= "الميزانية: " . (isset($labels['budget'][$data['budget']]) ? $labels['budget'][$data['budget']] : $data['budget']) . "\n";
    }
    if (!empty($data['timeline'])) {
        $body .= "الجدول الزمني: " . (isset($labels['timeline'][$data['timeline']]) ? $labels['timeline'][$data['timeline']] : $data['timeline']) . "\n";
    }
    if (!empty($data['project_description'])) {
        $body .= "\nوصف المشروع:\n" . $data['project_description'] . "\n";
    }
    return $body;
}

// معالجة إرسال فورم طلب عرض السعر (صفحة كاملة أو نافذة منبثقة)
function qeema_handle_quotation_submit()
{
    if (!isset($_POST['action']) || $_POST['action'] !== QEEMA_QUOTATION_ACTION) {
        return;
    }

    if (!isset($_POST['qeema_quotation_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['qeema_quotation_nonce'])), 'qeema_quotation_form')) {
        wp_safe_redirect(add_query_arg('quotation_error', 'nonce', qeema_quotation_redirect_back()));
        exit;
    }

    $name    = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email   = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $phone   = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $company = isset($_POST['company']) ? sanitize_text_field(wp_unslash($_POST['company'])) : '';

    // فورم الصفحة الكاملة أو النافذة المنبثقة
    $is_popup = !empty($_POST['qeema_quotation_popup']);
    if ($is_popup) {
        if (empty($name) || empty($phone)) {
            wp_safe_redirect(add_query_arg('quotation_error', 'required', home_url('/quotation')));
            exit;
        }
        $service = isset($_POST['service']) ? sanitize_text_field(wp_unslash($_POST['service'])) : '';
        $email = $email ?: '-';
    } else {
        if (empty($name) || empty($phone) || empty($email)) {
            wp_safe_redirect(add_query_arg('quotation_error', 'required', qeema_quotation_redirect_back()));
            exit;
        }
        if (!is_email($email)) {
            wp_safe_redirect(add_query_arg('quotation_error', 'email', qeema_quotation_redirect_back()));
            exit;
        }
    }

    $labels = qeema_quotation_labels();
    $project_type = isset($_POST['project_type']) ? sanitize_text_field(wp_unslash($_POST['project_type'])) : '';
    $budget = isset($_POST['budget']) ? sanitize_text_field(wp_unslash($_POST['budget'])) : '';
    $timeline = isset($_POST['timeline']) ? sanitize_text_field(wp_unslash($_POST['timeline'])) : '';
    $project_description = isset($_POST['project_description']) ? sanitize_textarea_field(wp_unslash($_POST['project_description'])) : '';
    $services = array();
    if (!empty($_POST['services']) && is_array($_POST['services'])) {
        $services = array_map('sanitize_text_field', wp_unslash($_POST['services']));
    }
    $service_popup = $is_popup && isset($_POST['service']) ? sanitize_text_field(wp_unslash($_POST['service'])) : '';

    $data = array(
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'company' => $company,
        'project_type' => $project_type,
        'budget' => $budget,
        'timeline' => $timeline,
        'project_description' => $project_description,
        'services' => $services,
        'service_popup' => $service_popup,
    );

    $title = $is_popup
        ? sprintf(__('طلب عرض سعر (نافذة) - %s', 'qeema-theme'), $name)
        : sprintf(__('طلب عرض سعر - %s - %s', 'qeema-theme'), $name, $project_type ? (isset($labels['project_type'][$project_type]) ? $labels['project_type'][$project_type] : $project_type) : __('بدون نوع', 'qeema-theme'));

    $content = $project_description;
    if (empty($content) && $is_popup && $service_popup) {
        $content = 'الخدمة: ' . (isset($labels['service_popup'][$service_popup]) ? $labels['service_popup'][$service_popup] : $service_popup);
    }
    if (empty($content)) {
        $content = '—';
    }

    $post_id = wp_insert_post(array(
        'post_type'    => 'quotation_request',
        'post_title'   => $title,
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_author'  => 1,
    ), true);

    if (is_wp_error($post_id)) {
        wp_safe_redirect(add_query_arg('quotation_error', 'save', qeema_quotation_redirect_back()));
        exit;
    }

    update_post_meta($post_id, '_quotation_name', $name);
    update_post_meta($post_id, '_quotation_email', $email);
    update_post_meta($post_id, '_quotation_phone', $phone);
    update_post_meta($post_id, '_quotation_company', $company);
    update_post_meta($post_id, '_quotation_project_type', $project_type);
    update_post_meta($post_id, '_quotation_budget', $budget);
    update_post_meta($post_id, '_quotation_timeline', $timeline);
    update_post_meta($post_id, '_quotation_services', implode(',', $services));
    update_post_meta($post_id, '_quotation_service_popup', $service_popup);
    update_post_meta($post_id, '_quotation_source', $is_popup ? 'popup' : 'page');

    $body = qeema_quotation_build_email_body($data, $labels);
    $subject = '[' . get_bloginfo('name') . '] ' . ($is_popup ? __('طلب عرض سعر (نافذة)', 'qeema-theme') : __('طلب عرض سعر', 'qeema-theme')) . ' - ' . $name;
    wp_mail(QEEMA_QUOTATION_EMAIL, $subject, $body, array('Content-Type: text/plain; charset=UTF-8'));

    wp_safe_redirect(qeema_get_thank_you_url());
    exit;
}

function qeema_quotation_redirect_back()
{
    $ref = wp_get_referer();
    if ($ref) {
        return remove_query_arg(array('quotation_sent', 'quotation_error'), $ref);
    }
    return home_url('/quotation');
}

add_action('admin_post_' . QEEMA_QUOTATION_ACTION, 'qeema_handle_quotation_submit');
add_action('admin_post_nopriv_' . QEEMA_QUOTATION_ACTION, 'qeema_handle_quotation_submit');
