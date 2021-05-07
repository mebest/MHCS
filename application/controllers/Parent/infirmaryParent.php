<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of infirmaryParent
 *
 * @author Systemize
 */
class infirmaryParent extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Parent_Model', '', TRUE);
        $this->load->library('form_validation');
        $this->load->helper('string');
    }
    
    public function index() {
        $this->load->view('includes/Parent/header-Parent');
        $this->load->view('includes/Parent/preloader_parent');
    }
    
     public function LandingPage() {
        if ($this->session->userdata('user_logged_in')) {
            $id = $this->session->userdata('id');
            $fetch = $this->Parent_Model->fetch_where($id);


            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->Account_Status
                );
            }

            $parent_data = array('user_log' => $data);
            $this->load->view('includes/Parent/header-Parent');
            $this->load->view('Parent/ParentPage', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Parent/infirmaryLoginParent', 'refresh');
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('Parent/infirmaryParent', 'refresh');
    }
}
