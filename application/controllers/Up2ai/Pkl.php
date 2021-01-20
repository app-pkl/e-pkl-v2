<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 11) {
            redirect(base_url());
        }
        $this->load->model(array('modelpkl','modeldosen','modelmhs'));
    }

    function index()
    {
        $config = array(
            'title' => 'Data PKL',
        );

        $data = array(
            "header"     => $this->load->view('up2ai/include/header', $config, true),
            "navbar"     => $this->load->view('up2ai/include/navbar', array(), true),
            "sidenav"    => $this->load->view('up2ai/include/sidenav', array(), true),
            "footer"     => $this->load->view('up2ai/include/footer', array(), true),
            "title"      => 'Data PKL',
            'wrapper' => [
                (object)array(
                    'title' => 'UP2AI',
                    'link' => 'up2ai/pkl',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'index',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataPkl' => $this->modelpkl->getWhere2('showpkl', ['status_daftar' => '3', 'status_val !=' => '0']),
            "dataMhs" => $this->modelmhs->get('showMhs'),
            "dataDosen" => $this->modelmhs->get('showPklDosen'),
        );
        $this->load->view('up2ai/view/pkl/index', $data);
    }

    function statusDaftar($idd)
    {
        if ($this->session->userdata('parent') == null) {
            $id = $this->session->userdata('iduser');
        } else {
            $id = $this->session->userdata('parent');
        }
        $dosen = $this->modeldosen->getWhere('dosen', ['user_id' => $id]);
        $config = array(
            'title' => 'Edit Status',
        );
        $data = array(
            "header"     => $this->load->view('up2ai/include/header', $config, true),
            "navbar"     => $this->load->view('up2ai/include/navbar', array(), true),
            "sidenav"     => $this->load->view('up2ai/include/sidenav', array(), true),
            "footer"     => $this->load->view('up2ai/include/footer', array(), true),
            "title" => 'Edit Status PKL',
            'wrapper' => [
                (object)array(
                    'title' => 'PKL',
                    'link' => 'up2ai/pkl',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Status',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataPkl' => $this->modelpkl->getwhere('showpkl', ['pkl_id' => $idd]),
            "dataMhs" => $this->modelmhs->get('showMhs'),
            "dataDospem" => $this->modelmhs->getwhere2('showPklDosen', ['pkl_id' => $idd]),
            'dataDosen' => $this->modeldosen->get('dosen')
        );
        $this->load->view('up2ai/view/pkl/editStatus', $data);
    }

    function updateStatus(){
        $statusPkl = $this->input->post("daftar") != 4 ? '1' : '2';
        $data = [
            "status_val" => $this->input->post("validasi"),
            "status_pkl" => $statusPkl
        ];

        // var_dump($data);
        $this->modelpkl->update('pkl', $data, ['id' => $this->input->post('pkl_id')]);        
        redirect(base_url('up2ai/pkl'));
    }
}
