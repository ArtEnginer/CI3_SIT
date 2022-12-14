<?php $pdf = new MC_Table('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(30, 10, 30);
$file = 'rekappinjaman.pdf';
$j1 = "BUKU PIUTANG";
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
$rincian = $this->db->get('tb_pinjaman')->result();
$a = 0;
$pdf->setFont('Arial', "", "9");
$pdf->SetTextColor(0, 0, 0);
foreach ($rincian as $row) {
    $a++;
    $this->db->select_sum('jumlah_bayar');
    $where = ['id_user' => $row->id_user, 'waktu <=' => $row->waktu];
    $this->db->where($where);
    $msk = $this->db->get('tb_pinjaman')->row();
    if (empty($msk->jumlah_bayar)) {
        $kredit = 0;
    } else {
        $kredit = $msk->jumlah_bayar;
    }
    $this->db->select_sum('jumlah_pinjam');
    $where = ['id_user' => $row->id_user, 'waktu <=' => $row->waktu];
    $this->db->where($where);
    $klr = $this->db->get('tb_pinjaman')->row();
    if (empty($klr->jumlah_pinjam)) {
        $debet = 0;
    } else {
        $debet = $klr->jumlah_pinjam;
    }
    $saldo = $debet - $kredit;
    $pdf->Cell(1);
    if ($row->kode == "1") {
        $pdf->Row_noborder(array(array($a . "."), array(substr($row->waktu, 0, 10)), array("Peminjaman"), array(number_format($row->jumlah_pinjam, 0, ",", ".")), array(""), array(number_format($saldo, 0, ",", "."))), 5);
    } else {
        $pdf->Row_noborder(array(array($a . "."), array(substr($row->waktu, 0, 10)), array("Pembayaran piutang"), array(""), array(number_format($row->jumlah_bayar, 0, ",", ".")), array(number_format($saldo, 0, ",", "."))), 5);
    }
}
echo $pdf->Output($file, "I");
