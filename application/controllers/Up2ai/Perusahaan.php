<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 11) {
            redirect(base_url());
        }
        $this->load->model(array('modelusr', 'modelmhs', 'modelpkl'));
    }

    function index()
    {
        $config = array(
            'title' => 'Data Perusahaan',
        );

        $data = array(
            "header"     => $this->load->view('up2ai/include/header', $config, true),
            "navbar"     => $this->load->view('up2ai/include/navbar', array(), true),
            "sidenav"     => $this->load->view('up2ai/include/sidenav', array(), true),
            "footer"     => $this->load->view('up2ai/include/footer', array(), true),
            "title" => 'Data Perusahaan',
            'dataPerusahaan' => $this->modelpkl->getData('perusahaan')
        );
        $this->load->view('up2ai/view/perusahaan/index', $data);
    }
}
