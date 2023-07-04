<?php
defined('BASEPATH') or exit('No direct script access allowed');	//protection fichier
class Panier extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->view('headerResponsive');
    }

    public function show_panier(){
        $this->load->model('PanierModel');
        $id = $this->input->get('id');
        $data=array();
        $data['produit'] = $this->PanierModel->getProduit($id);
        $this->load->helper('url');
        $this->load->view('ventes/panier',$data);
        $this->load->view('footer');
    }
    public function show(){
        $this->load->helper('url');
        $this->load->view('ventes/confirmation');
        $this->load->view('footer');
    }
}
?>
