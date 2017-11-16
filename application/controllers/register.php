<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

 public function __construct() {
   parent::__construct();
   $this->load->model('news_model','',TRUE);
 }

 public function index() {
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_database');
   $this->form_validation->set_rules('password', 'Password', 'trim|required');

   if($this->form_validation->run() == FALSE)
   {
     $this->load->view('app/register');
   }
   else
   {
     redirect('');
   }

 }

 private function check_database($username) {
   $password = $this->input->post('password');
   //query the database
   $result = $this->news_model->login($username, $password);

   if($result) {
     $sess_array = array();
     foreach($result as $row) {
       $sess_array = array(
         'id' => $id,
         'username' => $username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Username already taken');
     return false;
   }
 }
}
?>