<?php get_header(); ?>

<main>
    <?php $banner_bg = get_field('banner_bg'); ?>
    <section class="hero" style="background-image: url('<?php echo esc_url($banner_bg) ?>');">
        <div class="container">
            <h1 class="hero__title">
                <?php the_field('baner_title'); ?>
            </h1>
            <p class="hero__subtitle">
                <?php the_field('opis_baner'); ?>
            </p>
            <div class="hero__actions">
                <a href="<?php echo get_permalink(get_page_by_path('vsi-podiyi')); ?>" class="btn btn--solid">Дивитись афішу</a>
            </div>
        </div>
    </section>

    <section class="events container">
        <div class="section-top">
            <h2 class="h2">Найближчі заходи</h2>
            <a href="<?php echo get_permalink(get_page_by_path('vsi-podiyi')); ?>" class="link-more">Всі події →</a>
        </div>

        <div class="events__grid">
            <?php $args = array(
                'post_type' => 'event',
                'posts_per_page' => 3,
                'order'          => 'ASC',
                'meta_key'       => 'card_date',
                'order'          => 'ASC',

            );
            $query = new WP_Query($args);
            if ($query->have_posts()): while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="event-card">
                        <div class="event-card__img" style="background-image: url('<?php the_field('event_img'); ?>');">
                            <div class="event-card__badge"> <?php
                                                            $term = get_field('kategoriya'); // Впишите сюда имя (Label) самого поля ACF
                                                            if ($term): ?>
                                    <?php echo esc_html($term->name); ?>
                                <?php else: ?>
                                    Подія
                                <?php endif; ?></div>
                        </div>
                        <div class="event-card__content">
                            <div class="event-card__date"><i class="fa-solid fa-calendar-days"></i> <?php the_field('card_date'); ?> • <?php the_field('card_time'); ?></div>
                            <h3 class="event-card__title"><?php the_field('card_title'); ?></h3>
                            <p class="event-card__loc"><i class="fa-solid fa-location-dot"></i> <?php the_field('card_lokation'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="event-card__link">Детальніше</a>
                        </div>
                    </article>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </section>

    <!-- ФОРМА (contact.php) -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="contact__box">
                <div class="contact__text">
                    <h2 class="h2">Додай свій івент</h2>
                    <p>
                        Організовуєте захід? Напишіть нам, і ми розповімо про нього
                        місту.
                    </p>
                </div>
                <div class="contact__form">

                    <?php echo do_shortcode('[contact-form-7 id="45822b2" title="Contact"]'); ?>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>