
<footer class="image">
    <h1 class="clotu">A nous le Crayon</h1>
    <img src="wp-content/themes/montheme/assets/img/divider-free-img-1.png" alt="">

    <p class=" para">La passion et l’Amour du dessein  ne se transmettent pas  , nous les decouvrons au fil des années . cet Art nous permet d’etre nous meme et de nous exprimer en toute liberté.</p>
    <div class="cont container-fluid">
        <div class="boureplo row">
            <div class="bouti col-4 ">
                <?= get_option('boutique_horaire') ?>
                <!-- <?= get_option('boutique_date') ?> -->
            </div>

            <div class=" reso col-4">
                <div class="row fs-1">
                    <div class="col"><a href="https://fr-fr.facebook.com"><i class="bi bi-facebook"></i></a></div>
                    <div class="col"><a href="https://www.youtube.com"><i class="bi bi-youtube"></i></a></div>
                    <div class="col"><a href="https://www.google.fr"><i class="bi bi-google"></i></a></div>
                    <div class="col"><a href="https://twitter.com"><i class="bi bi-twitter"></i></a></div> 
                </div>
            </div>
 
            <div class="policonf col-4">
                <div class="row">
                    <div class="col">
                        <?php wp_nav_menu([
                            'theme_location' => 'footer', 
                            'container' => false,
                            'menu_class' => 'politic me-auto mb-2 mb-lg-0'
                            ]) ?>
                    </div>
                </div>
            </div>
        </div>    
        <div class="row align-items-end mb-0">
                    <div class="conclumanga bg-black text-center text-white p-2">
                        Copyright © 2022 Manga Powered by Manga
                    </div>
        </div>
    </div>

</footer>
<?php wp_footer() ?>
</body>
</html>