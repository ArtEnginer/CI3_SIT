 <?php class Model_pinjaman extends CI_Model
    {
        public function tampil()
        {
            $this->db->select('*, tb_users.nama, tb_users.level');
            $this->db->join('tb_users', 'tb_users.id_user = tb_pinjaman.id_user', 'left');
            return $this->db->get('tb_pinjaman')->result();
        }
        public function cetakpinjamand($p1, $p2)
        {
            $this->db->select('*, tb_users.nama');
            $this->db->join('tb_users', 'tb_users.id_user = tb_pinjaman.id_user', 'left');
            $this->db->where('tb_pinjaman.waktu >=', $p1);
            $this->db->where('tb_pinjaman.waktu <=', $p2);
            return $this->db->get('tb_pinjaman')->result();
        }
        public function savepinjaman()
        {
            $id_user = $this->input->post('id_user');
            $id_user = explode('/', $id_user);
            $id_user = $id_user[0];
    
            $data                                              = ['keterangan' => $this->input->post('keterangan'), 'id_user' => $id_user, 'waktu' => $this->input->post('waktu') . ' ' . date('H: i: s'), 'jumlah_pinjam' => $this->input->post('jumlah_pinjam'), 'kode' => '1'];
            $this->db->insert('tb_pinjaman', $data);
            $this->session->set_flashdata('pesan', '<div class = "alert alert-success">Berhasil Menambah Data.!</div>');
            redirect('pinjaman/index', 'refresh');
        }
        public function savepinjamanbayar()
        {
            $id_user = $this->input->post('id_user');
            $id_user = explode('/', $id_user);
            $id_user = $id_user[0];
            $data = ['keterangan' => $this->input->post('keterangan'), 'id_user' => $id_user, 'waktu' => $this->input->post('waktu') . ' ' . date('H:i:s'), 'jumlah_bayar' => $this->input->post('jumlah_bayar'), 'kode' => '2'];
            $this->db->insert('tb_pinjaman', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambah Data.!</div>');
            redirect('pinjaman/index', 'refresh');
        }
        public function tampileditpinjaman($where)
        {
            $this->db->where($where);
            return $this->db->get('tb_pinjaman', $where)->result();
        }
        public function updatepinjaman($where)
        {
            $data = array('keterangan' => $this->input->post('keterangan'), 'id_user' => $this->input->post('id_user'), 'jumlah_pinjam' => $this->input->post('jumlah_pinjam'), 'waktu' => $this->input->post('waktu'), 'jumlah_bayar' => $this->input->post('jumlah_bayar'));
            $this->db->where($where);
            $this->db->update('tb_pinjaman', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Perbarui Data.!</div>');
            redirect('pinjaman/index', 'refresh');
        }
    }
