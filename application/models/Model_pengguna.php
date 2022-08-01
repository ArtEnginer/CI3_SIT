<?php class Model_pengguna extends CI_Model
{
    public function tampil()
    {
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_users.id_kelas', 'left');
        return $this->db->get('tb_users')->result();
    }
    public function savepengguna()
    {
        $data = ['id_siswa' => $this->input->post('id_siswa'), 'id_guru' => $this->input->post('id_guru'), 'username' => $this->input->post('username'), 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), 'level' => $this->input->post('level'), 'status_akun' => $this->input->post('status_akun')];
        $data = $this->security->xss_clean($data);
        $this->db->insert('tb_users', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambah Data.!</div>');
        redirect('pengguna/index', 'refresh');
    }
    public function editpengguna($where)
    {
        $this->db->where($where);
        return $this->db->get('tb_users', $where)->result();
    }
    public function caripengguna($p)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->like('nama', $p);
        $this->db->or_like('username', $p);
        $this->db->or_like('alamat', $p);
        $this->db->or_like('telepon', $p);
        $this->db->or_like('norek', $p);
        return $this->db->get()->result();
    }
}
