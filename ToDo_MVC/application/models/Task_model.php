<?php

class Task_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function Save( $data )
    {
        //$data['name'] = 'php studeren"

        $this->db->insert('todo', $data);
    }
}
