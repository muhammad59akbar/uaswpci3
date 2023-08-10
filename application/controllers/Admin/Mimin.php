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
