
<?php
/**

 * Template Name: Archive

 **/

get_header(); ?>


<section id="featured-events" class="mainContent smallerSectionPadding bg-white topfoldDesktop">
    <div class="sm-container mx-auto">
        <h1 class="text-center sm:mt-2 blue" > Club Archives </h1> 
        <p class="text-center px-10"> Here you can see blog posts that are over 12 months old. 
            <br/> To see recent blog posts <a href="/blog/" class="hyperlink"> click here</a>.</p>
     
       <?php 
        $d = new DateTime( ); 
        $date_from = date('Y-m-d', strtotime($_GET['dateFrom']));
        $date_to = date('Y-m-d', strtotime($_GET['dateTo']));
        $dateto = $date_to;
        $datefrom = $date_from;


         if (date('Y', strtotime($date_to)) < date('Y', strtotime(2010)) ) : $dateto = date('Y-m-d'); endif; 

         if (date('Y', strtotime($date_to)) < date('Y', strtotime(2010)) ) :  $dateto = date('Y-m-d'); endif;
         ?>

        <h2 class="mb-0"> Filter:</h2>

        <form class="postFilters" name="Filter" method="GET">
            From:
            <input type="date" name="dateFrom" min="2010-01-01" max="<?php echo date('Y-m-d'); ?>" value="<?php if (date('Y', strtotime($date_from)) < date('Y', strtotime(2010)) ) : echo "2010-01-01"; else : echo $date_from; endif; ?>" />
            <br/>
            To:
            <input type="date" name="dateTo" min="2010-01-01" max="<?php echo date('Y-m-d'); ?>" value="<?php if (date('Y', strtotime($date_to)) < date('Y', strtotime(2010)) ) : echo date('Y-m-d'); else : echo $date_to; endif; ?>" />
</br>
            <button class="searchBtn" type="submit" name="submit" value="submit"> Search </button>
        </form>
        
        <div class="text-center events-block justify-start" >
            <?php 
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                $query = new WP_Query( array(  
                    'post_type' => 'post',
                    'posts_per_page' => 9, 
                    'paged' => $paged,
                    'orderby' => 'date', 
                    'order' => 'DESC',
                ) );

                
                while ( $query->have_posts() ) : $query->the_post(); 

                if  ( (get_the_date("U") < $d->modify( '-1 year' )->format( "U" ))
                && 
                    (get_the_date("U") < date('U', date('U', strtotime($dateto))))
                    
                && 
                    (get_the_date("U") > date('U', date('U', strtotime($datefrom)))) )
                    :
               ?>
                    
                    <a class="article-tile" href="<?php echo get_permalink() ?>">
                        <?php if (get_the_post_thumbnail_url()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>"  />
                        <?php else : ?>
                            <img class="placeholder" src="/wp-content/themes/arr/src/img/global/pcs.jpeg"  />
                        <?php endif; ?>
                        <?php if (get_field('gallary')): ?> 
                            <div class="photo-counter">
                                <img src="/wp-content/themes/arr/src/img/icons/camera-solid.svg" />
                                <?php echo count(get_field('gallary')); ?> Photos
                            </div>
                        <?php endif ; ?>
                        <p class="author"> By <?php echo get_the_author_nickname() ?> <span class="date">  <?php the_date(); ?> </span> </p>
                        <p class="title"> <?php print the_title(); ?> </p>
                        <?php if (get_field('short_description')): ?>
                            <p class="short"> 
                                <?php the_field('short_description'); ?> 
                            </p>
                        <?php endif; ?>
                    </a>

                <?php endif; ?>  

            <?php endwhile; ?>
        </div>
        <div class="pagination container">
            <?php 
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $query->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => true,
                    'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous', 'text-domain' ) ),
                    'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
                    'add_args'     => false,
                    'add_fragment' => '',
                ) );
            ?>
        </div>

        <?php wp_reset_postdata(); ?>
    </div> 
</section>



<?php get_footer(); ?>