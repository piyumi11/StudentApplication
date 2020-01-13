<?php
   class Account_controller extends CI_Controller {

      function __construct() {
         parent::__construct();
         $this->load->helper('url');
         $this->load->helper('form');
         $this->load->library('session');
         $this->load->database();
      }

      public function index() {

      }
      public function signin_view() {
         $data['page_title'] = "Sign in";
         $this->load->view('common/header', $data);
         $this->load->view('account/Signin_form', $data);
      }

      public function login_view() {
         $data['page_title'] = "Login";
         $this->load->view('common/header', $data);
         $this->load->view('account/Login_form', $data);
      }

      public function logout_view() {
        $query = $this->db->get("stud");
        $data['records'] = $query->result();
        $data['page_title'] = "All students list";
        
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        
        $this->load->view('common/header', $data);
        $this->load->view('Stud_view', $data);
      }

      public function signin() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        if(empty(trim($username))) {
          $data['username_err'] = 'Please enter username.';
        } else {
            $username = trim($username);
            $query = $this->db->get_where("users",array("username"=>$username));
            $records = $query->result();
            if($records) {
                if($query->num_rows() == 1) {
                    $data['username_err'] = "This username is already taken.";
                } else {
                    $username = trim($username); //todo:add more validation rules
                }
            }
        }
        //validate password
        if(empty(trim($password))) {
            $data['password_err'] = "Please enter a password.";
        } elseif(strlen(trim($password)) < 6){
            $data['password_err'] = "Password must have atleast 6 characters.";
        } else{
            $password = trim($password);
        }

        //validate conform password
        if(empty(trim($confirm_password))) {
            $data['confirm_password_err'] = "Please confirm password.";
        } else{
            $confirm_password = trim($confirm_password);
            if(empty($password_err) && ($password != $confirm_password)){
                $data['confirm_password_err'] = "Password did not match.";
            }
        }

        if(empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $dataarr = array(
               'username' => $username,
               'password' => $param_password
            );
            $result = $this->db->insert("users", $dataarr); // todo:move to model class
            if($result) {
                header("location: login_view");
            }
        } else {
          $data['page_title'] = "Sign in";
          $this->load->view('common/header', $data);
          $this->load->view('account/Signin_form', $data);
        }
      }

      public function login() {

         $username = $this->input->post('username');
         $password = $this->input->post('password');
         $username_err = $password_err = "";

         if(empty(trim($username))){
             $data['username_err']  = "Please enter username.";
         } else{
             $username = trim($username);
         }
         if(empty(trim($password))){
             $data['password_err'] = "Please enter your password.";
         } else{
             $password = trim($password);
         }
         if(empty($data['username_err']) && empty($data['password_err'])) {
            $query = $this->db->get_where("users",array("username"=>$username));// todo:move to model class
            $records = $query->result();

            if($query->num_rows() == 1) {
               $hashed_password = $records[0]->password;
               if(password_verify($password, $hashed_password)){

                   $this->session->set_userdata('loggedin', true);
                   $this->session->set_userdata('username', $username);
                   
                 header("location: home");

               } else {
                   $data['password_err'] = "The password you entered was not valid.";
               }
           } else {
               $data['username_err'] = "No account found with that username.";
           }
       }
       if(!empty($data['username_err']) || !empty($data['password_err'])) {
         $data['page_title'] = "Login";
         $this->load->view('common/header', $data);
         $this->load->view('account/Login_form', $data);
       }
      }
}
?>
