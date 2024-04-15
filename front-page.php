<?php

get_header();
?>

<main id="primary" class="site-main">
    <section class="banner">
        <!-- <img class="banner__background" src="<?php echo get_theme_file_uri() . '/assets/images/banner.png'; ?>" alt=""> -->
        <video class="banner__video" width="1440" autoplay="autoplay" muted="" loop="infinite">
            <source src="<?php echo get_theme_file_uri() . './assets/videos/koukaki.mp4'; ?>" type="video/mp4">
        </video>
        <img class="banner__logo" src="<?php echo get_theme_file_uri() . './assets/images/logo.png'; ?>" alt="Logo fleurs d'oranger & chats errants">
    </section>
    <section id="story" class="story hidden">
        <h2><span class="story__title hidden">L'histoire</span></h2>
        <article class="story__article">
            <p><?php echo get_theme_mod('story'); ?></p>
        </article>
        <?php
        $args = array(
            'post_type' => 'characters',
            'posts_per_page' => -1,
            'meta_key'  => '_main_char_field',
            'orderby'   => 'meta_value_num',

        );
        $characters_query = new WP_Query($args);
        ?>
        <article id="characters">
            <div class="main-character">
                <h3><span class="characters__title hidden">Les personnages</span></h3>
                <?php
                $main_character = $characters_query->posts[0];
                echo '<figure>';
                echo get_the_post_thumbnail($main_character->ID, 'full');
                echo '<figcaption>' . $main_character->post_title . '</figcaption>';
                echo '</figure>';
                $characters_query->next_post();
                ?>
            </div>
            <div class="other-characters">
                <?php
                while ($characters_query->have_posts()) {
                    $characters_query->the_post();
                    echo '<figure>';
                    echo get_the_post_thumbnail(get_the_ID(), 'full');
                    echo '<figcaption>';
                    the_title();
                    echo '</figcaption>';
                    echo '</figure>';
                }
                ?>
            </div>
        </article>
        <article id="place">
            <!-- rajouts des images du nuages et un span -->
            <img class="place--big_cloud" src="<?php echo get_theme_file_uri() . '/assets/images/big_cloud.png'; ?>" alt="gros nuage">
            <img class="place--little_cloud" src="<?php echo get_theme_file_uri() . '/assets/images/little_cloud.png'; ?>" alt="petit nuage">
            <div>
                <h3><span class="place__title hidden">Le Lieu</span></h3>
                <p><?php echo get_theme_mod('place'); ?></p>
            </div>

        </article>
    </section>

    <!-- rajout de class a la section studio -->
    <section id="studio" class="studio hidden">
        <h2><span class="studio__title hidden">Studio Koukaki</span></h2>
        <div>
            <p>Acteur majeur de l’animation, Koukaki est un studio intégré fondé en 2012 qui créé, produit et distribue des programmes originaux dans plus de 190 pays pour les enfants et les adultes. Nous avons deux sections en activité : le long métrage et le court métrage. Nous développons des films fantastiques, principalement autour de la culture de notre pays natal, le Japon.</p>
            <p>Avec une créativité et une capacité d’innovation mondialement reconnues, une expertise éditoriale et commerciale à la pointe de son industrie, le Studio Koukaki se positionne comme un acteur incontournable dans un marché en forte croissance. Koukaki construit chaque année de véritables succès et capitalise sur de puissantes marques historiques. Cette année, il vous présente “Fleurs d’oranger et chats errants”.</p>
        </div>
    </section>
</main><!-- #main -->
<?php get_template_part('template-parts/section-oscars'); ?>

<?php
get_footer();
