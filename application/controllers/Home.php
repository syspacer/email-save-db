<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Home_model");
    }
    public function index()
    {
        $this->session->set_userdata("CSRF", unpack('H*', random_bytes(64))[1]);
        $data["title"] = "Email save database";
        $this->load->view('home/home', $data);
    }
    public function validateEmail($email = null)
    {
        if (empty($email)) {
            redirect(base_url());
        }

        $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
        if (preg_match($regex, $email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function new()
    {
        if (empty($_POST)) {
            redirect(base_url());
        }

        if ($this->validateEmail($this->input->post('emailAddress', TRUE))) {
            if (
                isset($_POST)
                && hash_equals($this->input->post('CSRF'), $this->session->CSRF)
            ) {
                $data['firstName'] = $this->input->post('firstName', TRUE);
                $data['surname'] = $this->input->post('surname', TRUE);
                $data['emailAddress'] = $this->input->post('emailAddress', TRUE);
                $data['message'] = $this->input->post('message', TRUE);
                $this->Home_model->new($data);
                echo "<p class='text-success' id='return'>Form sent, thank you!</p>";
            } else {
                echo "<p class='text-danger' id='return'>Form not sent! Invalid security token, please try again!</p>";
            }
        } else {
            echo "<p class='text-danger' id='return'>Form not sent! Please provide a valid email!</p>";
        }
    }
}