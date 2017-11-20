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
}