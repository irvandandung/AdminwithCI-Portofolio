<?php
class Model_login extends CI_Model{

    public function logine($username,$password){
        $periksa = $this->db->get_where('admin',array('username'=>$username,'password'=> md5($password)));
        if($periksa->num_rows()>0){
            return 1;
        }else{
            return 0;
        }
    }
}