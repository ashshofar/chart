<?php

require APPPATH . '/libraries/REST_Controller.php';

class Chart2 extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data mahasiswa
    function view($id) {
        
        $this->db->where('title', $id);
        $mahasiswa = $this->db->get('chart')->result();
        
        
        $this->response($mahasiswa, 200);
        $this->response(JSON_PRETTY_PRINT);
    }

    
}