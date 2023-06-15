<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Clock extends CI_Controller {

  public function index()
  {
    $data = [
        'title' => 'Dashboard'
    ];
    $this->template->load('front/templates/dashboard', 'front/clock_in_out', $data);
  }

}

/* End of file Clock.php */
