<?php defined('BASEPATH') || exit('No direct script access allowed');
class Periode extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_periode');
    }
    function index()
    {
        $t['title'] = ' | Data Periode';
        $data['datas'] = $this->Model_periode->tampilpe()->result();
        $this->load->view('templates/backend/header', $t);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/periode/data', $data);
        $this->load->view('templates/backend/footer');
    }
    public function tambah_data_periode()
    {
        $t['title'] = ' | Tambah Data Periode';
        $this->load->view('templates/backend/header', $t);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/periode/tambah');
        $this->load->view('templates/backend/footer');
    }
    public function sv_periode()
    {
        $this->form_validation->set_message('required', 'Kolom {field} Harus Diisi');
        $this->form_validation->set_rules('tahun_akademik', 'Tahun Akademik', 'trim|required');
        $this->form_validation->set_rules('semester', 'Semester', 'trim|required');
        $this->form_validation->set_rules('status_periode', 'Status Periode', 'trim|required');
        $this->form_validation->set_rules('periode_awal', 'Periode Awal', 'trim|required');
        $this->form_validation->set_rules('periode_akhir', 'Periode Ahir', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo "gagal Input Data";
        } else {
            $this->Model_periode->input_datape();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Input Periode Baru..</div>');
            redirect('Periode/index', 'refresh');
        }
    }
    public function edit_periode($id_periode)
    {
        $t['title'] = ' | Edit Periode';
        $where = array('id_periode' => $id_periode);
        $data['datas'] = $this->Model_periode->edit_data_periode($where, 'tb_periode')->result();
        $this->load->view('templates/backend/header', $t);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/periode/edit', $data);
        $this->load->view('templates/backend/footer');
    }
    public function sav_periode($id_periode)
    {
        $where = array('id_periode' => $id_periode);
        $data = array('tahun_akademik' => $this->input->post('tahun_akademik'), 'semester' => $this->input->post('semester'), 'status_periode' => $this->input->post('status_periode'), 'periode_awal' => $this->input->post('periode_awal'), 'periode_akhir' => $this->input->post('periode_akhir'),);
        $this->Model_periode->edit_dataperiode($where, $data, 'tb_periode');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Edit Periode Baru..</div>');
        redirect('Periode/index', 'refresh');
    }
    public function Hapuspe($id_periode)
    {
        $where = array('id_periode' => $id_periode);
        $this->Model_periode->hapus_dataperiode($where, 'tb_periode');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Periode Terhapus..</div>');
        redirect('Periode/index', 'refresh');
    }
}
