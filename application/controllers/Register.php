<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
    }

    public function index() {
        $this->register();
    }

    public function register(){

        return $this->load->view("Login/registerPage");

    }


}

?>