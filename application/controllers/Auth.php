<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth/Auth_models');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Account';
            $this->load->view('Auth/Auth_Header', $data);
            $this->load->view('Auth/Login');
            $this->load->view('templates/Footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $userLogin = $this->db->get_where('users', ['email' => $email], ['id_user'])->row_array();

        // var_dump($userLogin);
        // die;

        if ($userLogin) {

            // cek password
            if (password_verify($password, $userLogin['password'])) {
                $loginaccount = [
                    'email' => $userLogin['email'],
                    'role_id' => $userLogin['role_id']
                ];
                $this->session->set_userdata($loginaccount);
                redirect('Admin/Mimin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password !!!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered !!! </div>');
            redirect('Auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match !!!',
            'min_length' => 'password too short !!!'
        ]);
        $this->form_validation->set_rules('password2', 'Conffirm Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register Account';
            $this->load->view('Auth/Auth_Header', $data);
            $this->load->view('Auth/Register');
            $this->load->view('templates/Footer');
        } else {
            $this->Auth_models->registerUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your Account has been created !!! </div>');
            redirect('Auth');
        }
    }
}
