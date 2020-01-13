<?php

   class Exam_controller extends CI_Controller {

      public function __construct() {
         parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->library('session');
         $this->load->database();
      }

      public function index() {
      }

      public function goto_exam_view() {
        $roll_no = $this->uri->segment('3');
        $data['page_title'] = "Examination for " .$roll_no ;
        $query = $this->db->get_where("stud",array("roll_no"=>$roll_no));
        $data['records'] = $query->result();
        $this->output->cache(3);
        $this->load->view('common/header', $data);
        $this->load->view('exam/Exam_view',$data);
      }
   }
?>
