<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Mahasiswa_model');
    }

    public function index()
    {
        $data['mhs'] = $this->Mahasiswa_model->retrieve();
        $this->load->view('Mahasiswa_view', $data);
    }

    public function form_tambah()
    {
        $this->load->view('Tambah_view');
    }

    public function submit()
    {
        $this->Mahasiswa_model->add($this->input->post('var'));
        $data['submitted'] = TRUE ;
        $this->load->view('Tambah_view', $data);
    }
    function delete()
    {
        $this->Mahasiswa_model->delete($this->uri->rsegment(3));
        $this->index();
    }
    function form_update()
    {
        $data['mhs'] = $this->Mahasiswa_model->getMahasiswa($this->uri->rsegment(3));
        $this->load->view('Update_view', $data);
    }
    function update()
    {
        $this->Mahasiswa_model->update($this->input->post('old_nim'),
                                        $this->input->post('var'));
        $this->index();
    }
}