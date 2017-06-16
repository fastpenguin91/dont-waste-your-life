<?php

/*
* Plugin Name: Dont waste your life
* Description: Collect Hobbies and Manage your progress within each hobby with Notes, todos, etc...
* Version:     1.0.0
*/


if ( ! defined( 'WPINC' ) ) {
    die;
}



/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dwyl.php';

function run_dwyl(){
    $plugin = new Dwyl();
    $plugin->run();
}

run_dwyl();





?>