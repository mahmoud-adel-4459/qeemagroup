<?php get_header(); ?>

<div class="container py-12">
    <?php if (have_posts()): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while (have_posts()):
                the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white p-6 rounded-xl shadow-sm border border-gray-100'); ?>>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="mb-4 rounded-lg overflow-hidden h-48">
                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover']); ?>
                        </div>
                    <?php endif; ?>

                    <h2 class="text-xl font-bold mb-2">
                        <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600 transition">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <div class="text-gray-600 text-sm mb-4 line-clamp-3">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination mt-8">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else: ?>
        <p>No content found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>