<?php class Model_anggota extends CI_Model{public function tampiltabungansiswa(){$ses=$this->session->userdata('id_user');$this->db->select('*, tb_users.nama, tb_periode.tahun_akademik');$this->db->join('tb_users','tb_users.id_user = tb_tabungan.id_user','left');$this->db->join('tb_periode','tb_periode.id_periode = tb_tabungan.id_periode','left');$this->db->where('tb_tabungan.id_user',$ses);return $this->db->get('tb_tabungan')->result();}function kredit(){$ses=$this->session->userdata('id_user');$where=['id_user'=>$ses];$this->db->select_sum('jumlah_nabung');$this->db->where($where);$sql=$this->db->get('tb_tabungan')->row();$kredit=$sql->jumlah_nabung;if(empty($kredit)){$kredit=0;}else{$kredit=$sql->jumlah_nabung;}return $kredit;}function debet(){$ses=$this->session->userdata('id_user');$where=['id_user'=>$ses];$this->db->select_sum('jumlah_ambil');$this->db->where($where);$sql=$this->db->get('tb_tabungan')->row();$debet=$sql->jumlah_ambil;if(empty($debet)){$debet=0;}else{$debet=$sql->jumlah_ambil;}return $debet;}function bayar(){$ses=$this->session->userdata('id_user');$where=['id_user'=>$ses];$this->db->select_sum('jumlah_bayar');$this->db->where($where);$sql=$this->db->get('tb_pinjaman')->row();$kredit=$sql->jumlah_bayar;if(empty($kredit)){$kredit=0;}else{$kredit=$sql->jumlah_bayar;}return $kredit;}function pinjam(){$ses=$this->session->userdata('id_user');$where=['id_user'=>$ses];$this->db->select_sum('jumlah_pinjam');$this->db->where($where);$sql=$this->db->get('tb_pinjaman')->row();$debet=$sql->jumlah_pinjam;if(empty($debet)){$debet=0;}else{$debet=$sql->jumlah_pinjam;}return $debet;}public function tampilpinjamansiswa(){$ses=$this->session->userdata('id_user');$this->db->select('*, tb_users.nama');$this->db->join('tb_users','tb_users.id_user = tb_pinjaman.id_user','left');$this->db->where('tb_pinjaman.id_user',$ses);return $this->db->get('tb_pinjaman')->result();}public function tampiltabunganguru(){$ses=$this->session->userdata('id_user');$this->db->select('*, tb_users.nama, tb_periode.tahun_akademik');$this->db->join('tb_users','tb_users.id_user = tb_tabungan.id_user','left');$this->db->join('tb_periode','tb_periode.id_periode = tb_tabungan.id_periode','left');$this->db->where('tb_tabungan.id_user',$ses);return $this->db->get('tb_tabungan')->result();}public function tampilpinjamanguru(){$ses=$this->session->userdata('id_user');$this->db->select('*, tb_users.nama');$this->db->join('tb_users','tb_users.id_user = tb_pinjaman.id_user','left');$this->db->where('tb_pinjaman.id_user',$ses);return $this->db->get('tb_pinjaman')->result();}} ?>