<?php

/**
 * Template Name: Список всіх подій
 */

get_header(); ?>

<main class="events-archive">
    <div class="container">
        <h1 class="archive-title" style="margin-bottom: 40px;">Всі майбутні події</h1>

        <div class="events-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type'      => 'event',
                'posts_per_page' => 9,
                'paged'          => $paged,
                'meta_key'       => 'card_date',
                'orderby'        => 'meta_value',
                'order'          => 'ASC'
            );

            $events_query = new WP_Query($args);

            if ($events_query->have_posts()) :
                while ($events_query->have_posts()) : $events_query->the_post(); ?>


                    <article class="event-card">
                        <div class="event-card__img" style="background-image: url('<?php echo esc_url(get_field('event_img')); ?>');">
                            <?php if ($term = get_field('kategoriya')): ?>
                                <div class="event-card__badge"><?php echo esc_html($term->name); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="event-card__content">
                            <div class="event-card__date">
                                <i class="fa-solid fa-calendar-days"></i> <?php the_field('card_date'); ?>
                            </div>
                            <h3 class="event-card__title"><?php the_field('card_title'); ?></h3>
                            <p class="event-card__loc">
                                <i class="fa-solid fa-location-dot"></i> <?php the_field('card_lokation'); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="event-card__link">Детальніше</a>
                        </div>
                    </article>


                <?php endwhile; ?>


                <div class="pagination" style="grid-column: 1 / -1; margin-top: 40px;">
                    <?php
                    echo paginate_links(array(
                        'total' => $events_query->max_num_pages,
                        'current' => $paged,
                    ));
                    ?>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>Наразі подій немає.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>