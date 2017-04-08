<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{

    public function register_user($post) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', "Name", 'required|alpha|min_length[3]');
        $this->form_validation->set_rules('username', "Username", 'required|min_length[3]');
        $this->form_validation->set_rules('password', "Password", 'required|min_length[8]|matches[confirm_password]|trim');
        $this->form_validation->set_rules('confirm_password', "Confirm Password", 'required|trim');

        if ($this->form_validation->run() === false) {
            return false;
        }
        else {
            $encrypt_pass = md5($post['password']);

            $query = "INSERT INTO users (name, username, date_hired, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
            $values = array($post['name'], $post['username'], $post['date_hired'], $encrypt_pass);
            $this->db->query($query, $values);
            return true;
        }
    }

    public function login_user($post) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', "Username", 'required');
        $this->form_validation->set_rules('password', "Password", 'required');

        if ($this->form_validation->run() === false) {
            return false;
        }
        else {
            $encrypt_pass = md5($post['password']);

            $query = "SELECT id, name, username, date_hired, created_at, updated_at FROM users WHERE username=? AND password=?";
            $values = array($post['username'], $encrypt_pass);
            return $this->db->query($query, $values)->row_array();
        }
    }

    public function getUserbyId($id) {
        $query = "SELECT * FROM users WHERE users.id = $id";

        return $this->db->query($query)->row_array();
    }
}