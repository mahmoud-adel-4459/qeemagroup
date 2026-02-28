<?php
/**
 * One Click Demo Import - إعداد استيراد المحتوى التجريبي
 * يسجّل ملفات الاستيراد ويُنفّذ إعدادات ما بعد الاستيراد
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * تسجيل ملفات الاستيراد مع إضافة One Click Demo Import
 */
function visionary_ocdi_import_files()
{
    $theme_uri = get_template_directory_uri();
    $theme_dir = get_template_directory();

    return array(
        array(
            'import_file_name'             => 'Qeema Group - المحتوى التجريبي',
            'import_file_url'              => $theme_uri . '/ocdi/demo-content.xml',
            'import_widget_file_url'       => $theme_uri . '/ocdi/widgets.json',
            'import_preview_image_url'     => $theme_uri . '/assets/images/hero-bg.jpg',
            'import_notice'                => __('سيتم استيراد: الرئيسية، من نحن، تواصل معنا، عرض سعر، التوظيف، الموردين، شكراً، سياسة الخصوصية (كاملة من القالب)، الشروط، المدونة، الخدمات، المشاريع، والمقالات. بعد الاستيراد: من الإعدادات ← القراءة اختر "الصفحة الرئيسية" كصفحة رئيسية.', 'qeema-theme'),
            'preview_url'                  => home_url(),
        ),
    );
}

add_filter('ocdi/import_files', 'visionary_ocdi_import_files');

/**
 * تنفيذ إعدادات بعد انتهاء الاستيراد
 */
function visionary_ocdi_after_import($selected_import)
{
    // تعيين الصفحة الرئيسية
    $front_page = get_page_by_path('home');
    if (!$front_page) {
        $front_page = get_page_by_path('الرئيسية');
    }
    if (!$front_page) {
        $pages = get_posts(array('post_type' => 'page', 'numberposts' => 1, 'post_status' => 'publish'));
        $front_page = !empty($pages) ? $pages[0] : null;
    }
    if ($front_page) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page->ID);
    }

    // تعيين صفحة المدونة إن وُجدت
    $blog_page = get_page_by_path('blog');
    if (!$blog_page) {
        $blog_page = get_page_by_path('المدونة');
    }
    if ($blog_page) {
        update_option('page_for_posts', $blog_page->ID);
    }

    // إنشاء قائمة Primary إن لم تكن موجودة
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        if ($menu_id && !is_wp_error($menu_id)) {
            $locations = get_theme_mod('nav_menu_locations');
            if (!is_array($locations)) {
                $locations = array();
            }
            $locations['primary'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }

    // تعيين لوجو الثيم الافتراضي (من assets) كلوجو للموقع بعد الاستيراد
    visionary_ocdi_set_default_logo();

    // استيراد صور الهيرو والخدمات والمشاريع من assets/images إلى الوسائط
    visionary_ocdi_import_assets_images();

    // التأكد من وجود صفحة الشكر (بعد طلب عرض السعر) لتجنب 404
    if (function_exists('qeema_ensure_thank_you_page')) {
        qeema_ensure_thank_you_page();
    }

    // مزامنة محتوى خدمات MEP والمساحة مع الداتا المعتمدة في القوالب
    visionary_ocdi_sync_services_content();
}

/**
 * بعد الاستيراد: تحديث عنوان ومحتوى ووصف خدمتي MEP والمساحة ليطابق الداتا في القوالب.
 * محتوى خدمة المساحة الكامل (خمسة أقسام + 6 خدمات فرعية تحت "المساحة المتقدمة والجيوماتكس") موجود في: template-parts/service-survey.php
 */
function visionary_ocdi_sync_services_content()
{
    $mep = get_page_by_path('mep', OBJECT, 'service');
    if (!$mep) {
        $posts = get_posts(array('post_type' => 'service', 'numberposts' => 20, 'post_status' => 'any'));
        foreach ($posts as $p) {
            if ($p->post_name === 'mep' || strpos($p->post_name, 'mep') !== false || mb_strpos($p->post_title, 'MEP') !== false || mb_strpos($p->post_title, 'إليكتروميكانيكال') !== false) {
                $mep = $p;
                break;
            }
        }
    }
    if ($mep) {
        wp_update_post(array(
            'ID'           => $mep->ID,
            'post_title'   => 'إليكتروميكانيكال (MEP)',
            'post_name'    => 'mep',
            'post_content' => '<p>MEP هو "الجهاز العصبي" للمبنى. نُصمِّم وننسِّق الأنظمة الميكانيكية والكهربائية والصحية من اليوم الأول، ونستخدم BIM والتنسيق الرقمي لنمنع التعارضات ونخفض تكاليف التشغيل ونضمن تجربة مريحة وآمنة للمستخدمين.</p>',
            'post_excerpt' => 'ذكاء مبناك… راحة وأمان وكفاءة تُقاس. تصميم MEP متكامل مع BIM وكشف تعارضات.',
        ));
        if (function_exists('update_field')) {
            update_field('headline', 'ذكاء مبناك… راحة وأمان وكفاءة تُقاس', $mep->ID);
            update_field('short_description', 'MEP هو "الجهاز العصبي" للمبنى. نُصمِّم وننسِّق الأنظمة الميكانيكية والكهربائية والصحية من اليوم الأول، ونستخدم BIM والتنسيق الرقمي لنمنع التعارضات ونخفض تكاليف التشغيل ونضمن تجربة مريحة وآمنة للمستخدمين.', $mep->ID);
        }
    }

    $survey = get_page_by_path('surveying', OBJECT, 'service');
    if (!$survey) {
        $survey = get_page_by_path('مساحة', OBJECT, 'service');
    }
    if (!$survey) {
        $posts = get_posts(array('post_type' => 'service', 'numberposts' => 20, 'post_status' => 'any'));
        foreach ($posts as $p) {
            if ($p->post_name === 'surveying' || $p->post_name === 'مساحة' || mb_strpos($p->post_title, 'المساحة') !== false || mb_strpos($p->post_title, 'مساحة') !== false) {
                $survey = $p;
                break;
            }
        }
    }
    if ($survey) {
        wp_update_post(array(
            'ID'           => $survey->ID,
            'post_title'   => 'هندسة المساحة',
            'post_name'    => 'surveying',
            'post_content' => '<p>المساحة ليست "خدمة مساندة"؛ هي أساس نجاح التصميم والتنفيذ والتراخيص. بيانات مساحية غير دقيقة كانت وراء 14% من إعادة العمل التي كان يمكن تجنّبها عالميًا (بتكلفة تقديرية 1.8 تريليون دولار في 2020). نحن نمنحك اليقين منذ اليوم الأول عبر فريق معتمد وتقنيات GNSS/LiDAR/Drone وعمليات ضبط جودة صارمة.</p>',
            'post_excerpt' => 'الدقة التي يُبنى عليها كل قرار. رفع طبوغرافي، توقيع محاور، As-Built، GIS.',
        ));
        if (function_exists('update_field')) {
            update_field('headline', 'الدقة التي يُبنى عليها كل قرار', $survey->ID);
            update_field('short_description', 'المساحة ليست "خدمة مساندة"؛ هي أساس نجاح التصميم والتنفيذ والتراخيص. نمنحك اليقين منذ اليوم الأول عبر فريق معتمد وتقنيات GNSS/LiDAR/Drone وعمليات ضبط جودة صارمة.', $survey->ID);
        }
    }
}

/**
 * قائمة صور assets المستخدمة في الهيرو والخدمات والمشاريع (نفس القائمة في functions.php)
 * صور خدمة المساحة: الأقسام الخمسة + الخدمات الفرعية تحت "المساحة المتقدمة والجيوماتكس" (القالب: template-parts/service-survey.php)
 */
function visionary_ocdi_assets_images_list()
{
    return array(
        'themeimg.png', // لوجو الثيم الافتراضي من assets
        'hero-bg.jpg',
        'project-1.jpg',
        'project-2.jpg',
        'service-architectural.jpg',
        'service-interior.jpg',
        'service-mep.jpg',
        'service-surveying.jpg',
        'drawing-construction-worker-front-building-construction_992397-12970 (1).jpg',
        // صور أقسام خدمة المساحة (إن وُجدت في assets/images)
        'geodetic-control-networks.png',
        'topographic-surveying.png',
        'grid-leveling-earthwork.png',
        'detailed-cadastral-surveying.png',
        'roads-infrastructure.png',
        // صور الخدمات الفرعية تحت القسم الثاني (المساحة المتقدمة والجيوماتكس)
        '3d-laser-scanning.png',
        'gis-services.png',
        'remote-sensing.png',
        'geoid-crp.png',
        'drone-surveying.png',
        'hydrographic-surveying.png',
    );
}

/**
 * استيراد صور مجلد assets/images إلى مكتبة الوسائط بعد استيراد الديمو
 * تُستخدم في الهيرو والخدمات والمشاريع؛ ويمكن تعيين صورة الهيرو في Theme Settings
 */
function visionary_ocdi_import_assets_images()
{
    $theme_dir = get_template_directory();
    $assets_dir = $theme_dir . '/assets/images/';
    $list = visionary_ocdi_assets_images_list();

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $imported = array();

    foreach ($list as $filename) {
        $path = $assets_dir . $filename;
        if (!file_exists($path) || !is_readable($path)) {
            continue;
        }
        $tmp = wp_tempnam('qeema-asset-');
        if (!copy($path, $tmp)) {
            @unlink($tmp);
            continue;
        }
        $mime = wp_check_filetype($filename, null);
        $file = array(
            'name'     => $filename,
            'type'     => $mime['type'] ?: 'image/jpeg',
            'tmp_name' => $tmp,
            'error'    => 0,
            'size'     => filesize($tmp),
        );
        $upload = wp_handle_sideload($file, array('test_form' => false), null);
        @unlink($tmp);
        if (empty($upload['error']) && isset($upload['file'])) {
            $title = pathinfo($filename, PATHINFO_FILENAME);
            $attachment = array(
                'post_mime_type' => $upload['type'],
                'post_title'     => sanitize_file_name($title),
                'post_content'   => '',
                'post_status'    => 'inherit',
            );
            $attach_id = wp_insert_attachment($attachment, $upload['file']);
            if (!is_wp_error($attach_id)) {
                wp_generate_attachment_metadata($attach_id, $upload['file']);
                $imported[$filename] = $attach_id;
            }
        }
    }

    // تعيين صورة خلفية الهيرو في Theme Settings (ACF) إن وُجدت
    if (function_exists('update_field') && isset($imported['hero-bg.jpg'])) {
        update_field('hero_bg_image', $imported['hero-bg.jpg'], 'option');
    }
}

/**
 * رفع لوجو الثيم الافتراضي إلى الوسائط وتعيينه كلوجو للموقع
 */
function visionary_ocdi_set_default_logo()
{
    if (get_theme_mod('custom_logo')) {
        return; // يوجد لوجو مخصص مسبقاً
    }
    $theme_dir = get_template_directory();
    $theme_img = $theme_dir . '/assets/images/themeimg.png';
    $fallback  = $theme_dir . '/assets/images/Asset-1@4xz (1).png';
    $logo_path = file_exists($theme_img) ? $theme_img : $fallback;
    if (!file_exists($logo_path)) {
        return;
    }
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';
    $tmp = wp_tempnam('qeema-logo');
    if (!copy($logo_path, $tmp)) {
        @unlink($tmp);
        return;
    }
    $file = array(
        'name'     => 'qeema-group-logo.png',
        'type'     => 'image/png',
        'tmp_name' => $tmp,
        'error'    => 0,
        'size'     => filesize($tmp),
    );
    $upload = wp_handle_sideload($file, array('test_form' => false), null);
    @unlink($tmp);
    if (!empty($upload['error'])) {
        return;
    }
    $attachment = array(
        'post_mime_type' => $upload['type'],
        'post_title'     => 'Qeema Group Logo',
        'post_content'   => '',
        'post_status'    => 'inherit',
    );
    $attach_id = wp_insert_attachment($attachment, $upload['file']);
    if (is_wp_error($attach_id)) {
        return;
    }
    wp_generate_attachment_metadata($attach_id, $upload['file']);
    set_theme_mod('custom_logo', $attach_id);
}

add_action('ocdi/after_import', 'visionary_ocdi_after_import');

/**
 * عدد المحتوى المستورد في كل دفعة (لتقليل حدوث timeout)
 */
function visionary_ocdi_confirmation_message($default_message)
{
    return $default_message . ' ' . __('سيتم استيراد الصفحات والمحتوى التجريبي. قد يستغرق ذلك دقيقة.', 'qeema-theme');
}

add_filter('ocdi/confirmation_message', 'visionary_ocdi_confirmation_message');
