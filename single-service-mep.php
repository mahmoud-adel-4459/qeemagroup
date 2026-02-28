<?php
/**
 * Single Service — صفحة داخلية مخصصة لخدمة MEP (slug: mep)
 * ديزين الصفحة الداخلية القديم + كل داتا MEP
 */
get_header(); ?>

<?php while (have_posts()) :
    the_post();
    $hero_img = function_exists('get_field') ? get_field('hero_image') : null;
    $default_asset = 'service-mep.jpg';
    $image = ($hero_img && !empty($hero_img['url'])) ? $hero_img['url'] : get_theme_file_uri('assets/images/' . $default_asset);
    $short_desc = function_exists('get_field') ? get_field('short_description') : get_the_excerpt();
    $hero_desc = $short_desc ? wp_kses_post($short_desc) : wp_trim_words(get_the_content(), 35);
?>
    <!-- Hero Section -->
    <section class="relative h-[60vh] min-h-[500px] flex items-center justify-center overflow-hidden bg-slate-800">
        <div class="absolute inset-0 z-0">
            <?php if ($image) : ?>
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover min-h-full min-w-full">
            <?php endif; ?>
            <div class="absolute inset-0 z-[1] visionary-hero-overlay" aria-hidden="true"></div>
        </div>
        <div class="relative z-10 container px-4 sm:px-6 text-center text-white">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 mb-6 animate-fade-in-up">
                <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                <span class="text-sm font-medium text-blue-100 uppercase tracking-wider">خدماتنا المتميزة</span>
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-3 leading-tight animate-fade-in-up delay-100"><?php the_title(); ?></h1>
            <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full mb-6 animate-fade-in-up delay-200"></div>
            <?php if ($hero_desc) : ?>
                <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8 animate-fade-in-up delay-200"><?php echo wp_kses_post($hero_desc); ?></p>
            <?php endif; ?>
            <div class="flex flex-wrap justify-center gap-4 animate-fade-in-up delay-300">
                <a href="<?php echo esc_url(get_post_type_archive_link('project') ?: home_url('/#projects')); ?>" class="group inline-flex items-center gap-2 px-8 py-4 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-500 transition border border-blue-500">
                    <span>عرض أعمالنا</span>
                    <svg class="w-5 h-5 rtl:-scale-x-100 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                </a>
                <a href="<?php echo esc_url(home_url('/quotation')); ?>" class="px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/30 text-white rounded-xl font-bold hover:bg-white/20 transition">طلب عرض سعر</a>
            </div>
        </div>
    </section>

    <!-- Floating Stats Strip -->
    <div class="relative z-20 -mt-16 container px-4">
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-10 border border-gray-100 grid md:grid-cols-3 divide-y md:divide-y-0 md:divide-x md:divide-x-reverse divide-gray-100">
            <?php if (function_exists('have_rows') && have_rows('service_stats')) : ?>
                <?php while (have_rows('service_stats')) : the_row(); ?>
                    <div class="text-center py-4 md:py-0">
                        <div class="text-4xl lg:text-5xl font-extrabold text-blue-600 mb-2 stat-counter" data-end="<?php echo (int)filter_var(get_sub_field('value'), FILTER_SANITIZE_NUMBER_INT); ?>" data-suffix="<?php echo filter_var(get_sub_field('value'), FILTER_SANITIZE_NUMBER_INT) ? '+' : ''; ?>"><?php the_sub_field('value'); ?></div>
                        <p class="text-gray-500 font-medium text-sm md:text-base"><?php the_sub_field('label'); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="text-center py-4 md:py-0">
                    <div class="text-4xl lg:text-5xl font-extrabold text-blue-600 mb-2">+150</div>
                    <p class="text-gray-500 font-medium text-sm">مشروع ناجح</p>
                </div>
                <div class="text-center py-4 md:py-0">
                    <div class="text-4xl lg:text-5xl font-extrabold text-blue-600 mb-2">98%</div>
                    <p class="text-gray-500 font-medium text-sm">رضا العملاء</p>
                </div>
                <div class="text-center py-4 md:py-0">
                    <div class="text-4xl lg:text-5xl font-extrabold text-blue-600 mb-2">100%</div>
                    <p class="text-gray-500 font-medium text-sm">الالتزام بالمواعيد</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part('template-parts/service', 'mep'); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
