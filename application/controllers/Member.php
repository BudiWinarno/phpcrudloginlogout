<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['judul'] = "Member Page";

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('member/index');
            $this->load->view('templates/footer');
        }
        else{
            $this->_login();
        }
	
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('register', ['email' => $email])->row_array();
        
        if($user){
            if(password_verify($password, $user['password'])){
                $data = [
                    'email' => $user['email'],
                ];

                $this->session->set_userdata($data);
                redirect('user');
            }
            else{
                echo "Maaf Salah";
            }
        }
        else{
            redirect('member');
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');

        redirect('member');
    }
    
	public function register()
	{
        $data['judul'] = "Register Page";

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[register.email]', 
        [
            'is_unique' => "this email already registered"
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'matches' => 'password dont matche!',
            'min_length' => 'password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false){

            $this->load->view('templates/header', $data);
            $this->load->view('member/register');
            $this->load->view('templates/footer');

        }
        else{
            $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date' => time()
                
            ];

            $this->db->insert('register', $data);
            redirect('member');
        }
    }
}