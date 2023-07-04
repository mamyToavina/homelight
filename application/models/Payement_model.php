<?php

class Payement_model extends CI_Model
{
    public function payer($idUtilisateur, $reference){
        date_default_timezone_set('Africa/Nairobi');
        // Vérifier si l'idUtilisateur existe déjà dans la table
        $existingPayment = $this->db->get_where('payement', array('idutilisateur' => $idUtilisateur))->row();

        if ($existingPayment) {
            // L'idUtilisateur existe déjà, mettre à jour les dates
            $datepayement = date('Y-m-d');
            $datepaye = date('Y-m-d', strtotime('+1 month', strtotime($existingPayment->datepaye)));
            
            $this->db->where('idpayement', $existingPayment->idpayement);
            $this->db->update('payement', array('datepayement' => $datepayement, 'datepaye' => $datepaye));
        } else {
            // L'idUtilisateur n'existe pas encore, insérer les données
            $datepayement = date('Y-m-d');
            $datepaye = $datepayement;
            $prix = $this->calculate_total_price($idUtilisateur);

            $this->db->insert('payement', array('reference' => $reference, 'idutilisateur' => $idUtilisateur, 'datepayement' => $datepayement, 'datepaye' => $datepaye, 'prix' => $prix));
        }
    }

    public function calculate_total_price($idutilisateur) {
        // Récupérer les prix des produits sélectionnés par le client
        $selected_products = $this->get_selected_products($idutilisateur);

        // Calculer le prix total en faisant la somme des prix des produits
        $total_price = 0.0;
        foreach ($selected_products as $product) {
            $total_price += $product->prix;
        }

        return $total_price;
    }

    /*public function get_selected_products($idutilisateur) {
        $this->db->select('produit.prix');
        $this->db->from('payement');
        $this->db->join('utilisateur', 'payement.idutilisateur = utilisateur.idutilisateur');
        $this->db->join('produit', 'utilisateur.idproduit = produit.idproduit');
        $this->db->where('payement.idutilisateur', $idutilisateur);

        $query = $this->db->get();
        return $query->result();
    }*/

    function get_selected_products($idClient)
    {
        $query = $this->db->select('*')
                        ->from('produit')
                        ->join('factureclient', 'produit.idproduit = factureclient.idproduitsdevente')
                        ->where('factureclient.idutilisateur', $idClient)
                        ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


}
