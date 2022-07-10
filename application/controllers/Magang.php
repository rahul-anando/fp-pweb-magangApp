<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Magang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Magang_model', 'magang');
    }

    public function index()
    {

        $data['magang'] = $this->magang->getAlldatamagang();
        $this->load->view('magang/index', $data);
    }

	   public function tambah()
    {

        $data = $this->magang->prosesTambahData();
        if ($data > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Berhasil Ditambah
                </div>');

            redirect('magang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Gagal Ditambah
                </div>');
            redirect('magang');
        }
    }

	   public function edit()
    {
        $data = $this->magang->prosesEditData();
        if ($data > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Berhasil Diubah
                </div>');

            redirect('magang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Gagal Diubah
                </div>');
            redirect('magang');
        }
    }

   public function delete()
    {
        $data = $this->magang->prosesDeleteData();
        if ($data > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Berhasil Dihapus
                </div>');

            redirect('magang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Gagal Dihapus
                </div>');
            redirect('magang');
        }
    }
}