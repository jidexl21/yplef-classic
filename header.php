<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  
<!--  Sun, 09 Feb 2025 05:10:11 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>LEF - Online Education Template</title>
    <?php wp_head(); ?>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory') ?>/assets/images/cropped-LEF_favicon-192x192.png" />
    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('template_directory') ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--Custom CSS-->
    <link href="<?php bloginfo('template_directory') ?>/css/style.css" rel="stylesheet" type="text/css" />
    <!--Plugin CSS-->
    <link href="<?php bloginfo('template_directory') ?>/css/plugin.css" rel="stylesheet" type="text/css" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />

  </head>
  <body <?php body_class(); ?>>
  <?php
    $args = array(
				'theme_location' => 'menu-1',
        'menu_id'        => 'responsive-menu',
				'depth'      => 2,
				'container'  => false,
				'menu_class'     => 'nav navbar-nav',
				'walker'     => new Bootstrap_Walker_Nav_Menu()
		);	
    $args2 = array(
      'theme_location' => 'menu-3',
      'menu_id'        => 'availability-tabs',
      'depth'      => 2,
      'container'  => false,
      'menu_class'     => 'navbar-nav ms-auto mb-2 mb-md-0',
      'walker'     => new Bootstrap_Walker_Nav_Menu()
  );			
  $contact_phone =  get_theme_mod('contact_phone');
  $top_section = (object) get_theme_mod('yplef_page_top');

	?>
    <!-- Preloader -->
    <div id="preloader">
      <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

    <!-- header starts -->
    <header class="main_header_area">
      <?php if ($top_section->display_section): ?>
      <div class="topbar-wrap">
        <div class="container">
          <div class="top-info d-flex justify-content-between align-items-center">
            <ul class="t-address">
              <li><i class="fas fa-phone-alt"></i><?php echo $top_section->contact_phone?></li>
              <li><i class="far fa-envelope"></i> <a href="mailto:<?php echo $top_section->contact_email?>"><?php echo $top_section->contact_email?></a></li>
              <li><i class="fas fa-map-marker-alt"></i> <?php echo $top_section->contact_address?> </li>
            </ul>
            <ul class="t-social">
              <?php if (@$top_section->facebook_link) : ?> <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>  <?php endif ;?>
              <?php if (@$top_section->finstagram_link) : ?> <li> <a href="#"><i class="fab fa-instagram"></i></a> </li> <?php endif ;?>
              <?php if (@$top_section->twitter_link) : ?> <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>   <?php endif; ?>
              <li>
                <span class="ct-search-link"
                  ><a href="#"><i class="fa fa-search"></i></a
                ></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- Navigation Bar -->
      <div class="header_menu">
        <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-flex d-flex align-items-center justify-content-between w-100">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <a class="navbar-brand text-center" href="<?php bloginfo('url')?>">
                  <img src="<?php yplefclassic_the_custom_logo_src(); ?>" alt="image" />
                </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="navbar-collapse1 w-100" id="bs-example-navbar-collapse-1">
              <?php if (has_nav_menu('menu-1')) : wp_nav_menu($args); else: ?>
                <ul class="nav navbar-nav" id="responsive-menu">
                  <li class="dropdown submenu active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                      >Home <i class="fas fa-chevron-down"></i
                    ></a>
                    <ul class="dropdown-menu">
                      <li><a href="index-2.html">Homepage 1</a></li>
                      <li><a href="index-3.html">Homepage 2</a></li>
                      <li><a href="index-4.html">Homepage 3</a></li>
                    </ul>
                  </li>
                  <li><a href="about.html">About Us</a></li>
                  <li class="dropdown submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                      >Courses <i class="fas fa-chevron-down"></i
                    ></a>
                    <ul class="dropdown-menu">
                      <li><a href="course-1.html">Course List 1</a></li>
                      <li><a href="course-2.html">Course List 2</a></li>
                      <li><a href="course-detail.html">Course Detail</a></li>
                    </ul>
                  </li>
                  <li class="dropdown submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                      >Events <i class="fas fa-chevron-down"></i
                    ></a>
                    <ul class="dropdown-menu">
                      <li><a href="event.html">Event List</a></li>
                      <li><a href="event-detail.html">Event Detail</a></li>
                    </ul>
                  </li>
                  <li class="dropdown submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                      >Pages <i class="fas fa-chevron-down"></i
                    ></a>
                    <ul class="dropdown-menu">
                      <li><a href="gallery.html">Gallery</a></li>
                      <li><a href="instructors.html">Instructors</a></li>
                      <li><a href="pricing.html">Course Pricing</a></li>
                      <li><a href="testimonial.html">Testimonials</a></li>
                      <li><a href="faq.html">FAQ</a></li>
                      <li><a href="search.html">Search Result</a></li>
                      <li><a href="404.html">404 Error</a></li>
                      <li><a href="comming.html">Comming Soon</a></li>
                    </ul>
                  </li>
                  <li class="dropdown submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                      >Blog <i class="fas fa-chevron-down"></i
                    ></a>
                    <ul class="dropdown-menu">
                      <li><a href="blog-list.html">Blog Listing</a></li>
                      <li><a href="blog-detail.html">Blog Detail</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
              <?php endif; ?>
              </div>
              <!-- /.navbar-collapse -->
              <div id="slicknav-mobile"></div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </nav>
      </div>
      <!-- Navigation Bar Ends -->
    </header>
    <!-- header ends -->