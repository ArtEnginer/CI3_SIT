<?php class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dashboard');
    }
    public function index()
    {
        $data['title'] = ' | Dashboard';
        $data['total_users'] = $this->Model_dashboard->total_users()->num_rows();
        $data['total_siswa'] = $this->Model_dashboard->total_siswa()->num_rows();
        $data['total_guru'] = $this->Model_dashboard->total_guru()->num_rows();
        $data['total_tabungan'] = $this->Model_dashboard->total_tabungan()->num_rows();
        $data['total_pinjaman'] = $this->Model_dashboard->total_pinjaman()->num_rows();
        $data['pin_masuk'] = $this->Model_dashboard->pin_masuk();
        $data['pin_keluar'] = $this->Model_dashboard->pin_keluar();
        $data['tab_masuk'] = $this->Model_dashboard->tab_masuk();
        $data['tab_keluar'] = $this->Model_dashboard->tab_keluar();
        $this->load->view('templates/backend/header', $data);
        $this->load->view('templates/backend/sidebar');
        $this->load->view('backend/dashboard/index', $data);
        $this->load->view('templates/backend/footer');
    }
}
