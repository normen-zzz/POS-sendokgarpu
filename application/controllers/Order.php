<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

  public function index()
  {
    $data = [
      'title' => 'Dashboard'
    ];
    $this->template->load('front/templates/dashboard', 'front/order', $data);
  }

}

/* End of file Order.php */
