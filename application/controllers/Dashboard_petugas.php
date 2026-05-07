<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_petugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');

        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'petugas') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['total_pegawai'] = $this->Pegawai_model->count_all();
        $data['total_laki'] = $this->Pegawai_model->count_by_gender('L');
        $data['total_perempuan'] = $this->Pegawai_model->count_by_gender('P');

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard_petugas/index', $data);
        $this->load->view('templates/footer');
    }
}
