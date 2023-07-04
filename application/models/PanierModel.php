<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class PanierModel extends CI_Model {

    public function getProduit($id){
        try {
            $sql ="select * from produitsDeVente where idproduitsdevente=".$id;
            $query = $this->db->query($sql);
            $all = $query->row_array();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $all;
    }




}
?>
