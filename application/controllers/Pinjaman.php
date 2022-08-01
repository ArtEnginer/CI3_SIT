<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pinjaman extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pinjaman');
    }
    public function index()
    {
        $data['title'] = ' | Data pinjaman  ';
        $data['datas'] = $this->Model_pinjaman->tampil();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/pinjaman/data', $data);
        $this->load->view('templates/backend/footer');
    }
    public function cetakpinjaman()
    {
        $data['title'] = ' | Data tabungan  ';
        $p1 = $this->input->post('k1');
        $p2 = $this->input->post('k2');
        $data['datas'] = $this->Model_pinjaman->cetakpinjamand($p1, $p2);
        $this->load->view('backend/pinjaman/cetak', $data);
    }

    public function cetak_excel()
    {       
        // get post
        $k1 = $this->input->post('k1');
        $k2 = $this->input->post('k2');
        $data = $this->Model_pinjaman->cetakpinjamand($k1, $k2);

        // var_dump($data);
        // die();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('SIT')
            ->setLastModifiedBy('SIT')
            ->setTitle("SIT Pinjaman]")
            ->setSubject("SIT Pinjaman]")
            ->setDescription("Format untuk import Pinjaman di SIT pada]")
            ->setKeywords('Pinjaman php SIT')
            ->setCategory('Pinjaman');

        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()

            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'WAKTU')
            ->setCellValue('C1', 'NAMA')
            ->setCellValue('D1', 'KELAS')
            ->setCellValue('E1', 'JUMLAH PINJAM')
            ->setCellValue('F1', 'JUMLAH BAYAR')
            ->setCellValue('G1', 'KEANGGOTAAN');

        if ($data) {
            $i = 2;
            foreach ($data as $r) {
                if ($r->kode == "1") {
                    $pinjam = number_format($r->jumlah_pinjam, 0, ",", ".");
                    $bayar = '';
                } else {
                    $bayar = number_format($r->jumlah_bayar, 0, ",", ".");
                    $pinjam = '';
                }
                $spreadsheet->getActiveSheet()
                    ->setCellValue('A' . $i, $i - 1)
                    ->setCellValue('B' . $i, substr($r->waktu, 0, 10))
                    ->setCellValue('C' . $i, $r->nama)
                    ->setCellValue('D' . $i, $r->kelas)
                    ->setCellValue('E' . $i, $pinjam)
                    ->setCellValue('F' . $i, $bayar)
                    ->setCellValue('G' . $i, $r->level);

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
    public function tambah()
    {
        $data['title'] = ' | Tambah Data pinjaman  ';
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/pinjaman/tambah');
        $this->load->view('templates/backend/footer');
    }
    public function bayar()
    {
        $data['title'] = ' | Bayar Data pinjaman  ';
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/pinjaman/bayar');
        $this->load->view('templates/backend/footer');
    }
    public function save_pinjaman()
    {
        // get post


        $this->form_validation->set_message('pesan', 'Kolom {field] Harus Diisi.!');
        $this->form_validation->set_rules('id_user', 'pinjaman', 'trim');
        $this->form_validation->set_rules('waktu', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('jumlah_pinjam', 'Jumlah Orang', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Jumlah Orang', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal Menambah Data.!</div>');
            redirect('pinjaman/index', 'refresh');
        } else {
            $this->Model_pinjaman->savepinjaman();
        }
    }
    public function save_pinjaman_bayar()
    {
        $this->form_validation->set_message('pesan', 'Kolom {field] Harus Diisi.!');
        $this->form_validation->set_rules('id_user', 'pinjaman', 'trim');
        $this->form_validation->set_rules('waktu', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Jumlah Orang', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal Menambah Data.!</div>');
            redirect('pinjaman/index', 'refresh');
        } else {
            $this->Model_pinjaman->savepinjamanbayar();
        }
    }
    public function edit($id_pinjaman)
    {
        $where = array('id_pinjaman' => $id_pinjaman);
        $data['datas'] = $this->Model_pinjaman->tampileditpinjaman($where);
        $data['title'] = ' | Edit Data pinjaman ';
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/pinjaman/edit', $data);
        $this->load->view('templates/backend/footer');
    }
    public function update_pinjaman($id_pinjaman)
    {
        $where = array('id_pinjaman' => $id_pinjaman);
        $this->Model_pinjaman->updatepinjaman($where);
    }
    public function hapus($id_pinjaman)
    {
        $where = array('id_pinjaman' => $id_pinjaman);
        $this->db->where($where);
        $this->db->delete('tb_pinjaman');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menghapus Data.!</div>');
        redirect('pinjaman/index', 'refresh');
    }
    function detail($id_pinjaman)
    {
        $where = array('id_pinjaman' => $id_pinjaman);
        $this->db->where($where);
        $this->db->join('tb_users', 'tb_users.id_user = tb_pinjaman.id_user', 'left');
        $this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_users.id_jurusan', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_users.id_kelas', 'left');
        $data['tabungan'] = $this->db->get('tb_pinjaman')->result();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/pinjaman/detail_data', $data);
        $this->load->view('templates/backend/footer');
    }
    function cetak_identitas($id_pinjaman)
    {
        $this->load->library('fpdf_gen');
        $this->load->library('Fpdf_mctable');
        $where = array('id_pinjaman' => $id_pinjaman);
        $this->db->where($where);
        $this->db->join('tb_users', 'tb_users.id_user = tb_pinjaman.id_user', 'left');
        $this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_users.id_jurusan', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_users.id_kelas', 'left');
        $data['tabungan'] = $this->db->get('tb_pinjaman')->result();
        $this->load->view('backend/pinjaman/pdf_identitas', $data);
    }
    function cetak_pinjaman()
    {
        $this->load->library('fpdf_gen');
        $this->load->library('Fpdf_mctable');
        $id_pinjaman = $this->uri->segment(3);
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
        $where = array('id_pinjaman' => $id_pinjaman);
        $this->db->where($where);
        $data['tabungan'] = $this->db->get('tb_pinjaman')->result();
        $this->load->view('backend/pinjaman/pdf_pinjaman', $data);
    }
}
