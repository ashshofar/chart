<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restchart extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Rest_chart_model', 'rest');
  }

  public function getPengguna($id, $page, $size)
  {

    $response = array(
      'content' => $this->rest->getPengguna($id, ($page - 1) * $size, $size)->result(),
      'totalPages' => ceil($this->rest->getCountPengguna($id) / $size));

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }

  

}