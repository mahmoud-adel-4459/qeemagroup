<?php
/**
 * تحسين محركات البحث (SEO) للثيم
 * Meta description, Open Graph, Twitter Cards, Schema.org JSON-LD, Canonical
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * إخراج جميع وسوم SEO في <head>
 */
function visionary_seo_head()
{
    // لا نضيف وسوم إذا كان إضافة SEO (مثل Yoast) نشطة لتجنب التكرار
    if (defined('WPSEO_VERSION') || function_exists('rank_math')) {
        return;
    }

    $url = visionary_seo_current_url();
    $title = visionary_seo_title();
    $description = visionary_seo_description();
    $image = visionary_seo_image();
    $type = is_singular() ? 'article' : 'website';
    $locale = get_locale();
    $locale_og = str_replace('_', '-', $locale);

    // Meta Description
    if ($description) {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }

    // Canonical
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";

    // Open Graph
    echo '<meta property="og:type" content="' . esc_attr($type) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:locale" content="' . esc_attr($locale_og) . '">' . "\n";
    if ($description) {
        echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    }
    if ($image) {
        echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    }
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    if (is_singular() && get_post_type() === 'post') {
        echo '<meta property="article:published_time" content="' . esc_attr(get_the_date('c')) . '">' . "\n";
        echo '<meta property="article:modified_time" content="' . esc_attr(get_the_modified_date('c')) . '">' . "\n";
    }

    // Twitter Card
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    if ($description) {
        echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    }
    if ($image) {
        echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
    }

    // JSON-LD Structured Data
    visionary_seo_json_ld($title, $description, $url, $image, $type);
}

add_action('wp_head', 'visionary_seo_head', 1);

/**
 * عنوان الصفحة لـ SEO
 */
function visionary_seo_title()
{
    if (is_front_page()) {
        $title = get_bloginfo('name');
        $desc = get_bloginfo('description');
        return $desc ? $title . ' | ' . $desc : $title;
    }
    if (is_singular()) {
        if (get_post_type() === 'service') {
            $title_lower = mb_strtolower(get_the_title());
            $slug = get_post_field('post_name', get_queried_object_id());
            if (strpos($slug, 'interior') !== false || strpos($title_lower, 'التصميم الداخلي') !== false || strpos($title_lower, 'داخلي') !== false) {
                return __('التصميم الداخلي والتشطيبات | قيمة جروب – تصميم عملي يُسلّم في الموعد', 'qeema-theme');
            }
            if (strpos($slug, 'architectural') !== false || strpos($title_lower, 'معماري') !== false || strpos($title_lower, 'إنشائي') !== false || strpos($title_lower, 'إشراف') !== false) {
                return __('التصميم المعماري والإنشائي والإشراف | قيمة جروب – رؤية ملهمة تنفيذ محكم', 'qeema-theme');
            }
            if (strpos($slug, 'mep') !== false || strpos($title_lower, 'mep') !== false || strpos($title_lower, 'إليكتروميكانيكال') !== false || strpos($title_lower, 'ميكانيكال') !== false || strpos($title_lower, 'إليكترو') !== false) {
                return __('إليكتروميكانيكال MEP | قيمة جروب – ذكاء مبناك راحة وأمان وكفاءة', 'qeema-theme');
            }
            if (strpos($slug, 'survey') !== false || strpos($slug, 'مساحة') !== false || strpos($title_lower, 'هندسة المساحة') !== false || strpos($title_lower, 'المساحة') !== false || strpos($title_lower, 'رفع مساحي') !== false || strpos($title_lower, 'طبوغرافي') !== false) {
                return __('هندسة المساحة والرفع المساحي | قيمة جروب – دقة تُقلّل الهدر وتمنع النزاعات', 'qeema-theme');
            }
        }
        if (get_post_type() === 'page' && is_singular('page')) {
            $template = get_page_template_slug(get_queried_object_id());
            if ($template === 'page-careers.php') {
                return __('وظائف الهندسة والإنشاء | قيمة جروب', 'qeema-theme');
            }
            if ($template === 'page-vendors.php') {
                return __('تسجيل مورّد / مقاول باطن | قيمة جروب', 'qeema-theme');
            }
        }
        return get_the_title() . ' | ' . get_bloginfo('name');
    }
    if (is_post_type_archive('project')) {
        return __('مشاريعنا', 'qeema-theme') . ' | ' . get_bloginfo('name');
    }
    if (is_post_type_archive('service')) {
        return __('خدماتنا', 'qeema-theme') . ' | ' . get_bloginfo('name');
    }
    if (is_home()) {
        return __('المدونة', 'qeema-theme') . ' | ' . get_bloginfo('name');
    }
    if (is_archive()) {
        return get_the_archive_title() . ' | ' . get_bloginfo('name');
    }
    if (is_search()) {
        return sprintf(__('نتائج البحث: %s', 'qeema-theme'), get_search_query()) . ' | ' . get_bloginfo('name');
    }
    if (is_404()) {
        return __('الصفحة غير موجودة', 'qeema-theme') . ' | ' . get_bloginfo('name');
    }
    return wp_get_document_title();
}

/**
 * وصف ميتا (اختصار المحتوى)
 */
function visionary_seo_description()
{
    $length = 160;
    if (is_front_page()) {
        $desc = get_bloginfo('description');
        if ($desc) {
            return wp_strip_all_tags($desc);
        }
        return __('رؤية الهندسة - حلول هندسية متكاملة: تصميم معماري، MEP، مساحة، وتصميم داخلي. نضيف قيمة جديدة لمشاريعك.', 'qeema-theme');
    }
    if (is_singular()) {
        if (get_post_type() === 'service') {
            $title_lower = mb_strtolower(get_the_title());
            $slug = get_post_field('post_name', get_queried_object_id());
            if (strpos($slug, 'interior') !== false || strpos($title_lower, 'التصميم الداخلي') !== false || strpos($title_lower, 'داخلي') !== false) {
                return __('تصميم داخلي 3D، مواصفات وBoQ، إدارة تشطيبات، توريد وإشراف جودة، تسليم ضمن الميزانية والوقت. احسب ميزانيتك واحجز استشارة الآن.', 'qeema-theme');
            }
            if (strpos($slug, 'architectural') !== false || strpos($title_lower, 'معماري') !== false || strpos($title_lower, 'إنشائي') !== false || strpos($title_lower, 'إشراف') !== false) {
                return __('تصميم معماري وإنشائي، إشراف هندسي، BIM/CDE، تراخيص وموافقات، تسليم في الموعد وضمن الميزانية. احجز استشارة أو اطلب عرض سعر.', 'qeema-theme');
            }
            if (strpos($slug, 'mep') !== false || strpos($title_lower, 'mep') !== false || strpos($title_lower, 'إليكتروميكانيكال') !== false || strpos($title_lower, 'ميكانيكال') !== false || strpos($title_lower, 'إليكترو') !== false) {
                return __('تصميم MEP: HVAC، كهرباء، سباكة، BIM وكشف تعارضات، BOQ. خفض تكاليف التشغيل وتجنب إعادة العمل. احجز استشارة أو اطلب عرض سعر لأنظمة MEP.', 'qeema-theme');
            }
            if (strpos($slug, 'survey') !== false || strpos($slug, 'مساحة') !== false || strpos($title_lower, 'هندسة المساحة') !== false || strpos($title_lower, 'المساحة') !== false || strpos($title_lower, 'رفع مساحي') !== false || strpos($title_lower, 'طبوغرافي') !== false) {
                return __('رفع طبوغرافي، توقيع محاور، GNSS، LiDAR، Drone، As-Built، GIS. مخرجات CAD/GIS وتقارير دقة معتمدة. احجز رفعك الآن.', 'qeema-theme');
            }
        }
        if (get_post_type() === 'page' && is_singular('page')) {
            $template = get_page_template_slug(get_queried_object_id());
            if ($template === 'page-careers.php') {
                return __('انضم إلى فريق قيمة جروب. نبحث عن مهندسين ومصممين طموحين. قدم سيرتك وملف أعمالك إلى البريد المخصص لتخصصك.', 'qeema-theme');
            }
            if ($template === 'page-vendors.php') {
                return __('سجّل شركتك في قاعدة بيانات موردي قيمة جروب. مورّد مواد، مقاول باطن، مكتب خدمات. نموذج تسجيل معتمد.', 'qeema-theme');
            }
        }
        $post = get_queried_object();
        if ($post && !empty($post->post_excerpt)) {
            return wp_trim_words(wp_strip_all_tags($post->post_excerpt), 25);
        }
        $content = get_post_field('post_content', get_queried_object_id());
        $text = wp_strip_all_tags($content);
        return wp_trim_words($text, 25);
    }
    if (is_post_type_archive('project')) {
        return __('معرض مشاريعنا الهندسية: سكني، تجاري، إداري، صحي. حلول متكاملة من التصميم حتى التسليم.', 'qeema-theme');
    }
    if (is_post_type_archive('service')) {
        return __('خدماتنا: التصميم المعماري والإنشائي، التصميم الداخلي، أنظمة MEP، هندسة المساحة.', 'qeema-theme');
    }
    if (is_home()) {
        return __('أحدث المقالات والأخبار الهندسية من رؤية الهندسة.', 'qeema-theme');
    }
    if (is_category() || is_tag() || is_tax()) {
        $term = get_queried_object();
        return $term && $term->description ? wp_trim_words(wp_strip_all_tags($term->description), 25) : '';
    }
    return '';
}

/**
 * صورة مميزة للمشاركة (OG / Twitter)
 */
function visionary_seo_image()
{
    if (is_singular() && has_post_thumbnail()) {
        $id = get_post_thumbnail_id();
        $src = wp_get_attachment_image_src($id, 'large');
        return $src ? $src[0] : '';
    }
    $logo = get_theme_mod('custom_logo');
    if ($logo) {
        $src = wp_get_attachment_image_src($logo, 'full');
        return $src ? $src[0] : '';
    }
    return function_exists('visionary_get_theme_logo_url') ? visionary_get_theme_logo_url() : get_theme_file_uri('assets/images/themeimg.png');
}

/**
 * الرابط الكانوني للصفحة الحالية
 */
function visionary_seo_current_url()
{
    if (is_front_page()) {
        return home_url('/');
    }
    if (is_singular()) {
        return get_permalink();
    }
    if (is_post_type_archive()) {
        return get_post_type_archive_link(get_post_type());
    }
    return home_url(add_query_arg(array()));
}

/**
 * إخراج JSON-LD (Organization + WebSite + Article عند الحاجة)
 */
function visionary_seo_json_ld($title, $description, $url, $image, $type)
{
    $name = get_bloginfo('name');
    $site_url = home_url('/');

    // Organization + WebSite للصفحة الرئيسية وجميع الصفحات
    $organization = array(
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $name,
        'url' => $site_url,
        'description' => get_bloginfo('description') ?: $description,
    );
    $logo_url = function_exists('visionary_get_theme_logo_url') ? visionary_get_theme_logo_url() : get_theme_file_uri('assets/images/themeimg.png');
    if (get_theme_mod('custom_logo')) {
        $logo_id = get_theme_mod('custom_logo');
        $logo_src = wp_get_attachment_image_src($logo_id, 'full');
        if ($logo_src) {
            $logo_url = $logo_src[0];
        }
    }
    $organization['logo'] = $logo_url;

    $website = array(
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => $name,
        'url' => $site_url,
        'potentialAction' => array(
            '@type' => 'SearchAction',
            'target' => array(
                '@type' => 'EntryPoint',
                'urlTemplate' => $site_url . '?s={search_term_string}',
            ),
            'query-input' => 'required name=search_term_string',
        ),
    );
    if (get_bloginfo('description')) {
        $website['description'] = get_bloginfo('description');
    }

    $scripts = array($organization, $website);

    if (is_singular('post')) {
        $post_id = get_queried_object_id();
        $article = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => get_the_title($post_id),
            'url' => get_permalink($post_id),
            'datePublished' => get_the_date('c', $post_id),
            'dateModified' => get_the_modified_date('c', $post_id),
            'author' => array(
                '@type' => 'Organization',
                'name' => $name,
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => $name,
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => $logo_url,
                ),
            ),
        );
        if ($image) {
            $article['image'] = $image;
        }
        if ($description) {
            $article['description'] = $description;
        }
        $scripts[] = $article;
    }

    if (is_singular('project')) {
        $post_id = get_queried_object_id();
        $project_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'CreativeWork',
            'name' => get_the_title($post_id),
            'url' => get_permalink($post_id),
            'description' => $description ?: wp_trim_words(wp_strip_all_tags(get_post_field('post_content', $post_id)), 20),
            'author' => array('@type' => 'Organization', 'name' => $name),
        );
        if ($image) {
            $project_schema['image'] = $image;
        }
        $scripts[] = $project_schema;
    }

    if (is_singular('service')) {
        $post_id = get_queried_object_id();
        $service_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => get_the_title($post_id),
            'url' => get_permalink($post_id),
            'description' => $description ?: wp_trim_words(wp_strip_all_tags(get_post_field('post_content', $post_id)), 20),
            'provider' => array('@type' => 'Organization', 'name' => $name),
        );
        if ($image) {
            $service_schema['image'] = $image;
        }
        $scripts[] = $service_schema;
    }

    foreach ($scripts as $data) {
        echo '<script type="application/ld+json">' . "\n" . wp_json_encode($data, JSON_UNESCAPED_UNICODE) . "\n" . '</script>' . "\n";
    }
}

/**
 * تحسين عنوان المستند (للعرض في التبويب)
 */
function visionary_seo_document_title($title)
{
    if (defined('WPSEO_VERSION') || function_exists('rank_math')) {
        return $title;
    }
    return visionary_seo_title();
}

add_filter('pre_get_document_title', 'visionary_seo_document_title', 15);
