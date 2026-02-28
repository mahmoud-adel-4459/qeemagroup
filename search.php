<?php
/**
 * صفحة نتائج البحث - تصميم متناسق مع الثيم
 */
get_header();

$search_query = get_search_query();
?>

<!-- Hero (صورة من assets) -->
<section class="pt-32 pb-12 md:pb-16 relative overflow-hidden min-h-[240px] flex items-center">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('search')); ?>" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-blue-900/95 via-blue-800/90 to-blue-900/95"></div>
    </div>
    <div class="absolute inset-0 blueprint-grid opacity-20"></div>
    <div class="container relative z-10 px-4 sm:px-6">
        <div class="max-w-3xl text-right">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                <?php esc_html_e('نتائج البحث', 'qeema-theme'); ?>
                <?php if ($search_query) : ?>
                    <span class="text-blue-200 font-normal">"<?php echo esc_html($search_query); ?>"</span>
                <?php endif; ?>
            </h1>
            <p class="text-lg text-blue-100">
                <?php esc_html_e('ما تم العثور عليه لمصطلح البحث الخاص بك.', 'qeema-theme'); ?>
            </p>
        </div>
    </div>
</section>

<!-- نتائج البحث -->
<section class="py-12 md:py-20 bg-white">
    <div class="container px-4 sm:px-6">
        <?php if (have_posts()) : ?>
            <div class="max-w-4xl mx-auto space-y-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="p-6 md:p-8 rounded-2xl bg-gray-50 border border-gray-100 hover:border-blue-200 hover:shadow-md transition-all text-right">
                        <?php
                            $pt = get_post_type();
                            $pt_obj = get_post_type_object($pt);
                            $pt_label = $pt_obj && isset($pt_obj->labels->singular_name) ? $pt_obj->labels->singular_name : $pt;
                            ?>
                        <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-sm font-medium mb-3">
                            <?php echo esc_html($pt_label); ?>
                        </span>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition"><?php the_title(); ?></a>
                        </h2>
                        <div class="text-gray-600 mb-4 line-clamp-2">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:gap-3 transition-all">
                            <?php esc_html_e('اقرأ المزيد', 'qeema-theme'); ?>
                            <span>←</span>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="mt-12 text-center">
                <?php the_posts_pagination(array('prev_text' => __('السابق', 'qeema-theme'), 'next_text' => __('التالي', 'qeema-theme'))); ?>
            </div>
        <?php else : ?>
            <div class="max-w-2xl mx-auto text-center py-12">
                <p class="text-6xl mb-6">🔍</p>
                <h2 class="text-2xl font-bold text-gray-900 mb-4"><?php esc_html_e('لا توجد نتائج', 'qeema-theme'); ?></h2>
                <p class="text-gray-600 mb-8"><?php esc_html_e('لم نجد أي محتوى يطابق بحثك. جرّب كلمات أخرى أو تصفح الموقع.', 'qeema-theme'); ?></p>
                <?php get_search_form(); ?>
                <div class="mt-8">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold bg-blue-600 text-white hover:bg-blue-700 transition">
                        <?php esc_html_e('العودة للرئيسية', 'qeema-theme'); ?>
                        <span>←</span>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
