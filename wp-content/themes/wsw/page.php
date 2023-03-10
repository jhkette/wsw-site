<?php
get_header(); ?>
<main class="main-body-template">



<div class="secondary-banner"> <h1><?php echo esc_html(get_the_title()); ?></h1>
<?php echo get_the_post_thumbnail(get_the_ID(), "medium"); ?> 

</div>

        

<div class="lead subpage">
            <nav role="navigation" id="navigation" class="secondary-nav">
              <?php $the_parent = wp_get_post_parent_id(get_the_ID()); ?>
            <h4 class="page-links__title"><a href="<?php echo esc_url(
                get_permalink($theParent)
            ); ?>"><?php echo get_the_title($the_parent); ?></a></h4>
                <ul class="nav-links">
                
              
                <?php
                // get the parent page - if it is a parent will be 0 - else function will return id of parent
                $theParent = wp_get_post_parent_id(get_the_ID());
                // if statement associates $findChildrenOf with the parent, or if value is zero, ie.
                // it IS the parent we simply get the page id with get_the_id
                if ($theParent) {
                    $find_children_of = $the_parent;
                } else {
                    $find_children_of = get_the_ID();
                }
                // wordpress wp_list_pages function with an array parameter
                // no title_li stops a title appearing on the list
                // only want pages that are child of a certain page - ie
                wp_list_pages([
                    "title_li" => null,
                    "child_of" => $find_children_of,
                    "sort_column" => "menu_order",
                ]);
                ?>
                </ul>
            </nav>

        <div class="activities-container">
         
            <?php esc_html(the_content()); ?>
        <!-- if there is no parent page found ie the page is the parent -->
         <?php if (!$theParent) { ?>
           <div class="container-events">
             <!-- show childpages from shortcode - this is from custom-shortcode.php -->
            <?php echo do_shortcode("[show_childpages]"); ?>
          </div>
         
          <?php } ?>
         
          </div>
        </div>
      </main>
<?php get_footer();
?>
