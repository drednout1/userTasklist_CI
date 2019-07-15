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
        session_start();
            ini_set('display_errors', false);
            ini_set('display_startup_errors', false);
            error_reporting(E_ALL);

            $login = $this->input->get('login');
            $pass = $this->input->get('pass');
            $email = $this->input->get('email');
            $regLog = $this->input->get('regLog');
            $regPass = $this->input->get('regPass');

            if ($this->input->get('logout')) {
                header('location: logout');
            };

            if ($login && $pass) {
                header('location: /auth/login');
            };

            if (!empty($regLog && $regPass && $email)) {
                header('location: reg');
            } else ('Fill all forms');

            if ($_SESSION['id']) {
                ?><a href="http://localhost/tasks/list" name='return'>Return to tasks</a><br><br>
            <?
            }

        $this->users_model->start();

        $this->load->view('templates/header');
        $this->load->view('pages/main');
        $this->load->view('templates/footer');
    }

    public function login()
    {
        
        ini_set('display_errors', true);
        ini_set('display_startup_errors', true);
        error_reporting(E_ALL);

        $login = $this->input->get('login');
        $pass = $this->input->get('pass');
        
        $user = $this->users_model->login($login, $pass);
        
        if (($login == $user['login']) && ($pass == $user['pass'])) {
            session_start();
            $_SESSION['id'] = $user['id'];
            header('location: /tasks/list');
        } else {
            ?><a href="start">Register please</a><?php
        };
    }

    public function registration()
    {
        header('location: start');

        $email = $this->input->get('email');
        $regLog = $this->input->get('regLog');
        $regPass = $this->input->get('regPass');

        $user = $this->users_model->reg($regPass);

        if ($user['pass'] == !$regLog) {
            $data = array(
                'login' => $regLog,
                'pass' => $regPass,
                'email' => $email
        );
        $this->db->insert('users', $data);
        } else {
        ?><a href="http://localhost/auth/start">Please, Login in</a><?php
                };
    }



    public function logout()
    {
        $this->users_model->logout();
    }
}
            ?>