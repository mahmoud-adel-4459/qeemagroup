<?php
/**
 * Qeema Group Theme Functions
 */

defined('ABSPATH') || exit;

// Required plugins notice & One Click Demo Import config
require_once get_template_directory() . '/inc/required-plugins.php';
require_once get_template_directory() . '/inc/nav-walker.php';
require_once get_template_directory() . '/inc/ocdi-import.php';
require_once get_template_directory() . '/inc/theme-seo.php';
require_once get_template_directory() . '/inc/theme-security.php';
require_once get_template_directory() . '/inc/contact-form.php';
require_once get_template_directory() . '/inc/quotation-form.php';
require_once get_template_directory() . '/inc/vendor-form.php';
require_once get_template_directory() . '/inc/careers-form.php';

// 0. Theme Setup
function visionary_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menus(array(
        'primary' => __('القائمة الرئيسية', 'qeema-theme'),
        'footer'  => __('قائمة التذييل', 'qeema-theme'),
    ));
}
add_action('after_setup_theme', 'visionary_theme_setup');

/**
 * إرجاع submenu الخدمات تلقائياً: حقن روابط الخدمات كأبناء لعنصر "خدماتنا" إن لم تكن موجودة
 */
function visionary_nav_menu_add_services_children($items, $menu, $args)
{
    if (empty($items) || !is_array($items)) {
        return $items;
    }
    $archive_url = get_post_type_archive_link('service');
    if (!$archive_url) {
        return $items;
    }
    $archive_url = trailingslashit($archive_url);
    $parent_id   = 0;
    foreach ($items as $item) {
        $item_url = trailingslashit($item->url);
        if ($item->menu_item_parent == 0 && ($item_url === $archive_url || $item_url === trailingslashit(home_url('/#services')) || strpos($item->title, 'خدمات') !== false)) {
            $parent_id = (int) $item->ID;
            break;
        }
    }
    if ($parent_id === 0) {
        return $items;
    }
    $has_children = false;
    foreach ($items as $item) {
        if ((int) $item->menu_item_parent === $parent_id) {
            $has_children = true;
            break;
        }
    }
    if ($has_children) {
        return $items;
    }
    $services = get_posts(array(
        'post_type'      => 'service',
        'posts_per_page' => 20,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order title',
        'order'          => 'ASC',
    ));
    if (empty($services)) {
        return $items;
    }
    $parent_order = 0;
    foreach ($items as $item) {
        if ((int) $item->ID === $parent_id) {
            $parent_order = isset($item->menu_order) ? (int) $item->menu_order : 0;
            $item->classes = array_merge((array) $item->classes, array('menu-item-has-children'));
            break;
        }
    }
    $base_id = 900000;
    $new_items = array();
    foreach ($services as $i => $s) {
        $obj = new stdClass();
        $obj->ID               = $base_id + $i + 1;
        $obj->db_id            = $obj->ID;
        $obj->menu_item_parent = $parent_id;
        $obj->menu_order       = $parent_order + 1 + $i;
        $obj->object_id        = $s->ID;
        $obj->object           = 'service';
        $obj->type             = 'post_type';
        $obj->type_label       = __('خدمة', 'qeema-theme');
        $obj->title            = $s->post_title;
        $obj->url              = get_permalink($s);
        $obj->target           = '';
        $obj->attr_title       = '';
        $obj->description      = '';
        $obj->classes          = array('menu-item', 'menu-item-type-post_type', 'menu-item-object-service');
        $obj->xfn              = '';
        $new_items[] = $obj;
    }
    $items = array_merge($items, $new_items);
    usort($items, function ($a, $b) {
        $a_order = isset($a->menu_order) ? (int) $a->menu_order : 0;
        $b_order = isset($b->menu_order) ? (int) $b->menu_order : 0;
        if ($a_order !== $b_order) {
            return $a_order - $b_order;
        }
        return 0;
    });
    return $items;
}
add_filter('wp_get_nav_menu_items', 'visionary_nav_menu_add_services_children', 10, 3);

// 1. Enqueue Scripts and Styles
function visionary_enqueue_scripts()
{
    // Tailwind CDN for immediate utility support
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), '3.4', false);

    $theme_version = wp_get_theme()->get('Version') ?: '1.0.0';
    wp_enqueue_style('visionary-style', get_stylesheet_uri(), array(), $theme_version);

    // Theme JS
    wp_enqueue_script('visionary-main-js', get_theme_file_uri('/assets/js/main.js'), array(), $theme_version, true);
}
add_action('wp_enqueue_scripts', 'visionary_enqueue_scripts');

/**
 * إرجاع رابط صورة المشروع: الصورة المميزة أو صورة احتياطية من assets
 * @param int|null $post_id معرف المشروع
 * @param int $index ترتيب المشروع في اللوب (للتناوب بين الصور الاحتياطية)
 * @param string $size حجم الصورة المطلوب (medium_large, full)
 */
function visionary_get_project_image_url($post_id = null, $index = 0, $size = 'medium_large')
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    if ($post_id && has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail_url($post_id, $size);
    }
    $assets = array(
        'project-1.jpg',
        'project-2.jpg',
        'service-architectural.jpg',
        'service-interior.jpg',
        'service-mep.jpg',
        'service-surveying.jpg',
        'drawing-construction-worker-front-building-construction_992397-12970 (1).jpg',
        'hero-bg.jpg',
    );
    $i = absint($index) % count($assets);
    return get_theme_file_uri('assets/images/' . $assets[$i]);
}

/**
 * لوجو الثيم الافتراضي من assets/images (themeimg.png أو الاحتياطي)
 * ضع صورة اللوجو في: assets/images/themeimg.png
 * @return string رابط صورة اللوجو
 */
function visionary_get_theme_logo_url()
{
    $theme_img = 'themeimg.png';
    $fallback  = 'Asset-1@4xz (1).png';
    if (file_exists(get_theme_file_path('assets/images/' . $theme_img))) {
        return get_theme_file_uri('assets/images/' . $theme_img);
    }
    return get_theme_file_uri('assets/images/' . $fallback);
}

/**
 * صور الهيرو من مجلد assets/images لاستخدامها في أي صفحة
 * @param string $context سياق الصفحة (contact, quotation, about, thank-you, privacy, terms, search, services, projects, default)
 * @return string رابط الصورة
 */
function visionary_get_hero_image_url($context = 'default')
{
    $base = get_theme_file_uri('assets/images/');
    $by_context = array(
        'contact'   => 'hero-bg.jpg',
        'quotation' => 'service-architectural.jpg',
        'about'     => 'project-1.jpg',
        'thank-you' => 'service-interior.jpg',
        'privacy'    => 'hero-bg.jpg',
        'terms'     => 'hero-bg.jpg',
        'search'    => 'service-mep.jpg',
        'services'  => 'service-surveying.jpg',
        'projects'  => 'project-2.jpg',
        'default'   => 'hero-bg.jpg',
    );
    $file = isset($by_context[$context]) ? $by_context[$context] : $by_context['default'];
    return $base . $file;
}

/**
 * صورة الخدمة من assets حسب نوع الخدمة (لكل خدمة تظهر وكأننا نعمل عليها فقط)
 * الصور الافتراضية: assets/images (مصادر مجانية مثل Pexels)
 * @param int|null $post_id معرف منشور الخدمة
 * @return string رابط الصورة
 */
function visionary_get_service_asset_image($post_id = null)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    if ($post_id && has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail_url($post_id, 'full');
    }
    $base = get_theme_file_uri('assets/images/');
    $slug = $post_id ? get_post_field('post_name', $post_id) : '';
    $title = $post_id ? get_the_title($post_id) : '';
    $map = array(
        'interior'       => 'service-interior.jpg',
        'داخلي'          => 'service-interior.jpg',
        'architectural'  => 'service-architectural.jpg',
        'معماري'         => 'service-architectural.jpg',
        'إنشائي'         => 'service-architectural.jpg',
        'mep'            => 'service-mep.jpg',
        'ميكانيكال'      => 'service-mep.jpg',
        'إليكترو'        => 'service-mep.jpg',
        'surveying'      => 'service-surveying.jpg',
        'مساحة'          => 'service-surveying.jpg',
        'رفع مساحي'      => 'service-surveying.jpg',
        'إشراف'          => 'service-architectural.jpg',
        'supervision'    => 'service-architectural.jpg',
        'consultation'   => 'service-architectural.jpg',
        'استشارات'       => 'service-architectural.jpg',
    );
    foreach ($map as $key => $file) {
        if ($slug && stripos($slug, $key) !== false) {
            return $base . $file;
        }
        if ($title && (stripos($title, $key) !== false || mb_strpos($title, $key) !== false)) {
            return $base . $file;
        }
    }
    return $base . 'service-architectural.jpg';
}

// 2. Register Custom Post Types
function visionary_register_cpt()
{
    // Projects
    register_post_type('project', array(
        'labels' => array(
            'name' => __('مشاريع', 'qeema-theme'),
            'singular_name' => __('مشروع', 'qeema-theme'),
            'add_new_item' => __('إضافة مشروع جديد', 'qeema-theme'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-building',
        'show_in_rest' => true,
    ));

    // Services
    register_post_type('service', array(
        'labels' => array(
            'name' => __('خدمات', 'qeema-theme'),
            'singular_name' => __('خدمة', 'qeema-theme'),
            'add_new_item' => __('إضافة خدمة جديدة', 'qeema-theme'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-hammer',
        'show_in_rest' => true,
    ));

    // Testimonials
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('الشهادات', 'qeema-theme'),
            'singular_name' => __('شهادة', 'qeema-theme'),
            'add_new_item' => __('إضافة شهادة جديدة', 'qeema-theme'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-format-quote',
        'show_in_rest' => true,
    ));
}
add_action('init', 'visionary_register_cpt');

// 3. Register ACF Fields (Programmatically)
if (function_exists('acf_add_local_field_group')):

    require_once get_template_directory() . '/inc/acf-page-fields.php';
    require_once get_template_directory() . '/inc/acf-survey-service-fields.php';

    // Project Details
    acf_add_local_field_group(array(
        'key' => 'group_project_details',
        'title' => __('تفاصيل المشروع', 'qeema-theme'),
        'fields' => array(
            array(
                'key' => 'field_project_location',
                'label' => __('الموقع', 'qeema-theme'),
                'name' => 'location',
                'type' => 'text',
            ),
            array(
                'key' => 'field_project_category',
                'label' => __('التصنيف', 'qeema-theme'),
                'name' => 'category',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                ),
            ),
        ),
    ));

    // Service Details
    acf_add_local_field_group(array(
        'key' => 'group_service_details',
        'title' => __('تفاصيل الخدمة', 'qeema-theme'),
        'fields' => array(
            array(
                'key' => 'field_service_headline',
                'label' => __('عنوان البانر', 'qeema-theme'),
                'name' => 'headline',
                'type' => 'text',
                'instructions' => __('مثال: بناء رؤيتك من الصفر', 'qeema-theme'),
            ),
            array(
                'key' => 'field_service_icon',
                'label' => __('اسم الأيقونة (Lucide)', 'qeema-theme'),
                'name' => 'icon_name',
                'type' => 'text',
                'instructions' => __('مثال: Palette, Building2, Zap', 'qeema-theme'),
            ),
            array(
                'key' => 'field_service_description',
                'label' => __('وصف مختصر', 'qeema-theme'),
                'name' => 'short_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_service_hero_image',
                'label' => __('صورة الهيرو (اختياري)', 'qeema-theme'),
                'name' => 'hero_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'instructions' => __('إن ترك فارغاً تُستخدم الصورة المميزة للخدمة.', 'qeema-theme'),
            ),
            array(
                'key' => 'field_service_section_image_1',
                'label' => __('صورة القسم الأول (لماذا تختارنا)', 'qeema-theme'),
                'name' => 'section_image_1',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'instructions' => __('تظهر بجانب نص "لماذا تختار هذه الخدمة".', 'qeema-theme'),
            ),
            array(
                'key' => 'field_service_section_image_2',
                'label' => __('صورة القسم الثاني (منهجية العمل)', 'qeema-theme'),
                'name' => 'section_image_2',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_service_section_image_3',
                'label' => __('صورة إضافية (قسم المحتوى)', 'qeema-theme'),
                'name' => 'section_image_3',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_service_stats',
                'label' => __('إحصائيات الخدمة', 'qeema-theme'),
                'name' => 'service_stats',
                'type' => 'repeater',
                'sub_fields' => array(
                    array('key' => 'field_serv_stat_val', 'label' => __('القيمة', 'qeema-theme'), 'name' => 'value', 'type' => 'text'),
                    array('key' => 'field_serv_stat_lbl', 'label' => __('التسمية', 'qeema-theme'), 'name' => 'label', 'type' => 'text'),
                ),
            ),
            array(
                'key' => 'field_service_benefits',
                'label' => __('المزايا', 'qeema-theme'),
                'name' => 'service_benefits',
                'type' => 'repeater',
                'sub_fields' => array(
                    array('key' => 'field_serv_ben_text', 'label' => __('الميزة', 'qeema-theme'), 'name' => 'text', 'type' => 'text'),
                ),
            ),
            array(
                'key' => 'field_service_process',
                'label' => __('مراحل العمل', 'qeema-theme'),
                'name' => 'service_process',
                'type' => 'repeater',
                'sub_fields' => array(
                    array('key' => 'field_serv_proc_title', 'label' => __('العنوان', 'qeema-theme'), 'name' => 'title', 'type' => 'text'),
                    array('key' => 'field_serv_proc_desc', 'label' => __('الوصف', 'qeema-theme'), 'name' => 'description', 'type' => 'textarea'),
                ),
            ),
            array(
                'key' => 'field_service_tools',
                'label' => __('الأدوات المستخدمة', 'qeema-theme'),
                'name' => 'service_tools',
                'type' => 'repeater',
                'sub_fields' => array(
                    array('key' => 'field_serv_tool_name', 'label' => __('الاسم', 'qeema-theme'), 'name' => 'name', 'type' => 'text'),
                    array('key' => 'field_serv_tool_icon', 'label' => __('الأيقونة', 'qeema-theme'), 'name' => 'icon', 'type' => 'text'),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
        ),
    ));

    // Testimonial Details
    acf_add_local_field_group(array(
        'key' => 'group_testimonial_details',
        'title' => __('معلومات العميل', 'qeema-theme'),
        'fields' => array(
            array(
                'key' => 'field_client_role',
                'label' => __('المسمى / الموقع', 'qeema-theme'),
                'name' => 'client_role',
                'type' => 'text',
            ),
            array(
                'key' => 'field_client_company',
                'label' => __('الشركة', 'qeema-theme'),
                'name' => 'client_company',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'testimonial',
                ),
            ),
        ),
    ));

    // Theme Settings (Options Page) - Requires ACF
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => __('Theme Settings', 'qeema-theme'),
            'menu_title' => __('Theme Settings', 'qeema-theme'),
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect'   => false,
        ));
    }

    // Header Settings - لوجو الهيدر ونصوص الأزرار والروابط
    acf_add_local_field_group(array(
        'key' => 'group_header_settings',
        'title' => __('Header Settings', 'qeema-theme'),
        'fields' => array(
            array(
                'key' => 'field_header_logo_tab',
                'label' => __('Logo - اللوجو', 'qeema-theme'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_header_logo_width',
                'label' => __('Logo Width (px)', 'qeema-theme'),
                'name' => 'header_logo_width',
                'type' => 'number',
                'instructions' => __('عرض اللوجو في الهيدر بالبكسل. اتركه فارغاً للعرض التلقائي.', 'qeema-theme'),
                'min' => 40,
                'max' => 600,
                'step' => 5,
                'placeholder' => 240,
            ),
            array(
                'key' => 'field_header_logo_height',
                'label' => __('Logo Height (px)', 'qeema-theme'),
                'name' => 'header_logo_height',
                'type' => 'number',
                'instructions' => __('ارتفاع اللوجو في الهيدر بالبكسل. اتركه فارغاً للارتفاع التلقائي.', 'qeema-theme'),
                'min' => 20,
                'max' => 200,
                'step' => 5,
                'placeholder' => 80,
            ),
            array(
                'key' => 'field_header_buttons_tab',
                'label' => __('Header Buttons - أزرار الهيدر', 'qeema-theme'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_header_call_text',
                'label' => __('Call Us - نص "اتصل بنا"', 'qeema-theme'),
                'name' => 'header_call_text',
                'type' => 'text',
                'default_value' => 'اتصل بنا',
            ),
            array(
                'key' => 'field_header_call_url',
                'label' => __('Call Us Link', 'qeema-theme'),
                'name' => 'header_call_url',
                'type' => 'text',
                'instructions' => __('رابط اتصل بنا (مثال: tel:+201009148383 أو رابط واتساب)', 'qeema-theme'),
                'default_value' => 'tel:+201009148383',
            ),
            array(
                'key' => 'field_header_cta_text',
                'label' => __('CTA Button Text - نص زرار "اطلب عرض سعر"', 'qeema-theme'),
                'name' => 'header_cta_text',
                'type' => 'text',
                'default_value' => 'اطلب عرض سعر',
            ),
            array(
                'key' => 'field_header_cta_url',
                'label' => __('CTA Button Link', 'qeema-theme'),
                'name' => 'header_cta_url',
                'type' => 'url',
                'instructions' => __('رابط زرار الهيدر الرئيسي. اتركه فارغاً لاستخدام صفحة "عرض السعر".', 'qeema-theme'),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
    ));

    acf_add_local_field_group(array(
        'key' => 'group_home_settings',
        'title' => __('إعدادات الصفحة الرئيسية', 'qeema-theme'),
        'fields' => array(
            array(
                'key' => 'field_hero_tab',
                'label' => __('قسم البانر', 'qeema-theme'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_hero_title',
                'label' => __('عنوان البانر', 'qeema-theme'),
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'حلول هندسية متكاملة',
            ),
            array(
                'key' => 'field_hero_subtitle',
                'label' => __('نص فرعي للبانر', 'qeema-theme'),
                'name' => 'hero_subtitle',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_hero_bg_image',
                'label' => __('صورة خلفية البانر', 'qeema-theme'),
                'name' => 'hero_bg_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_hero_tag',
                'label' => __('وسم البانر', 'qeema-theme'),
                'name' => 'hero_tag',
                'type' => 'text',
                'default_value' => 'نبتكر لغدٍ أفضل',
            ),
            array(
                'key' => 'field_hero_heading_1',
                'label' => __('سطر العنوان 1', 'qeema-theme'),
                'name' => 'hero_heading_1',
                'type' => 'text',
                'default_value' => 'نحوّل الرؤى إلى',
            ),
            array(
                'key' => 'field_hero_heading_2',
                'label' => __('سطر العنوان 2 (البارز)', 'qeema-theme'),
                'name' => 'hero_heading_2',
                'type' => 'text',
                'default_value' => 'واقع ملموس',
            ),
            array(
                'key' => 'field_hero_heading_3',
                'label' => __('سطر العنوان 3', 'qeema-theme'),
                'name' => 'hero_heading_3',
                'type' => 'text',
                'default_value' => 'هندسة متكاملة.. دقة لا متناهية',
            ),
            array(
                'key' => 'field_hero_description',
                'label' => __('وصف البانر', 'qeema-theme'),
                'name' => 'hero_description',
                'type' => 'textarea',
                'default_value' => 'شريكك الهندسي الموثوق لتصميم وإدارة مشاريعك باحترافية. ندمج الإبداع المعماري مع الدقة الإنشائية لضمان نتائج تتجاوز التوقعات.',
            ),
            array(
                'key' => 'field_cta_primary_text',
                'label' => __('نص زر CTA الرئيسي', 'qeema-theme'),
                'name' => 'cta_primary_text',
                'type' => 'text',
                'default_value' => 'ابدأ مشروعك',
            ),
            array(
                'key' => 'field_cta_secondary_text',
                'label' => __('نص زر CTA الثانوي', 'qeema-theme'),
                'name' => 'cta_secondary_text',
                'type' => 'text',
                'default_value' => 'أعمالنا',
            ),
            array(
                'key' => 'field_trust_label',
                'label' => __('نص الثقة (تحت الأزرار)', 'qeema-theme'),
                'name' => 'trust_label',
                'type' => 'text',
                'default_value' => 'عميل يثق بنا',
            ),
            array(
                'key' => 'field_experience_value',
                'label' => __('قيمة الخبرة (رقم)', 'qeema-theme'),
                'name' => 'experience_value',
                'type' => 'text',
                'default_value' => '15+',
            ),
            array(
                'key' => 'field_experience_label',
                'label' => __('نص الخبرة', 'qeema-theme'),
                'name' => 'experience_label',
                'type' => 'text',
                'default_value' => 'عاماً من الخبرة',
            ),
            array(
                'key' => 'field_stats_tab',
                'label' => __('الإحصائيات', 'qeema-theme'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_stats_repeater',
                'label' => __('الإحصائيات', 'qeema-theme'),
                'name' => 'home_stats',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_stat_value',
                        'label' => __('القيمة', 'qeema-theme'),
                        'name' => 'value',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_stat_suffix',
                        'label' => __('اللاحقة', 'qeema-theme'),
                        'name' => 'suffix',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_stat_label',
                        'label' => __('التسمية', 'qeema-theme'),
                        'name' => 'label',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
    ));

endif;

// Support Elementor
function visionary_add_elementor_support()
{
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'visionary_add_elementor_support');
