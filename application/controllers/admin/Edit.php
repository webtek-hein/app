    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Edit_model');

        $this->load->model('InventoryModel');
    }
    public function edit($id)
    {
        $data = $this->Edit_model->get_by_id($id);
        echo json_encode($data);
    }

    public function item_update()
    {
        $user_id = $this->session->userdata['logged_in']['userid'];
        $item_id = $this->input->post('item_id');
        $data1 = $this->InventoryModel->get_by_id($item_id);
        $data = array(
            'item_name' => $this->input->post('item_name'),
            'item_description' => $this->input->post('desc'),
            'item_name' => $this->input->post('item_name'),
            'item_type' => $this->input->post('Type'),
            'unit' => $this->input->post('unit')
        );
        $log = array(
            'before_item_name' => $data1[0]['item_name'],
            'after_item_name' => $this->input->post('item_name'),
            'before_description' => $data1[0]['item_description'],
            'after_description' => $this->input->post('desc'),
            'item_type' => $data[0]['item_type'],
            'after_item_type' => $this->input->post('type'),
            'before_unit' => $data1[0]['unit'],
            'after_unit' => $this->input->post('unit'),
            'user_id' => $user_id,
            'item_id' => $item_id,
            );
        $this->Edit_model->item_update(array('item_id' => $this->input->post('item_id')), $data);
        echo json_encode(array("status" => TRUE));
        $this->Edit_model->log_item_update($log);
    }
}