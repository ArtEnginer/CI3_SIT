<?php class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_anggota');
    }
    public function tabungansiswa()
    {
        $data['title'] = ' | Tabungan';
        $data['datas'] = $this->Model_anggota->tampiltabungansiswa();
        $data['kredits'] = $this->Model_anggota->kredit();
        $data['debets'] = $this->Model_anggota->debet();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/anggota/tabungan', $data);
        $this->load->view('templates/backend/footer');
    }
    public function pinjamansiswa()
    {
        $data['title'] = ' | Pinjaman';
        $data['datas'] = $this->Model_anggota->tampilpinjamansiswa();
        $data['bayars'] = $this->Model_anggota->bayar();
        $data['pinjams'] = $this->Model_anggota->pinjam();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/anggota/pinjaman', $data);
        $this->load->view('templates/backend/footer');
    }
    public function rekaptabungan()
    {
        $this->load->library('fpdf_gen');
        $this->load->library('Fpdf_mctable');
        $this->load->view('backend/anggota/rekaptabungan');
    }
    public function rekappinjaman()
    {
        $this->load->library('fpdf_gen');
        $this->load->library('Fpdf_mctable');
        $this->load->view('backend/anggota/rekappinjaman');
    }
    public function tabunganguru()
    {
        $data['title'] = ' | Tabungan';
        $data['datas'] = $this->Model_anggota->tampiltabunganguru();
        $data['kredits'] = $this->Model_anggota->kredit();
        $data['debets'] = $this->Model_anggota->debet();
      
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/anggota/tabungan', $data);
        $this->load->view('templates/backend/footer');
    }
    public function pinjamanguru()
    {
        $data['title'] = ' | Pinjaman';
        $data['datas'] = $this->Model_anggota->tampilpinjamanguru();
        $data['bayars'] = $this->Model_anggota->bayar();
        $data['pinjams'] = $this->Model_anggota->pinjam();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/anggota/pinjaman', $data);
        $this->load->view('templates/backend/footer');
    }
}
