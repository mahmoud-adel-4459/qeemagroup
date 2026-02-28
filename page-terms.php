<?php
/**
 * Template Name: الشروط والأحكام
 * صفحة الشروط والأحكام فقط — لا تحتوي على سياسة الخصوصية
 * المحتوى الكامل في: template-parts/content-terms.php
 */
if (!defined('ABSPATH')) exit;
get_header();

$terms_updated = '1 يناير 2025';
$terms_email  = get_bloginfo('admin_email');
$terms_phone  = '';
$terms_address = '';
?>

<!-- Hero: الشروط والأحكام فقط -->
<section class="pt-32 pb-12 md:pb-16 relative overflow-hidden min-h-[240px] flex items-center">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('terms')); ?>" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-blue-900/95 via-blue-800/90 to-blue-900/95"></div>
    </div>
    <div class="absolute inset-0 blueprint-grid opacity-20"></div>
    <div class="container relative z-10 px-4 sm:px-6">
        <div class="max-w-3xl text-right">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">الشروط والأحكام — قيمة جروب</h1>
            <p class="text-lg text-blue-100">شروط استخدام الموقع والخدمات الهندسية.</p>
        </div>
    </div>
</section>

<div class="visionary-content-wrap">
<?php get_template_part('template-parts/content', 'terms'); ?>

<!-- رجوع -->
<section class="py-8 bg-gray-50 border-t border-gray-100">
    <div class="container px-4 sm:px-6 text-center">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:text-blue-700 transition">← العودة للرئيسية</a>
    </div>
</section>
</div>

<?php get_footer(); ?>
