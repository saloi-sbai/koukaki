<?php
$args = array(
    'post_type' => 'characters', //le type de publication à récupérer
    'posts_per_page' => -1, //indique le nombre de publications à récupérer
    'meta_key'  => '_main_char_field', //la clé de métadonnées utilisée pour trier les publications
    'orderby'   => 'meta_value_num', //les valeurs de la métadonnée seront triées numériquement.
);
$characters_query = new WP_Query($args);
?>

<article id="characters">
    <h3><span class="characters__title hidden">Les personnages</span></h3>
    <!-- Slider main container -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            while ($characters_query->have_posts()) {
                $characters_query->the_post();
                echo '<div class="swiper-slide">';
                echo '<figure>';
                echo get_the_post_thumbnail(get_the_ID(), 'full');
                echo '<figcaption>';
                the_title();
                echo '</figcaption>';
                echo '</figure>';
                echo '</div>';
            };
            ?>
        </div>
    </div>
</article>