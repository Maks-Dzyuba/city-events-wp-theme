<?php get_header(); ?>

<main class="single-event">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="event-full">

                    <header class="event-full__header">
                        <div class="event-full__badge">
                            <?php
                            $term = get_field('kategoriya');
                            echo $term ? esc_html($term->name) : 'Подія';
                            ?>
                        </div>
                        <h1 class="event-full__title"><?php the_field('card_title'); ?></h1>

                        <div class="event-full__meta">
                            <span class="event-meta__item"><i class="fa-solid fa-calendar-days"></i> <?php the_field('card_date'); ?> • 19:00</span>
                            <span class="event-meta__item"><i class="fa-solid fa-location-dot"></i> <?php the_field('card_lokation'); ?></span>
                        </div>
                    </header>

                    <div class="event-full__image" style="margin-bottom: 30px;">
                        <img src="<?php the_field('event_img'); ?>" alt="<?php the_field('card_title'); ?>" style="width: 100%; border-radius: 15px;">
                    </div>

                    <?php if (get_field('event_intro')): ?>
                        <div class="event-full__intro" style="font-size: 1.2rem; font-weight: 500; margin-bottom: 20px; color: #555; border-left: 4px solid #000; padding-left: 20px;">
                            <?php the_field('event_intro'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="event-full__description">
                        <?php the_content();
                        ?>
                    </div>

                </article>
        <?php endwhile;
        endif; ?>

        <hr style="margin: 50px 0;">

        <section class="related-events">
            <h2 class="related-events__title" style="margin-bottom: 30px;">Можливо, вас зацікавить</h2>
            <div class="related-events__grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                <?php
                $current_post_id = get_the_ID();
                $related_query = new WP_Query(array(
                    'post_type'      => 'event',
                    'posts_per_page' => 2,
                    'post__not_in'   => array(get_the_ID()),
                    'orderby'        => 'rand',
                ));

                if ($related_query->have_posts()) :
                    while ($related_query->have_posts()) : $related_query->the_post(); ?>

                        <article class="event-card">
                            <div class="event-card__img" style="background-image: url('<?php the_field('event_img'); ?>'); height: 200px; background-size: cover; background-position: center; border-radius: 10px 10px 0 0;">
                                <div class="event-card__badge">
                                    <?php $term = get_field('kategoriya');
                                    echo $term ? esc_html($term->name) : 'Подія'; ?>
                                </div>
                            </div>
                            <div class="event-card__content">
                                <div class="event-card__date"><i class="fa-solid fa-calendar-days"></i> <?php the_field('card_date'); ?></div>
                                <h3 class="event-card__title"><?php the_field('card_title'); ?></h3>
                                <a href="<?php the_permalink(); ?>" class="event-card__link" style="color: white; font-weight: bold;">Детальніше </a>
                            </div>
                        </article>

                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>