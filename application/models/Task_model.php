<?php 
class Task_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        $this->db->insert('list',$data);
    }

    public function done($id){
        $data=array(
            'status'=>'Done'
        );
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('list',$data);
    }

    public function undone($id){
        $data=array(
            'status'=>'Pending'
        );
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('list',$data);
    }

    public function update($data,$id){
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('list',$data);
    }
}