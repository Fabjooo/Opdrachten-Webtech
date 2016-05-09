<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    public function add()
    {
        $viewdata['feedback'] = "";

        //validate form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('todo_name', 'Task name', 'required');
        if ($this->form_validation->run() === FALSE){
            //validation failed
            echo "opslage, van data is niet gelukt";
        }
        else{
            //validation ok
            //save via model
            $this->load->model('task_model');
            $data['name'] = $this->input->post('todo_name');
            $this->task_model->Save($data);
            $viewdata['feedback'] = "Your view has been added.";
        }
        //save via model

        $this->load->view('task/add');
    }
}
