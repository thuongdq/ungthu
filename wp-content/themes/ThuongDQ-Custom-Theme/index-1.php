<?php 
    $ad = client_get_options('home');
    get_header();
    get_template_part( 'template-parts/header/breadcrumb');
    get_template_part( 'template-parts/header/slide');
?>
    <div class="row page-content page-home">
        <div class="col-md-6 col-md-push-3 content">
            <?php
            get_template_part( 'template-parts/content/postNewHome');
            get_template_part( 'template-parts/content/overweight');
            get_template_part( 'template-parts/content/video');
            echo '
                <section>
                    <div class="advertising ad-486x66">
                        <a href="'.$ad[4]['url'].'" title="'.$ad[4]['title'].'">
                            <img class="img-responsive" src="'.$ad[4]['image'].'" alt="'.$ad[4]['title'].'">
                        </a>
                    </div>
                </section>
            ';
            get_template_part( 'template-parts/content/method');
            get_template_part( 'template-parts/content/object');
            echo '
                <section>
                    <div class="advertising ad-486x66">
                        <a href="'.$ad[5]['url'].'" title="'.$ad[5]['title'].'">
                            <img class="img-responsive" src="'.$ad[5]['image'].'" alt="'.$ad[5]['title'].'">
                        </a>
                    </div>
                </section>
            ';
            get_template_part( 'template-parts/content/drug');
            ?>
        </div>

        <div class="col-md-3 col-md-pull-6 left">
            <?php
            get_template_part( 'template-parts/sidebar/postSpecial');
            get_template_part( 'template-parts/sidebar/postNew');
            echo '
                <aside>
                    <div class="advertising ad-250x250">
                        <a href="'.$ad[0]['url'].'" title="'.$ad[0]['title'].'">
                            <img class="img-responsive" src="'.$ad[0]['image'].'" alt="'.$ad[0]['title'].'">
                        </a>
                    </div>
                </aside>
            ';
            get_template_part( 'template-parts/sidebar/support');
            get_template_part( 'template-parts/sidebar/skill');
            ?>
        </div>

        <div class="col-md-3 right">
            <?php
            echo '
                <aside>
                    <div class="advertising ad-250x250">
                        <a href="'.$ad[1]['url'].'" title="'.$ad[1]['title'].'">
                            <img class="img-responsive" src="'.$ad[1]['image'].'" alt="'.$ad[1]['title'].'">
                        </a>
                    </div>
                </aside>
            ';
            get_template_part( 'template-parts/sidebar/viewest');
            get_template_part( 'template-parts/sidebar/bmi');
            get_template_part( 'template-parts/sidebar/calo');
            echo '
                <aside>
                    <div class="advertising ad-250x250">
                        <a href="'.$ad[2]['url'].'" title="'.$ad[2]['title'].'">
                            <img class="img-responsive" src="'.$ad[2]['image'].'" alt="'.$ad[2]['title'].'">
                        </a>
                    </div>
                </aside>
            ';
            get_template_part( 'template-parts/sidebar/success');
            echo '
                <aside>
                    <div class="advertising ad-250x250">
                        <a href="'.$ad[3]['url'].'" title="'.$ad[3]['title'].'">
                            <img class="img-responsive" src="'.$ad[3]['image'].'" alt="'.$ad[3]['title'].'">
                        </a>
                    </div>
                </aside>
            ';
            get_template_part( 'template-parts/sidebar/link');
            get_template_part( 'template-parts/sidebar/involve');
            ?>
        </div>
    </div>
<?php echo '
    <section class="row">
        <div class="advertising ad-1000x90">
            <a href="'.$ad[6]['url'].'" title="'.$ad[6]['title'].'">
                <img class="img-responsive" src="'.$ad[6]['image'].'" alt="'.$ad[6]['title'].'">
            </a>
        </div>
    </section>
'; ?>
<?php get_footer(); ?>