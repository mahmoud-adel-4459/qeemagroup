<?php get_header(); ?>

<div class="container py-12">
    <?php while (have_posts()):
        the_post(); ?>

        <article class="max-w-4xl mx-auto">
            <!-- Header -->
            <header class="mb-8 text-center">
                <div class="text-blue-600 font-medium mb-2 uppercase tracking-wide text-sm">
                    <?php
                    $cats = get_the_category();
                    if ($cats)
                        echo $cats[0]->name;
                    ?>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    <?php the_title(); ?>
                </h1>

                <?php if (has_post_thumbnail()): ?>
                    <div class="rounded-2xl overflow-hidden shadow-2xl mb-8">
                        <?php the_post_thumbnail('full', ['class' => 'w-full h-auto']); ?>
                    </div>
                <?php endif; ?>

                <div class="flex justify-center gap-4 text-gray-500 text-sm">
                    <span>By <?php the_author(); ?></span>
                    <span>&bull;</span>
                    <span><?php echo get_the_date(); ?></span>
                </div>
            </header>

            <!-- Content -->
            <div class="prose prose-lg max-w-none text-gray-700">
                <?php the_content(); ?>
            </div>

            <!-- Navigation -->
            <div class="mt-12 flex justify-between border-t border-gray-100 pt-8">
                <div class="text-left w-1/2 pr-4"><?php previous_post_link('%link', '&larr; %title'); ?></div>
                <div class="text-right w-1/2 pl-4"><?php next_post_link('%link', '%title &rarr;'); ?></div>
            </div>

        </article>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>