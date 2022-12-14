<?php require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Exceltabungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $id_user = $this->input->get('id');
        $k3 = $this->input->post('k1') . ' 00:00:00';
        $k4 = $this->input->post('k2') . ' 23:59:59';

        $this->db->where(['id_user' => $id_user]);
        $this->db->select('*');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_users.id_kelas', 'left');
        $identitas = $this->db->get('tb_users')->result();



        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $style_col = ['font' => ['bold' => true], 'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER], 'borders' => ['top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $style_row = ['alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER], 'borders' => ['top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $child_left = ['font' => ['size' => 10], 'borders' => ['top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $child_right = ['font' => ['size' => 10], 'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT], 'borders' => ['top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $child_center = ['font' => ['size' => 10], 'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER], 'borders' => ['top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], 'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]]];
        $headerstyle = ['font' => ['bold' => true, 'size' => 14, 'name' => 'Arial'], 'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,],];
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->setCellValue('A1', "BUKU TABUNGAN");
        $sheet->mergeCells('A1:F1');
        $sheet->getStyle('A1')->applyFromArray($headerstyle);
        $subheaderstyle = ['font' => ['bold' => false, 'size' => 10, 'name' => 'Arial'],];
        $periodestyle = ['font' => ['bold' => false, 'size' => 9, 'name' => 'Arial'], 'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,],];
        foreach ($identitas as $row) {
            $sheet->setCellValue('A3', "NAMA")->getStyle('A3')->applyFromArray($subheaderstyle);
            $sheet->setCellValue('A4', "NO. TELEPON")->getStyle('A4')->applyFromArray($subheaderstyle);
            $sheet->setCellValue('A5', "NO. REKENING")->getStyle('A5')->applyFromArray($subheaderstyle);
            $sheet->setCellValue('A6', "ALAMAT")->getStyle('A6')->applyFromArray($subheaderstyle);
            $row->level == 'guru' ? '' : $sheet->setCellValue('E6', "Kelas")->getStyle('E6')->applyFromArray($subheaderstyle);

            $sheet->setCellValue('C3', ": " . $row->nama)->getStyle('A3')->applyFromArray($subheaderstyle);
            $sheet->setCellValue('C4', ": " . $row->telepon)->getStyle('A4')->applyFromArray($subheaderstyle);
            $sheet->setCellValue('C5', ": " . $row->norek)->getStyle('A5')->applyFromArray($subheaderstyle);
            $sheet->setCellValue('C6', ": " . $row->alamat)->getStyle('A6')->applyFromArray($subheaderstyle);
            $row->level == 'guru' ? '' : $sheet->setCellValue('F6', ": " . $row->kelas)->getStyle('E6')->applyFromArray($subheaderstyle);
        }
        $sheet->mergeCells('A7:F7');
        // $sheet->setCellValue('A7', "Periode : " . substr($k3, 0, 10) . ' s.d. ' . substr($k4, 0, 10))->getStyle('A7')->applyFromArray($periodestyle);
        $sheet->setCellValue('A8', "NO.");
        $sheet->setCellValue('B8', "TANGGAL");
        $sheet->setCellValue('C8', "URAIAN");
        $sheet->setCellValue('D8', "DEBET");
        $sheet->setCellValue('E8', "KREDIT");
        $sheet->setCellValue('F8', "SALDO");

        $sheet->getStyle('A8')->applyFromArray($style_col);
        $sheet->getStyle('B8')->applyFromArray($style_col);
        $sheet->getStyle('C8')->applyFromArray($style_col);
        $sheet->getStyle('D8')->applyFromArray($style_col);
        $sheet->getStyle('E8')->applyFromArray($style_col);
        $sheet->getStyle('F8')->applyFromArray($style_col);

        $this->db->where(['id_user' => $id_user]);
        $sql = $this->db->get('tb_tabungan')->result();
        $a = 0;
        $b = 8;
        if ($sql) {
            foreach ($sql as $row) {
                $a++;
                $b++;
                if ($row->kode == "1") {
                    $ket = 'Transaksi masuk';
                } else {
                    $ket = 'Transaksi keluar';
                }
                if ($row->kode == "1") {
                    $kredit = $row->jumlah_nabung;
                    $debet = '';
                } else {
                    $debet = $row->jumlah_ambil;
                    $kredit = '';
                }
                $sheet->setCellValue('A' . $b, $a . '.')->getStyle('A' . $b)->applyFromArray($child_right);
                $sheet->setCellValue('B' . $b, substr($row->waktu, 0, 10))->getStyle('B' . $b)->applyFromArray($child_center);
                $sheet->setCellValue('C' . $b, $ket)->getStyle('C' . $b)->applyFromArray($child_left);
                $sheet->setCellValue('D' . $b, $debet)->getStyle('D' . $b)->applyFromArray($child_right);
                $sheet->setCellValue('E' . $b, $kredit)->getStyle('E' . $b)->applyFromArray($child_right);
                $this->db->select_sum('jumlah_nabung');
                $where = ['id_user' => $row->id_user, 'waktu <=' => $row->waktu];
                $this->db->where($where);
                $msk = $this->db->get('tb_tabungan')->row();
                if (empty($msk->jumlah_nabung)) {
                    $kredit2 = 0;
                } else {
                    $kredit2 = $msk->jumlah_nabung;
                }
                $this->db->select_sum('jumlah_ambil');
                $where = ['id_user' => $row->id_user, 'waktu <=' => $row->waktu];
                $this->db->where($where);
                $klr = $this->db->get('tb_tabungan')->row();
                if (empty($klr->jumlah_ambil)) {
                    $debet2 = 0;
                } else {
                    $debet2 = $klr->jumlah_ambil;
                }
                $saldo = $kredit2 - $debet2;
                $sheet->setCellValue('F' . $b, $saldo)->getStyle('F' . $b)->applyFromArray($child_right);
                $sheet->getStyle('D' . $b)->getNumberFormat()->setFormatCode('###,##');
                $sheet->getStyle('E' . $b)->getNumberFormat()->setFormatCode('###,##');
                $sheet->getStyle('F' . $b)->getNumberFormat()->setFormatCode('###,##');
            }
        }
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
        $sheet->setTitle("DATA BUKU TABUNGAN");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Rekap Tabungan.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
