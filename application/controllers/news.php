<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
        require_once '/Faker/src/autoload.php';
    }

    public function index() {
        $data['title'] = 'News site';
        $data['menu'] = $this->news_model->get_menu();

        $this->load->helper(array('form'));
        $this->load->view('templates/header', $data);
        $this->load->view('app/login', $data);
        $this->load->view('templates/footer');
	}

    public function register() {
        $data['title'] = 'Register';
        $data['menu'] = $this->news_model->get_menu();

        $this->load->helper(array('form'));
        $this->load->view('templates/header', $data);
        $this->load->view('app/register', $data);
        $this->load->view('templates/footer');
    }

    public function categories() {
        $data['title'] = 'Categories';
        $session_data = $this->session->userdata('logged_in');
        $data['userid'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['menu'] = $this->news_model->get_menu();
        $data['categories'] = $this->news_model->get_categories();

        $this->load->helper(array('form'));
        $this->load->view('templates/header', $data);
        $this->load->view('app/categories', $data);
        $this->load->view('templates/footer');
    }

    public function categorie() {
        $id = $this->uri->segment(3);
        $data['posts'] = $this->news_model->get_posts_bc($id);
        $title = $this->news_model->get_categorie($id);
        $data['title'] = $title[0]->name;
        $session_data = $this->session->userdata('logged_in');
        $data['userid'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['menu'] = $this->news_model->get_menu();

        $this->load->view('templates/header', $data);
        $this->load->view('app/categorie', $data);
        $this->load->view('templates/footer');
    }

    public function post() {
        $id = $this->uri->segment(3);
        $data['post'] = $this->news_model->get_post($id);
        $data['id'] = $id;
        $data['title'] = 'Read more...';
        $session_data = $this->session->userdata('logged_in');
        $data['userid'] = $session_data['id'];
        $data['username'] = $session_data['username'];
        $data['menu'] = $this->news_model->get_menu();
        $data['comments'] = $this->news_model->get_comments($id);
        $data['links'] = $this->news_model->get_links($id);

        $this->load->helper(array('form'));
        $this->load->view('templates/header', $data);
        $this->load->view('app/post', $data);
        $this->load->view('templates/footer');
    }

    public function postcomment() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('comment', 'Comment', 'required');
        $this->form_validation->set_rules('postid', 'Postid', 'required');
        $this->form_validation->set_rules('userid', 'Userid', 'required');

        $id = $this->uri->segment(3);
        if ($this->form_validation->run() === FALSE) {
                redirect('post/'.$id);
        }
    else{
            $result = $this->news_model->post_comment();
            if ($result == 'Nya') {
                redirect('post/'.$id);
            }
        redirect('post/'.$id);
        }
    }

    public function links() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $id = $this->uri->segment(3);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');

        $data['title'] = 'add link';
        $session_data = $this->session->userdata('logged_in');
        $data['rolename'] = $session_data['rolename'];
        $data['id'] = $this->uri->segment(3);

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('app/links', $data);
        $this->load->view('templates/footer');
        }
    else{
        $result = $this->news_model->add_link($id);
            if ($result === 'Nya') {
                redirect('home');
            }
        }
    }

    public function create() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('cid', 'Cid', 'required');

        $data['title'] = 'create post';
        $session_data = $this->session->userdata('logged_in');
        $data['rolename'] = $session_data['rolename'];
        $data['categories'] = $this->news_model->get_categories();

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('app/create', $data);
        $this->load->view('templates/footer');
        }
    else{
        $result = $this->news_model->create_post();
            if ($result === 'Nya') {
                redirect('home');
            }
        }
    }

    public function edit() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('cid', 'Cid', 'required');

        $data['title'] = 'Edit post';
        $session_data = $this->session->userdata('logged_in');
        $data['rolename'] = $session_data['rolename'];
        $data['categories'] = $this->news_model->get_categories();
        $data['id'] = $this->uri->segment(3);
        $data['post'] = $this->news_model->get_post($data['id']);
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('app/edit', $data);
                $this->load->view('templates/footer');
                }
            else{
                $id = $_POST['id'];
                $result = $this->news_model->update_post($id);
                if ($result == 'Nya') {
                    redirect('home');
            }
        }
    }

    public function delete() {
        $session_data = $this->session->userdata('logged_in');
        if ($session_data['rolename']== 'Admin') {
            $id = $this->uri->segment(3);
            $result = $this->news_model->delete_post($id);
                if ($result == 'Nya') {
                    redirect('home');
            }
        }
        redirect('home');
    }
    public function upvote() {
        $id = $this->uri->segment(3);
        $session_data = $this->session->userdata('logged_in');
        $uid = $session_data['id'];
        $result = $this->news_model->vote_up($id, $uid);
            if ($result == 'Nya') {
                redirect('post/'.$id);
        }
        redirect('post/'.$id);
    }

    public function downvote() {
        $id = $this->uri->segment(3);
        $session_data = $this->session->userdata('logged_in');
        $uid = $session_data['id'];
        $result = $this->news_model->vote_down($id, $uid);
            if ($result == 'Nya') {
                redirect('post/'.$id);
        }
        redirect('post/'.$id);
    }
}