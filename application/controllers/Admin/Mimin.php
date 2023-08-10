<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mimin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin/Mimin_models');
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }
    }
    public function index()
    {
        $data['title'] = "Dashboard Admin";
        $data['userlogin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/Dashboard', $data);
        $this->load->view('templates/Footer');
    }

    public function myprofile()
    {
        $data['title'] = "My Profil";
        $data['userlogin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('Admin/Profile', $data);
        $this->load->view('templates/Footer');
    }

    public function editProfile()
    {
        $data['title'] = "My Profil";
        $data['userlogin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Header', $data);
            $this->load->view('templates/Sidebar', $data);
            $this->load->view('Admin/EditProfile', $data);
            $this->load->view('templates/Footer');
        } else {
            $email = $this->input->post('email');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $update_image = $_FILES['image'];
            if ($update_image) {
                $config['upload_path']          = './assets/images/user/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = '2048';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $defaultImage = $data['userlogin']['image'];
                    if ($defaultImage != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/user/' . $defaultImage);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('first_name', $first_name);
            $this->db->set('last_name', $last_name);
            $this->db->where('email', $email);
            $this->db->update('users');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your update is success !!! </div>');
            redirect('Admin/Mimin/editprofile');
        }
    }

    public function changepw()
    {
        $data['title'] = "My Profil";
        $data['userlogin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('old_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[3]|matches[re_password]');
        $this->form_validation->set_rules('re_password', 'Confirm Password', 'required|trim|min_length[3]|matches[new_password]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Header', $data);
            $this->load->view('templates/Sidebar', $data);
            $this->load->view('Admin/EditProfile', $data);
            $this->load->view('templates/Footer');
        } else {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($old_password, $data['userlogin']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Your Password is Wrong !!! </div>');
                redirect('Admin/Mimin/changepw');
            } else {
                if ($old_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password Cannot be same with current password </div>');
                    redirect('Admin/Mimin/changepw');
                } else {
                    $hash_pw = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $hash_pw);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('users');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your password has been successfully changed !!!</div>');
                    redirect('Admin/Mimin/changepw');
                }
            }
        }
    }

    public function ListUser()
    {
        $data['title'] = 'Data User';
        $data['userlogin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['listuser'] = $this->Mimin_models->getAllUser();

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('templates/Header', $data);
            $this->load->view('templates/Sidebar', $data);
            $this->load->view('Admin/ListUser', $data);
            $this->load->view('templates/Footer');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Your have been Logout !!! </div>');
        redirect('Auth');
    }
}
