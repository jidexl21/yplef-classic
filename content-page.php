<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Yplef_Classic
 * @since Yplef Classic 1.0
 */
?>
    <!-- Breadcrumb starts -->
    <section class="breadcrumb-main">
      <div class="container">
        <div class="breadcrumb-inner">
          <!-- <h2>Event Detail</h2> -->
        </div>
      </div>
      <div class="sl-overlay"></div>
    </section>
    <!-- Breadcrumb end -->

    <section class="event-detail-cn">
      <div class="container">
        <div class="ev-detail-info d-flex flex-column justify-content-center align-items-center text-center h-100">
		  <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
          <div class="ev-image">
			<?php if(has_post_thumbnail()):  yplefclassic_post_thumbnail(); else: ?>
            <img src="<?php bloginfo('template_url')?>/assets/images/inner/education-8345AGC.jpg" alt="" />
			<?php endif; ?>
          </div>
        </div>
        <div class="ev-detail-content">
		<?php edit_post_link( __( 'Edit', 'yplefclassic' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
          <div class="evt__section">
		  <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>