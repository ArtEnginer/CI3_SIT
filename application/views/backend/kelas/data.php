<div class="app-main__outer"><div class="app-main__inner"><h5>Data Kelas</h5><div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div><div class="row"><div class="col-lg-12"><div class="card main-card mb-3"><div class="card-body"><h5 class="card-title"><a href="<?php echo base_url('Kelas/tambah'); ?>"class="btn btn-primary btn-sm"style="font-size:12px"><i class="fa-plus fas"></i> Data Kelas</a></h5><div class="table-responsive"><table class="mb-0 table table-bordered table-hover"><thead><tr><th style="text-align:center;font-size:12px">NO</th><th style="text-align:center;font-size:12px">KELAS</th><th style="text-align:center;font-size:12px">ACTION</th></tr></thead><tbody><?php $i=1;foreach($datas as $r){ ?><tr><td style="text-align:center;font-size:12px"><?php echo $i; ?></td><td style="text-align:center;font-size:12px"><?php echo $r->kelas; ?></td><td style="text-align:center;font-size:12px"><a href="<?php echo base_url('kelas/edit/'.$r->id_kelas); ?>"><i class="fa fa-pen"title="Edit Data Kelas"></i></a> | <a href="<?php echo base_url('kelas/hapus/'.$r->id_kelas); ?>"onclick='return confirm("apakah anda ingin menghapus data kelas")'><i class="fa fa-trash"title="Hapus Data Kelas"></i></a></td></tr><?php $i++;} ?></tbody></table></div></div></div></div></div></div>