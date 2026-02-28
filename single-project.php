<?php get_header(); ?>

<div class="container py-16">
    <?php while (have_posts()):
        the_post(); ?>

        <article class="max-w-5xl mx-auto">
            <!-- Project Header -->
            <header class="mb-12 text-center">
                <div class="inline-block bg-blue-100 text-blue-800 px-4 py-1 rounded-full text-sm font-semibold mb-4">
                    <?php echo get_field('category'); ?>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                    <?php the_title(); ?>
                </h1>

                <div class="flex items-center justify-center gap-6 text-gray-500">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <?php echo get_field('location'); ?>
                    </span>
                    <span class="hidden md:inline text-gray-300">|</span>
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <?php echo get_the_date('F Y'); ?>
                    </span>
                </div>
            </header>

            <!-- Featured Image - من الوسائط أو من assets -->
            <?php
            $project_img = visionary_get_project_image_url(get_the_ID(), get_the_ID() % 8, 'full');
            if ($project_img) :
            ?>
                <div class="rounded-3xl overflow-hidden shadow-2xl mb-12 aspect-video bg-gray-100">
                    <img src="<?php echo esc_url($project_img); ?>" alt="<?php the_title_attribute(array('echo' => false)); ?>" class="w-full h-full object-cover" />
                </div>
            <?php endif; ?>

            <!-- Project Content -->
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Description -->
                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900"><?php esc_html_e('نظرة عامة على المشروع', 'qeema-theme'); ?></h2>
                    <div class="prose prose-lg prose-blue max-w-none text-gray-600">
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="lg:col-span-1 space-y-8">
                    <!-- ACFs or meta could go here -->
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-900 mb-4"><?php esc_html_e('تفاصيل المشروع', 'qeema-theme'); ?></h3>
                        <ul class="space-y-4">
                            <li class="flex justify-between border-b pb-2">
                                <span class="text-gray-500"><?php esc_html_e('العميل', 'qeema-theme'); ?></span>
                                <span class="font-medium text-gray-900"><?php esc_html_e('سري', 'qeema-theme'); ?></span>
                            </li>
                            <li class="flex justify-between border-b pb-2">
                                <span class="text-gray-500"><?php esc_html_e('المدة', 'qeema-theme'); ?></span>
                                <span class="font-medium text-gray-900"><?php esc_html_e('12 شهراً', 'qeema-theme'); ?></span>
                            </li>
                            <li class="flex justify-between border-b pb-2">
                                <span class="text-gray-500"><?php esc_html_e('الحالة', 'qeema-theme'); ?></span>
                                <span class="text-green-600 font-bold"><?php esc_html_e('مكتمل', 'qeema-theme'); ?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-blue-600 p-8 rounded-2xl text-white text-center">
                        <h3 class="text-xl font-bold mb-4"><?php esc_html_e('لديك مشروع مشابه؟', 'qeema-theme'); ?></h3>
                        <p class="mb-6 text-blue-100"><?php esc_html_e('تواصل معنا اليوم لمناقشة احتياجاتك الهندسية.', 'qeema-theme'); ?></p>
                        <a href="<?php echo esc_url(home_url('/quotation')); ?>"
                            class="inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-bold hover:bg-blue-50 transition w-full"><?php esc_html_e('اطلب عرض سعر', 'qeema-theme'); ?></a>
                    </div>
                </div>
            </div>

        </article>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>