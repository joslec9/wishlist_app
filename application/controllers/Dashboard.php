<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function showDashboard(){
		$this->load->model('process');
		$this->load->view('dashboard', array('user'=>$this->process->getUserbyId($this->session->userdata('logged_user')['id']), 'wishlist'=>$this->process->getWishesbyId($this->session->userdata('logged_user')['id']), 'otherswishes'=>$this->process->getAllWishes($this->session->userdata('logged_user')['id'])));
	}
	public function addtoWishlist($item_id){
		$this->load->model('process');
		$this->process->addtoWishlist($this->session->userdata('logged_user')['id'], $item_id);
		redirect('/dashboard');
	}
	public function createWish(){
		$this->load->view('create');
	}
	public function addItem(){
		$this->load->model('process');
		if($this->process->validateAddition($this->input->post()) === FALSE){
			$this->session->set_flashdata('errors', validation_errors());
			$this->load->view('create',$this->session->flashdata('errors'));
		}else{
			redirect('/dashboard');
		}
	}

	public function viewItem($item_id){
		$this->load->model('process');
		$this->load->view('itempage', array('item'=>$this->process->viewItem($item_id), 'wishedby'=>$this->process->wishedBy($item_id)));
	}

	public function removefromWishlist($id){
		$this->load->model('process');
		$this->process->removefromWishlist($this->session->userdata('logged_user')['id'], $id);
		redirect('/dashboard');
	}

	public function deleteItem($id){
		$this->load->model('process');
		$this->process->deleteItem($id);
		redirect('/dashboard');
	}
}
?>