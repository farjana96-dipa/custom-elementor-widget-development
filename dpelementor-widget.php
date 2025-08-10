<?php



/**
 * Plugin Name: DP Elementor Widget
 * Plugin URI: https://example.com/dp-elementor-widget
 * Description: A custom Elementor widget for displaying dynamic content.
 * Version: 1.0.0
 * Author: Farjana Dipa
 * Author URI: https://farjana-dipa.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: dp-elementor-widget
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * 
 * 
 * 
 * 
 * 
 */

 if(!defined('ABSPATH')){
    exit();
 }


 final class MY_Elementor_Widget{
    

      const VERSION = '1.0.0';

      const MINIUM_ELEMENTOR_VERSION = '2.0.0';

      const MINIUM_PHP_VERSION = '7.0.0';

      private static $instance = null;

  

       public static function instance(){
         if(is_null(self::$instance)){
            self::$instance = new self();
         }
         else{
            return self::$instance;
         }
       }


     
       /* Plugin Constructor */

        public function __construct(){
           $this->define_constants();
           add_action('wp_enqueue_scripts', [$this, 'myenqueue_styles']);
           add_action('init', [$this, 'i18n']);
           add_action('plugins_loaded', [$this, 'init']);
        }

        public function define_constants(){
            define('MY_ELEMENTOR_WIDGET_VERSION', self::VERSION);
            define('MY_ELEMENTOR_WIDGET_URL', plugin_dir_url(__FILE__));
            define('MY_ELEMENTOR_WIDGET_PATH', plugin_dir_path(__FILE__));
        }


        public function myenqueue_styles(){

         wp_register_style('my-elementor-widget-style', MY_ELEMENTOR_WIDGET_URL . 'assets/dist/css/public.min.css', [], MY_ELEMENTOR_WIDGET_VERSION);
         wp_register_style('my-elementor-widget-style1', MY_ELEMENTOR_WIDGET_URL . 'assets/source/css/public.css', [], MY_ELEMENTOR_WIDGET_VERSION);
         wp_register_script('my-elementor-widget-script', MY_ELEMENTOR_WIDGET_URL . 'assets/dist/js/public.min.js', ['jquery'], MY_ELEMENTOR_WIDGET_VERSION, true);
         wp_register_script('my-elementor-widget-script1', MY_ELEMENTOR_WIDGET_URL . 'assets/source/js/public.js', ['jquery'], MY_ELEMENTOR_WIDGET_VERSION, true);

         wp_enqueue_style('my-elementor-widget-style');
         wp_enqueue_script('my-elementor-widget-script');
         wp_enqueue_style('my-elementor-widget-style1');
         wp_enqueue_script('my-elementor-widget-script1');


        }


        /*  Load Text Domain */ 

        public function i18n(){
         load_plugin_textdomain('dp-elementor-widget', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        }


        /* Initialize the plugin */
        public function init(){
         if(! did_action('elementor/loaded')){
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
         }

         if(version_compare(ELEMENTOR_VERSION, self::MINIUM_ELEMENTOR_VERSION, '<')){
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
         }
            add_action('elementor/init', [$this, 'init_category']);
            add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
        }


        /* Initialize the widgets */
        public function init_widgets(){
            require_once MY_ELEMENTOR_WIDGET_PATH . 'widgets/preview_card.php';
            require_once MY_ELEMENTOR_WIDGET_PATH . 'widgets/button_group.php';
            require_once MY_ELEMENTOR_WIDGET_PATH . 'widgets/heading.php';
            require_once MY_ELEMENTOR_WIDGET_PATH . 'widgets/image.php';
        }



        /* Init Category Section */
        public function init_category(){
         Elementor\Plugin::instance()->elements_manager->add_category(
            'my-elementor-widget',
            [
               'title' => 'My Elementor Widgets'
            ],
            1
         );
        }


        /* Admin Notice for Elementor not installed or activated */
        public function admin_notice_missing_main_plugin(){
         if(isset($_GET['activate'])) unset($_GET['activate']);
         $message = sprintf(
            esc_html__(' %1$s requires the  %2$s to be installed and activated.', 'dp-elementor-widget'),
            '<strong>My Elementor Widget</strong>',
            '<strong>Elementor</strong>'
         );

         printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

        }

        public function admin_notice_minimum_elementor_version(){
         if(isset($_GET['activate'])) unset($_GET['activate']);
         $message = sprintf(
            esc_html__(' %1$s requires the  %2$s to be at least %3$s.', 'dp-elementor-widget'),
            '<strong>My Elementor Widget</strong>',
            '<strong>Elementor</strong>',
            self::MINIUM_ELEMENTOR_VERSION
         );

         printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
        }
 }

 MY_Elementor_Widget::instance();


 ?>