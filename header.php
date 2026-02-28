<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        body { margin: 0; }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// إعدادات الهيدر من Theme Settings (تعمل مع أو بدون ACF)
$header_logo_w = function_exists('get_field') ? get_field('header_logo_width', 'option') : null;
$header_logo_h = function_exists('get_field') ? get_field('header_logo_height', 'option') : null;
$header_call_text = (function_exists('get_field') && get_field('header_call_text', 'option') !== null && get_field('header_call_text', 'option') !== '') ? get_field('header_call_text', 'option') : 'اتصل بنا';
$header_call_url = (function_exists('get_field') && get_field('header_call_url', 'option')) ? get_field('header_call_url', 'option') : 'tel:+201009148383';
$header_cta_text = (function_exists('get_field') && get_field('header_cta_text', 'option') !== null && get_field('header_cta_text', 'option') !== '') ? get_field('header_cta_text', 'option') : 'اطلب عرض سعر';
$header_cta_url = (function_exists('get_field') && get_field('header_cta_url', 'option')) ? get_field('header_cta_url', 'option') : home_url('/quotation');
$logo_style_attr = '';
if ((int) $header_logo_w > 0 || (int) $header_logo_h > 0) {
    $logo_style_inner = '';
    if ((int) $header_logo_w > 0) $logo_style_inner .= 'width:' . (int) $header_logo_w . 'px;';
    if ((int) $header_logo_h > 0) $logo_style_inner .= 'height:' . (int) $header_logo_h . 'px;';
    $logo_style_inner .= 'object-fit:contain;';
    $logo_style_attr = ' style="' . esc_attr($logo_style_inner) . '"';
}
?>
<?php if ((int) $header_logo_w > 0 || (int) $header_logo_h > 0) : ?>
<style id="header-logo-dimensions">#site-header .logo img { <?php if ((int) $header_logo_w > 0) echo 'width:' . (int) $header_logo_w . 'px;'; if ((int) $header_logo_h > 0) echo 'height:' . (int) $header_logo_h . 'px;'; ?> object-fit: contain; }</style>
<?php endif; ?>
<header id="site-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-white/80 backdrop-blur-sm py-2 sm:py-2.5 border-b border-gray-100">
    <div class="container flex items-center justify-between gap-2 px-4 sm:px-6">
        <!-- Logo (لوجو أساسي: مخصص أو صورة الثيم الافتراضية) -->
        <div class="logo flex items-center gap-2 sm:gap-3 min-w-0 flex-shrink">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 sm:gap-3 group relative z-10 min-w-0">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <?php
                    $default_logo = function_exists('visionary_get_theme_logo_url') ? visionary_get_theme_logo_url() : get_theme_file_uri('assets/images/themeimg.png');
                    if ($default_logo) : ?>
                        <img src="<?php echo esc_url($default_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="header-logo-img w-auto max-h-9 sm:max-h-10 object-contain object-left group-hover:opacity-90 transition"<?php echo $logo_style_attr; ?> />
                    <?php else : ?>
                        <span class="text-2xl font-bold text-gray-900 group-hover:opacity-90 transition"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
        </div>

        <!-- Desktop Nav — من المنيو في المظهر ← القوائم (القائمة الرئيسية) -->
        <nav class="hidden lg:flex items-center gap-2 nav-primary" aria-label="<?php esc_attr_e('Primary', 'qeema-theme'); ?>">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex items-center gap-2 flex-wrap list-none m-0 p-0',
                    'menu_id'        => 'primary-menu',
                    'walker'         => new Visionary_Nav_Walker(),
                    'fallback_cb'    => false,
                    'visionary_desktop' => true,
                ));
            } else {
                // Fallback عند عدم تعيين قائمة
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="px-5 py-2.5 rounded-xl font-semibold text-sm text-gray-900 hover:text-blue-600 hover:bg-blue-50 transition">الرئيسية</a>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="px-5 py-2.5 rounded-xl font-semibold text-sm text-gray-900 hover:text-blue-600 hover:bg-blue-50 transition">من نحن</a>
                <a href="<?php echo esc_url(get_post_type_archive_link('service') ?: home_url('/#services')); ?>" class="px-5 py-2.5 rounded-xl font-semibold text-sm text-gray-900 hover:text-blue-600 hover:bg-blue-50 transition">خدماتنا</a>
                <?php $projects_link = get_post_type_archive_link('project'); ?>
                <a href="<?php echo $projects_link ? esc_url($projects_link) : esc_url(home_url('/#projects')); ?>" class="px-5 py-2.5 rounded-xl font-semibold text-sm text-gray-900 hover:text-blue-600 hover:bg-blue-50 transition">مشاريعنا</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="px-5 py-2.5 rounded-xl font-semibold text-sm text-gray-900 hover:text-blue-600 hover:bg-blue-50 transition">المدونة</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="px-5 py-2.5 rounded-xl font-semibold text-sm text-gray-900 hover:text-blue-600 hover:bg-blue-50 transition">تواصل معنا</a>
                <?php
            }
            ?>
        </nav>

        <!-- CTA - من Theme Settings -->
        <div class="hidden lg:flex items-center gap-3">
            <a href="<?php echo esc_url($header_call_url); ?>" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:text-blue-600 font-semibold text-sm transition"><?php echo esc_html($header_call_text); ?></a>
            <a href="<?php echo esc_url($header_cta_url); ?>" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-semibold text-sm shadow-md hover:shadow-lg transition"><?php echo esc_html($header_cta_text); ?></a>
        </div>

        <!-- Mobile menu toggle -->
        <button type="button" id="mobile-menu-toggle" class="lg:hidden p-2.5 rounded-xl hover:bg-gray-100 transition" aria-label="فتح القائمة">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </div>

    <!-- Mobile menu panel — نفس القائمة من المنيو -->
    <div id="mobile-menu-panel" class="hidden lg:hidden border-t border-gray-100 bg-white overflow-y-auto transition-all duration-500 max-h-[calc(100vh-4rem)]">
        <div class="container py-4 px-4 sm:px-6">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'space-y-1 list-none m-0 p-0',
                    'menu_id'        => 'mobile-menu',
                    'walker'         => new Visionary_Nav_Walker(),
                    'fallback_cb'    => false,
                    'visionary_mobile' => true,
                ));
            } else {
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="block py-3.5 px-4 font-semibold text-gray-900 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">الرئيسية</a>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="block py-3.5 px-4 font-semibold text-gray-900 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">من نحن</a>
                <a href="<?php echo esc_url(get_post_type_archive_link('service') ?: home_url('/#services')); ?>" class="block py-3.5 px-4 font-semibold text-gray-900 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">خدماتنا</a>
                <a href="<?php echo get_post_type_archive_link('project') ? esc_url(get_post_type_archive_link('project')) : esc_url(home_url('/#projects')); ?>" class="block py-3.5 px-4 font-semibold text-gray-900 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">مشاريعنا</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="block py-3.5 px-4 font-semibold text-gray-900 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">المدونة</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="block py-3.5 px-4 font-semibold text-gray-900 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition">تواصل معنا</a>
                <?php
            }
            ?>
            <div class="flex flex-col gap-3 mt-6 pt-6 border-t border-gray-100">
                <a href="<?php echo esc_url($header_call_url); ?>" class="flex items-center justify-center gap-2 py-3 border border-gray-200 rounded-xl font-semibold text-gray-700 hover:bg-gray-50 transition"><?php echo esc_html($header_call_text); ?></a>
                <a href="<?php echo esc_url($header_cta_url); ?>" class="flex items-center justify-center py-3 bg-blue-600 text-white rounded-xl font-semibold shadow-md hover:bg-blue-700 transition"><?php echo esc_html($header_cta_text); ?></a>
            </div>
        </div>
    </div>
</header>

<!-- Spacer so content is not under fixed header -->
<div class="h-12 lg:h-14" aria-hidden="true"></div>

<main id="content" class="site-content">
