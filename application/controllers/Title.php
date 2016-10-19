<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Title extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('title_model','title');
    }

    private function _init()
    {
        $this->output->set_template('admin');
    }
 
    public function index()
    {
        $this->_init();
        $this->load->helper('url');
        $this->load->view('title/index');
    }
 
    public function ajax_list()
    {
        $list = $this->title->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $title) {
            $no++;
            $row = array();
            $row[] = $title->title;
            
            $row[] = '<a class="btn btn-primary btn-xs" href="chart/index/'.$title->id.'" title="Edit"><i class="glyphicon glyphicon-plus"></i> Add Data</a>';
            //add html for action
            $row[] = '<a class="btn btn-sm btn-success btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$title->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger btn-xs" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$title->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->title->count_all(),
                        "recordsFiltered" => $this->title->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->title->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                'title' => $this->input->post('title'),
            );
        $insert = $this->title->save($data);

        $data2=array(
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-3700',
            'wilayah' => '-',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-ac',
            'wilayah' => 'Aceh',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-ki',
            'wilayah' => 'Kalimantan Timur / East Kalimantan',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-jt',
            'wilayah' => 'Jawa Tengah / Central Java',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-be',
            'wilayah' => 'Bengkulu',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-bt',
            'wilayah' => 'Banten',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-kb',
            'wilayah' => 'Kalimantan Barat / West Kalimanatan',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-bb',
            'wilayah' => 'Bangka Belitung',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-ba',
            'wilayah' => 'Bali',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-ji',
            'wilayah' => 'Jawa Timur / East Java',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-ks',
            'wilayah' => 'Kalimantan Selatan / South Kalimantan',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-nt',
            'wilayah' => 'Nusa Tenggara Timur / East Nusa Tenggara',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-se',
            'wilayah' => 'Sulawesi Selatan / South Sulawesi',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-kr',
            'wilayah' => 'Kepulauan Riau',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-ib',
            'wilayah' => 'Papua Barat / West Papua',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-su',
            'wilayah' => 'Sumatera Utara / North Sumatera',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-ri',
            'wilayah' => 'Riau',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-sw',
            'wilayah' => 'Sulawesi Utara / North Sulawesi',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-la',
            'wilayah' => 'Maluku Utara / North Maluku',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-sb',
            'wilayah' => 'Sumatera Barat / West Sumatera',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-ma',
            'wilayah' => 'Maluku',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-nb',
            'wilayah' => 'Nusa Tenggara Barat / West Nusa Tenggara',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-sg',
            'wilayah' => 'Sulawesi Tenggara / Southeast Sulawesi',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-st',
            'wilayah' => 'Sulawesi Tengah / Central Sulawesi',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-pa',
            'wilayah' => 'Papua',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-jr',
            'wilayah' => 'Jawa Barat / West Java',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-1024',
            'wilayah' => 'Lampung',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-jk',
            'wilayah' => 'Jakarta',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-go',
            'wilayah' => 'Gorontalo',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-yo',
            'wilayah' => 'Yogyakarta',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-kt',
            'wilayah' => 'Kalimantan Tengah / Central Kalimantan',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-sl',
            'wilayah' => 'Sumatera Selatan / South Sumatera',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-sr',
            'wilayah' => 'Sulawesi Barat / West Sulawesi',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
          array(
            'id' => $this->input->post('id'),
            'hc-key' => 'id-ja',
            'wilayah' => 'Jambi',
            'value' => '0',
            'title' => $this->db->insert_id()
          ),
        );
        
        $insert = $this->title->save2($data2);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'title' => $this->input->post('title'),
                );
        $this->title->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->title->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
}