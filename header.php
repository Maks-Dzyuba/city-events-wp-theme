<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name');
            echo " | ";
            bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="container header__flex">
            <a href="/" class="logo">CITY<span>EVENTS</span></a>
            <nav class="nav">
                <ul class="nav__list">
                    <?php wp_nav_menu([
                        'theme_location' => 'header_menu',
                        'menu_class'     => 'nav__link',
                    ]); ?>

                    <li>
                        <a href="<?php echo home_url('/#contact'); ?>" class="btn btn--outline">Запропонувати подію</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>