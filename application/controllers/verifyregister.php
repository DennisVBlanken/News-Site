<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyRegister extends CI_Controller {

 public function __construct() {
   parent::__construct();
   $this->load->model('news_model','',TRUE);
 }

 public function index() {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.UserName]', array( 'required' => '%s. is required', 'is_unique' => 'This %s already exists.'));
    $this->form_validation->set_rules('password', 'Password', 'trim|required', array( 'required' => '%s. is required'));
    $this->form_validation->set_rules('email', 'Email', 'trim|required', array( 'required' => '%s. is required'));

    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('app/register');
    }
    else
    {

      $this->addUser();
      redirect('');
    }
 }

 public function addUser() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $email = $this->input->post('email');

    $data = array(
      'UserName' => $username,
      'UserPassword' => $password,
      'UserEmail' => $email,
      'RoleName' => 'User'
);
    $this -> db -> insert('users', $data);
 }
}