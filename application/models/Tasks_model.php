<?php
class Tasks_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    public function list()
    {
            $query = $this->db
                    ->from('task')
                    ->select ('task')
                    ->where ('id' , $_SESSION['id'])
                    ->get();

                    $users = $query->result();

                    return $users;
    }

    public function save($text)
    {
            $data = array(
                    'task' => $text,
                    'id' => $_SESSION['id']
            );

            $this->db->insert('task', $data);
    }

    public function delete($task)
    {
            $this->db
                ->where('id', $_SESSION['id'])
                ->where('task' , $task)
                ->delete('task');
    }

    public function update($text, $task)
    {
        $this->db
        ->where('id', $_SESSION['id'])
        ->where('task' , $task)
        ->delete('task');

        $data = array(
            'task' => $text,
            'id'  => $_SESSION['id'],
        );

        $this->db->insert('task', $data); 
        
        }
}
?>