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
        $this->db->order_by("time",'DESC');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_post($id) {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('id', $id);
        $this->db->order_by("time",'DESC');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_comments($id) {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('postid', $id);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_menu() {
        $this->db->select('*');
        $this->db->from('menu');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_categories() {
        $this->db->select('*');
        $this->db->from('categories');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_categorie($id) {
        $this->db->select('name');
        $this->db->from('categories');
        $this->db->where('id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_latest() {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->order_by("time",'DESC');
        $this->db->limit(5, 0);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_posts_bc($id) {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('cid', $id);
        $this->db->order_by("time",'DESC');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_username($id) {
        $this->db->select('UserName');
        $this->db->from('users');
        $this->db->where('ID', $id);

        $query = $this->db->get();
        return $query->result();
    }

    public function post_comment() {
    $this->load->helper('url');

    $data = array(
        'comment' => $this->input->post('comment'),
        'postid' => $this->input->post('postid'),
        'userid' => $this->input->post('userid')
    );
    $this->db->insert('comments', $data);

    return 'Nya';
    }

    public function create_post() {
    $this->load->helper('url');

    $date = new DateTime();
    $data = array(
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content'),
        'cid' => $this->input->post('cid'),
        'time' => $date->format('Y-m-d H:i:s')
    );

    return $this->db->insert('posts', $data);
    }

    public function update_post($id) {
    $data = array(
        'id' => $id,
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content'),
        'cid' => $this->input->post('cid')
    );

    $this->db->where('id', $id);
    $this->db->update('posts', $data);
    return "Nya";
    }

    public function delete_post($id) {
    $this->db->where('id', $id);
    $this->db->delete('posts');

    $this->db->where('postid', $id);
    $this->db->delete('comments');
    return "Nya";
    }
}