<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model("Data_barang");

	}

	public function index()
	{
    $this->load->view('login');
  }

  public function add_input(){
      // $username = $this->input->post("username");
      // $password = $this->input->post("password");
      // $fullname = $this->input->post("fullname");
      // $level = $this->input->post("level");
  
      // $data = array(
      // 	'username' => $username,
      // 	'password' => $password,
      // 	'fullname' => $fullname,
      // 	'level' => $level);
  
      $this->Data_barang->submit($data);
      //$this->load->view("login");
      redirect('Admin/managebarang');
  }

  public function logine()
    {
      if(isset($_POST['submit'])){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $berhasil = $this->model_login->login($username,$password);
        if($berhasil == 1){
            $this->session->set_userdata(array('status_login'=>'sukses'));
            redirect('managebarang');
          }else{
            redirect('login');
          }
        }
    }
    
  public function managebarang(){
    $datane ['tbarang']=$this->Data_barang->gets();
    $this->load->view('managedata', $datane);
         
  }

  public function edited($id){
    $this->load->database();
    $q = $this->db->get_where('tabelbarang', array('id' => $id));
    echo json_encode($q->row());
  }

  public function del($id){
		//$this->load->model('Data_user');
		$this->Data_barang->del($id);

		redirect('Admin/managebarang');
  }

  public function edit($id)
  {
    if($this->input->post('submit')){
      $this->Data_barang->update($id);
      redirect('Admin/managebarang');
  }
    $data['hasil'] = $this->Data_barang->getById($id);
    $this->load->view('edit_data', $data);
  }
}