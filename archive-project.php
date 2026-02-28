<?php get_header(); ?>

<!-- Header (صورة من assets) -->
<section class="pt-32 pb-16 relative overflow-hidden min-h-[280px] flex items-center">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('projects')); ?>" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-slate-900/95 via-blue-900/90 to-slate-900/95"></div>
    </div>
    <div class="absolute inset-0 blueprint-grid opacity-10"></div>
    <div class="container relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4"><?php esc_html_e('مشاريعنا', 'qeema-theme'); ?></h1>
        <p class="text-blue-100"><?php esc_html_e('معرض لأبرز إنجازاتنا الهندسية.', 'qeema-theme'); ?></p>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-24 bg-white">
    <div class="container">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post();
                    $project_img = visionary_get_project_image_url(get_the_ID(), $wp_query->current_post, 'medium_large');
                    ?>
                    <a href="<?php the_permalink(); ?>"
                        class="group block rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-200">
                            <img src="<?php echo esc_url($project_img); ?>" alt="<?php the_title_attribute(array('echo' => false)); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <span class="bg-white/20 px-2 py-1 rounded text-xs backdrop-blur-sm mb-2 inline-block">
                                    <?php echo get_field('category'); ?>
                                </span>
                                <h2 class="text-xl font-bold">
                                    <?php the_title(); ?>
                                </h2>
                                <p class="text-sm opacity-80 flex items-center gap-1 mt-1">
                                    <span>📍</span>
                                    <?php echo get_field('location'); ?>
                                </p>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php else: ?>
                <p><?php esc_html_e('لم يتم العثور على مشاريع.', 'qeema-theme'); ?></p>
            <?php endif; ?>
        </div>

        <div class="mt-12 text-center">
            <?php the_posts_pagination(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>