<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('news_model');
 }

 public function index() {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['title'] = 'Home';
     $data['id'] = $session_data['id'];
     $data['username'] = $session_data['username'];
     $data['rolename'] = $session_data['rolename'];
     $data['posts'] = $this->news_model->get_posts();
     $data['menu'] = $this->news_model->get_menu();
        $this->load->view('templates/header', $data);
        $this->load->view('app/home', $data);
        $this->load->view('templates/footer');
   }
   else
   {
     //If no session, redirect to login page
     redirect('');
   }
 }

 public function logout() {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home');
 }

}