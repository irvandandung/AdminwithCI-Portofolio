<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Data_barang extends CI_Model
{
  public function __construct()
	{
		$this->load->database();
  }
    
  public function gets(){
		return $this->db->get('tabelbarang')->result();
	}

	public function submit($data){
		$kodebarang = $this->input->post("kodebarang");
		$namabarang = $this->input->post("namabarang");
		$jumlahbarang = $this->input->post("jumlahbarang");
    $hargabarang = $this->input->post("hargabarang");
    $hargatotal = $hargabarang*$jumlahbarang;

		$data = array(
			'kodebarang' => $kodebarang,
			'namabarang' => $namabarang,
			'jumlahbarang' => $jumlahbarang,
			'hargabarang' => $hargabarang,
			'hargatotal' => $hargatotal);
		$this->db->insert("tabelbarang", $data);
	}

	public function del($id){
		$this->db->delete("tabelbarang", ["id"=>$id]);
	}

	function update($id) {
		$kodebarang = $this->input->post("kodebarang");
		$namabarang = $this->input->post("namabarang");
		$jumlahbarang = $this->input->post("jumlahbarang");
    $hargabarang = $this->input->post("hargabarang");
    $hargatotal = $hargabarang*$jumlahbarang;
		$data = array (
			'kodebarang' => $kodebarang,
			'namabarang' => $namabarang,
			'jumlahbarang' => $jumlahbarang,
			'hargabarang' => $hargabarang,
			'hargatotal' => $hargatotal);
		$this->db->where('id', $id);
		$this->db->update('tabelbarang', $data);
	}	

	public function getById($id) {
		return $this->db->get_where('tabelbarang', array('id' => $id))->row();
	}
}