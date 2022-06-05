
<?php
/**

 * Template Name: Policy

 **/

get_header(); ?>

<section id="policy">
    <div class="container mt-20 pt-10"> 
    <img class="policy-logo" src="<?php echo get_field('header_logo', 'option')['url']; ?>"  />
        <h1 class="text-center"> Accrington Road Runners  <br /> <?php the_title() ?> </h1> 
        <div class="content"> 
            <?php the_content(); ?>
        </div>
    </div> 
</section>

<section id="review-info" class="container mb-10"> 

    <h3> Policy historyand review information </h3> 
    <p> This policy will be reviewed biannually </p> 
   
    <div class="table-wrapper"> 
        <table class="fixed_headers">
            <thead>
                <tr>
                <th>Action</th>
                <th>Date</th>
                <th>Meeting</th>
                <th>Review Date</th>
                <th>Secretary</th>
                </tr>
            </thead>
            <tbody>
                <?php while (have_rows('history_and_review_information')) : the_row(); ?> 
                    <tr>
                    <td><?php the_sub_field('action') ?> </td>
                    <td><?php the_sub_field('date') ?> </td>
                    <td><?php the_sub_field('meeting') ?> </td>
                    <td><?php the_sub_field('review_date') ?> </td>
                    <td class="singature"><?php the_sub_field('Secretary') ?> </td>
                    </tr>    
                <?php endwhile ?>
            </tbody>
        </table> 
    </div>
</section>


<?php 
 if(have_rows('content_sections')):
    while (have_rows('content_sections')): the_row();
        get_template_part('templates/flexible/'. get_row_layout() .'');
    endwhile;
 endif;

get_footer(); ?> 