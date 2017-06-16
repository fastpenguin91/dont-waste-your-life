<?php


class Dwyl_Admin {

    public function __construct(){
    }

    function create_hobby(){
        $labels = array(
            'name'          => 'Hobbies',
            'singular_name' => 'Hobby',
            'add_new'       => 'Add New Hobby',
            'edit_item'     => 'Edit Hobby',
            'new_item'      => 'New Hobby',
            'view_item'     => 'View Hobby',
            'view_items'    => 'View Hobbies',
            'all_items'     => 'All Hobbies',
            'menu_name'     => 'Hobbies'
        );

        $args = array(
            'labels'       => $labels,
            'description'  => 'Manage your Hobbies',
            'public'       => true,
            'show_in_menu' => true
        );

        register_post_type( 'hobbies', $args );
    }
}

?>