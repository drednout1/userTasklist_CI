<?php
class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('tasks_model');
    }
    public function list()
    {
        session_start();
        ini_set('display_errors', false);
        ini_set('display_startup_errors', false);
        error_reporting(E_ALL);

        if ($_SESSION['id']) 
        {
            $users = $this->tasks_model->list();
        };
        $this->load->view('templates/header');
        $this->load->view('pages/tasks' , ['tasks' => $users]);
        $this->load->view('templates/footer');
    }
    
    public function save()
    {
        session_start();
        header('location: /tasks/list');
        ini_set('display_errors', false);
        ini_set('display_startup_errors', false);
        error_reporting(E_ALL);

        $text = $this->input->get('text');

        if ($text){ 
        $this->tasks_model->save($text);
        };
}

    public function delete()
    {
        session_start();

        ini_set('display_errors', false);
        ini_set('display_startup_errors', false);
        error_reporting(E_ALL);

        header("Location: /tasks/list");

        $task = $this->input->get('task');

        if ($task && $_SESSION['id']) 
        {
        $this->tasks_model->delete($task);
        };
    }

    public function update()
    {
        session_start();

        ini_set('display_errors', true);
        ini_set('display_startup_errors', true);
        error_reporting(E_ALL);

        $text = $this->input->get('text');
        $task = $this->input->get('task');

        if($text)
        {
            $this->tasks_model->update($text, $task);
            header("Location: /tasks/list");
        };

        $this->load->view('templates/header');
        $this->load->view('pages/update' , ['task' => $task]);
        $this->load->view('templates/footer');
    }
}