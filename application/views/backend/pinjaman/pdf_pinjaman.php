<?php $pdf=new MC_Table('P','mm','A4');$pdf->AddPage();$pdf->SetMargins(30,12,30);$file='pinjaman_data.pdf';$pdf->Ln($tinggi);$pdf->setFont('Arial',"","10");$pdf->SetTextColor(0,0,0);foreach($tabungan as $row){$pdf->Cell(1);$pdf->SetWidths(array(10,25,41,23,23,23));$pdf->SetAligns(array('R','L','L','R','R','R'));$this->db->select_sum('jumlah_pinjam');$where=['id_user'=>$row->id_user,'waktu <='=>$row->waktu];$this->db->where($where);$utang=$this->db->get('tb_pinjaman')->row();if(empty($utang->jumlah_pinjam)){$debet=0;}else{$debet=$utang->jumlah_pinjam;}$this->db->select_sum('jumlah_bayar');$where=['id_user'=>$row->id_user,'waktu <='=>$row->waktu];$this->db->where($where);$bayar=$this->db->get('tb_pinjaman')->row();if(empty($bayar->jumlah_bayar)){$kredit=0;}else{$kredit=$bayar->jumlah_bayar;}$saldo=$debet-$kredit;if($row->kode=="1"){$pdf->Row_noborder(array(array($urut."."),array(substr($row->waktu,0,10)),array("Jumlah piutang"),array(number_format($utang->jumlah_pinjam,0,",",".")),array(""),array(number_format($saldo,0,",","."))),4);}else{$pdf->Row_noborder(array(array($urut."."),array(substr($row->waktu,0,10)),array("Pembayaran piutang"),array(""),array(number_format($bayar->jumlah_bayar,0,",",".")),array(number_format($saldo,0,",","."))),4);}}echo $pdf->Output($file,"I"); ?>