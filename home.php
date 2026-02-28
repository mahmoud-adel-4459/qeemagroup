<?php get_header(); ?>

<!-- Hero Section (صورة من assets) -->
<section class="pt-32 pb-16 relative overflow-hidden min-h-[280px] flex items-center">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('default')); ?>" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-blue-900/95 via-blue-800/90 to-blue-900/95"></div>
    </div>
    <div class="absolute inset-0 blueprint-grid opacity-20"></div>
    <div class="container relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6"><?php esc_html_e('المدونة', 'qeema-theme'); ?></h1>
            <p class="text-xl text-blue-100">
                <?php esc_html_e('مقولات ومقالات من خبرائنا الهندسيين.', 'qeema-theme'); ?>
            </p>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="py-24 bg-white">
    <div class="container">
        <div class="grid lg:grid-cols-4 gap-12">

            <!-- Sidebar -->
            <aside class="lg:col-span-1 order-2 lg:order-1">
                <!-- Search -->
                <div class="mb-8">
                    <?php get_search_form(); ?>
                </div>

                <!-- Categories -->
                <div class="mb-8">
                    <h3 class="font-bold text-gray-900 mb-4"><?php esc_html_e('التصنيفات', 'qeema-theme'); ?></h3>
                    <div class="space-y-2">
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category):
                            ?>
                            <a href="<?php echo get_category_link($category->term_id); ?>"
                                class="block w-full text-right px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                <?php echo $category->name; ?> (
                                <?php echo $category->count; ?>)
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- CTA -->
                <div class="p-6 rounded-2xl bg-blue-50 border border-blue-100">
                    <h3 class="font-bold text-gray-900 mb-2"><?php esc_html_e('تحتاج استشارة؟', 'qeema-theme'); ?></h3>
                    <p class="text-sm text-gray-600 mb-4">
                        <?php esc_html_e('تواصل مع خبرائنا لنصائح مجانية.', 'qeema-theme'); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>"
                        class="block text-center w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition"><?php esc_html_e('تواصل معنا', 'qeema-theme'); ?></a>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="lg:col-span-3 order-1 lg:order-2">

                <!-- Latest/Featured Post (First one) -->
                <?php
                // We'll treat the first post in the loop as 'featured' for visual styling
                if (have_posts()):
                    the_post(); // Advance to first post
                    ?>
                    <div class="mb-12">
                        <div class="rounded-3xl overflow-hidden bg-white border border-gray-100 shadow-lg">
                            <div
                                class="aspect-[2/1] bg-gradient-to-br from-blue-100 to-cyan-100 flex items-center justify-center relative">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                                <?php else: ?>
                                    <span class="text-6xl">📐</span>
                                <?php endif; ?>
                            </div>
                            <div class="p-8">
                                <div class="flex items-center gap-4 mb-4">
                                    <?php
                                    $cats = get_the_category();
                                    if (!empty($cats)): ?>
                                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-sm font-medium">
                                            <?php echo $cats[0]->name; ?>
                                        </span>
                                    <?php endif; ?>
                                    <span class="text-sm text-gray-500"><?php esc_html_e('أحدث مقال', 'qeema-theme'); ?></span>
                                </div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="text-gray-600 mb-6">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4 text-sm text-gray-500">
                                        <span class="flex items-center gap-1">
                                            👤
                                            <?php the_author(); ?>
                                        </span>
                                        <span class="flex items-center gap-1">
                                            📅
                                            <?php echo get_the_date(); ?>
                                        </span>
                                    </div>
                                    <a href="<?php the_permalink(); ?>"
                                        class="flex items-center gap-2 text-blue-600 font-medium hover:gap-3 transition-all">
                                        <?php esc_html_e('اقرأ المزيد', 'qeema-theme'); ?> ←
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Regular Posts Grid -->
                <div class="grid md:grid-cols-2 gap-8">
                    <?php while (have_posts()):
                        the_post(); ?>
                        <article
                            class="rounded-2xl overflow-hidden bg-white border border-gray-100 hover:border-blue-200 hover:shadow-lg transition-all group">
                            <div class="aspect-video bg-gray-100 relative">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform']); ?>
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center text-4xl">📝</div>
                                <?php endif; ?>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-3 mb-3">
                                    <?php
                                    $cats = get_the_category();
                                    if (!empty($cats)): ?>
                                        <span class="px-2 py-1 rounded-md bg-gray-100 text-gray-500 text-xs font-medium">
                                            <?php echo $cats[0]->name; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <h3
                                    class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="text-sm text-gray-500 mb-4 line-clamp-2">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="flex items-center justify-between text-sm text-gray-400">
                                    <span>
                                        <?php the_author(); ?>
                                    </span>
                                    <span>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="mt-12 text-center">
                    <?php the_posts_pagination(array('prev_text' => __('السابق', 'qeema-theme'), 'next_text' => __('التالي', 'qeema-theme'))); ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>