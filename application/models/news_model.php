<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

    public function __construct() {
		$this->load->database();
    }

    public function login($username, $password) {
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this -> db -> where('UserName', $username);
        $this -> db -> where('UserPassword', $password);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        
    if($query -> num_rows() == 1){
        return $query->result();
    } else {
    return false;}
    }
}