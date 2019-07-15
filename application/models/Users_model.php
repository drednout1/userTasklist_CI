<?php
class Users_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->database();
        }
    public function start()
    {
            $query = $this->db
                ->from('users')
                ->select ('*')
                ->get();

                $user = $query->row_array();

                return $user;
    }

    public function login($login, $pass)
    {
            $query = $this->db
            ->from('users')
            ->select ('*')
            ->where ('pass' , $pass)
            ->where ('login' , $login)
            ->get();

            $user = $query->row_array();
            
            return $user;
    }

    public function reg($regPass)
    {
        $query = $this->db
        ->from('users')
        ->select ('*')
        ->where ('pass' , $regPass)
        ->get();

        $user = $query->result();
        return $user;
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