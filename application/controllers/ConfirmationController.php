<?php
defined('BASEPATH') or exit('No direct script access allowed');	//protection fichier
class ConfirmationController extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->view('headerResponsive');
    }

    public function show(){
        $this->load->helper('url');
        $this->load->view('confirmation');

        $this->load->view('footer');
    }
}
?>
