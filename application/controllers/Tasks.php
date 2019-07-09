<?php
class Tasks extends CI_Controller
{
    public function list()
    {
        session_start();

        ini_set('display_errors', false);
        ini_set('display_startup_errors', false);
        error_reporting(E_ALL);

        if (isset($_GET['text'])) {
            $text = $_GET['text'];
        };

        if ($_SESSION['id']) {

            $this->load->database();

            $query = $this->db
                    ->from('task')
                    ->select ('task')
                    ->where ('id' , $_SESSION['id'])
                    ->get();

                    foreach ($query->result() as $row)
                    {
                        $row->task;   
                            echo '<table>';

                            $counter = 0;
                            $counter1 = 0;
                            echo '<tr>';
                            echo '<td>' . $row->task . '</td>';
                            echo '<td><a href="delete?task=' . $row->task . '">X</a></td>';
                            echo '<td><a href="update?task=' . $row->task . '">Modify</a></td>';
                            '</tr>';
                        
                            echo '</table>';
                    };
        }
        $this->load->view('templates/header');
        $this->load->view('pages/tasks');
        $this->load->view('templates/footer');
    }
    
    public function save()
    {
        session_start();
        header('location: /tasks/list');
        ini_set('display_errors', false);
        ini_set('display_startup_errors', false);
        error_reporting(E_ALL);

        if (isset($_GET['text'])) {
            $text = $_GET['text'];
        };

        if ($text) {
            $this->load->database();

            $data = array(
                    'task' => $text,
                    'id' => $_SESSION['id']
                );
                $this->db->insert('task', $data);
    }
}

    public function delete()
    {
        session_start();

        ini_set('display_errors', false);
        ini_set('display_startup_errors', false);
        error_reporting(E_ALL);

        header("Location: /tasks/list");

        if (isset($_GET['task'])) {
            $task = $_GET['task'];
        };

        if ($task && $_SESSION['id']) {
            $this->load->database();

            $this->db->where('id', $_SESSION['id'])
                        ->where('task' , $task)
                        ->delete('task');
        }
    }

    public function update()
    {
        session_start();

        ini_set('display_errors', false);
        ini_set('display_startup_errors', false);
        error_reporting(E_ALL);

        if (isset($_GET['text']) || isset($_GET['task'])) {
            $text = $_GET['text'];
            $task = $_GET['task'];
        };

        $this->load->database();

        $this->db->where('id', $_SESSION['id'])
        ->where('task' , $task)
        ->delete('task');

        $data = array(
        'task' => $text,
        'id'  => $_SESSION['id'],
);
        if($text){ 
            $this->db->insert('task', $data);
            header("Location: /tasks/list");
    }
            $this->load->view('templates/header');
            $this->load->view('pages/update');
            $this->load->view('templates/footer');
    }
    
}
