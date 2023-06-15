<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Postregist extends CI_Controller {

  public function index()
  {
    $data = [
      'title' => 'Dashboard'
    ];
    $this->template->load('front/templates/dashboard', 'front/post_regist', $data);
  }

}

/* End of file PostRegist.php */
