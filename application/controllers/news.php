<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['title'] = 'News site';

        $this->load->helper(array('form'));
        $this->load->view('templates/header', $data);
        $this->load->view('app/login', $data);
        $this->load->view('templates/footer');
	}

    public function register() {
        $data['title'] = 'Register';

        $this->load->helper(array('form'));
        $this->load->view('templates/header', $data);
        $this->load->view('app/register', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        $data['title'] = 'create post';

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('app/create', $data);
        $this->load->view('templates/footer');
        }
    else{
        $result = $this->news_model->create_post();
            if ($result == 'Nya') {
                redirect('home');
            }
        }
    }

    public function edit() {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        $data['title'] = 'Edit post';
        $data['id'] = $this->uri->segment(3);
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
    $id = $this->uri->segment(3);
    $result = $this->news_model->delete_post($id);
        if ($result == 'Nya') {
            redirect('home');
        }
    }
}