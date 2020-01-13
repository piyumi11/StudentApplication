<?php
   class Sub_controller extends CI_Controller {

      function __construct() {
         parent::__construct();
         $this->load->helper('url');
         $this->load->helper('form');
         $this->load->library('session');
         $this->load->database();
      }

      public function index() {

         $data['page_title'] = "Subjects list";

         $this->load->view('common/header', $data);
         $this->load->view('subject/Sub_view', $data);
      }
      public function subjects_view() {

         $roll_no = $this->uri->segment('3');
         $data['page_title'] = "Subjects list";
         $query = $this->db->get_where("stud",array("roll_no"=>$roll_no));
         $data['records'] = $query->result();

         $this->load->view('common/header', $data);
         $this->load->view('subject/Sub_view', $data);
      }
}
?>
