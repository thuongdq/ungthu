<!--Begin Bài viết nổi bật-->
<aside>
    <div class="post-special">
        <?php
          $sticky = get_option( 'sticky_posts' );
          $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
          $args_nonsticky = array(
            // 'showposts'     => -1,
            'ignore_sticky_posts' => 1,
            'post__not_in' => $sticky,
            'paged' => $paged,
            'posts_per_page'  => 5, 
            );
          $args_sticky = array(
            // 'posts_per_page' => -1,
            'ignore_sticky_posts' => 1,
            'post__in'  => $sticky,
            'paged' => $paged,
            'posts_per_page'  => 5, 
            );

          $the_query_sticky = new WP_Query($args_sticky); 
          $the_query_nonsticky = new WP_Query($args_nonsticky);
          if ( $sticky[0] ) {
            $i = 0;
            while ($the_query_sticky->have_posts()) : $the_query_sticky->the_post(); 
            $i++;
            ?>
            <div class="item">
                  <a  href="<?php echo esc_url( get_permalink()) ?>" title="<?php echo get_the_title()?>">
                      <?php 
                      if($i == 1){
                        echo media_view_image(get_the_ID(), get_the_title(), get_the_content(),'thumbnailer', 'high');
                      }else{
                        echo media_view_image(get_the_ID(), get_the_title(), get_the_content(),'thumbnail');
                      }
                      ?>
                  </a>
                 <a  href="<?php echo esc_url( get_permalink()) ?>" title="<?php echo get_the_title()?>">
                      <?php echo post_sub_excerpt(get_the_title(), 50)?>
                  </a>
              </div>
            <?php
            endwhile;
          }else{
              while ($the_query_nonsticky->have_posts()) : $the_query_nonsticky->the_post(); 
          ?>
          <div class="item">
              <a  href="<?php echo esc_url( get_permalink()) ?>" title="<?php echo get_the_title()?>">
                  <?php 
                  echo media_view_image(get_the_ID(), get_the_title(), get_the_content(), 'thumbnailer');
                  ?>
              </a>
             <a  href="<?php echo esc_url( get_permalink()) ?>" title="<?php echo get_the_title()?>">
                  <?php echo post_sub_excerpt(get_the_title(), 55)?>
              </a>
          </div>
          <?php
          endwhile;
          }
          ?>
    </div>
</aside>
<!--End Bài viết nổi bật-->
