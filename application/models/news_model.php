<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

    public function __construct() {
		$this->load->database();
    }

    public function login($username, $password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('UserName', $username);
        $this->db->where('UserPassword', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        
    if($query -> num_rows() == 1){
        return $query->result();
    } else {
    return false;}
    }

    public function get_users() {
        $this->db->select('*');
        $this->db->from('users');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_user($username) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_posts() {
        $this->db->select('*');
        $this->db->from('posts');

        $query = $this->db->get();
        return $query->result();
    }

    public function create_post() {
    $this->load->helper('url');

    $data = array(
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content')
    );

    return $this->db->insert('posts', $data);
    }

    public function update_post($id) {
    $data = array(
        'id' => $id,
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content')
    );

    $this->db->where('id', $id);
    $this->db->update('posts', $data);
    return "Nya";
    }

    public function delete_post($id) {
    $this->db->where('id', $id);
    $this->db->delete('posts');
    return "Nya";
    }
}