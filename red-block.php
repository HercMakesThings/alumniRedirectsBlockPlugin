<?php
/*
Plugin Name: red-block
Description: Custom plugin developed that creates a custom block that automatically redirects from the student posts on the front page site to the individual student portfolio
Author: Jeremy De Lancey
Version: 1.0.0
Text Domain: red-block-domain
*/

if ( ! defined('ABSPATH')){
    die;
}

class AlumniRedirectsBlock{
   function __construct(){
       add_action('init', array($this, 'adminAssets'));
   }

   function adminAssets(){
       wp_register_script('alumblocktype', plugin_dir_url(__FILE__) . 'index.js', array('wp-blocks', 'wp-element'));
       register_block_type('alumplugin/alumni-redirects-block', array(
           'editor_script' => 'alumblocktype',
           'render_callback' => array($this, 'clientHTML')
       ));
   }

   function clientHTML(){
        $current_title = get_the_title();
        // $new_post_id = '18';
        $preg_title = preg_replace('/\W/', '', $current_title);
       ob_start(); ?>
            <script>
                // window.addEventListener('load', (event) => {
                //     window.location.href = 'https://twitter.com';
                // });
                // document.addEventListener('DOMContentLoaded', (event) => {
                //     window.location.href = 'https://twitter.com'; 
                // });
                // window.open('https://twitter.com', '_self');
                

                window.open('https://<?php echo esc_html($preg_title); ?>.firstportfol.io', '_self');
            </script>
       <?php return ob_get_clean();
   }

//    function clientRedir(){
//         header("Location: https://twitter.com");
//    }
}

$alumniRedirectsBlock = new AlumniRedirectsBlock();