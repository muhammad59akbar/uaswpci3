<?php

class Mimin_models extends CI_Model
{
    public function getAllUser()
    {
        $listuser = $this->db->get('users');
        return $listuser->result_array();
    }
}
