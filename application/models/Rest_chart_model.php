<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest_chart_model extends CI_Model {
  function __construct()
  {
    parent::__construct();
    $this->tbl = "chart";
  }

  public function getCountPengguna($id)
  {
      $this->db->where('title',$id);
      return $this->db->count_all_results('chart', FALSE);
  }

  public function getPengguna($id, $page, $size)
  {
      $this->db->where('title',$id);
      return $this->db->get('chart', $size, $page);
  }

 }