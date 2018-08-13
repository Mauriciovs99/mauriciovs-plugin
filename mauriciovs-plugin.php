<?php
/**
* @package MauriciovsPlugin
*/
/*
Plugin Name: Mauriciovs Plugin
Plugin URI: aqui va el url del github o donde tengas detalles de el
Description: Test plugin
Version: 1.0.0
Author: Mauricio Andrés Vélez Sánchez
Author URI: Hyperlink in the name of author that redirects to a page of him
License: Checa las licencias
Text Domain: mauriciovs-plugin
*/

defined ('ABSPATH') or die( 'you dont have access' ); // no permite acceso a alguien que no sea el wordpress

class mauriciovsPlugin{

  function __construct(){
    add_action ('init', array( $this , 'custom_post_type' ) ); // pone en el hook el nuevo post type al inicializar la clase
  }

  function activate(){
    //create something
    $this->custom_post_type();
    //flush rewrite rules
    flush_rewrite_rules();
  }
  function deactivate(){
    //flush rewrite rules
    flush_rewrite_rules();
  }

  function uninstall(){
    // delete all data
  }

  function custom_post_type(){  //crea un custom post type
    register_post_type('book',['public'=> true, 'label' => 'Books']);
  }
} // end class

if ( class_exists( 'mauriciovsPlugin' ) ){ //si está escrita la clase, instanciala en una variable
  $mauriciovsPlugin = new mauriciovsPlugin(); //instanciando clase
}

//activation
register_activation_hook(__FILE__,array($mauriciovsPlugin, 'activate')); //el array es porque tiene que acceder a la clase instanciada, a un metodo especifico

//deactivation
register_deactivation_hook(__FILE__,array($mauriciovsPlugin, 'deactivate'));
//uninstall (nothing yet)
