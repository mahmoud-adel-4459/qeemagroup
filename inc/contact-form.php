<?php
/**
 * Contact Form: حفظ في الداشبورد + إرسال إلى info@qeema-group.com
 */

defined('ABSPATH') || exit;

const QEEMA_CONTACT_EMAIL = 'info@qeema-group.com';
const QEEMA_CONTACT_ACTION = 'qeema_contact_submit';

// تسجيل نوع المنشور: رسائل التواصل
function qeema_register_contact_submission_cpt()
{
    $labels = array(
        'name'               => __('رسائل التواصل', 'qeema-theme'),
        'singular_name'      => __('رسالة تواصل', 'qeema-theme'),
        'menu_name'          => __('رسائل التواصل', 'qeema-theme'),
        'add_new'            => __('إضافة', 'qeema-theme'),
        'add_new_item'       => __('رسالة جديدة', 'qeema-theme'),
        'edit_item'          => __('عرض الرسالة', 'qeema-theme'),
        'view_item'          => __('عرض الرسالة', 'qeema-theme'),
        'search_items'       => __('بحث', 'qeema-theme'),
        'not_found'          => __('لا توجد رسائل', 'qeema-theme'),
        'not_found_in_trash' => __('لا توجد رسائل في المحذوفات', 'qeema-theme'),
    );

    register_post_type('contact_submission', array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-email-alt',
        'menu_position'       => 25,
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
add_action('init', 'qeema_register_contact_submission_cpt');

// أعمدة قائمة رسائل التواصل في الداشبورد
function qeema_contact_submission_columns($columns)
{
    $new = array();
    $new['cb'] = $columns['cb'];
    $new['title'] = __('الموضوع / المرسل', 'qeema-theme');
    $new['contact_email'] = __('البريد', 'qeema-theme');
    $new['contact_phone'] = __('الجوال', 'qeema-theme');
    $new['date'] = $columns['date'];
    return $new;
}
add_filter('manage_contact_submission_posts_columns', 'qeema_contact_submission_columns');

function qeema_contact_submission_column_content($column, $post_id)
{
    switch ($column) {
        case 'contact_email':
            echo esc_html(get_post_meta($post_id, '_contact_email', true));
            break;
        case 'contact_phone':
            echo esc_html(get_post_meta($post_id, '_contact_phone', true));
            break;
    }
}
add_action('manage_contact_submission_posts_custom_column', 'qeema_contact_submission_column_content', 10, 2);

// إزالة زر "إضافة جديد" لأن الرسائل تأتي من الفورم فقط
function qeema_contact_submission_hide_add_new()
{
    global $submenu;
    if (isset($submenu['edit.php?post_type=contact_submission'])) {
        foreach ($submenu['edit.php?post_type=contact_submission'] as $k => $item) {
            if ($item[2] === 'post-new.php?post_type=contact_submission') {
                unset($submenu['edit.php?post_type=contact_submission'][$k]);
                break;
            }
        }
    }
}
add_action('admin_menu', 'qeema_contact_submission_hide_add_new', 999);

// صناديق الحقول في صفحة تحرير الرسالة
function qeema_contact_submission_meta_boxes()
{
    add_meta_box(
        'qeema_contact_details',
        __('بيانات المرسل', 'qeema-theme'),
        'qeema_contact_submission_meta_box_cb',
        'contact_submission',
        'normal'
    );
}

function qeema_contact_submission_meta_box_cb($post)
{
    $name    = get_post_meta($post->ID, '_contact_name', true);
    $email   = get_post_meta($post->ID, '_contact_email', true);
    $phone   = get_post_meta($post->ID, '_contact_phone', true);
    $subject = get_post_meta($post->ID, '_contact_subject', true);
    ?>
    <table class="form-table">
        <tr><th><?php esc_html_e('الاسم', 'qeema-theme'); ?></th><td><?php echo esc_html($name); ?></td></tr>
        <tr><th><?php esc_html_e('البريد الإلكتروني', 'qeema-theme'); ?></th><td><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></td></tr>
        <tr><th><?php esc_html_e('الجوال', 'qeema-theme'); ?></th><td><a href="tel:<?php echo esc_attr($phone); ?>" dir="ltr"><?php echo esc_html($phone); ?></a></td></tr>
        <tr><th><?php esc_html_e('الموضوع', 'qeema-theme'); ?></th><td><?php echo esc_html($subject); ?></td></tr>
    </table>
    <?php
}
add_action('add_meta_boxes', 'qeema_contact_submission_meta_boxes');

// معالجة إرسال الفورم: حفظ + إيميل
function qeema_handle_contact_submit()
{
    if (!isset($_POST['action']) || $_POST['action'] !== QEEMA_CONTACT_ACTION) {
        return;
    }

    if (!isset($_POST['qeema_contact_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['qeema_contact_nonce'])), 'qeema_contact_form')) {
        wp_safe_redirect(add_query_arg('contact_error', 'nonce', qeema_contact_redirect_url()));
        exit;
    }

    $name    = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email   = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $phone   = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $subject = isset($_POST['subject']) ? sanitize_text_field(wp_unslash($_POST['subject'])) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

    if (empty($name) || empty($email) || empty($message)) {
        wp_safe_redirect(add_query_arg('contact_error', 'required', qeema_contact_redirect_url()));
        exit;
    }

    if (!is_email($email)) {
        wp_safe_redirect(add_query_arg('contact_error', 'email', qeema_contact_redirect_url()));
        exit;
    }

    // 1) الحفظ في الداشبورد
    $title = sprintf(
        /* translators: 1: sender name, 2: subject */
        __('رسالة من %1$s - %2$s', 'qeema-theme'),
        $name,
        $subject ? $subject : __('بدون موضوع', 'qeema-theme')
    );

    $post_id = wp_insert_post(array(
        'post_type'    => 'contact_submission',
        'post_title'   => $title,
        'post_content' => $message,
        'post_status'  => 'publish',
        'post_author'  => 1,
    ), true);

    if (is_wp_error($post_id)) {
        wp_safe_redirect(add_query_arg('contact_error', 'save', qeema_contact_redirect_url()));
        exit;
    }

    update_post_meta($post_id, '_contact_name', $name);
    update_post_meta($post_id, '_contact_email', $email);
    update_post_meta($post_id, '_contact_phone', $phone);
    update_post_meta($post_id, '_contact_subject', $subject);

    // 2) إرسال الإيميل إلى info@qeema-group.com
    $to      = QEEMA_CONTACT_EMAIL;
    $subj    = '[' . get_bloginfo('name') . '] ' . ($subject ? $subject : __('رسالة تواصل جديدة', 'qeema-theme'));
    $body    = "الاسم: $name\n";
    $body   .= "البريد: $email\n";
    $body   .= "الجوال: $phone\n";
    $body   .= "الموضوع: $subject\n\n";
    $body   .= "الرسالة:\n$message";
    $headers = array('Content-Type: text/plain; charset=UTF-8');

    wp_mail($to, $subj, $body, $headers);

    wp_safe_redirect(add_query_arg('contact_sent', '1', qeema_contact_redirect_url()));
    exit;
}

function qeema_contact_redirect_url()
{
    $ref = wp_get_referer();
    if ($ref) {
        return remove_query_arg(array('contact_sent', 'contact_error'), $ref);
    }
    return home_url('/contact');
}

add_action('admin_post_' . QEEMA_CONTACT_ACTION, 'qeema_handle_contact_submit');
add_action('admin_post_nopriv_' . QEEMA_CONTACT_ACTION, 'qeema_handle_contact_submit');
