<?php
defined('BASEPATH') or exit('No direct script access allowed');	//protection fichier
class Aide extends CI_Controller
{
    public function __construct(){
        parent::__construct();
		$this->load->view('headerResponsive');
        $this->load->view('help/helpMenu');
    }
    // public function index(){
    //     $this->load->view('help/content');
    // }
    public function com(){
        $all=array();
        $id=$this->input->get('id');
        if($id==0){
            $all['all']='Dans le cadre des conditions générales de vente,
                il est important de préciser que les produits vendus ne peuvent
                généralement pas être rendus. Une fois qu un client a acheté un produit,
                il est généralement considéré comme définitivement acquis.
                Cette disposition est courante dans de nombreux secteurs, notamment ceux où l intégrité,
                l hygiène ou la sécurité des produits peuvent être compromis si les retours sont autorisés. Cependant,
                il est important que cette politique soit clairement communiquée aux clients avant l achat,
                afin qu ils en soient informés et puissent prendre une décision éclairée.
                Bien sûr, certaines exceptions peuvent s appliquer en cas de défaut de fabrication ou de non-conformité des produits aux spécifications annoncées,
                auquel cas un processus de retour ou d échange peut être mis en place selon les conditions définies dans les CGV.';
        }
        else if($id==1){
            redirect('mysession/inserer');
        }
        else if($id==2){
            $all['all']='+261346750423 , houssenrandrefahanana@gmail.com';
        }
        else if($id==3){
            $all['all']='Bienvenue sur notre site web !
            Nous sommes ravis de vous présenter notre manuel d utilisation pour vous aider à naviguer facilement sur notre plateforme.
            Voici quelques instructions simples pour profiter pleinement de toutes les fonctionnalités disponibles.
            Consulter votre consommation :
            Pour accéder à votre consommation, il vous suffit de cliquer sur le menu Dashboard. Une fois sur cette page,
            vous pourrez visualiser et suivre votre consommation de manière claire et intuitive.
            Gérer vos appareils :
            Si vous souhaitez vérifier l état de vos appareils (allumés ou éteints) ou les contrôler à distance,
            rendez-vous dans le menu "Mes appareils". Vous y trouverez une liste complète de tous vos appareils enregistrés.
            Cette section vous permettra également de prendre des mesures pour les activer ou les désactiver selon vos besoins.
           ';
        }
        else if($id==4){
            $all['all']=' Parcourir les produits disponibles :
            Si vous êtes intéressé par l achat de nos produits, dirigez-vous vers la section  Panier. Là, vous trouverez une sélection de nos produits disponibles à la vente. Vous pourrez consulter les détails, ajouter des articles à votre panier et passer une commande en toute simplicité.
            Nous espérons que ces instructions vous seront utiles pour naviguer sur notre site web. Si vous avez besoin d une assistance supplémentaire ou si vous rencontrez des problèmes techniques, n hésitez pas à contacter notre équipe de support. Nous sommes là pour vous aider et rendre votre expérience sur notre site la plus agréable possible.
            Merci d utiliser notre site web et profitez pleinement de toutes ses fonctionnalités !';
        }
        $this->load->view('help/content',$all);
        $this->load->view('footer');
    }

}
