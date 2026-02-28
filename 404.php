<?php get_header(); ?>

<div class="flex min-h-[60vh] items-center justify-center bg-gray-50">
    <div class="text-center p-8">
        <h1 class="mb-4 text-6xl font-extrabold text-blue-900">404</h1>
        <p class="mb-8 text-2xl text-gray-600"><?php esc_html_e('الصفحة غير موجودة', 'qeema-theme'); ?></p>
        <a href="<?php echo esc_url(home_url()); ?>"
            class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
            <?php esc_html_e('العودة للرئيسية', 'qeema-theme'); ?>
        </a>
    </div>
</div>

<?php get_footer(); ?>