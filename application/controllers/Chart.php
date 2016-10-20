<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Chart extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('chart_model','chart');
    }

    private function _init()
    {
        $this->output->set_template('admin');
    }
    
    public function index($id)
    {
        $data = array('foo' => $id);
        $this->_init();
        $this->load->helper('url');
        $data['mapcharts'] = $this->chart->getAll($id);
        $this->load->view('chart/index', $data);
    }
 
    public function ajax_list($title)
    {
        $datatitle=array(
            'title'=>$title
            );
        $list = $this->chart->get_datatables($title);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $chart) {
            $no++;
            $row = array();
            $row[] = $chart->wilayah;
            $row[] = $chart->value;
            
            $row[] = '<a class="btn btn-sm btn-success btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$chart->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit Value</a>
                  ';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->chart->count_all(),
                        "recordsFiltered" => $this->chart->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->chart->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                'value' => $this->input->post('value'),
            );
        $insert = $this->chart->save($data);

        
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'value' => $this->input->post('value'),
                );
        $this->chart->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->chart->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    /* 
        View Chart
    */

    public function view($id)
    {
        $data = array('foo' => $id);
        $this->_init();
        $this->load->helper('url');
        $data['mapcharts'] = $this->chart->getAll($id);
        $this->load->view('chart/view', $data);
    }
 
}