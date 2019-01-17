<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
		parent::__construct();
    $this->load->model("Data_barang");

    if($this->session->userdata('status') != "login"){
			redirect(base_url("index.php/login"));
		}

	}

	public function index()
	{
    $this->load->view('login');
  }

  public function add_input(){
      $this->Data_barang->submit($data);
      //$this->load->view("login");
      redirect('Admin/managebarang');
  }
    
  public function managebarang(){
    $datane ['tbarang']=$this->Data_barang->gets();
    $this->load->view('managedata', $datane);
         
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