<?php

/**
 * Filevault status module class
 *
 * @package munkireport
 * @author
 **/
class Localadmin_controller extends Module_controller
{
    
    /*** Protect methods with auth! ****/
    public function __construct()
    {
        // Store module path
        $this->module_path = dirname(__FILE__);
    }

    /**
     * Default method
     *
     * @author AvB
     **/
    public function index()
    {
        echo "You've loaded the localadmin module!";
    }

    public function report($serial_number = '')
    {
        if( ! authorized_for_serial($serial_number)){
            jsonError('Not authorized');
        }

        $localadmin = new Localadmin_model($serial_number);
        jsonView($localadmin->rs);
    }

	/**
     * Get localadmin names for widget
     *
     * @return void
     **/
     public function get_localadmin()
     {
        $obj = new View();

        if (! $this->authorized()) {
            $obj->view('json', array('msg' => array('error' => 'Not authenticated')));
            return;
        }
        
        $localadmin = new Localadmin_model;
        $obj->view('json', array('msg' => $localadmin->get_localadmin()));
     }

} // END class default_module
