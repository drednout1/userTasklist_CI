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
        $this->tasks_model->list();

        $this->load->view('templates/header');
        $this->load->view('pages/tasks');
        $this->load->view('templates/footer');
    }
    
    public function save()
    {
        $this->tasks_model->save();
}

    public function delete()
    {
        $this->tasks_model->delete();
    }

    public function update()
    {
        $this->tasks_model->update();
    }
}