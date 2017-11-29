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

    public function set_post() {
    $this->load->helper('url');

    $data = array(
        /*'bookAuthor' => $this->input->post('author'),
        'bookTitle' => $this->input->post('title'),
        'bookYear' => $this->input->post('year'),
        'bookDesc' => $this->input->post('description'),
        'bookGenre' => $this->input->post('genre'),*/
    );


    return $this->db->insert('books', $data);
    }

    public function update_post($id) {
    $this->load->helper('url');

    $data = array(
        'bookID' => $id,
        'bookAuthor' => $this->input->post('author'),
        'bookTitle' => $this->input->post('title'),
        'bookYear' => $this->input->post('year'),
        'bookDesc' => $this->input->post('description'),
        'bookGenre' => $this->input->post('genre'),
    );

    $this->db->where('bookID', $id);
    $this->db->update('books', $data);
    return "success";
    }

    public function delete_post($id) {
    $this->load->helper('url');
    $this->db->where('bookID', $id);
    $this->db->delete('books');
    return "success";
    }
}