<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 public function __construct() {
   parent::__construct();
   $this->load->model('news_model','',TRUE);
 }

 public function index() {
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
      $data['title'] = 'News site';
      $this->load->view('templates/header', $data);
      $this->load->view('app/login', $data);
      $this->load->view('templates/footer');
   }
   else
   {
     redirect('home/1');
   }

 }

 public function check_database($password) {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->news_model->login($username, $password);

   if($result) {
     $sess_array = array();
     foreach($result as $row) {
       $sess_array = array(
         'id' => $row->ID,
         'username' => $row->UserName,
         'rolename' => $row->RoleName
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>