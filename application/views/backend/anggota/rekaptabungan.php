<?php $pdf = new MC_Table('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(30, 10, 30);
$file = 'rekaptabungan.pdf';
$j1 = "BUKU TABUNGAN";
$pdf->setFont('Arial', "B", "13");
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(21);
$pdf->Cell(145, 7, $j1, 0, 0, "C");
$pdf->Ln(10);
$pdf->setFont('Arial', "", "10");
$pdf->SetTextColor(0, 0, 0);
$ses = $this->session->userdata('id_user');
$this->db->where(['id_user' => $ses]);
$this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_users.id_kelas');
$tabungan = $this->db->get('tb_users')->result();
foreach ($tabungan as $row) {
    $pdf->Cell(1);
    $pdf->SetWidths(array(40, 3, 87));
    $pdf->SetAligns(array('L', 'C', 'L'));
    $pdf->Row_noborder(array(array("Nama"), array(":"), array($row->nama)), 4);
    $pdf->Cell(1);
    $pdf->Row_noborder(array(array("No. Telepon"), array(":"), array($row->telepon)), 4);
    $pdf->Cell(1);
    $pdf->Row_noborder(array(array("No. Rekening"), array(":"), array($row->norek)), 4);
    $pdf->Cell(1);
    $pdf->Row_noborder(array(array("Alamat"), array(":"), array($row->alamat)), 4);
    $pdf->Cell(1);
    $pdf->Row_noborder(array(array("Kelas"), array(":"), array($row->kelas)), 4);
}
$pdf->Ln(8);
$pdf->SetWidths(array(10, 20, 40, 25, 25, 25));
$pdf->SetAligns(array('R', 'L', 'L', 'R', 'R', 'R'));
$pdf->Cell(1);
$pdf->Row(array(array("No."), array("Tanggal"), array("Uraian"), array("Debet"), array("Kredit"), array("Saldo")), 7);
$this->db->where(['id_user' => $ses]);
$rincian = $this->db->get('tb_tabungan')->result();
$a = 0;
$pdf->setFont('Arial', "", "9");
$pdf->SetTextColor(0, 0, 0);
foreach ($rincian as $row) {
    $a++;
    $this->db->select_sum('jumlah_nabung');
    $where = ['id_user' => $row->id_user, 'waktu <=' => $row->waktu];
    $this->db->where($where);
    $msk = $this->db->get('tb_tabungan')->row();
    if (empty($msk->jumlah_nabung)) {
        $kredit = 0;
    } else {
        $kredit = $msk->jumlah_nabung;
    }
    $this->db->select_sum('jumlah_ambil');
    $where = ['id_user' => $row->id_user, 'waktu <=' => $row->waktu];
    $this->db->where($where);
    $klr = $this->db->get('tb_tabungan')->row();
    if (empty($klr->jumlah_ambil)) {
        $debet = 0;
    } else {
        $debet = $klr->jumlah_ambil;
    }
    $saldo = $kredit - $debet;
    $pdf->Cell(1);
    if ($row->kode == "1") {
        $pdf->Row_noborder(array(array($a . "."), array(substr($row->waktu, 0, 10)), array("Tabungan Masuk"), array(""), array(number_format($row->jumlah_nabung, 0, ",", ".")), array(number_format($saldo, 0, ",", "."))), 5);
    } else {
        $pdf->Row_noborder(array(array($a . "."), array(substr($row->waktu, 0, 10)), array("Pengambilan tabungan"), array(number_format($row->jumlah_ambil, 0, ",", ".")), array(""), array(number_format($saldo, 0, ",", "."))), 5);
    }
}
echo $pdf->Output($file, "I");
