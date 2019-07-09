<?php
class Auth extends CI_Controller
{
    public function start()
    {

                session_start();
                ini_set('display_errors', false);
                ini_set('display_startup_errors', false);
                error_reporting(E_ALL);

                if (
                    isset($_GET['login']) && isset($_GET['pass']) && isset($_GET['regLog'])
                    && isset($_GET['regPass']) && isset($_GET['email'])
                ) {
                    $email = $_GET['email'];
                    $regLog = $_GET['regLog'];
                    $regPass = $_GET['regPass'];
                    $login = $_GET['login'];
                    $pass = $_GET['pass'];
                };

                if (isset($_GET['logout'])) {
                    header('location: logout');
                };

                if ($login && $pass) {
                    header('location: login');
                };

                if (!empty($regLog && $regPass && $email)) {
                    header('location: reg');
                } else ('Fill all forms');

                $this->load->database();

                // $query = $this->db->query('select * from users');

                $query = $this->db
                    ->from('users')
                    ->select ('*')
                    ->get();

                foreach ($query->result() as $row)
                {
                    $row->login;                   
                    $row->pass;
                    $row->id;
                };

                if ($_SESSION['id']) {
                    ?><a href="http://localhost/tasks/list" name='return'>Return to tasks</a><br><br>
            <?
            }
            $this->load->view('templates/header');
            $this->load->view('pages/main');
            $this->load->view('templates/footer');
}

    public function login()
{

            ini_set('display_errors', true);
            ini_set('display_startup_errors', true);
            error_reporting(E_ALL);

            if (
                isset($_GET['login']) && isset($_GET['pass'])
            ) {
                $login = $_GET['login'];
                $pass = $_GET['pass'];
            };

            $this->load->database();
            
            $query = $this->db
            ->from('users')
            ->select ('*')
            ->where ('pass' , $pass)
            ->where ('login' , $login)
            ->get();

            foreach ($query->result() as $row)
        {
                $row->login;
                $row->pass;
                $row->id;
        };

            if (($login == $row->login) && ($pass == $row->pass)) {
                session_start();
                $_SESSION['id'] = $row->id;
                header('location: /tasks/list');
            } else {
                ?><a href="start">Register please</a><?php
            };

}

    public function reg()
{
            header('location: start');
            if (
                isset($_GET['regLog']) && isset($_GET['regPass']) && isset($_GET['email'])
            ) {
                $email = $_GET['email'];
                $regLog = $_GET['regLog'];
                $regPass = $_GET['regPass'];
            };

            $this->load->database();

            $query = $this->db
            ->from('users')
            ->select ('*')
            ->where ('pass' , $regPass)
            ->get();

                foreach ($query->result() as $row)
                {
                    $row->login;
                    $row->pass;
                    $row->id;
                };

            if ($row == !$regLog) {
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
                    header('location: start');
                    session_start();
                    session_unset();
                    $_SESSION['id'] = array();
                    session_destroy();
                }
            }
            ?>