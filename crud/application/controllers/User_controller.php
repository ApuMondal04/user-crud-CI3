<?php
// application/controllers/User_controller.php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');  // Load the URL Helper
        
        // Load the database library
        $this->load->database();
        
        $this->load->library('form_validation');
    }
    public function index() {
        $data['users'] = $this->user_model->get_users();
        $this->load->view('user_list', $data);
    }
    

    public function add_user() {
        $this->load->view('user_form');
    }

    public function submit_form() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user_form');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'gender' => $this->input->post('gender'),
                'state' => $this->input->post('state'),
            );

            $this->user_model->insert_user($data);
            redirect('user_controller/index');
        }
    }

    public function edit_user($id) {
        $data['user'] = $this->user_model->get_user_by_id($id);
        $this->load->view('user_edit_form', $data);
    }

    public function update_user($id) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->user_model->get_user_by_id($id);
            $this->load->view('user_edit_form', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'gender' => $this->input->post('gender'),
                'state' => $this->input->post('state'),
            );

            $this->user_model->update_user($id, $data);
            redirect('user_controller/index');
        }
    }

    public function delete_user($id) {
        $this->user_model->delete_user($id);
        redirect('user_controller/index');
    }
}
?>
