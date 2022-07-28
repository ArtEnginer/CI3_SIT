 <?php class Model_tabungan extends CI_Model
    {
        public function tampil()
        {
            $this->db->select('*, tb_users.nama, tb_periode.tahun_akademik');
            $this->db->join('tb_users', 'tb_users.id_user = tb_tabungan.id_user', 'left');
            $this->db->join('tb_periode', 'tb_periode.id_periode = tb_tabungan.id_periode', 'left');
            return $this->db->get('tb_tabungan')->result();
        }
        public function cetaktabungand($p1, $p2)
        {
            $this->db->select('*, tb_users.nama, tb_periode.tahun_akademik');
            $this->db->join('tb_users', 'tb_users.id_user = tb_tabungan.id_user', 'left');
            $this->db->join('tb_periode', 'tb_periode.id_periode = tb_tabungan.id_periode', 'left');
            $this->db->where('tb_tabungan.waktu >=', $p1 . ' ' . '00:00:00');
            $this->db->where('tb_tabungan.waktu <=', $p2 . ' ' . '23:59:59');
            return $this->db->get('tb_tabungan')->result();
        }
        public function savetabungan()
        {
            $id_user = $this->input->post('id_user');
            $id_user = explode('/', $id_user);
            $id_user = $id_user[0];
            if ($this->input->post('jumlah_nabung') == 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Jumlah tabungan tidak boleh Nol</div>');
                redirect('tabungan/index', 'refresh');
            } else {
                $time = date('H:i:s');
                $data = ['kode' => '1', 'id_user' => $id_user, 'id_periode' => $this->input->post('id_periode'), 'jumlah_nabung' => $this->input->post('jumlah_nabung'), 'waktu' => $this->input->post('waktu') . ' ' . $time, 'keterangan' => $this->input->post('keterangan')];
                $this->db->insert('tb_tabungan', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambah Data.!</div>');
                redirect('tabungan/index', 'refresh');
            }
        }
        public function savetabunganambil()
        {
            $id_user = $this->input->post('id_user');
            $id_user = explode('/', $id_user);
            $id_user = $id_user[0];
            
            if ($this->input->post('jumlah_ambil') == 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Jumlah pengambilan tidak boleh Nol</div>');
                redirect('tabungan/index', 'refresh');
            } else {
                $time = date('H:i:s');
                $data = ['kode' => '2', 'id_user' => $id_user, 'id_periode' => $this->input->post('id_periode'), 'jumlah_ambil' => $this->input->post('jumlah_ambil'), 'waktu' => $this->input->post('waktu') . ' ' . $time, 'keterangan' => $this->input->post('keterangan')];
                $this->db->insert('tb_tabungan', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambah Data.!</div>');
                redirect('tabungan/index', 'refresh');
            }
        }
        public function tampiledittabungan($where)
        {
            $this->db->where($where);
            return $this->db->get('tb_tabungan', $where)->result();
        }
        public function updatetabungan($where)
        {
            $time = date('H:i:s');
            $data = array('id_user' => $this->input->post('id_user'), 'id_periode' => $this->input->post('id_periode'), 'jumlah_nabung' => $this->input->post('jumlah_nabung'), 'waktu' => $this->input->post('waktu') . ' ' . $time, 'keterangan' => $this->input->post('keterangan'));
            $this->db->where($where);
            $this->db->update('tb_tabungan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Perbarui Data.!</div>');
            redirect('tabungan/index', 'refresh');
        }
    }
