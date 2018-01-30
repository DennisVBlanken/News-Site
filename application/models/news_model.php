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
    } else{
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

    public function get_posts($num) {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->order_by("time",'DESC');
        if ($num = 1) {
            $this->db->limit('6');
        } else{
        $this->db->limit('6',0+6*($num+1));
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function get_post($id) {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('id', $id);

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

    public function get_links($id) {
        $this->db->select('*');
        $this->db->from('bijlages');
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


    public function add_link($id) {
        $this->load->helper('url');
        $data = array(
            'postid' => $id,
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url')
        );
            $this->db->insert('bijlages', $data);
        return 'Nya';   
    }


    public function create_post() {
        $this->load->helper('url');
        if ($this->input->post('image')) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100;
            $config['max_filename_increment'] = 5;

            $this->load->library('upload', $config);
        if( ! $this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('app/create', $error);
            } else{
                $image_data = $this->upload->data();

        $date = new DateTime();
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'cid' => $this->input->post('cid'),
            'time' => $date->format('Y-m-d H:i:s'),
            'image' => $image_data['file_name']
        );
                $this->db->insert('posts', $data);
                return 'Nya';   
            }
        }else{
            $date = new DateTime();
            $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'cid' => $this->input->post('cid'),
            'time' => $date->format('Y-m-d H:i:s'),
            'image' => null
        );
                $this->db->insert('posts', $data);
                return 'Nya'; 
            }
        }

    public function update_post($id) {
        $date = new DateTime();
        $data = array(
            'id' => $id,
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'cid' => $this->input->post('cid'),
            'time' => $date->format('Y-m-d H:i:s')
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


    public function vote_up($id, $uid) {
        $this->db->where('pid', $id);
        $this->db->where('uid', $uid);
        $this->db->select('*');
        $this->db->from('votes');

        $y = $this->db->get();
        $x = $y->result();

        if ($x[0]->vote == 0) {
            $data = array('pid' => $id, 'uid' => $uid, 'vote' => 1);
            $this->db->insert('votes', $data);

            $this->db->where('id', $id);
            $this->db->select('upvote');
            $this->db->from('posts');

            $query = $this->db->get();
            $up = $query->result();
            $upvote = $up[0]->upvote + 1;
            $data = array('upvote' => $upvote);

            $this->db->where('id', $id);
            $this->db->update('posts', $data);
    return 'Nya';
        } else if ($x[0]->vote == 2) {

            $data = array('pid' => $id, 'uid' => $uid, 'vote' => 1);
            $this->db->where('pid', $id);
            $this->db->where('uid', $uid);
            $this->db->update('votes', $data);

            $this->db->where('id', $id);
            $this->db->select('downvote');
            $this->db->from('posts');

            $query = $this->db->get();
            $down = $query->result();
            $downvote = $down[0]->downvote - 1;
            $data = array('downvote' => $downvote);

            $this->db->where('id', $id);
            $this->db->update('posts', $data);

            $this->db->where('id', $id);
            $this->db->select('upvote');
            $this->db->from('posts');

            $query = $this->db->get();
            $up = $query->result();
            $upvote = $up[0]->upvote + 1;
            $data = array('upvote' => $upvote);

            $this->db->where('id', $id);
            $this->db->update('posts', $data);
    return 'Nya';
        }
    }
    public function vote_down($id, $uid) {
        $this->db->where('pid', $id);
        $this->db->where('uid', $uid);
        $this->db->select('*');
        $this->db->from('votes');

        $y = $this->db->get();
        $x = $y->result();

        if ($x[0]->vote == 0) {
            $data = array('pid' => $id, 'uid' => $uid, 'vote' => 2);
            $this->db->insert('votes', $data);

            $this->db->where('id', $id);
            $this->db->select('downvote');
            $this->db->from('posts');

            $query = $this->db->get();
            $down = $query->result();
            $downvote = $down[0]->downvote + 1;
            $data = array('downvote' => $downvote);

            $this->db->where('id', $id);
            $this->db->update('posts', $data);
    return 'Nya';
        } else if ($x[0]->vote == 1) {
            $data = array('pid' => $id, 'uid' => $uid, 'vote' => 2);
            $this->db->where('pid', $id);
            $this->db->where('uid', $uid);
            $this->db->update('votes', $data);

            $this->db->where('id', $id);
            $this->db->select('upvote');
            $this->db->from('posts');

            $query = $this->db->get();
            $up = $query->result();
            $upvote = $up[0]->upvote - 1;
            $data = array('upvote' => $upvote);

            $this->db->where('id', $id);
            $this->db->update('posts', $data);

            $this->db->where('id', $id);
            $this->db->select('downvote');
            $this->db->from('posts');

            $query = $this->db->get();
            $down = $query->result();
            $downvote = $down[0]->downvote + 1;
            $data = array('downvote' => $downvote);
            
            $this->db->where('id', $id);
            $this->db->update('posts', $data);
    return 'Nya';
        }
    }
}