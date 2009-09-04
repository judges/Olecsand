<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Bascet extends Controller {

    function __construct() {
        parent::Controller();

        $this->load->model('Catalog_model');
        $this->load->model('Product_model');

        $this->load->library('DX_Auth');
        
        $this->load->library('session');
        $this->load->library('email');
    }

    function Bascet() {
        parent::Controller();

        $this->load->model('Catalog_model');
        $this->load->model('Product_model');

        $this->load->library('DX_Auth');

        $this->load->library('session');
        $this->load->library('email');
    }

    function index() {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        } else {
            redirect('catalog');
        }
    }
    
    function new_list() {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        } else {
            if ( $this->session->userdata('bascet') ) {
                $product = $this->session->userdata('bascet');
                $new_product = intval($this->uri->segment(3));
                if ( !in_array($new_product, $product) )
                {
                   $product[] = $new_product;
                }
                $this->session->set_userdata('bascet', $product);
            } else {
                $this->session->set_userdata('bascet', array( intval( $this->uri->segment(3) ) ) );
            }
            redirect('catalog');
        }
    }

    function ceck_out() {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        } else {

            $data['production'] = $this->Product_model->list_product();
            $data['curent_production'] = 'Корзина';
            $data['query'] = $this->Catalog_model->ceck_out_product($this->session->userdata('bascet'));

            $data['path'] = $this->config->site_url();
            
            $this->load->view('catalog/header',$data);
            $this->load->view('bascet/bascet');
            $this->load->view('catalog/navigation',$data);
        }
    }

    function send_reguest() {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        } else {
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'UTF-8';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);

            $this->email->from('manager@wedding-cvit.com', 'Manager');
            $this->email->to('manager@wedding-cvit.com');

            $this->email->subject('Заказ');

            
            $message = '';
            for ($i = 0; $i <count($_POST['product']); $i++) {
                $product = $this->Catalog_model->get_product_details($_POST['product'][$i]);
                $message = $message." Был заказан товар с серийным номером:".$product[0]->serialnum.' в количестве '.$_POST['count'][$i].'.\r\n';
            }
            $message = $message."От пользователя ".$this->session->userdata('DX_username');
            $this->email->message($message);
            $this->email->send();
            //$this->email->print_debugger();
            $this->session->unset_userdata('bascet');
            redirect('catalog');
        }
    }
    
}

?>
