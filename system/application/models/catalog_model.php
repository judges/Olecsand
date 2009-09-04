<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Catalog_model extends Model {

    function __construct() {
        parent::Model();
    }

    function Catalog_model()
    {
        parent::Model();
    }

    function list_product($type_id)
    {
        $query = $this->db->get('products');
        if ($type_id != -1) {
            $query = $this->db->get_where('products', array('type_id' => $type_id));
        }
        return $query;
    }

    function get_last_product_id()
    {
        $query = $this->db->insert_id();
    }

    function get_product_details($id)
    {
        $query = $this->db->get_where('products',array('id' => $id));
        return $query->result();
    }

    function ceck_out_product($id)
    {
        $detail = array();
        foreach($id as $key) {
            $detail[] = $this->get_product_details($key);
        }
        return $detail;
    }
    function insert_entry()
    {
        $product = new Product();
        $product->serialnum = $_POST['serialnum'];
        $product->description = $_POST['description'];
        $product->price = $_POST['price'];
        $product->status = $_POST['status'];
        $product->photo = 'noimage.gif';
        $product->type_id = $_POST['type_id'];
        $this->db->insert('products', $product);
        return $this->db->insert_id();
    }

    function update_entry($product_id, $product_information)
    {

        $this->db->update('products', $product_information, array('id' => $product_id));
    }

    function type_product()
    {
        $query = $this->db->get('production_type');
        return $query;
    }
}

class Product {
    /**
    * DB Structure
    *
        CREATE TABLE `code_catalog`.`products` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `serialnum` VARCHAR( 250 ) NULL DEFAULT NULL ,
        `description` TEXT NULL DEFAULT NULL ,
        `price` INT NULL DEFAULT NULL ,
        `photo` VARCHAR( 250 ) NULL ,
        `status` BOOL NULL ,
        `type_id` INT NULL DEFAULT NULL ,
        `modification` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE = MYISAM;
     *
     *
     **/
    var $id ='';
    var $serialnum = '';
    var $description = '';
    var $price = '';
    var $photo = '';
    var $status = '';
    var $type_id = '';
    var $modification = 'CURRENT_TIMESTAMP';

}

?>
