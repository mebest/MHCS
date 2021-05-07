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
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('date');
        $this->load->library('session');
        $this->load->library('bcrypt');
        $this->load->library('form_validation');
        $this->load->model('Mhcs_Model', '', TRUE);
    }

    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('schoolERP', 'refresh');
        } else {
            $this->load->view('includes/header-login');
            $this->load->view('Administrator/Administrator_Login');
            $this->load->view('includes/footer-login');
        }
    }

    public function verify_login() {
        
        $this->form_validation->set_rules('user_login', 'Username', 'trim|required');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|callback_database_access');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header-login');
            $this->load->view('Administrator/Administrator_Login');
            $this->load->view('includes/footer-login');
        } else {
            redirect('schoolERP', 'refresh');
        }
    }

    public function database_access() {
        $username = $this->input->post('user_login');
        $password = $this->input->post('user_password');
        if(is_numeric($username)){
            $send = 1;
        }else{
            $send = 2;
        }
        $result = $this->Mhcs_Model->login($username,$send);
        $val = array('online_status' => 1);
        $this->Mhcs_Model->onlogin($val, $username);
        if ($result) {
            foreach ($result as $value) {
                $stat = $value->status;
                $AccStat = $value->Account_Status;
                $data = array(
                    'password' => $value->password
                );
            }
            if ($this->bcrypt->check_password($password, $data['password'])) {

                if ($stat == 1) {
                    if ($AccStat == 'Active') {
                        $sess_array = array(
                            'id' => $value->user_id,
                            'username' => $value->username,
                            'status' => $value->status,
                             'last_login_timestamp' => time()
                        );

                        $this->session->set_userdata('admin_logged_in', $sess_array);
                        $this->session->set_userdata($sess_array);
                        return TRUE;
                    }
                    if ($AccStat == 'Disabled') {
                        $this->form_validation->set_message('database_access', 'Your Account has been Diactivated, Please Ask for Autorized Assistance.');
                        return false;
                    }
                } elseif ($stat == 2) {
                    if ($AccStat == 'Active') {
                        $sess_array = array(
                            'id' => $value->user_id,
                            'username' => $value->username,
                            'status' => $value->status,
                            'last_login_timestamp' => time()
                        );
                        $this->session->set_userdata('admin_logged_in', $sess_array);
                        $this->session->set_userdata($sess_array);
                        return TRUE;
                    }
                    if ($AccStat == 'Disabled') {
                        $this->form_validation->set_message('database_access', 'Your Account has been Diactivated, Please Ask for Autorized Assistance.');
                        return false;
                    }
                } elseif ($stat == 3) {
                    if ($AccStat == 'Active') {
                        $sess_array = array(
                            'id' => $value->user_id,
                            'username' => $value->username,
                            'status' => $value->status,
                            'std_num' => $value->student_num,
                            'last_login_timestamp' => time()
                        );
                        $this->session->set_userdata('admin_logged_in', $sess_array);
                        $this->session->set_userdata($sess_array);
                        return TRUE;
                    }
                    if ($AccStat == 'Disabled') {
                        $this->form_validation->set_message('database_access', 'Your Account has been Diactivated, Please Ask for Autorized Assistance.');
                        return false;
                    }
                }else {
                    $this->form_validation->set_message('database_access', 'Username &#39 ' . $username . ' &#39 does not exist.');
                    return false;
                }
            } else {
                $this->form_validation->set_message('database_access', 'Wrong / Invalid Password');
                return false;
            }
        } else {
            $this->form_validation->set_message('database_access', 'Username &#39 ' . $username . ' &#39 does not exist.');
            return false;
        }
    }

}
