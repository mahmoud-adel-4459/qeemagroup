<?php
/**
 * تسجيل الموردين ومقدمي الخدمات: حفظ في الداشبورد + إيميل لـ procurement@qeema-group.com
 */

defined('ABSPATH') || exit;

const QEEMA_VENDOR_EMAIL  = 'procurement@qeema-group.com';
const QEEMA_VENDOR_ACTION  = 'qeema_vendor_register';
const QEEMA_VENDOR_MAX_PER  = 10 * 1024 * 1024;  // 10 MB
const QEEMA_VENDOR_MAX_TOTAL = 30 * 1024 * 1024; // 30 MB

// CPT: طلبات تسجيل الموردين
function qeema_register_vendor_registration_cpt()
{
    $labels = array(
        'name'               => __('قائمة الموردين', 'qeema-theme'),
        'singular_name'      => __('تسجيل مورّد', 'qeema-theme'),
        'menu_name'          => __('الموردين', 'qeema-theme'),
        'add_new'            => __('إضافة', 'qeema-theme'),
        'add_new_item'       => __('تسجيل جديد', 'qeema-theme'),
        'edit_item'          => __('عرض التسجيل', 'qeema-theme'),
        'view_item'          => __('عرض التسجيل', 'qeema-theme'),
        'search_items'       => __('بحث', 'qeema-theme'),
        'not_found'          => __('لا توجد تسجيلات', 'qeema-theme'),
        'not_found_in_trash' => __('لا توجد تسجيلات في المحذوفات', 'qeema-theme'),
    );

    register_post_type('vendor_registration', array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-groups',
        'menu_position'       => 27,
        'capability_type'     => 'post',
        'capabilities'        => array('create_posts' => 'do_not_allow'),
        'map_meta_cap'        => true,
        'supports'            => array('title', 'editor'),
        'has_archive'         => false,
        'rewrite'             => false,
        'query_var'           => false,
    ));
}
add_action('init', 'qeema_register_vendor_registration_cpt');

// أعمدة القائمة في الداشبورد
function qeema_vendor_registration_columns($columns)
{
    $new = array();
    $new['cb'] = $columns['cb'];
    $new['title'] = __('اسم الشركة', 'qeema-theme');
    $new['vendor_type'] = __('نوع الجهة', 'qeema-theme');
    $new['vendor_location'] = __('المدينة / الدولة', 'qeema-theme');
    $new['vendor_classification'] = __('التصنيف', 'qeema-theme');
    $new['vendor_status'] = __('الحالة', 'qeema-theme');
    $new['vendor_ref'] = __('الرقم', 'qeema-theme');
    $new['date'] = $columns['date'];
    return $new;
}
add_filter('manage_vendor_registration_posts_columns', 'qeema_vendor_registration_columns');

function qeema_vendor_registration_column_content($column, $post_id)
{
    switch ($column) {
        case 'vendor_type':
            echo esc_html(get_post_meta($post_id, '_vendor_entity_type', true) ?: '—');
            break;
        case 'vendor_location':
            $c = get_post_meta($post_id, '_vendor_city', true);
            $co = get_post_meta($post_id, '_vendor_country', true);
            echo esc_html(trim($c . ' / ' . $co) ?: '—');
            break;
        case 'vendor_classification':
            echo esc_html(get_post_meta($post_id, '_vendor_classification_label', true) ?: '—');
            break;
        case 'vendor_status':
            echo esc_html(qeema_vendor_status_label(get_post_meta($post_id, '_vendor_status', true)));
            break;
        case 'vendor_ref':
            echo esc_html(get_post_meta($post_id, '_vendor_reference', true) ?: '—');
            break;
    }
}
add_action('manage_vendor_registration_posts_custom_column', 'qeema_vendor_registration_column_content', 10, 2);

function qeema_vendor_status_label($status)
{
    $labels = array(
        'new'           => 'جديد',
        'under_review'  => 'قيد المراجعة',
        'approved'      => 'معتمد',
        'rejected'      => 'مرفوض',
        'active'        => 'مفعّل',
        'suspended'     => 'معلّق',
    );
    return isset($labels[$status]) ? $labels[$status] : ($status ?: 'جديد');
}

// إزالة "إضافة جديد"
function qeema_vendor_hide_add_new()
{
    global $submenu;
    if (isset($submenu['edit.php?post_type=vendor_registration'])) {
        foreach ($submenu['edit.php?post_type=vendor_registration'] as $k => $item) {
            if (isset($item[2]) && $item[2] === 'post-new.php?post_type=vendor_registration') {
                unset($submenu['edit.php?post_type=vendor_registration'][$k]);
                break;
            }
        }
    }
}
add_action('admin_menu', 'qeema_vendor_hide_add_new', 999);

// صندوق تفاصيل التسجيل + تغيير الحالة
function qeema_vendor_registration_meta_boxes()
{
    add_meta_box(
        'qeema_vendor_details',
        __('بيانات التسجيل', 'qeema-theme'),
        'qeema_vendor_registration_meta_box_cb',
        'vendor_registration',
        'normal'
    );
    add_meta_box(
        'qeema_vendor_status_box',
        __('الحالة وسير العمل', 'qeema-theme'),
        'qeema_vendor_status_meta_box_cb',
        'vendor_registration',
        'side'
    );
}

function qeema_vendor_registration_meta_box_cb($post)
{
    $meta = array(
        '_vendor_legal_name' => 'الاسم القانوني',
        '_vendor_tax_id' => 'رقم السجل/الضريبي/الموحّد',
        '_vendor_country' => 'الدولة',
        '_vendor_city' => 'المدينة',
        '_vendor_address' => 'العنوان',
        '_vendor_website' => 'الموقع/البريد الرسمي',
        '_vendor_contact_name' => 'اسم الشخص المسؤول',
        '_vendor_contact_position' => 'المنصب',
        '_vendor_contact_phone' => 'رقم الهاتف',
        '_vendor_contact_email' => 'البريد الرسمي',
        '_vendor_entity_type' => 'نوع الجهة',
        '_vendor_classification_label' => 'التصنيف',
        '_vendor_description' => 'وصف الخدمات/المنتجات',
        '_vendor_reference' => 'رقم التسجيل',
    );
    echo '<table class="form-table">';
    foreach ($meta as $key => $label) {
        $val = get_post_meta($post->ID, $key, true);
        if ($key === '_vendor_description' && $val) {
            echo '<tr><th>' . esc_html($label) . '</th><td><pre class="whitespace-pre-wrap">' . esc_html($val) . '</pre></td></tr>';
        } else {
            echo '<tr><th>' . esc_html($label) . '</th><td>' . esc_html($val ?: '—') . '</td></tr>';
        }
    }
    $att = get_post_meta($post->ID, '_vendor_attachments', true);
    if (!empty($att) && is_array($att)) {
        echo '<tr><th>المرفقات</th><td>';
        foreach ($att as $aid) {
            $url = wp_get_attachment_url($aid);
            if ($url) {
                echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener">' . esc_html(get_the_title($aid)) . '</a><br>';
            }
        }
        echo '</td></tr>';
    }
    echo '</table>';
}

function qeema_vendor_status_meta_box_cb($post)
{
    $current = get_post_meta($post->ID, '_vendor_status', true) ?: 'new';
    $statuses = array('new' => 'جديد', 'under_review' => 'قيد المراجعة', 'approved' => 'معتمد', 'rejected' => 'مرفوض', 'active' => 'مفعّل', 'suspended' => 'معلّق');
    if (isset($_POST['qeema_vendor_status_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['qeema_vendor_status_nonce'])), 'qeema_vendor_status')) {
        $new_status = isset($_POST['vendor_status']) ? sanitize_text_field(wp_unslash($_POST['vendor_status'])) : '';
        if (array_key_exists($new_status, $statuses)) {
            $old_status = get_post_meta($post->ID, '_vendor_status', true) ?: 'new';
            update_post_meta($post->ID, '_vendor_status', $new_status);
            $current = $new_status;
            if ($old_status !== 'approved' && $new_status === 'approved') {
                $to = get_post_meta($post->ID, '_vendor_contact_email', true);
                if ($to && is_email($to)) {
                    $company = get_the_title($post->ID);
                    $ref = get_post_meta($post->ID, '_vendor_reference', true);
                    $subj = '[' . get_bloginfo('name') . '] تم اعتماد تسجيلكم في قاعدة الموردين - ' . $ref;
                    $body = "السادة " . $company . "،\n\nنهنئكم باعتماد تسجيلكم في قاعدة بيانات موردي قيمة جروب (رقم التسجيل: " . $ref . ").\n\nسيتم التواصل معكم وفق شروط التعامل المعتمدة عند توفر مشاريع مناسبة لتخصصكم.\n\nمع تحياتنا،\nفريق قيمة جروب";
                    wp_mail($to, $subj, $body, array('Content-Type: text/plain; charset=UTF-8'));
                }
            }
        }
    }
    echo '<form method="post">';
    wp_nonce_field('qeema_vendor_status', 'qeema_vendor_status_nonce');
    echo '<select name="vendor_status" class="widefat">';
    foreach ($statuses as $val => $label) {
        echo '<option value="' . esc_attr($val) . '" ' . selected($current, $val, false) . '>' . esc_html($label) . '</option>';
    }
    echo '</select><p class="submit"><button type="submit" class="button button-primary">حفظ الحالة</button></p></form>';
}
add_action('add_meta_boxes', 'qeema_vendor_registration_meta_boxes');

// تصدير CSV من قائمة الموردين
function qeema_vendor_export_csv()
{
    if (!isset($_GET['qeema_vendor_export']) || $_GET['qeema_vendor_export'] !== 'csv' || !current_user_can('edit_posts')) {
        return;
    }
    check_admin_referer('qeema_vendor_export');
    $posts = get_posts(array('post_type' => 'vendor_registration', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'date', 'order' => 'DESC'));
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=qeema-vendors-' . date('Y-m-d') . '.csv');
    $out = fopen('php://output', 'w');
    fprintf($out, "\xEF\xBB\xBF"); // UTF-8 BOM for Excel
    fputcsv($out, array('الرقم', 'اسم الشركة', 'نوع الجهة', 'المدينة', 'الدولة', 'التصنيف', 'الحالة', 'تاريخ التسجيل'));
    foreach ($posts as $p) {
        fputcsv($out, array(
            get_post_meta($p->ID, '_vendor_reference', true),
            $p->post_title,
            get_post_meta($p->ID, '_vendor_entity_type', true),
            get_post_meta($p->ID, '_vendor_city', true),
            get_post_meta($p->ID, '_vendor_country', true),
            get_post_meta($p->ID, '_vendor_classification_label', true),
            qeema_vendor_status_label(get_post_meta($p->ID, '_vendor_status', true)),
            get_the_date('Y-m-d H:i', $p),
        ));
    }
    fclose($out);
    exit;
}
add_action('admin_init', 'qeema_vendor_export_csv');

function qeema_vendor_add_export_link()
{
    $screen = get_current_screen();
    if (!$screen || $screen->id !== 'edit-vendor_registration') {
        return;
    }
    $url = wp_nonce_url(admin_url('admin.php?page=qeema-vendor-export&qeema_vendor_export=csv'), 'qeema_vendor_export');
    echo '<p class="alignleft"><a href="' . esc_url($url) . '" class="button">تصدير CSV</a></p>';
}
add_action('manage_posts_extra_tablenav', 'qeema_vendor_add_export_link');

function qeema_vendor_export_menu()
{
    add_submenu_page(
        'edit.php?post_type=vendor_registration',
        __('تصدير الموردين', 'qeema-theme'),
        __('تصدير CSV', 'qeema-theme'),
        'edit_posts',
        'qeema-vendor-export',
        '__return_false'
    );
}
add_action('admin_menu', 'qeema_vendor_export_menu', 20);

// عند الدخول لصفحة التصدير من القائمة الجانبية: توجيه لتحميل CSV
function qeema_vendor_export_redirect()
{
    if (!isset($_GET['page']) || $_GET['page'] !== 'qeema-vendor-export') {
        return;
    }
    if (isset($_GET['qeema_vendor_export']) && $_GET['qeema_vendor_export'] === 'csv') {
        return; // التصدير يُنفّذ في qeema_vendor_export_csv
    }
    if (current_user_can('edit_posts')) {
        wp_safe_redirect(wp_nonce_url(admin_url('edit.php?post_type=vendor_registration&qeema_vendor_export=csv'), 'qeema_vendor_export'));
        exit;
    }
}
add_action('admin_init', 'qeema_vendor_export_redirect', 5);

// معالجة الإرسال
function qeema_handle_vendor_register()
{
    if (!isset($_POST['action']) || $_POST['action'] !== QEEMA_VENDOR_ACTION) {
        return;
    }

    if (!isset($_POST['qeema_vendor_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['qeema_vendor_nonce'])), 'qeema_vendor_form')) {
        wp_safe_redirect(add_query_arg(array('vendor_error' => 'nonce'), qeema_vendor_redirect_url()));
        exit;
    }

    $company = isset($_POST['company_name']) ? sanitize_text_field(wp_unslash($_POST['company_name'])) : '';
    if (empty($company)) {
        wp_safe_redirect(add_query_arg(array('vendor_error' => 'required'), qeema_vendor_redirect_url()));
        exit;
    }

    $legal_name   = isset($_POST['legal_name']) ? sanitize_text_field(wp_unslash($_POST['legal_name'])) : '';
    $tax_id       = isset($_POST['tax_id']) ? sanitize_text_field(wp_unslash($_POST['tax_id'])) : '';
    $country      = isset($_POST['country']) ? sanitize_text_field(wp_unslash($_POST['country'])) : '';
    $city         = isset($_POST['city']) ? sanitize_text_field(wp_unslash($_POST['city'])) : '';
    $address      = isset($_POST['address']) ? sanitize_textarea_field(wp_unslash($_POST['address'])) : '';
    $website      = isset($_POST['website']) ? esc_url_raw(wp_unslash($_POST['website'])) : '';
    $contact_name = isset($_POST['contact_name']) ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
    $contact_pos  = isset($_POST['contact_position']) ? sanitize_text_field(wp_unslash($_POST['contact_position'])) : '';
    $contact_phone = isset($_POST['contact_phone']) ? sanitize_text_field(wp_unslash($_POST['contact_phone'])) : '';
    $contact_email = isset($_POST['contact_email']) ? sanitize_email(wp_unslash($_POST['contact_email'])) : '';
    $entity_type  = isset($_POST['entity_type']) && is_array($_POST['entity_type']) ? array_map('sanitize_text_field', wp_unslash($_POST['entity_type'])) : array();
    $classification = isset($_POST['classification']) && is_array($_POST['classification']) ? array_map('sanitize_text_field', wp_unslash($_POST['classification'])) : array();
    $description  = isset($_POST['description']) ? sanitize_textarea_field(wp_unslash($_POST['description'])) : '';
    $privacy_ok   = !empty($_POST['privacy_agree']);

    if (!$privacy_ok) {
        wp_safe_redirect(add_query_arg(array('vendor_error' => 'privacy'), qeema_vendor_redirect_url()));
        exit;
    }

    // مرفقات: حد 10MB لكل ملف، إجمالي 30MB
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    $file_keys = array('doc_registration', 'doc_profile', 'doc_certificates');
    $attachment_ids = array();
    $total_size = 0;
    foreach ($file_keys as $key) {
        if (empty($_FILES[$key]['tmp_name']) || !is_uploaded_file($_FILES[$key]['tmp_name'])) {
            continue;
        }
        if ($_FILES[$key]['size'] > QEEMA_VENDOR_MAX_PER) {
            wp_safe_redirect(add_query_arg(array('vendor_error' => 'filesize'), qeema_vendor_redirect_url()));
            exit;
        }
        $total_size += $_FILES[$key]['size'];
        if ($total_size > QEEMA_VENDOR_MAX_TOTAL) {
            wp_safe_redirect(add_query_arg(array('vendor_error' => 'filesize'), qeema_vendor_redirect_url()));
            exit;
        }
        $upload = wp_handle_upload($_FILES[$key], array('test_form' => false));
        if (isset($upload['file'])) {
            $attachment = array(
                'post_mime_type' => $upload['type'],
                'post_title'     => preg_replace('/[^a-zA-Z0-9\-_\.]/', '', basename($upload['file'])),
                'post_content'  => '',
                'post_status'   => 'inherit',
            );
            $aid = wp_insert_attachment($attachment, $upload['file']);
            if (!is_wp_error($aid)) {
                $attachment_ids[] = $aid;
            }
        }
    }

    $ref = qeema_vendor_next_reference();

    $post_id = wp_insert_post(array(
        'post_type'    => 'vendor_registration',
        'post_title'   => $company,
        'post_content' => $description,
        'post_status'  => 'publish',
        'post_author'  => 1,
    ), true);

    if (is_wp_error($post_id)) {
        wp_safe_redirect(add_query_arg(array('vendor_error' => 'save'), qeema_vendor_redirect_url()));
        exit;
    }

    update_post_meta($post_id, '_vendor_reference', $ref);
    update_post_meta($post_id, '_vendor_status', 'new');
    update_post_meta($post_id, '_vendor_legal_name', $legal_name);
    update_post_meta($post_id, '_vendor_tax_id', $tax_id);
    update_post_meta($post_id, '_vendor_country', $country);
    update_post_meta($post_id, '_vendor_city', $city);
    update_post_meta($post_id, '_vendor_address', $address);
    update_post_meta($post_id, '_vendor_website', $website);
    update_post_meta($post_id, '_vendor_contact_name', $contact_name);
    update_post_meta($post_id, '_vendor_contact_position', $contact_pos);
    update_post_meta($post_id, '_vendor_contact_phone', $contact_phone);
    update_post_meta($post_id, '_vendor_contact_email', $contact_email);
    update_post_meta($post_id, '_vendor_entity_type', implode('، ', $entity_type));
    update_post_meta($post_id, '_vendor_classification', $classification);
    update_post_meta($post_id, '_vendor_classification_label', implode('، ', $classification));
    update_post_meta($post_id, '_vendor_attachments', $attachment_ids);

    $body = "رقم التسجيل: $ref\n";
    $body .= "الشركة: $company\nالاسم القانوني: $legal_name\nالسجل/الضريبي: $tax_id\n";
    $body .= "الدولة/المدينة: $country / $city\nالعنوان: $address\nالموقع: $website\n";
    $body .= "المسؤول: $contact_name | $contact_pos | $contact_phone | $contact_email\n";
    $body .= "نوع الجهة: " . implode('، ', $entity_type) . "\n";
    $body .= "التصنيف: " . implode('، ', $classification) . "\n\n";
    $body .= "وصف الخدمات/المنتجات:\n$description";
    wp_mail(QEEMA_VENDOR_EMAIL, '[' . get_bloginfo('name') . '] تسجيل مورّد جديد - ' . $ref . ' - ' . $company, $body, array('Content-Type: text/plain; charset=UTF-8'));

    wp_safe_redirect(add_query_arg(array('vendor_sent' => '1', 'vendor_ref' => $ref), qeema_vendor_redirect_url()));
    exit;
}

function qeema_vendor_next_reference()
{
    $count = wp_count_posts('vendor_registration');
    $total = ($count && isset($count->publish)) ? (int) $count->publish : 0;
    $num = $total + 1;
    return 'CG-VENDOR-' . str_pad((string) $num, 4, '0', STR_PAD_LEFT);
}

function qeema_vendor_redirect_url()
{
    $ref = wp_get_referer();
    if ($ref) {
        return remove_query_arg(array('vendor_sent', 'vendor_ref', 'vendor_error'), $ref);
    }
    return home_url('/vendors');
}

add_action('admin_post_' . QEEMA_VENDOR_ACTION, 'qeema_handle_vendor_register');
add_action('admin_post_nopriv_' . QEEMA_VENDOR_ACTION, 'qeema_handle_vendor_register');
