<?php 
/*
 * functions
 * semplice.child.theme
 */
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; 
    $bootstrap = 'bootstrap';
      
    if ( is_home() || is_singular('post') || is_category()) {
      // blog page
      wp_enqueue_style( $bootstrap, get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css' );

      wp_enqueue_style( 'child-style',
          get_stylesheet_directory_uri() . '/style.css',
          array( $bootstrap ),
          wp_get_theme()->get('Version')
      );

      //bootstrap script
      wp_enqueue_script( 'bootstrapjs', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
      //ajax script
      wp_enqueue_script('scriptjs',get_stylesheet_directory_uri() . '/script.js', array('jquery'),null,true);
    } else {
      //everything else
      wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    }   
    
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



function process_email_form_data() {
  global $wpdb;

  // form processing code here
  if (isset($_POST['email']))
  {
      $email = $_POST['email'];
      

      $table_name = $wpdb->prefix . "subscriber_email"; 
      $charset_collate = $wpdb->get_charset_collate();

      $sql = "CREATE TABLE $table_name (
        email varchar(100) NOT NULL UNIQUE,
        PRIMARY KEY  (email)
      ) $charset_collate;";

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );

      $wpdb->insert( 
        $table_name, 
        array( 
          'email' => $email, 
        ) 
      );
      // wp_redirect(home_url());
  }

}

//hooks for email POST
add_action( 'admin_post_nopriv_process_email_form', 'process_email_form_data' );
add_action( 'admin_post_process_email_form', 'process_email_form_data' );

