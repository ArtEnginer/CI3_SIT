<div class="app-main__outer"><div class="app-main__inner"><div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div><h5>Detail Tabungan</h5><div class="row"><div class="col-lg-12"><div class="card main-card mb-3"><div class="card-body"><h5 class="card-title"><div><table width="100%"><tr><td width="20%">Nama</td><td width="2%">:</td><td><?=$identitas->nama?></td></tr><tr><td>No. Telepon</td><td>:</td><td><?=$identitas->telepon?></td></tr><tr><td>No. Rekening</td><td>:</td><td><?=$identitas->norek?></td></tr><tr><td>Alamat</td><td>:</td><td><?=$identitas->alamat?></td></tr></table></div><br><div class="search-wrapper"><div class="row"><div class="col-md-12"><p>Pencetakan Data</p><?php echo form_open('exceltabungan?id='.$this->input->get('id')) ?><div class="form-row"><div class="col-md-3"><div class="form-group position-relative"><input class="form-control"name="k1"placeholder="Nama Anggota.."required type="date"></div></div><div class="col-md-3"><div class="form-group position-relative"><input class="form-control"name="k2"placeholder="Nama Anggota.."required type="date"></div></div><div class="col-md-3"><div class="form-group position-relative"><button class="btn btn-primary btn-sm"type="submit">Export Data <i class="fa fa-download"></i></button></div></div></div><?php echo form_close(); ?></div></div></div></h5><div class="row"><div class="col-md-12"><div class="table-responsive"><table class="mb-0 table table-bordered table-hover"><thead><tr><th style="font-size:12px">NO</th><th style="font-size:12px">WAKTU</th><th style="font-size:12px">URAIAN</th><th style="font-size:12px">DEBET</th><th style="font-size:12px">KREDIT</th><th style="font-size:12px">SALDO</th></tr></thead><tbody><?php $i=1;foreach($tabungan as $row){if($row->kode=="1"){$ket='Transaksi masuk';}else{$ket='Transaksi keluar';} ?><tr><td style="font-size:12px"><?php echo $i; ?></td><td style="font-size:12px"><?php echo substr($row->waktu,0,10); ?></td><td style="font-size:12px"><?php echo $ket; ?></td><?php if($row->kode=="1"){$kredit=number_format($row->jumlah_nabung,0,",",".");$debet='';}else{$debet=number_format($row->jumlah_ambil,0,",",".");$kredit='';} ?><td style="font-size:12px"class="text-right"><?=$debet?></td><td style="font-size:12px"class="text-right"><?=$kredit?></td><?php $this->db->select_sum('jumlah_nabung');$where=['id_user'=>$row->id_user,'waktu <='=>$row->waktu];$this->db->where($where);$msk=$this->db->get('tb_tabungan')->row();if(empty($msk->jumlah_nabung)){$kredit=0;}else{$kredit=$msk->jumlah_nabung;}$this->db->select_sum('jumlah_ambil');$where=['id_user'=>$row->id_user,'waktu <='=>$row->waktu];$this->db->where($where);$klr=$this->db->get('tb_tabungan')->row();if(empty($klr->jumlah_ambil)){$debet=0;}else{$debet=$klr->jumlah_ambil;}$saldo=$kredit-$debet; ?><td style="font-size:12px"class="text-right"><?=number_format($saldo,0,",",".")?></td></tr><?php $i++;} ?></tbody></table></div></div></div></div></div></div></div></div>