<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Infirmary
 *
 * @author Systemize
 */
class AccountReset extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('string');
        $this->load->library('session');
        $this->load->library('bcrypt');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('Mhcs_Model', '', TRUE);
        if ($this->session->userdata('admin_logged_in')) {

            $time = $this->session->userdata('last_login_timestamp');
            if ((time() - $time) > 50000) { // 900 = 15 * 60      
                $this->logout();
            }
        }
    }


    public function changePass() {
        $ctoken = $this->session->userdata('Access_Token');
        $ctoken = $this->input->get('Access_Token');
        $data = array('Access_Token' => $ctoken);
        $this->session->set_userdata($data);
        
        if ($this->session->userdata('admin_logged_in')) {
            redirect('schoolERP', 'refresh');
        } else {
            
            $this->form_validation->set_rules('password', 'Password', 'required|callback_checkPass');
            $this->form_validation->set_rules('npassword', 'Confirm Password', 'required|matches[password]');
            
            if ($this->form_validation->run() == FALSE) {
                
                
                $this->load->view('user/changepass', $data);
                
            } else {
                
                redirect('account_reset/changePass?Access_Token=' . $Access_Token . '');
            }
        } 
       
    }

    public function checkPass() {
        $password = $this->input->post('password');
        $npassword = $this->input->post('npassword');
        $Access_Token = $this->input->get('Access_Token');


        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password))
        {
            $this->form_validation->set_message('checkPass', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('checkPass', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('checkPass', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('checkPass', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('checkPass', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 8)
        {
            $this->form_validation->set_message('checkPass', 'The {field} field must be at least 8 characters in length.');
            return FALSE;
        }
        if (strlen($password) > 32)
        {
            $this->form_validation->set_message('checkPass', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        if ($password != $npassword)
        {
            $this->form_validation->set_message('checkPass', '');
            return FALSE;
        }
        $epass = $this->bcrypt->hash_password($password);
            $udata = array('password' => $epass);
        $this->Mhcs_Model->updatepass($udata,$Access_Token);
        $this->form_validation->set_message('checkPass', 'Password Successfully Change');
                return FALSE;
    }
}