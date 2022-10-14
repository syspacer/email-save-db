<?php
class Home_model extends CI_Model
{
    public function new($data)
    {
        $this->db->insert("email", $data);
        return $this->db->insert_id();
    }
}