<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct() {
   parent::__construct();
   $this->load->model('news_model','',TRUE);
 }

 function index() {
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     $this->load->view('app/login');
   }
   else
   {
     redirect('home');
   }

 }

 function check_database($password) {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

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
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>