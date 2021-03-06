<?php

class Dwyl_Loader {

    /**
         * The array of actions registered with WordPress.
         *
         * @since    1.0.0
         * @access   protected
         * @var      array    $actions    The actions registered with WordPress to fire when the plugin loads.
    */
    protected $actions;

    public function __construct() {
        $this->actions = array();
    }

    /**
         * Add a new action to the collection to be registered with WordPress.
         *
         * @since    1.0.0
         * @param    string               $hook             The name of the WordPress action that is being registered.
         * @param    object               $component        A reference to the instance of the object on which the action is defined.
         * @param    string               $callback         The name of the function definition on the $component.
         * @param    int                  $priority         Optional. he priority at which the function should be fired. Default is 10.
         * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1.
    */
    public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
        $this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
    }

    private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {
        $hooks[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args
        );
        return $hooks;
    }

    /**
         * Register the filters and actions with WordPress.
         *
         * @since    1.0.0
    */
    public function run() {
        foreach ( $this->actions as $hook ) {
            add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
        }
    }

}

?>