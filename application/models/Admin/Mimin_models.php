<?php

class Mimin_models extends CI_Model
{
    public function getAllUser()
    {
        $listuser = $this->db->get('users');
        return $listuser->result_array();
    }

    public function getUserById($idUser)
    {
        return $this->db->get_where('users', ['id_user' => $idUser])->row_array();
    }

    public function updateUser($email, $hashedPassword, $role_id,  $UpdateItem)
    {
        $updateUser = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $email,
            'password' => $hashedPassword,
            'role_id' => $role_id,
        ];

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('users', $updateUser);
    }

    public function addNewUser($NewUser)
    {
        $addNew = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            "role_id" => $this->input->post('role_id'),
            'image' => $NewUser['image'],
            "created_at" => time()
        ];
        $this->db->insert('users', $addNew);
    }
}
