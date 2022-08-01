<?php class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pengguna');
    }
    public function index()
    {
        $data['title'] = ' | Data pengguna Pengguna ';
        $data['datas'] = $this->Model_pengguna->tampil();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/pengguna/data', $data);
        $this->load->view('templates/backend/footer');
    }
    public function cari()
    {
        $data['title'] = ' | Data Pengguna';
        $p = $this->input->post('keyword');
        $data['datas'] = $this->Model_pengguna->caripengguna($p);
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/pengguna/data', $data);
        $this->load->view('templates/backend/footer');
    }
    public function tpengguna()
    {
        $data['title'] = ' | Tambah pengguna  ';
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/pengguna/tambah');
        $this->load->view('templates/backend/footer');
    }
    public function save_pengguna()
    {
        $this->form_validation->set_message('pesan', 'Kolom {field] Harus Diisi.!');
        $this->form_validation->set_rules('id_siswa', 'Username ', 'trim');
        $this->form_validation->set_rules('id_guru', 'Username ', 'trim');
        $this->form_validation->set_rules('username', 'Username ', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');
        $this->form_validation->set_rules('status_akun', 'Telepon', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal Menambah Data.!</div>');
            redirect('pengguna/tpengguna', 'refresh');
        } else {
            $this->Model_pengguna->savepengguna();
        }
    }
    public function editp($id_user)
    {
        $where = array('id_user' => $id_user);
        $data['datas'] = $this->Model_pengguna->editpengguna($where);
        $data['title'] = ' | Edit pengguna  ';
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/pengguna/edit', $data);
        $this->load->view('templates/backend/footer');
    }
    public function update_pengguna($id_user)
    {
        $where = array('id_user' => $id_user);
        $data = array('status_akun' => $this->input->post('status_akun'),);
        $this->db->where($where);
        $this->db->update('tb_users', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Pengguna Telah Berhasil Diubah.!</div>');
        redirect('pengguna/index', 'refresh');
    }
    public function hapuspengguna($id_user)
    {
        $where = array('id_user' => $id_user);
        $this->db->where($where);
        $this->db->delete('tb_tabungan');
        $this->db->where($where);
        $this->db->delete('tb_pinjaman');
        $this->db->where($where);
        $this->db->delete('tb_users');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">pengguna Telah Berhasil Dihapus.!</div>');
        redirect('pengguna/index', 'refresh');
    }
}
