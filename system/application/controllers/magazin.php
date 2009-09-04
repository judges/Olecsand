<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Magazin extends Controller {

    function __construct() {
        parent::Controller();
    }

    function Magazin() {
        parent::Controller();
    }

    function index()
    {
        $data['path'] = $this->config->site_url();
        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
    }

    function shops()
    {
        $data['path'] = $this->config->site_url();
        $data['menu'] = array(
            'link1' => array (
            'url'=>'magazin/shops/1',
            'text' => '&nbsp;&nbsp;&nbsp;Основные ткани',
            'class' => 'class="rMenuActiv"'),
            'link2' => array (
            'url'=>'magazin/shops/2',
            'text' => '&nbsp;&nbsp;&nbsp;Акссесуары для шитья',
            'class' => 'class=""'),
            'link3' => array (
            'url'=>'magazin/shops/3',
            'text' => '&nbsp;&nbsp;&nbsp; Воздушно-прозрачные ткани',
            'class' => 'class=""'),
            'link4' => array (
            'url'=>'magazin/shops/4',
            'text' => '&nbsp;&nbsp;&nbsp; Изысканные ткани',
            'class' => 'class=""'),
            'link5' => array (
            'url'=>'magazin/shops/5',
            'text' => '&nbsp;&nbsp;&nbsp; Хрустальные компоненты сваровски',
            'class' => 'class=""'),
            'link6' => array (
            'url'=>'magazin/shops/6',
            'text' => '&nbsp;&nbsp;&nbsp; Аппликации и кружева',
            'class' => 'class=""'),
            'link7' => array (
            'url'=>'magazin/shops/7',
            'text' => '&nbsp;&nbsp;&nbsp; ТЦ «Добробут»',
            'class' => 'class=""'),
            'link7' => array (
            'url'=>'magazin/shops/8',
            'text' => '&nbsp;&nbsp;&nbsp; Свадебный салон',
            'class' => 'class=""')
        );

        if ( $this->uri->segment(3) != '' ) {
           foreach ( $data['menu'] as $menu)
           {
                $mm = explode("/",$menu['url']);
               
              
            }
           
        }
        $this->load->view('header', $data);
        $this->load->view('shops', $data);
        $this->load->view('footer', $data);
    }

    function about()
    {
        $data['path'] = $this->config->site_url();
        $this->load->view('header', $data);
        $this->load->view('about', $data);
        $this->load->view('footer', $data);
    }

    function contact()
    {
        $data['path'] = $this->config->site_url();
        $this->load->view('header', $data);
        $this->load->view('contact', $data);
        $this->load->view('footer', $data);
    }
}
?>