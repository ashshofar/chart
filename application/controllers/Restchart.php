<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restchart extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Rest_chart_model', 'rest');
  }

  public function getPengguna($id)
  {

   // $response = array(
      $response = $this->rest->getPengguna($id)->result();
    //);

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_NUMERIC_CHECK |JSON_PRETTY_PRINT| JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
      ->_display();
      exit;
  }

  

}