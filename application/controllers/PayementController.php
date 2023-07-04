<?php

class PayementController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
		$this->load->view('headerResponsive');
        $this->load->model('Payement_model');
    }

    public function payer()
    {

        $idUtilisateur = $_SESSION['utilisateur']['idutilisateur'];

        $reference = $this->input->post('reference');

        $this->Payement_model->payer($idUtilisateur, $reference);

        $produits = $this->Payement_model->get_selected_products($idUtilisateur);
        $prix = $this->Payement_model->calculate_total_price($idUtilisateur);

        $data['produits'] = $produits;
        $data['prix'] = $prix;
        $data['utilisateur'] = $idUtilisateur;

        $data['message']= "abonnement fait avec succes";

        $this->load->view('payement_view', $data);
        $this->load->view('footer');
    }

    public function lien_payement()
    {
        $idUtilisateur = $_SESSION['utilisateur']['idutilisateur'];

        $produits = $this->Payement_model->get_selected_products($idUtilisateur);
        $prix = $this->Payement_model->calculate_total_price($idUtilisateur);

        $data['produits'] = $produits;
        $data['prix'] = $prix;
        $data['utilisateur'] = $idUtilisateur;

        $this->load->view('payement_view', $data);
        $this->load->view('footer');
    }
}
