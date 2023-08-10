<?php

class Auth_Models extends CI_Model
{
    public function registerUser()
    {
        $regAcc = [
            'first_name' => htmlspecialchars($this->input->post('first_name', true)),
            'last_name' => htmlspecialchars($this->input->post('last_name', true)),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'image' => 'default.jpg',
            'role_id' => 2,
        ];
        $this->db->insert('users', $regAcc);
    }
}
