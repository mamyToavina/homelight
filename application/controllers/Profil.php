<?php
defined('BASEPATH') or exit('No direct script access allowed');	//protection fichier
class Profil extends CI_Controller
{
	public function __construct(){
        parent::__construct();
		$this->load->view('headerResponsive');
    }
	public function index()
	{
		redirect('Accueil/show');
	}

	public function sinscrire(){
		$this->load->view('profil/inscription');
        $this->load->view('footer');
	}

	public function inscriptionFoyer(){
		$this->load->model('OperationModel');
		$all['all'] = $this->OperationModel->select_gen('emplacement');
		$this->load->view('profil/inscriptionFoyer',$all);
        $this->load->view('footer');
	}

	/*public function confirmerFoyer(){
		$this->load->model('OperationModel');
		$data = array();
		$data['nom']=$this->input->get('nomFoyer');
		$data['idemplacement'] = $this->input->get('idEmplacement');
		$data['motdepasse'] = $this->input->get('mdp');
		$this->OperationModel->insert_gen('foyer',$data);
		$this->load->view('profil/inscription');
        $this->load->view('footer');
	}*/

	public function confirmerFoyer(){
		$this->load->model('OperationModel');
		$data = array();
		$data['nom'] = $this->input->get('nomFoyer');
		$data['idemplacement'] = $this->input->get('idEmplacement');
		$data['motdepasse'] = $this->input->get('mdp');
		$this->OperationModel->insert_gen('foyer', $data);

		// Récupérer l'ID du foyer enregistré
		$idFoyer = $this->db->insert_id();
		$_SESSION['foyer'] = $idFoyer;

		$this->load->view('profil/inscription', array('idFoyer' => $idFoyer));
		$this->load->view('footer');
	}

	public function confirmerInscription(){
		date_default_timezone_set('Africa/Nairobi');
		$this->load->model('ProfilModel');
		$data=array();
		$nom_foyer = $this->input->get('nomFoyer');
		$idFoyer = $this->ProfilModel->get_by_id("foyer",$nom_foyer,"nom");
		if ($idFoyer) {
			$data['idfoyer'] = $idFoyer->idfoyer;
		}

		$data['nom'] = $this->input->get('nom');
		$data['prenom'] = $this->input->get('prenom');
		$data['datedenaissance'] = $this->input->get('dtn');
		$data['email'] = $this->input->get('email');
		$data['numero'] = $this->input->get('numero');
		$data['motdepasse'] = $this->input->get('motDePasse');
		//$data['idfoyer'] = $idFoyer;

		$data_pack['idfoyer'] = $data['idfoyer'];
		$this->ProfilModel->insert("pack",$data_pack);


		$message['msg'] = "";

		//la dtn doit etre plus de 10ans
		if($this->ProfilModel->check_date($data['datedenaissance'])){
			$this->ProfilModel->insert("utilisateur",$data);
			$message['msg']="donnée ajouté avec succes";

		}

		else if($this->ProfilModel->check_date($data['datedenaissance'])){
			$message['msg']="erreur!votre foyer n'existe pas ou votre date de naissance est moins de 10 ans";
		}

		$this->load->view('profil/inscription',$message);
        $this->load->view('footer');

	}

// se connecter
	public function seconnecter(){
		$this->load->view('profil/connection');
	}
	public function confirmerConnection(){
		$data = array();
		$data['nomFoyer'] = $this->input->get('nomFoyer');
		$data['email'] = $this->input->get('email');
		$data['mdp'] = $this->input->get('mdp');
		// var_dump($data);
		$this->load->model('ProfilModel');
		$utilisateur = $this->ProfilModel->getUtilisateur($data);
		$_SESSION['utilisateur'] = $utilisateur;
		$idUtilisateur = $utilisateur->idutilisateur;

		$this->session->set_userdata('user', $idUtilisateur);
		redirect('mysession/profil');
	}
// ventes des articles
	public function articles(){
		$this->load->model('ProfilModel');
		$requete = "select * from produitsDeVente join categorie on produitsDeVente.idcategorie = categorie.idcategorie";
		// echo $requete;
		$all['all'] = $this->ProfilModel->get($requete);
		// var_dump($all);
		$this->load->view('ventes/index',$all);
        $this->load->view('footer');
		// $this->load->view('footer');
	}








	//Contact
	public function aboutus()
	{
		$this->load->view('templates/header');
		$this->load->view('contact/aboutus');
		$this->load->view('templates/footer');
	}
	public function nouscontacter()
	{
		$this->load->view('templates/header');
		$this->load->view('contact/nouscontacter');
		$this->load->view('templates/footer');
	}
	public function servicesclient()
	{
		$this->load->view('templates/header');
		$this->load->view('contact/servicesclient');
		$this->load->view('templates/footer');
	}

	//parametre
	public function vosappareils()
	{
		$this->load->view('templates/header');
		$this->load->view('parametre/vosappareils');
		$this->load->view('templates/footer');
	}
	public function moncompte()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}
	//produits
	public function produits()
	{
		$this->load->view('templates/header');
		$this->load->view('produits/produits');
		$this->load->view('templates/footer');
	}
	public function voirproduit($idproduit = '')
	{
		//tokony mameno $data ny mombamomban ny produit (select * from produit where idproduit= )
		$this->load->view('templates/header');
		$this->load->view('produits/voirproduit');
		$this->load->view('templates/footer');
	}
	//ma maison
	public function mamaison()
	{
		$this->load->view('templates/header');
		$this->load->view('mamaison/mamaison');
		$this->load->view('templates/footer');
	}
	public function ajouterpiece($idpiece = '')
	{
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}
}
