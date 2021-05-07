<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of infirmaryLoginSys
 *
 * @author Systemize
 */
class infirmaryLoginParent extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Parent_Model', '', TRUE);
    }

    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('Parent/InfirmaryParent', 'refresh');
        } else {
            $this->load->view('includes/Parent/header-login');
            $this->load->view('Parent/Parent_Login');
            $this->load->view('includes/footer-login');
        }
    }

    public function verify_login() {

        $this->form_validation->set_rules('user_login', 'Username', 'trim|required');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|callback_database_access');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/Parent/header-login');
            $this->load->view('Parent/Parent_Login');
            $this->load->view('includes/footer-login');
        } else {
            redirect('Parent/InfirmaryParent', 'refresh');
        }
    }

    public function database_access() {
        $username = $this->input->post('user_login');
        $password = $this->input->post('user_password');
        $pass = sha1(sha1($password));
        $result = $this->Parent_Model->login($username, $pass);

        if ($result) {
            foreach ($result as $value) {
                $AccStat = $value->Account_Status;
                if ($AccStat == 'Active') {
                    $sess_array = array(
                        'id' => $value->user_id,
                        'username' => $value->username,
                        'status' => $value->Account_Status
                    );
                    $this->session->set_userdata('user_logged_in', $sess_array);
                    $this->session->set_userdata($sess_array);
                    return TRUE;

                    if ($AccStat == 'Disabled') {
                        $this->form_validation->set_message('database_access', 'Your Account has been Diactivated, Please Ask for Autorized Assistance.');
                        return false;
                    }
                } else {
                    $this->form_validation->set_message('database_access', 'Username &#39 ' . $username . ' &#39 does not exist.');
                    return false;
                }
            }
        } else {
            $this->form_validation->set_message('database_access', 'Invalid username or password.');
            return false;
        }
    }

}
