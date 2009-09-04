<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Product_model extends Model {

    function __construct() {
        parent::Model();
    }

    function Product_model()
    {
        parent::Model();
    }

    function list_product()
    {
        $query = $this->db->get('production_type');
        return $query;
    }

    function curent_product($id)
    {
        $query = $this->db->get_where('production_type', array('id'=>$id));
        return $query;
    }
}
?>