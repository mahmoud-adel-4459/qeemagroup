<?php get_header(); ?>

<!-- Default Page Header (صورة من assets) -->
<section class="pt-32 pb-16 relative overflow-hidden min-h-[240px] flex items-center">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('default')); ?>" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-blue-900/90 via-blue-800/85 to-blue-900/90"></div>
    </div>
    <div class="absolute inset-0 blueprint-grid opacity-20"></div>
    <div class="container relative z-10 text-center">
        <h1 class="text-4xl font-bold text-white">
            <?php the_title(); ?>
        </h1>
    </div>
</section>

<!-- Page Content -->
<section class="py-20 bg-white">
    <div class="container max-w-4xl mx-auto">
        <?php
        while (have_posts()):
            the_post();
            ?>
            <div class="prose prose-lg max-w-none text-gray-700">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>