<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function index() {
        $this->load->view('index');
    }

    public function register() {
        $this->load->model('user');
        if ($this->user->register_user($this->input->post())) {
            if ($this->user->login_user($this->input->post())) {
                $this->session->set_userdata('logged_user', $this->user->login_user($this->input->post()));
                redirect('/dashboard');
            }
        }
        else {
            $this->session->set_flashdata('errors', validation_errors());
        }
    }

    public function login() {
        $this->load->model('user');
        if ($this->user->login_user($this->input->post())) {
            $this->session->set_userdata('logged_user', $this->user->login_user($this->input->post()));
            redirect('/dashboard');
        }
        else {
            $this->session->set_flashdata('errors', 'Wrong username or password');
            $this->load->view('index');
        }
    }

    public function logout() {
        session_destroy();
        redirect('/');
    }

    public function showUser($id) {
        $this->load->model('user');
        $this->load->view('user', array('user' => $this->user->getUserbyId($id)));
    }
}