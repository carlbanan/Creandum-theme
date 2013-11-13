<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)

// Options panel
require_once('library/options-panel.php');

// Shortcodes
require_once('library/shortcodes.php');

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

// Custom Backend Footer
add_filter('admin_footer_text', 'bones_custom_admin_footer');
function bones_custom_admin_footer() {
  echo '<span id="footer-thankyou">Developed by <a href="http://320press.com" target="_blank">320press</a></span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.';
} 

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');

// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 *
 * @return string Filtered title.
 *
 * @note may be called from http://example.com/wp-activate.php?key=xxx where the plugins are not loaded.
 */
function bones_filter_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() ) {
    return $title;
  }

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title = "$title $sep $site_description";
  }

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) {
    $title = "$title $sep " . sprintf( __( 'Page %s', 'bonestheme' ), max( $paged, $page ) );
  }

  return $title;
}
add_filter( 'wp_title', 'bones_filter_title', 10, 2 );


/************* THUMBNAIL SIZE OPTIONS *************/
add_theme_support( 'post-thumbnails' );
// Thumbnail sizes
add_image_size( 'wpbs-featured', 300, 300, true );
add_image_size( 'wpbs-featured-home', 970, 311, true);
add_image_size( 'wpbs-featured-carousel', 970, 400, true);
add_image_size( 'wpbs-featured-network', 303, 227, true);



add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup() {
  add_image_size( 'thumbnal-size', 303, 227, true);
}


/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
      'id' => 'sidebar1',
      'name' => 'Main Sidebar',
      'description' => 'Used on every page BUT the homepage page template.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',

    ));
    
    register_sidebar(array(
      'id' => 'sidebar2',
      'name' => 'Homepage Sidebar',
      'description' => 'Used only on the homepage page template.',
      'before_widget' => '<div id="%1$s" class="widget  %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
      'id' => 'footer1',
      'name' => 'Footer 1',
      'before_widget' => '<div id="%1$s" class="widget col-md-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer2',
      'name' => 'Footer 2',
      'before_widget' => '<div id="%1$s" class="widget col-md-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer3',
      'name' => 'Footer 3',
      'before_widget' => '<div id="%1$s" class="widget col-md-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    
    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
    
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?>>
    <article id="comment-<?php comment_ID(); ?>" class="clearfix">
      <div class="comment-author vcard row-fluid clearfix">
        <div class="avatar span3">
          <?php echo get_avatar( $comment, $size='75' ); ?>
        </div>
        <div class="span9 comment-text">
          <?php printf('<h4>%s</h4>', get_comment_author_link()) ?>
          <?php edit_comment_link(__('Edit','bonestheme'),'<span class="edit-comment btn btn-small btn-info"><i class="icon-white icon-pencil"></i>','</span>') ?>
                    
                    <?php if ($comment->comment_approved == '0') : ?>
                 <div class="alert-message success">
                  <p><?php _e('Your comment is awaiting moderation.','bonestheme') ?></p>
                  </div>
          <?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
                    
          <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
      </div>
    </article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;<?php comment_author_link(); ?>
<?php 

}

// Only display comments in comment count (which isn't currently displayed in wp-bootstrap, but i'm putting this in now so i don't forget to later)
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
  if ( ! is_admin() ) {
    global $id;
      $comments_by_type = separate_comments(get_comments('status=approve&post_id=' . $id));
      return count($comments_by_type['comment']);
  } else {
      return $count;
  }
}

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch( $form ) {
  $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
   
      <div class="input-group">
  <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the Site..." />
     <span class="input-group-btn">
  <button type="submit" id="searchsubmit" class="btn btn-default" value="'. esc_attr__('Search','bonestheme') .'">Submit</button>
  </span>
    </div>
  </form>';
  return $form;
} // don't remove this bracket!

/****************** password protected post form *****/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
  global $post;
  $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
  $o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
  ' . '<p>' . __( "This post is password protected. To view it please enter your password below:" ,'bonestheme') . '</p>' . '
  <label for="' . $label . '">' . __( "Password:" ,'bonestheme') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__( "Submit",'bonestheme' ) . '" /></div>
  </form></div>
  ';
  return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
  $args['number'] = 20; // show less tags
  $args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
  $args['smallest'] = 9.75;
  $args['unit'] = 'px';
  return $args;
}

// filter tag cloud output so that it can be styled by CSS
function add_tag_class( $taglinks ) {
    $tags = explode('</a>', $taglinks);
    $regex = "#(.*tag-link[-])(.*)(' title.*)#e";
    $term_slug = "(get_tag($2) ? get_tag($2)->slug : get_category($2)->slug)";

        foreach( $tags as $tag ) {
          $tagn[] = preg_replace($regex, "('$1$2 label tag-'.$term_slug.'$3')", $tag );
        }

    $taglinks = implode('</a>', $tagn);

    return $taglinks;
}

add_action( 'wp_tag_cloud', 'add_tag_class' );

add_filter( 'wp_tag_cloud','wp_tag_cloud_filter', 10, 2) ;

function wp_tag_cloud_filter( $return, $args )
{
  return '<div id="tag-cloud">' . $return . '</div>';
}

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Disable jump in 'read more' link
function remove_more_jump_link( $link ) {
  $offset = strpos($link, '#more-');
  if ( $offset ) {
    $end = strpos( $link, '"',$offset );
  }
  if ( $end ) {
    $link = substr_replace( $link, '', $offset, $end-$offset );
  }
  return $link;
}
add_filter( 'the_content_more_link', 'remove_more_jump_link' );

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Add the Meta Box to the homepage template
function add_homepage_meta_box() {  
  global $post;

  // Only add homepage meta box if template being used is the homepage template
  // $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : "");
  $post_id = $post->ID;
  $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

  if ( $template_file == 'page-homepage.php' ){
      add_meta_box(  
          'homepage_meta_box', // $id  
          'Optional Homepage Tagline', // $title  
          'show_homepage_meta_box', // $callback  
          'page', // $page  
          'normal', // $context  
          'high'); // $priority  
    }
}

add_action( 'add_meta_boxes', 'add_homepage_meta_box' );

// Field Array  
$prefix = 'custom_';  
$custom_meta_fields = array(  
    array(  
        'label'=> 'Homepage tagline area',  
        'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  
        'id'    => $prefix.'tagline',  
        'type'  => 'textarea' 
    )  
);  

// The Homepage Meta Box Callback  
function show_homepage_meta_box() {  
  global $custom_meta_fields, $post;

  // Use nonce for verification
  wp_nonce_field( basename( __FILE__ ), 'wpbs_nonce' );
    
  // Begin the field table and loop
  echo '<table class="form-table">';

  foreach ( $custom_meta_fields as $field ) {
      // get value of this field if it exists for this post  
      $meta = get_post_meta($post->ID, $field['id'], true);  
      // begin a table row with  
      echo '<tr> 
              <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
              <td>';  
              switch($field['type']) {  
                  // text  
                  case 'text':  
                      echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;
                  
                  // textarea  
                  case 'textarea':  
                      echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;  
              } //end switch  
      echo '</td></tr>';  
  } // end foreach  
  echo '</table>'; // end table  
}  

// Save the Data  
function save_homepage_meta( $post_id ) {  

    global $custom_meta_fields;  
  
    // verify nonce  
    if ( !isset( $_POST['wpbs_nonce'] ) || !wp_verify_nonce($_POST['wpbs_nonce'], basename(__FILE__)) )  
        return $post_id;

    // check autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    // check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
    }
  
    // loop through fields and save the data  
    foreach ( $custom_meta_fields as $field ) {
        $old = get_post_meta( $post_id, $field['id'], true );
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta( $post_id, $field['id'], $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, $field['id'], $old );
        }
    } // end foreach
}
add_action( 'save_post', 'save_homepage_meta' );

// Add thumbnail class to thumbnail links
function add_class_attachment_link( $html ) {
    $postid = get_the_ID();
    $html = str_replace( '<a','<a class="thumbnail"',$html );
    return $html;
}
add_filter( 'wp_get_attachment_link', 'add_class_attachment_link', 10, 1 );

// Add lead class to first paragraph
function first_paragraph( $content ){
    global $post;

    // if we're on the homepage, don't add the lead class to the first paragraph of text
    if( is_page_template( 'page-homepage.php' ) )
        return $content;
    else
        return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter( 'the_content', 'first_paragraph' );

// Menu output mods
/* Bootstrap_Walker for Wordpress 
     * Author: George Huger, Illuminati Karate, Inc 
     * More Info: http://illuminatikarate.com/blog/bootstrap-walker-for-wordpress 
     * 
     * Formats a Wordpress menu to be used as a Bootstrap dropdown menu (http://getbootstrap.com). 
     * 
     * Specifically, it makes these changes to the normal Wordpress menu output to support Bootstrap: 
     * 
     *        - adds a 'dropdown' class to level-0 <li>'s which contain a dropdown 
     *         - adds a 'dropdown-submenu' class to level-1 <li>'s which contain a dropdown 
     *         - adds the 'dropdown-menu' class to level-1 and level-2 <ul>'s 
     * 
     * Supports menus up to 3 levels deep. 
     *  
     */ 
    class Bootstrap_Walker extends Walker_Nav_Menu 
    {     
 
        /* Start of the <ul> 
         * 
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".  
         *                   So basically add one to what you'd expect it to be 
         */         
        function start_lvl(&$output, $depth) 
        {
            $tabs = str_repeat("\t", $depth); 
            // If we are about to start the first submenu, we need to give it a dropdown-menu class 
            if ($depth == 0 || $depth == 1) { //really, level-1 or level-2, because $depth is misleading here (see note above) 
                $output .= "\n{$tabs}<ul class=\"dropdown-menu\">\n"; 
            } else { 
                $output .= "\n{$tabs}<ul>\n"; 
            } 
            return;
        } 
 
        /* End of the <ul> 
         * 
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".  
         *                   So basically add one to what you'd expect it to be 
         */         
        function end_lvl(&$output, $depth)  
        {
            if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!) 
 
                // we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now 
                $output .= '<!--.dropdown-->'; 
            } 
            $tabs = str_repeat("\t", $depth); 
            $output .= "\n{$tabs}</ul>\n"; 
            return; 
        }
 
        /* Output the <li> and the containing <a> 
         * Note: $depth is "correct" at this level 
         */         
        function start_el(&$output, $item, $depth, $args)  
        {    
            global $wp_query; 
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : ''; 
            $class_names = $value = ''; 
            $classes = empty( $item->classes ) ? array() : (array) $item->classes; 
 
            /* If this item has a dropdown menu, add the 'dropdown' class for Bootstrap */ 
            if ($item->hasChildren) { 
                $classes[] = 'dropdown'; 
                // level-1 menus also need the 'dropdown-submenu' class 
                if($depth == 1) { 
                    $classes[] = 'dropdown-submenu'; 
                } 
            } 
 
            /* This is the stock Wordpress code that builds the <li> with all of its attributes */ 
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ); 
            $class_names = ' class="' . esc_attr( $class_names ) . '"'; 
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';             
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : ''; 
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : ''; 
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : ''; 
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
            $item_output = $args->before; 
 
            /* If this item has a dropdown menu, make clicking on this link toggle it */ 
            if ($item->hasChildren && $depth == 0) { 
                $item_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="dropdown">'; 
            } else { 
                $item_output .= '<a'. $attributes .'>'; 
            } 
 
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after; 
 
            /* Output the actual caret for the user to click on to toggle the menu */             
            if ($item->hasChildren && $depth == 0) { 
                $item_output .= '<b class="caret"></b></a>'; 
            } else { 
                $item_output .= '</a>'; 
            } 
 
            $item_output .= $args->after; 
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ); 
            return; 
        }
 
        /* Close the <li> 
         * Note: the <a> is already closed 
         * Note 2: $depth is "correct" at this level 
         */         
        function end_el (&$output, $item, $depth, $args)
        {
            $output .= '</li>'; 
            return;
        } 
 
        /* Add a 'hasChildren' property to the item 
         * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633  
         */ 
        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) 
        { 
            // check whether this item has children, and set $item->hasChildren accordingly 
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]); 
 
            // continue with normal behavior 
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); 
        }         
    } 
add_editor_style('editor-style.css');

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
  if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
  }
  
  return $classes;
}

// enqueue styles
if( !function_exists("theme_styles") ) {  
    function theme_styles() { 
        // This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
        wp_register_style( 'bootstrap', get_template_directory_uri() . '/library/css/bootstrap.css', array(), '1.0', 'all' );
        
        wp_register_style( 'bootstrap-theme', get_template_directory_uri() . '/library/css/bootstrap-theme.css', array(), '1.0', 'all' );
        wp_register_style( 'wp-bootstrap', get_stylesheet_uri(), array(), '1.0', 'all' );
    
        wp_register_style( 'creandum-theme', get_template_directory_uri() . '/library/css/creandum-custom.css', array(), '1.0', 'all' );       

        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'bootstrap-theme' );
        wp_enqueue_style( 'wp-bootstrap');
        wp_enqueue_style( 'creandum-theme');       
    }
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

// enqueue javascript
if( !function_exists( "theme_js" ) ) {  
  function theme_js(){
  
    wp_register_script( 'bootstrap', 
      get_template_directory_uri() . '/library/js/bootstrap.min.js', 
      array('jquery'), 
      '1.2' );


    wp_register_script( 'wpbs-scripts', 
      get_template_directory_uri() . '/library/js/scripts.js', 
      array('jquery'), 
      '1.2' );
  
    wp_register_script(  'modernizr', 
      get_template_directory_uri() . '/library/js/modernizr.full.min.js', 
      array('jquery'), 
      '1.2' );

    wp_register_script(  'history', 
      get_template_directory_uri() . '/library/js/history.js', 
      array('jquery'), 
      '1.2' );

    wp_register_script(  'picker', 
      get_template_directory_uri() . '/library/js/picker.js', 
      array('jquery'), 
      '1.2' );

    wp_enqueue_script('picker');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('history');
    wp_enqueue_script('wpbs-scripts');
    wp_enqueue_script('modernizr');
    

  }
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

// Get theme options
function get_wpbs_theme_options(){
  $theme_options_styles = '';
    
} // end get_wpbs_theme_options function


add_filter('show_admin_bar', '__return_false');

// Create TEAM POST
function create_network_post() {
    $labels = array(
        'name'               => _x( 'network', 'post type general name' ),
        'singular_name'      => _x( 'Network', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'network' ),
        'add_new_item'       => __( 'Add New Network post' ),
        'edit_item'          => __( 'Edit Network post' ),
        'new_item'           => __( 'New Network post' ),
        'all_items'          => __( 'All Network posts' ),
        'view_item'          => __( 'View Network post' ),
        'search_items'       => __( 'Search Network post' ),
        'not_found'          => __( 'No Network posts found' ),
        'not_found_in_trash' => __( 'No Network posts found in the Trash' ), 
        'parent_item_colon'  => '',
        'menu_name'          => 'Network'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Network posts and Network posts specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'post-formats' ),
        'has_archive'   => 'network'
    );
    register_post_type( 'network', $args ); 

}
add_action( 'init', 'create_network_post' );

function create_team_post() {
    $labels = array(
        'name'               => _x( 'Team members', 'post type general name' ),
        'singular_name'      => _x( 'Team member', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'book' ),
        'add_new_item'       => __( 'Add New Team member' ),
        'edit_item'          => __( 'Edit Team member' ),
        'new_item'           => __( 'New Team member' ),
        'all_items'          => __( 'All Team members' ),
        'view_item'          => __( 'View Team member' ),
        'search_items'       => __( 'Search Team member' ),
        'not_found'          => __( 'No Team member found' ),
        'not_found_in_trash' => __( 'No Team member found in the Trash' ), 
        'parent_item_colon'  => '',
        'menu_name'          => 'Team'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our team and team member specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'has_archive'   => true,
    );
    register_post_type( 'team', $args ); 
   
}
add_action( 'init', 'create_team_post' );



$prefix = 'custom_';  
global $team_custom_meta_fields;
$team_custom_meta_fields = array(  
    array(  
        'label'=> 'Titel',  
        'desc'  => 'e.g General partner',  
        'id'    => $prefix.'title',  
        'type'  => 'text'  
    ),
    array(  
        'label'=> 'Twitter username',  
        'desc'  => 'e.g creandum',  
        'id'    => $prefix.'twitter',  
        'type'  => 'text'  
    ),
    array(  
        'label'=> 'Tel.nr',  
        'desc'  => '0707 555 123',  
        'id'    => $prefix.'tel',  
        'type'  => 'text'  
    ),
    array(  
        'label'=> 'E-mail',  
        'desc'  => '',  
        'id'    => $prefix.'email',  
        'type'  => 'text'  
    ),
    array(  
        'label'=> 'LinkedIn ur',  
        'desc'  => 'http://se.linkedin.com/pub/pontus-wiehager/22/124/861',  
        'id'    => $prefix.'linkedin',  
        'type'  => 'text'  
    ),
    array(  
        'label'=> 'Porträttbild',  
        'desc'  => ' ( 1 : 1 ) visas i listläge ( minst 120px bred )',  
        'id'    => $prefix.'portrait_image',  
        'type'  => 'image'
    ),
    array(  
        'label'=> 'Stor bild',  
        'desc'  => 'Visas full-screen (minst 1280px bred)',  
        'id'    => $prefix.'bigprofile_image',  
        'type'  => 'image' 
    )

);  
add_action( 'add_meta_boxes', 'team_meta_box' );
function team_meta_box() {
     add_meta_box( 
        'team_social_box',
        __( 'Meta', 'myplugin_textdomain' ),
        'add_custom_meta_box',
        'team',
        'normal',
        'default'
    );

}

function create_investment_post() {
    $labels = array(
        'name'               => _x( 'Investments', 'post type general name' ),
        'singular_name'      => _x( 'Investment', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'book' ),
        'add_new_item'       => __( 'Add New Investment' ),
        'edit_item'          => __( 'Edit Investment' ),
        'new_item'           => __( 'New Investment' ),
        'all_items'          => __( 'All Investments' ),
        'view_item'          => __( 'View Investment' ),
        'search_items'       => __( 'Search Investment' ),
        'not_found'          => __( 'No Investment found' ),
        'not_found_in_trash' => __( 'No Investment found in the Trash' ), 
        'parent_item_colon'  => '',
        'menu_name'          => 'Investments'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our Investments and investment specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'has_archive'   => true,
    );
    register_post_type( 'investment', $args ); 
    add_action( 'add_meta_boxes', 'investment_social_box' );

    add_action( 'admin_enqueue_scripts', 'my_admin_enqueue_scripts' );

}
add_action( 'init', 'create_investment_post' );


function my_taxonomies_investment() {
    $labels = array(
        'name'              => _x( 'Investment types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Investment type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Investment types' ),
        'all_items'         => __( 'All Investment types' ),
        'parent_item'       => __( 'Parent Investment types' ),
        'parent_item_colon' => __( 'Parent Investment types:' ),
        'edit_item'         => __( 'Edit Investment types' ), 
        'update_item'       => __( 'Update Investment types' ),
        'add_new_item'      => __( 'Add New Investment types' ),
        'new_item_name'     => __( 'New Investment types' ),
        'menu_name'         => __( 'Investment types' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'investment_category', 'investment', $args );

}
add_action( 'init', 'my_taxonomies_investment', 0 );







/* EXAMPLE 

 $custom_meta_fields = array(  
array(  
    'label'=> 'Twitter URL',  
    'desc'  => 'https://twitter.com/creandum',  
    'id'    => $prefix.'text',  
    'type'  => 'text'  
),
array(  
    'label'=> 'Facebook-page URL',  
    'desc'  => 'http://www.facebook.com/creandum',  
    'id'    => $prefix.'text',  
    'type'  => 'text'  
)
,  
array(  
    'label'=> 'Textarea',  
    'desc'  => 'A description for the field.',  
    'id'    => $prefix.'textarea',  
    'type'  => 'textarea'  
)
,  
array(  
    'label'=> 'Checkbox Input',  
    'desc'  => 'A description for the field.',  
    'id'    => $prefix.'checkbox',  
    'type'  => 'checkbox'  
),  
array(  
    'label'=> 'Select Box',  
    'desc'  => 'A description for the field.',  
    'id'    => $prefix.'select',  
    'type'  => 'select',  
    'options' => array (  
        'one' => array (  
            'label' => 'Option One',  
            'value' => 'one'  
        ),  
        'two' => array (  
            'label' => 'Option Two',  
            'value' => 'two'  
        ),  
        'three' => array (  
            'label' => 'Option Three',  
            'value' => 'three'  
        )  
    )  
)  */


$prefix = 'custom_';  
global $investment_custom_meta_fields;
$investment_custom_meta_fields = array(  
    array(  
        'label'=> 'Twitter URL',  
        'desc'  => 'https://twitter.com/creandum',  
        'id'    => $prefix.'twitter',  
        'type'  => 'text'  
    ),
    array(  
        'label'=> 'Facebook-page URL',  
        'desc'  => 'http://www.facebook.com/creandum',  
        'id'    => $prefix.'fb',  
        'type'  => 'text'  
    ),
    array(  
        'label'=> 'Stor bild',  
        'desc'  => 'Visas full-screen (minst 1280px bred)',  
        'id'    => $prefix.'big_image',  
        'type'  => 'image' 
    ),
    array(  
        'label'=> 'Logotyp',  
        'desc'  => ' ( 1 : 1 ) visas i listläge ( minst 120px bred )',  
        'id'    => $prefix.'logo_image',  
        'type'  => 'image'
    ) 
); 

function investment_social_box() {

    add_meta_box( 
        'investment_social_box',
        __( 'Social', 'myplugin_textdomain' ),
        'add_custom_meta_box',
        'investment',
        'normal',
        'default'
    );
}

function add_custom_meta_box() {  
    global  $post, $team_custom_meta_fields,$investment_custom_meta_fields;  

    $custom_meta_fields_name = $post->post_type."_custom_meta_fields";
    $custom_meta_fields = $$custom_meta_fields_name;

    // Use nonce for verification  
    echo '<input type="hidden" name="add_custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
          
    // Begin the field table and loop  
    echo '<table class="form-table">';  
    foreach ($custom_meta_fields as $field) {  
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);  
        // begin a table row with  
        echo '<tr> 
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
                <td>';  
                switch($field['type']) {  
                    // text  
                    case 'text':  
                        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> 
                            <br /><span class="description">'.$field['desc'].'</span>';  
                    break;  

                    // textarea  
                    case 'textarea':  
                        echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
                            <br /><span class="description">'.$field['desc'].'</span>';  
                    break; 

                    // checkbox  
                    case 'checkbox':  
                        echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/> 
                            <label for="'.$field['id'].'">'.$field['desc'].'</label>';  
                    break;

                    // select  
                    case 'select':  
                        echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';  
                        foreach ($field['options'] as $option) {  
                            echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
                        }  
                        echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
                    break; 

                    // image
                    case 'image':  
                         echo '<label for="'.$field['id'].'">'.$option['label'].'</label>
                            <input id="'.$field['id'].'" type="text" size="36" name="'.$field['id'].'" value="'.$meta.'" />
                            <input class="upload_image_button upload_image_button_custom" imageid="'.$field['id'].'" type="button" value="Välj bild" />
                            <input type="button" imageid="'.$field['id'].'" class="remove_field remove_field_custom" value="Ta bort"/>
                            <div class="img_preview" id="preview_'.$field['id'].'" style="background-image:url('.$meta.');"></div>
                            <span class="description">'.$field['desc'].'</span>';  
                   break; 

                } //end switch  
        echo '</td></tr>';  
    } // end foreach  
    echo '</table>'; // end table  
}  
// JAVASCRIPT FOR IMAGE UPLOAD
function my_admin_enqueue_scripts( ) {

    wp_register_script(  'admin', 
      get_template_directory_uri() . '/library/js/admin.js', 
      array('jquery'), 
      '1.3' );
    wp_enqueue_script('admin');
}
// ADMIN CSS
function custom_colors() {
  global $user_level;

     echo '<style type="text/css">
          .img_preview{
            width:180px;
            height:180px;
            border:1px dashed #ccc;
            padding:5px;
            border-radius: 3px;
            background-size: auto 180px;
            background-position:center center;
            background-repeat: no-repeat;
            margin:2px 1px;
          }
     </style>';

}
add_action('admin_head', 'custom_colors');


// Save the Data  
function save_custom_meta_box($post_id) {  
    global  $post, $team_custom_meta_fields,$investment_custom_meta_fields;  

    $custom_meta_fields_name = $post->post_type."_custom_meta_fields";
    $custom_meta_fields = $$custom_meta_fields_name;

    // verify nonce  
    if (!wp_verify_nonce($_POST['add_custom_meta_box_nonce'], basename(__FILE__)))   
        return $post_id;  
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;  
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
      
    // loop through fields and save the data  
    foreach ($custom_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_custom_meta_box');    


function my_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'teammember_to_investments',
        'from' => 'team',
        'to' => 'investment'
    ) );
    p2p_register_connection_type( array(
        'name' => 'posts_to_investments',
        'from' => 'post',
        'to' => 'investment'
    ) );
    p2p_register_connection_type( array(
        'name' => 'posts_to_team',
        'from' => 'post',
        'to' => 'team',
        'cardinality' => 'many-to-one'
    ) );
    p2p_register_connection_type( array(
        'name' => 'page_to_page',
        'from' => 'page',
        'to' => 'page',
        'cardinality' => 'one-to-one'
    ) );
}
add_action( 'p2p_init', 'my_connection_types' );


function edit_admin_menus() {  
    global $menu;  
      
    $menu[5][0] = 'Blog posts'; // Change Posts to Recipes  
}  
add_action( 'admin_menu', 'edit_admin_menus' );  



add_action('admin_menu', 'add_settings_menu');
function add_settings_menu(){
     add_menu_page('My Plugin Options', 'Newsfeed', 'manage_options', 'my-unique-identifier', 'newsfeed_settings','',30);

}


/* FOOTER FUNCTIONS */
function newsfeed_settings(){
   if (!current_user_can('manage_options')) {  
      wp_die('You do not have sufficient permissions to access this page.');  
   }
   else{ 
    if (isset($_POST["update_settings"])) {   /******** UPDATE VALUES  *********/ 

      $color = esc_attr($_POST["color"]);     
      update_option("content_color", $color); 

      $bgcol = esc_attr($_POST["bgcol"]);     
      update_option("content_bgcolor", $bgcol);       

    }
    else{                   

      /* GET CURRENT SETTINGS */
      $color  = get_option("content_color");

      /* GET CURRENT SETTINGS */
      $bgcol  = get_option("content_bgcolor");      

    }
    if(!$color){
      $color = "#FFFFFF";
    }
    if(!$bgcol){
      $bgcol = "#F1F1F1";
    }   
    ?>
 
      <div class="wrap">  
          <?php screen_icon('themes'); ?> <h2> Newsfeed</h2>  
        <div style='padding:20px 10px;'>
      <form method="POST" action=""> 

        <h3>Content colors</h3>
        <table class="form-table">  
                <tr valign="top">  
                    <th scope="row">  
                        <label for="num_elements">  
                           Produkt-bilds-bakgrundsfärg:<br/><span class='description'>Synligt på transparenta bilder</span>
                        </label>   
                    </th>  
                    <td>  
                        <input type="text" name="color" id='color' size="25" value='<?php echo $color; ?>'/> 
                         <div id="ilctabscolorpicker" class='colorpicker'></div> 
                    </td>  
                </tr>
                <tr valign="top">  
                    <th scope="row">  
                        <label for="num_elements">  
                           Bakgrundsfärg :
                        </label>   
                    </th>  
                    <td>  
                        <input type="text" name="bgcol" id='bg_color' size="25" value='<?php echo $bgcol; ?>'/> 
                         <div id="bg_ilctabscolorpicker" class='colorpicker'></div> 
                    </td>   
                </tr>                 
        </table>   

    <table class="form-table">  
        <tr>
          <td>  
          <p> 
            <input type="hidden" name="update_settings" value="Y" />  
              <input type="submit" value="Save settings" class="button-primary"/>  
          </p>
          </td>
        </tr>
    </table>
      </form>           
     </div>
     </div>
  <?php
    }   

}

/* CREANDUM CUSTOM SLIDESHOW */


register_post_type('slideshows', array(
    'label' => 'Slideshows',
    'show_ui' => true,
    'supports' => array('title'),
    'labels' => array (
        'name' => 'Slideshows',
        'singular_name' => 'Slideshow',
        'menu_name' => 'Slideshows'
    ),
) );


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$plugin = "simple-fields/simple_fields.php";
if(is_plugin_active($plugin)){
  simple_fields_register_field_group('slideshow_images',
      array (
          'name' => 'Slideshow images',
          'description' => 'Add images to your slideshow here',
          'repeatable' => 1,
          'fields' => array(
              array('name' => 'Slideshow image',
                  'slug' => 'slideshow_image',
                  'description' => 'Select image',
                  'type' => 'file'
              ),
              array('name' => 'Slide text line 1',
                  'slug' => 'slideshow_text',
                  'description' => 'Max 250 chars',
                  'type' => 'textarea'
              ),
              array('name' => 'Slide text line 2',
                  'slug' => 'slideshow_text2',
                  'description' => 'Max 100 chars',
                  'type' => 'text'
              ),
              array('name' => 'Slide text line 3',
                  'slug' => 'slideshow_text3',
                  'description' => 'Max 100 chars',
                  'type' => 'text'
              )
          )
      )
  );
  simple_fields_register_post_connector('slideshow_images_connector',
      array (
          'name' => "Slideshow images connector",
          'field_groups' => array(
              array('name' => 'Slideshow images',
                  'key' => 'slideshow_images',
                  'context' => 'normal',
                  'priority' => 'high')
          ),
          'post_types' => array('slideshows'),
          'hide_editor' => 1
      )
  );
  simple_fields_register_post_type_default('slideshow_images_connector', 'slideshows');

  simple_fields_register_field_group('slideshow_page_options',
      array (
          'name' => 'Slideshow options',
          'fields' => array(
              array('name' => 'Slideshow display',
                  'slug' => 'slideshow_page_display',
                  'description' => 'Choose a slideshow to display on this page',
                  'type' => 'post',
                  'type_post_options' => array("enabled_post_types" => array("slideshows"))
              )
          )
      )
  );
   
  simple_fields_register_post_connector('slideshow_page_connector',
      array (
          'name' => "Slideshow page connector",
          'field_groups' => array(
              array('name' => 'Slideshow options',
                  'key' => 'slideshow_page_options',
                  'context' => 'normal',
                  'priority' => 'high')
          ),
          'post_types' => array('page')
      )
  );
   
  simple_fields_register_post_type_default('slideshow_page_connector', 'page');
  simple_fields_register_field_group('slideshow_page_options',
      array (
          'name' => 'Slideshow options',
          'fields' => array(
              array('name' => 'Slideshow display',
                  'slug' => 'slideshow_page_display',
                  'description' => 'Choose a slideshow to display on this page',
                  'type' => 'post',
                  'type_post_options' => array("enabled_post_types" => array("slideshows"))
              )
          )
      )
  );
   
  simple_fields_register_post_connector('slideshow_page_connector',
      array (
          'name' => "Slideshow page connector",
          'field_groups' => array(
              array('name' => 'Slideshow options',
                  'key' => 'slideshow_page_options',
                  'context' => 'normal',
                  'priority' => 'high')
          ),
          'post_types' => array('page')
      )
  );
   
  simple_fields_register_post_type_default('slideshow_page_connector', 'page');
  function page_has_slider($theID) {
      $slider_id = simple_fields_get_post_value($theID, "Slideshow display", true);
      return ($slider_id) ? $slider_id : false;
  }
   

  function wp_get_attachment( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
      'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
      'caption' => $attachment->post_excerpt,
      'description' => $attachment->post_content,
      'href' => get_permalink( $attachment->ID ),
      'src' => $attachment->guid,
      'title' => $attachment->post_title
    );
  }

  function get_slider_images($slider) {
      if (empty($slider)) {
          return false;
      } else {
          if (is_numeric($slider)) {
              $post_key = "p";
          } else {
              $post_key = "post_name";
          }
          $slides = array();
          $slide_query = new WP_Query(array( "post_type" => "slideshows", $post_key => $slider));
          if ($slide_query->have_posts()) : while ( $slide_query->have_posts() ) : $slide_query->the_post();

              $img_attachments = simple_fields_get_post_group_values(get_the_ID(), "Slideshow images", true, 2);
              
              foreach($img_attachments as $image) {
                  $slidedata = $image;
                  $slidedata['img'] = wp_get_attachment($image["Slideshow image"]);
                  array_push($slides,$slidedata);

              }
          endwhile; endif; wp_reset_query();
          return (!empty($slides)) ? $slides : false;
      }
  }
} 

// END IS SIMPLE FIELDS ACTIVE
/*
 * ========================================================================
 *  Shortcodes
 * ========================================================================
 */

?>