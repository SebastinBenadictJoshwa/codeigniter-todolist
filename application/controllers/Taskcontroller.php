<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taskcontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->database();
		$this->db->where('status','Pending');
		$query=$this->db->get('list');
		$data['records']=$query->result();
		$this->db->close();
		$this->load->database();
		$this->db->where('status',"Done");
		$query1=$this->db->get('list');
		$data['recorddone']=$query1->result();
		$this->load->view('indexpage',$data);
	}

	public function add(){
		$this->load->view('add');
	}

	public function addtask(){
		$data=array(
			'task_name'=>$this->input->post('task'),
			'status'=>"Pending",
		);
		$this->load->model('Task_model');
		$this->Task_model->insert($data);
		$message="Task added successfully !!";
		$encmsg=urlencode($message);
		redirect('indexpage?message='.$encmsg);
	}

	public function done(){
		$id=$this->uri->segment(3);
		$this->load->model('Task_model');
		$this->Task_model->done($id);
		$message="Task marked as done !!";
		$encmsg=urlencode($message);
		redirect('indexpage?message='.$encmsg);
	}

	public function undone(){
		$id=$this->uri->segment(3);
		$this->load->model('Task_model');
		$this->Task_model->undone($id);
		$message="Task marked as incomplete !!!";
		$encmsg=urlencode($message);
		redirect('indexpage?message='.$encmsg);
	}

	public function editor(){
		$id=$this->uri->segment(3);
		$this->load->database();
		$this->db->where('id',$id);
		$query=$this->db->get('list');
		$data['records']=$query->result();
		$this->load->view('edit',$data);
	}

	public function edit(){
		$id=$this->input->post('id');
		$data=array(
			'task_name'=>$this->input->post('task')
		);
		$this->load->model('Task_model');
		$this->Task_model->update($data,$id);
		$message="Task edited successfully !!";
		$encmsg=urlencode($message);
		redirect('indexpage?message='.$encmsg);
	}

	public function delete(){
		$id=$this->uri->segment(3);
		$this->load->database();
		$this->db->delete('list','id='.$id);
		$message="Task deleted successfully !!";
		$encmsg=urlencode($message);
		redirect('indexpage?message='.$encmsg);
	}
}
