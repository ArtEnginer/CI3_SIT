<?php defined('BASEPATH') || exit('No direct script access allowed');
class login extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('level') == "admin") {
                redirect('Dashboard/index');
            } elseif ($this->session->userdata('level') == "siswa") {
                redirect('anggota/tabungansiswa');
            } elseif ($this->session->userdata('level') == "guru") {
                redirect('anggota/tabunganguru');
            }
        }
        $this->form_validation->set_message('required', 'kolom {field} harus diisi');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('frontend/login/index', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $users = $this->db->get_where('tb_users', ['username' => $username])->row_array();
        if ($users) {
            if ($users['status_akun'] == 1) {
                $data = ['username' => $users['username'], 'level' => $users['level'], 'id_user' => $users['id_user']];
                $this->session->set_userdata($data);
                if ($users['level'] == "admin") {
                    redirect('dashboard/index');
                } elseif ($users['level'] == "siswa") {
                    redirect('anggota/tabungansiswa');
                } elseif ($users['level'] == "guru") {
                    redirect('anggota/tabunganguru');
                } else {
                    $this->session->set_flashdata('pesan', '<div  class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun Anda Belum Diaktifkan</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username Bellum Terdaftar Daftar</div>');
            redirect('login');
        }
    }
    public function logout()
    {
        if ($this->session->userdata('username')) {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('level');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Keluar Sistem</div>');
            redirect('login');
        }
    }
    public function regist_ss()
    {
        $data['title'] = 'Halaman Registrasi';
        $this->load->view('frontend/registrasi/indexa', $data);
    }
    public function saves_ad()
    {
        $this->Model_login->save_adds();
    }
    public function registrasiakun()
    {
        $data['title'] = 'Halaman Login';
        $this->load->view('frontend/login/registrasiakun', $data);
    }
    public function save_akundata()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $jk = $this->input->post('jk');
        $telepon = $this->input->post('telepon');
        $id_jurusan = $this->input->post('id_jurusan');
        $id_kelas = $this->input->post('id_kelas');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $level = $this->input->post('level');
        $norek = $this->input->post('norek');
        $foto = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './upload/identitas';
            $config['allowed_types'] = 'jpg|jpeg|png|PNG|JPEG';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal Upload Foto.!</div>');
                redirect('login/registrasiakun', 'refresh');
            } else {
                $foto = $this->upload->data('file_name');
            }
            $ses = $this->session->userdata('id_user');
            $data = array('nama' => $nama, 'alamat' => $alamat, 'jk' => $jk, 'telepon' => $telepon, 'id_jurusan' => $id_jurusan, 'id_kelas' => $id_kelas, 'username' => $username, 'password' => $password, 'level' => $level, 'norek' => $norek, 'foto' => $foto);
            $this->db->insert('tb_users', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Registrasi.!</div>');
            redirect('Login', 'refresh');
        }
    }
}
