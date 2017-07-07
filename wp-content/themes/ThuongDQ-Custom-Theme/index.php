<?php get_header(); ?>
    <main>
        <div class="container">
            <?php
                get_template_part( 'template-parts/content/special');
                get_template_part( 'template-parts/content/home-box-1');
                get_template_part( 'template-parts/content/home-box-2');
            ?>

            
            <div class="content newspaper">

        
                <?php
                    get_template_part( 'template-parts/content/home-box-3');
                ?>
                <section>
                    <a class="advertising" href="#" title="#">
                        <img src="http://via.placeholder.com/728x90" alt="#">
                    </a>
                </section>
                <?php
                    get_template_part( 'template-parts/content/home-box-4');
                    get_template_part( 'template-parts/content/home-box-5');
                ?>
                

                <section>
                    <a class="advertising" href="#" title="#">
                        <img src="http://via.placeholder.com/728x90" alt="#">
                    </a>
                </section>


                <?php
                    get_template_part( 'template-parts/content/home-box-6');
                    get_template_part( 'template-parts/content/home-box-7');
                ?>

                <section>
                    <a class="advertising" href="#" title="#">
                        <img src="http://via.placeholder.com/728x90" alt="#">
                    </a>
                </section>
            </div>


            <div class="right">
                <aside>
                    <a class="advertising" href="#" title="#">
                        <img src="http://via.placeholder.com/300x250" alt="#">
                    </a>
                </aside>

                <?php
                    get_template_part( 'template-parts/sidebar/right-box-1');
                ?>


                <aside>
                    <a href="#" title="#">
                        <a class="advertising" href="#" title="#">
                            <img src="http://via.placeholder.com/300x250" alt="#">
                        </a>
                    </a>
                </aside>
                
                <?php
                    get_template_part( 'template-parts/sidebar/right-box-2');
                ?>
                

                <aside>
                    <a href="#" title="#">
                        <a class="advertising" href="#" title="#">
                            <img src="http://via.placeholder.com/300x250" alt="#">
                        </a>
                    </a>
                </aside>
            </div>
            
            <?php
                get_template_part( 'template-parts/content/home-box-8');            
            ?>
        </div>
    </main>
<?php get_footer(); ?>