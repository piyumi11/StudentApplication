
<?php

   class Test extends CI_Controller {

      public function __construct() {
         parent::__construct();
         $this->load->helper(array('form', 'url'));
      }

      public function index() {
         $this->load->view('Init_exam');
      }
   }
?>
