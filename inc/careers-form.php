<?php
/**
 * طلبات التوظيف: حفظ في الداشبورد + إيميل لـ HR
 */

defined('ABSPATH') || exit;

const QEEMA_CAREERS_EMAIL   = 'careers.arch@qeema-group.com';
const QEEMA_CAREERS_ACTION  = 'qeema_careers_apply';
const QEEMA_CAREERS_CV_MAX  = 15 * 1024 * 1024; // 15 MB

// CPT: طلبات التوظيف
function qeema_register_career_application_cpt()
{
    $labels = array(
        'name'               => __('طلبات التوظيف', 'qeema-theme'),
        'singular_name'      => __('طلب توظيف', 'qeema-theme'),
        'menu_name'          => __('التوظيف', 'qeema-theme'),
        'add_new'            => __('إضافة', 'qeema-theme'),
        'add_new_item'       => __('طلب جديد', 'qeema-theme'),
        'edit_item'          => __('عرض الطلب', 'qeema-theme'),
        'view_item'          => __('عرض الطلب', 'qeema-theme'),
        'search_items'       => __('بحث', 'qeema-theme'),
        'not_found'          => __('لا توجد طلبات', 'qeema-theme'),
        'not_found_in_trash' => __('لا توجد طلبات في المحذوفات', 'qeema-theme'),
    );

    register_post_type('career_application', array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-id-alt',
        'menu_position'       => 28,
        'capability_type'     => 'post',
        'capabilities'        => array('create_posts' => 'do_not_allow'),
        'map_meta_cap'        => true,
        'supports'            => array('title', 'editor'),
        'has_archive'         => false,
        'rewrite'             => false,
        'query_var'           => false,
    ));
}
add_action('init', 'qeema_register_career_application_cpt');

// أعمدة القائمة
function qeema_career_application_columns($columns)
{
    $new = array();
    $new['cb'] = $columns['cb'];
    $new['title'] = __('الاسم', 'qeema-theme');
    $new['career_specialization'] = __('التخصص', 'qeema-theme');
    $new['career_experience'] = __('سنوات الخبرة', 'qeema-theme');
    $new['career_ref'] = __('الرقم', 'qeema-theme');
    $new['date'] = $columns['date'];
    return $new;
}
add_filter('manage_career_application_posts_columns', 'qeema_career_application_columns');

function qeema_career_application_column_content($column, $post_id)
{
    switch ($column) {
        case 'career_specialization':
            echo esc_html(get_post_meta($post_id, '_career_specialization', true) ?: '—');
            break;
        case 'career_experience':
            echo esc_html(get_post_meta($post_id, '_career_years_experience', true) ?: '—');
            break;
        case 'career_ref':
            echo esc_html(get_post_meta($post_id, '_career_reference', true) ?: '—');
            break;
    }
}
add_action('manage_career_application_posts_custom_column', 'qeema_career_application_column_content', 10, 2);

// إزالة "إضافة جديد"
function qeema_career_hide_add_new()
{
    global $submenu;
    if (isset($submenu['edit.php?post_type=career_application'])) {
        foreach ($submenu['edit.php?post_type=career_application'] as $k => $item) {
            if (isset($item[2]) && $item[2] === 'post-new.php?post_type=career_application') {
                unset($submenu['edit.php?post_type=career_application'][$k]);
                break;
            }
        }
    }
}
add_action('admin_menu', 'qeema_career_hide_add_new', 999);

// صندوق تفاصيل الطلب
function qeema_career_application_meta_boxes()
{
    add_meta_box(
        'qeema_career_details',
        __('بيانات الطلب', 'qeema-theme'),
        'qeema_career_application_meta_box_cb',
        'career_application',
        'normal'
    );
}

function qeema_career_application_meta_box_cb($post)
{
    $meta = array(
        '_career_reference'      => 'رقم الطلب',
        '_career_email'         => 'البريد الإلكتروني',
        '_career_phone'         => 'رقم الهاتف',
        '_career_city'          => 'المدينة',
        '_career_country'       => 'الدولة',
        '_career_specialization' => 'التخصص',
        '_career_years_experience' => 'سنوات الخبرة',
        '_career_availability'  => 'التوفر',
        '_career_skills'        => 'المهارات/البرامج',
        '_career_portfolio'     => 'رابط البورتفوليو',
        '_career_linkedin'      => 'لينكدإن',
        '_career_cover'         => 'رسالة التقديم',
    );
    echo '<table class="form-table">';
    foreach ($meta as $key => $label) {
        $val = get_post_meta($post->ID, $key, true);
        if ($key === '_career_skills' || $key === '_career_cover') {
            echo '<tr><th>' . esc_html($label) . '</th><td><pre class="whitespace-pre-wrap" style="white-space:pre-wrap;">' . esc_html($val ?: '—') . '</pre></td></tr>';
        } elseif (in_array($key, array('_career_portfolio', '_career_linkedin'), true) && $val) {
            echo '<tr><th>' . esc_html($label) . '</th><td><a href="' . esc_url($val) . '" target="_blank" rel="noopener">' . esc_html($val) . '</a></td></tr>';
        } else {
            echo '<tr><th>' . esc_html($label) . '</th><td>' . esc_html($val ?: '—') . '</td></tr>';
        }
    }
    $cv = get_post_meta($post->ID, '_career_cv_attachment_id', true);
    if ($cv) {
        $url = wp_get_attachment_url($cv);
        echo '<tr><th>السيرة الذاتية (PDF)</th><td>' . ($url ? '<a href="' . esc_url($url) . '" target="_blank" rel="noopener">تحميل</a>' : '—') . '</td></tr>';
    }
    echo '</table>';
}
add_action('add_meta_boxes', 'qeema_career_application_meta_boxes');

// معالجة الإرسال
function qeema_handle_careers_apply()
{
    if (!isset($_POST['action']) || $_POST['action'] !== QEEMA_CAREERS_ACTION) {
        return;
    }

    if (!isset($_POST['qeema_careers_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['qeema_careers_nonce'])), 'qeema_careers_form')) {
        wp_safe_redirect(add_query_arg(array('careers_error' => 'nonce'), qeema_careers_redirect_url()));
        exit;
    }

    $full_name = isset($_POST['full_name']) ? sanitize_text_field(wp_unslash($_POST['full_name'])) : '';
    if (empty($full_name)) {
        wp_safe_redirect(add_query_arg(array('careers_error' => 'required'), qeema_careers_redirect_url()));
        exit;
    }

    $email      = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $phone      = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $city       = isset($_POST['city']) ? sanitize_text_field(wp_unslash($_POST['city'])) : '';
    $country    = isset($_POST['country']) ? sanitize_text_field(wp_unslash($_POST['country'])) : '';
    $specialization = isset($_POST['specialization']) ? sanitize_text_field(wp_unslash($_POST['specialization'])) : '';
    $years_exp  = isset($_POST['years_experience']) ? sanitize_text_field(wp_unslash($_POST['years_experience'])) : '';
    $availability = isset($_POST['availability']) ? sanitize_text_field(wp_unslash($_POST['availability'])) : '';
    $skills     = isset($_POST['skills']) ? sanitize_textarea_field(wp_unslash($_POST['skills'])) : '';
    $portfolio  = isset($_POST['portfolio_url']) ? esc_url_raw(wp_unslash($_POST['portfolio_url'])) : '';
    $linkedin   = isset($_POST['linkedin']) ? esc_url_raw(wp_unslash($_POST['linkedin'])) : '';
    $cover      = isset($_POST['cover_message']) ? sanitize_textarea_field(wp_unslash($_POST['cover_message'])) : '';
    $privacy_ok = !empty($_POST['privacy_agree']);

    if (!$privacy_ok) {
        wp_safe_redirect(add_query_arg(array('careers_error' => 'privacy'), qeema_careers_redirect_url()));
        exit;
    }

    // مرفق السيرة: PDF فقط، حد 15 ميجا
    $cv_attachment_id = 0;
    if (!empty($_FILES['cv_file']['tmp_name']) && is_uploaded_file($_FILES['cv_file']['tmp_name'])) {
        if ($_FILES['cv_file']['size'] > QEEMA_CAREERS_CV_MAX) {
            wp_safe_redirect(add_query_arg(array('careers_error' => 'filesize'), qeema_careers_redirect_url()));
            exit;
        }
        $ext = strtolower(pathinfo($_FILES['cv_file']['name'], PATHINFO_EXTENSION));
        if ($ext !== 'pdf') {
            wp_safe_redirect(add_query_arg(array('careers_error' => 'filetype'), qeema_careers_redirect_url()));
            exit;
        }
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        $upload = wp_handle_upload($_FILES['cv_file'], array('test_form' => false));
        if (isset($upload['file'])) {
            $attachment = array(
                'post_mime_type' => $upload['type'],
                'post_title'     => 'CV-' . preg_replace('/[^a-zA-Z0-9\-_\.]/', '', basename($upload['file'])),
                'post_content'   => '',
                'post_status'    => 'inherit',
            );
            $aid = wp_insert_attachment($attachment, $upload['file']);
            if (!is_wp_error($aid)) {
                $cv_attachment_id = $aid;
            }
        }
    }
    if (!$cv_attachment_id) {
        wp_safe_redirect(add_query_arg(array('careers_error' => 'cv_required'), qeema_careers_redirect_url()));
        exit;
    }

    $ref = qeema_career_next_reference();

    $post_id = wp_insert_post(array(
        'post_type'    => 'career_application',
        'post_title'   => $full_name,
        'post_content' => $cover,
        'post_status'  => 'publish',
        'post_author'  => 1,
    ), true);

    if (is_wp_error($post_id)) {
        wp_safe_redirect(add_query_arg(array('careers_error' => 'save'), qeema_careers_redirect_url()));
        exit;
    }

    update_post_meta($post_id, '_career_reference', $ref);
    update_post_meta($post_id, '_career_email', $email);
    update_post_meta($post_id, '_career_phone', $phone);
    update_post_meta($post_id, '_career_city', $city);
    update_post_meta($post_id, '_career_country', $country);
    update_post_meta($post_id, '_career_specialization', $specialization);
    update_post_meta($post_id, '_career_years_experience', $years_exp);
    update_post_meta($post_id, '_career_availability', $availability);
    update_post_meta($post_id, '_career_skills', $skills);
    update_post_meta($post_id, '_career_portfolio', $portfolio);
    update_post_meta($post_id, '_career_linkedin', $linkedin);
    update_post_meta($post_id, '_career_cover', $cover);
    update_post_meta($post_id, '_career_cv_attachment_id', $cv_attachment_id);

    $body = "رقم الطلب: $ref\n";
    $body .= "الاسم: $full_name\nالبريد: $email | الهاتف: $phone\n";
    $body .= "المدينة / الدولة: $city / $country\n";
    $body .= "التخصص: $specialization | سنوات الخبرة: $years_exp | التوفر: $availability\n\n";
    $body .= "المهارات/البرامج:\n$skills\n\n";
    if ($portfolio) $body .= "البورتفوليو: $portfolio\n";
    if ($linkedin) $body .= "لينكدإن: $linkedin\n";
    $body .= "\nرسالة التقديم:\n$cover";
    $subj = '[' . get_bloginfo('name') . '] طلب توظيف جديد - ' . $ref . ' - ' . $full_name;
    wp_mail(QEEMA_CAREERS_EMAIL, $subj, $body, array('Content-Type: text/plain; charset=UTF-8'));

    wp_safe_redirect(add_query_arg(array('careers_sent' => '1', 'careers_ref' => $ref), qeema_careers_redirect_url()));
    exit;
}

function qeema_career_next_reference()
{
    $count = wp_count_posts('career_application');
    $total = ($count && isset($count->publish)) ? (int) $count->publish : 0;
    return 'CG-CAREER-' . str_pad((string) ($total + 1), 4, '0', STR_PAD_LEFT);
}

function qeema_careers_redirect_url()
{
    $ref = wp_get_referer();
    if ($ref) {
        return remove_query_arg(array('careers_sent', 'careers_ref', 'careers_error'), $ref);
    }
    return home_url('/careers');
}

add_action('admin_post_' . QEEMA_CAREERS_ACTION, 'qeema_handle_careers_apply');
add_action('admin_post_nopriv_' . QEEMA_CAREERS_ACTION, 'qeema_handle_careers_apply');
