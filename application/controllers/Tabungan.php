<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Tabungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_tabungan');
        $this->load->model('Model_pinjaman');
    }
    public function index()
    {
        $data['title'] = ' | Data tabungan  ';
        $data['datas'] = $this->Model_tabungan->tampil();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/tabungan/data', $data);
        $this->load->view('templates/backend/footer');
    }
    function cetak_excel()
    {
        // get post
        $k1 = $this->input->post('k1');
        $k2 = $this->input->post('k2');
        $data = $this->Model_tabungan->cetaktabungand($k1, $k2);

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('SIT')
            ->setLastModifiedBy('SIT')
            ->setTitle("SIT Tabungan]")
            ->setSubject("SIT Tabungan]")
            ->setDescription("Format untuk import Tabungan di SIT pada]")
            ->setKeywords('Tabungan php SIT')
            ->setCategory('Tabungan');

        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()

            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'PERIODE')
            ->setCellValue('C1', 'WAKTU')
            ->setCellValue('D1', 'NAMA')
            ->setCellValue('E1', 'KELAS')
            ->setCellValue('F1', 'DEBIT')
            ->setCellValue('G1', 'CREDIT')
            ->setCellValue('H1', 'KEANGOTAAN');

        if ($data) {
            $i = 2;
            foreach ($data as $r) {
                if ($r->jumlah_nabung == 0) {
                    $debet = "";
                } else {
                    $debet = number_format($r->jumlah_nabung, 0, ",", ".");
                }
                if ($r->jumlah_ambil == 0) {
                    $kredit = "";
                } else {
                    $kredit = number_format($r->jumlah_ambil, 0, ",", ".");
                }
                $spreadsheet->getActiveSheet()
                    ->setCellValue('A' . $i, $i - 1)
                    ->setCellValue('B' . $i, $r->tahun_akademik)
                    ->setCellValue('C' . $i, substr($r->waktu, 0, 10))
                    ->setCellValue('D' . $i, $r->nama)
                    ->setCellValue('E' . $i, $r->kelas)
                    ->setCellValue('F' . $i, $kredit)
                    ->setCellValue('G' . $i, $debet)
                    ->setCellvalue('H' . $i, $r->level);

                $i++;
            }
        }
        $spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->setAutoFilter($spreadsheet->getActiveSheet()->calculateWorksheetDimension());

        // ob_clean();
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode('Laporan.xlsx') . '"');
        $writer->save('php://output');
        exit();
    }
    public function cetaktabungan()
    {
        $data['title'] = ' | Data tabungan  ';
        $p1 = $this->input->post('k1');
        $p2 = $this->input->post('k2');
        $data['datas'] = $this->Model_tabungan->cetaktabungand($p1, $p2);
        $this->load->view('backend/tabungan/cetak', $data);
    }
    public function tambah()
    {
        $data['title'] = ' | Tambah Data tabungan  ';
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/tabungan/tambah');
        $this->load->view('templates/backend/footer');
    }
    public function ambil()
    {
        $data['title'] = ' | Pengambilan Data tabungan  ';
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/tabungan/ambil');
        $this->load->view('templates/backend/footer');
    }
    public function save_tabungan()
    {
        $this->form_validation->set_message('pesan', 'Kolom {field] Harus Diisi.!');
        $this->form_validation->set_rules('id_user', 'tabungan', 'trim|required');
        $this->form_validation->set_rules('id_periode', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('jumlah_nabung', 'Jumlah Menabung', 'trim|required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal Menambah Data.!</div>');
            redirect('tabungan/index', 'refresh');
        } else {
            $this->Model_tabungan->savetabungan();
        }
    }
    public function save_tabungan_ambil()
    {
        $this->form_validation->set_message('pesan', 'Kolom {field] Harus Diisi.!');
        $this->form_validation->set_rules('id_user', 'tabungan', 'trim|required');
        $this->form_validation->set_rules('id_periode', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('jumlah_ambil', 'Jumlah Pengambilan', 'trim|required');
        $this->form_validation->set_rules('waktu', 'Jumlah Orang', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal Menambah Data.!</div>');
            redirect('tabungan/index', 'refresh');
        } else {
            $this->Model_tabungan->savetabunganambil();
        }
    }
    public function edit($id_tabungan)
    {
        $where = array('id_tabungan' => $id_tabungan);
       
        $data['datas'] = $this->Model_tabungan->tampiledittabungan($where);
       
        $data['title'] = ' | Edit Data tabungan ';
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/tabungan/edit', $data);
        $this->load->view('templates/backend/footer');
    }
    public function update_tabungan($id_tabungan)
    {
        $where = array('id_tabungan' => $id_tabungan);
        $this->Model_tabungan->updatetabungan($where);
    }
    public function hapus($id_tabungan)
    {
        $where = array('id_tabungan' => $id_tabungan);
        $this->db->where($where);
        $this->db->delete('tb_tabungan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menghapus Data.!</div>');
        redirect('tabungan/index', 'refresh');
    }
    function detail($id_tabungan)
    {
        $where = array('id_tabungan' => $id_tabungan);
        $this->db->where($where);
        $this->db->join('tb_users', 'tb_users.id_user = tb_tabungan.id_user', 'left');
        $this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_users.id_jurusan', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_users.id_kelas', 'left');
        $data['tabungan'] = $this->db->get('tb_tabungan')->result();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/tabungan/detail_data', $data);
        $this->load->view('templates/backend/footer');
    }
    function cetak_identitas($id_tabungan)
    {
        $this->load->library('fpdf_gen');
        $this->load->library('Fpdf_mctable');
        $where = array('id_tabungan' => $id_tabungan);
        $this->db->where($where);
        $this->db->join('tb_users', 'tb_users.id_user = tb_tabungan.id_user', 'left');
        $this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_users.id_jurusan', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_users.id_kelas', 'left');
        $data['tabungan'] = $this->db->get('tb_tabungan')->result();
        $this->load->view('backend/tabungan/pdf_identitas', $data);
    }
    function cetak_tabungan()
    {
        $this->load->library('fpdf_gen');
        $this->load->library('Fpdf_mctable');
        $id_tabungan = $this->uri->segment(3);
        $data['urut'] = $this->input->post('no_urut');
        $no_baris = $this->input->post('no_baris');
        switch ($no_baris) {
            case "1":
                $data['tinggi'] = '42';
                break;
            case "2":
                $data['tinggi'] = '50';
                break;
            case "3":
                $data['tinggi'] = '58';
                break;
            case "4":
                $data['tinggi'] = '66';
                break;
            case "5":
                $data['tinggi'] = '74';
                break;
            case "6":
                $data['tinggi'] = '82';
                break;
            case "7":
                $data['tinggi'] = '90';
                break;
            case "8":
                $data['tinggi'] = '98';
                break;
            case "9":
                $data['tinggi'] = '106';
                break;
            case "10":
                $data['tinggi'] = '114';
                break;
            case "11":
                $data['tinggi'] = '122';
                break;
            case "12":
                $data['tinggi'] = '130';
                break;
            case "13":
                $data['tinggi'] = '138';
                break;
            case "14":
                $data['tinggi'] = '146';
                break;
            case "15":
                $data['tinggi'] = '154';
                break;
            case "16":
                $data['tinggi'] = '162';
                break;
            case "17":
                $data['tinggi'] = '170';
                break;
            case "18":
                $data['tinggi'] = '178';
                break;
            case "19":
                $data['tinggi'] = '186';
                break;
            case "20":
                $data['tinggi'] = '194';
                break;
        }
        $where = array('id_tabungan' => $id_tabungan);
        $this->db->where($where);
        $data['tabungan'] = $this->db->get('tb_tabungan')->result();
        $this->load->view('backend/tabungan/pdf_tabungan', $data);
    }
}
