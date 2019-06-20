<?php 
/*
 * functions
 * semplice.child.theme
 */
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; 
    $bootstrap = 'bootstrap';
      
    if ( is_home() || is_singular('post') ) {
      // blog page
      wp_enqueue_style( $bootstrap, get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css' );

      wp_enqueue_style( 'child-style',
          get_stylesheet_directory_uri() . '/style.css',
          array( $bootstrap ),
          wp_get_theme()->get('Version')
      );

      //bootstrap script
      wp_enqueue_script( 'bootstrapjs', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true );

    } else {
      //everything else
      wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    }   
    
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



function process_email_form_data() {

  // form processing code here
  if (isset($_POST['email']))
  {
      $email = $_POST['email'];
      $userdata = array(
        'user_login' => $email,
        'user_email' => $email,   //(string) The user email address.
      );

    $user_id = wp_insert_user( $userdata ) ;
    if( !is_wp_error( $user_id  ) ) {
      add_user_meta( $user_id, 'wp_user_level', 0);
      add_user_meta( $user_id, 'wp_capabilities', 'a:1:{s:10:"subscriber";b:1;}');
    }else{
      echo $user_id->get_error_message();
    }
    // wp_redirect(home_url());
  }

}

//hooks for email POST
add_action( 'admin_post_nopriv_process_email_form', 'process_email_form_data' );
add_action( 'admin_post_process_email_form', 'process_email_form_data' );

