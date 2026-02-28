<?php
/* Template Name: Thank You Page - شكراً تم استلام طلبك */
get_header();

$from = isset($_GET['from']) ? sanitize_text_field(wp_unslash($_GET['from'])) : '';
$is_contact = ($from === 'contact');
$heading = $is_contact ? 'شكراً لك' : 'شكراً لك';
$message = $is_contact
    ? 'تم استلام رسالتك بنجاح. سنتواصل معك في أقرب وقت.'
    : 'تم استلام طلبك بنجاح. سنتواصل معك خلال 24 ساعة.';
?>

<!-- Hero (صورة من assets) -->
<section class="pt-32 pb-16 relative overflow-hidden min-h-[280px] flex items-center">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('thank-you')); ?>" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-blue-900/95 via-blue-800/90 to-blue-900/95"></div>
    </div>
    <div class="absolute inset-0 blueprint-grid opacity-20"></div>
    <div class="container relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6"><?php echo esc_html($heading); ?></h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">
            <?php echo esc_html($message); ?>
        </p>
    </div>
</section>

<!-- Content -->
<section class="py-24 bg-background">
    <div class="container">
        <div class="max-w-2xl mx-auto text-center">
            <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-8 text-green-600 text-4xl">✓</div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">ماذا بعد؟</h2>
            <p class="text-gray-600 mb-8">
                فريقنا سيراجع طلبك ويتواصل معك قريباً. يمكنك أيضاً الاتصال بنا مباشرة إذا كان لديك أي استفسار.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg">
                    تواصل معنا
                </a>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold border-2 border-gray-300 text-gray-700 hover:border-blue-500 hover:text-blue-600 transition">
                    العودة للرئيسية
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
