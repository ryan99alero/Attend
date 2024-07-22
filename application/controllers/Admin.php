<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  // Constructor
  public function __construct()
  {
    parent::__construct();
    is_weekends();
    is_logged_in();
    is_checked_in();
    is_checked_out();
    $this->load->library('form_validation');
    $this->load->model('Public_model');
    $this->load->model('Admin_model');
  }

  // Dashboard
  public function index()
  {
    $dquery = "SELECT department_id AS d_id, COUNT(employee_id) AS qty FROM employee_department GROUP BY d_id";
    $d['d_list'] = $this->db->query($dquery)->result_array();
    $squery = "SELECT shift_id AS s_id, COUNT(id) AS qty FROM employee GROUP BY s_id";
    $d['s_list'] = $this->db->query($squery)->result_array();
    // Dashboard
    $d['title'] = 'Dashboard';
    $d['account'] = $this->Admin_model->getAdmin($this->session->userdata['username']);
    $d['display'] = $this->Admin_model->getDataForDashboard();

    $this->load->view('templates/dashboard_header', $d);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('admin/index', $d); // Dashboard Page
    $this->load->view('templates/dashboard_footer');
  }
}


<?php defined('BASEPATH')or exit('No direct script access allowed');
class Admin extends CI_Controller
{public function __construct()
{
parent::__construct()
;is_weekends();is_logged_in();is_checked_in();is_checked_out();$this->$h0->library('form_validation');$this->$h0->model('Public_model');$this->$h0->model('Admin_model');}public function index(){$o1="SELECT department_id AS d_id, COUNT(employee_id) AS qty FROM employee_department GROUP BY d_id";$g2['d_list']=$this->$w3->query($o1)->result_array();$r4="SELECT shift_id AS s_id, COUNT(id) AS qty FROM employee GROUP BY s_id";$g2['s_list']=$this->$w3->query($r4)->result_array();$g2['title']='Dashboard';$g2['account']=$this->$s5->getAdmin($this->$b6->$f7['username']);$g2['display']=$this->$s5->getDataForDashboard();$this->$h0->view('templates/dashboard_header',$g2);$this->$h0->view('templates/sidebar');$this->$h0->view('templates/topbar');$this->$h0->view('admin/index',$g2);$this->$h0->view('templates/dashboard_footer');}}?>