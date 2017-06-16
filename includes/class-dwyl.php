<?php

class Dwyl {

    /**
         * The loader that's responsible for maintaining and registering all hooks that power
         * the plugin.
         *
         * @since    1.0.0
         * @access   protected
         * @var      Plugin_Name_Loader    $loader    Maintains and registers all hooks for the plugin.
    */
    protected $loader;

    /**
         * The unique identifier of this plugin.
         *
         * @since    1.0.0
         * @access   protected
         * @var      string    $plugin_name    The string used to uniquely identify this plugin.
    */
    protected $plugin_name;



    public function __construct() {

        $this->plugin_name = 'dont-waste-your-life';
        $this->version = '1.0.0';


        $this->load_dependencies();
        $this->define_admin_hooks();

    }

    private function load_dependencies(){
        /**
             * The class responsible for orchestrating the actions and filters of the
             * core plugin.
        */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dwyl-loader.php';

        /**
            * The class responsible for defining all actions that occur in the admin area.
        */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-dwyl-admin.php';

        $this->loader = new Dwyl_Loader();
    }

    /**
         * Register all of the hooks related to the public-facing functionality
         * of the plugin.
         *
         * @since    1.0.0
         * @access   private
    */
    private function define_admin_hooks() {
    
        $plugin_admin = new Dwyl_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        $this->loader->add_action( 'init', $plugin_admin, 'create_hobby' );
    }

    public function get_plugin_name(){
        return $this->plugin_name;
    }

    public function get_version(){
        return $this->version;
    }

    public function run(){
        $this->loader->run();
    }
}

?>