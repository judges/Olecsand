<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Catalog extends Controller {

    function __construct() {
        parent::Controller();
        
        $this->load->library('DX_Auth');
        
        $this->load->model('Catalog_model');
        $this->load->model('Product_model');
    }

    function Catalog() {
        parent::Controller();
        
        $this->load->library('DX_Auth');
        
        $this->load->model('Catalog_model');
        $this->load->model('Product_model');
    }

    function index()
    {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        }
        //$data['query'] = $this->db->get('products');
        
        if ( $this->uri->segment(3) === FALSE ) {
            $type = -1;
            $data['curent_production'] = 'Все продукты';
        } else {
            $type = $this->uri->segment(3);
            $data['curent_production'] = $this->Product_model->curent_product($type)->result();
        }
        $data['path'] = $this->config->site_url();
        $data['query'] = $this->Catalog_model->list_product($type);
        $data['production'] = $this->Product_model->list_product();
    
        $this->load->view('catalog/header',$data);
        $this->load->view('catalog/content',$data);
        $this->load->view('catalog/navigation',$data);
    }

    function new_product()
    {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        }
        
        $data['path'] = $this->config->site_url();
        $data['production'] = $this->Product_model->list_product();
        $this->load->view('catalog/header',$data);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->form_validation->set_rules('serialnum', 'serialnum', 'required');
	    $this->form_validation->set_rules('price', 'price', 'required');
        
        if ($this->form_validation->run() != FALSE) {

            $id = $this->Catalog_model->insert_entry();
            redirect('catalog/upload_f/'.$id);
        } else {
            $this->load->view('catalog/form');
        }
       
        $this->load->view('catalog/navigation',$data);
    }

    function upload_f()
    {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        }
        $data['path'] = $this->config->site_url();
        $data['error'] = ' ';
        $data['product_id'] = $this->uri->segment(3);
        $data['product'] = $this->Catalog_model->get_product_details($data['product_id']);
        $data['production'] = $this->Product_model->list_product();
        $this->load->view('catalog/header',$data);
        $this->load->view('catalog/upload_form', $data);
        $this->load->view('catalog/navigation',$data);
    }

    function do_upload()
    {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        }
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $data['error'] = $this->upload->display_errors();
            $data['product_id'] = $this->uri->segment(3);
            $data['product'] = $this->Catalog_model->get_product_details($data['product_id']);
            $data['production'] = $this->Product_model->list_product();
            $this->load->view('catalog/header',$data);
            $this->load->view('catalog/upload_form', $data);
            $this->load->view('catalog/navigation',$data);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $data['product_id'] = $this->uri->segment(3);
            $data['product'] = $this->Catalog_model->get_product_details($data['product_id']);
            
            $data['product']['0']->photo = $data['upload_data']['file_name'];
            $product= $data['product']['0'];
            $this->Catalog_model->update_entry($data['product_id'], $product);
            redirect('catalog');
        }
    }
}

?>
