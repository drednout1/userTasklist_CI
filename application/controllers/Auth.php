<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('users_model');
    }
    public function start()
    {
        $this->users_model->start();

        $this->load->view('templates/header');
        $this->load->view('pages/main');
        $this->load->view('templates/footer');
    }

    public function login()
    {
        $this->users_model->log();
    }

    public function registration()
    {
        $this->users_model->reg();
    }

    public function logout()
    {
        $this->users_model->logout();
    }
}
            ?>