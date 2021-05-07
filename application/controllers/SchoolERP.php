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
class SchoolERP extends CI_Controller {

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

    public function index() {
        $this->load->view('includes/header-index');
        $this->load->view('includes/preloader_home');
    }

//============= Start of LandingPage =============//

    public function LandingPage() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $online = array('user' => $this->Mhcs_Model->online_check(1));

            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $num3['count3'] = $this->Mhcs_Model->count_trnsfr();
            $num4['count4'] = $this->Mhcs_Model->count_diag();
            $num5['count5'] = $this->Mhcs_Model->count_cleared();
            $num6['count6'] = $this->Mhcs_Model->count_All4();
            $num7['count7'] = $this->Mhcs_Model->count_doctor();
            $num8['count8'] = $this->Mhcs_Model->count_nurse();      
            $num10['count10'] = $this->Mhcs_Model->count_user();


            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status,
                    'name' => $value->full_name,
                    'stdno' => $value->student_num,
                    'email' => $value->email,
                );
            }

            
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            $parent_data = array('user_log' => $data, 'online' => $online,   'num' => $num, 'num2' => $num2, 'num3' => $num3
                , 'num4' => $num4, 'num5' => $num5, 'num6' => $num6, 'num7' => $num7, 'num8' => $num8,  'stat' => $stat, 'send' => $send);

            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Administrator_Dashboard', $parent_data);
            $this->load->view('includes/footer-Admin');
            $this->load->view('includes/notifications');

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';

                $parent_data = array('user_log' => $data, 'online' => $online,   'num' => $num, 'num2' => $num2, 'num3' => $num3
                , 'num4' => $num4, 'num5' => $num5, 'num6' => $num6, 'num7' => $num7, 'num8' => $num8,  'stat' => $stat, 'send' => $send);
                 $this->load->view('includes/header-student', $parent_data);
            $this->load->view('Student/Student_Dashboard', $parent_data);
            $this->load->view('includes/footer-student');
        }
        } else {
            redirect('Login', 'refresh');
        }
    }

//============= Start of LandingPage =============//
   

//============== Start of Student_Accounts ==============//

    public function Student_Accounts() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $online = array('user' => $this->Mhcs_Model->online_check(1));

            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $num3['count3'] = $this->Mhcs_Model->count_trnsfr();
            $num4['count4'] = $this->Mhcs_Model->count_diag();
            $num5['count5'] = $this->Mhcs_Model->count_cleared();
            $num6['count6'] = $this->Mhcs_Model->count_All4();
                  
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';
            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $parent_data = array('user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2, 'num3' => $num3
                , 'num4' => $num4, 'num5' => $num5, 'num6' => $num6,  'stat' => $stat, 'send' => $send);
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Student_List', $parent_data);
            $this->load->view('includes/footer-Admin');

            if ($data['status'] == 3) {
                redirect('Login', 'refresh');
            }
        }else {
            redirect('Login', 'refresh');
        }
        
    }



    public function fetch_data() {
        date_default_timezone_set("Asia/Manila");
        $trancDate = array('yr' => date('Y'), "mm" => date('m'), "dd" => date('d'));
        $result = array('data' => array());
        $fetch = $this->Mhcs_Model->fetchdata();
        foreach ($fetch as $key => $value) {
            $result['data'][$key] = array(
                $value['transaction_key'],
                $value['acnt_reference'],
                $value['Std_Number'],
                $value['Std_Name'],
                $value['due_date'],
                $value['acnt_amount'],
                '<center><a href="Transact_Manage?Token=' . $value['Access_Token'] . '"><span class="mif-enter"'
                . 'title="Check-Up"></span></a></center>'
            );
        }echo json_encode($result);
    }


//============= End of Student_Accounts ===========//

//============= Start of Student_Transcat ===========//

    public function Student_Transact() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();
            $types = $this->Mhcs_Model->fetch_types();

            

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
                redirect('LandingPage', 'refresh');
            }


            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2,  'stat' => $stat, 'list' => $types);
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Account-Management/addTransactionAccount', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function addTransact(){
         if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');
            $types = $this->Mhcs_Model->fetch_types();
            $this->form_validation->set_rules('studentno', 'Student No.', 'required|callback_testtran');
            $this->form_validation->set_rules('fname', 'Full Name', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required|greater_than[0]');
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2, 'stat' => $stat, 'list' => $types);

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('includes/header-Admin', $parent_data);
                $this->load->view('Administrator/Account-Management/addTransactionAccount', $parent_data);
                $this->load->view('includes/footer-Admin');
            } else {
                $this->load->view('includes/header-Admin', $parent_data);
                $this->load->view('Administrator/Account-Management/addTransactionAccount', $parent_data);
                $this->load->view('includes/footer-Admin');
            }
        } else {
            redirect('Login', 'refresh');
        }
    }


      public function testtran(){
            $count = $this->Mhcs_Model->count_All() + 1;
            $trancDate = array('yr' => date('Y'), "mm" => date('m'), "dd" => date('d'));
                    $trancID = $trancDate['mm'] . '/' . $trancDate['dd'] . '/' . $trancDate['yr'] . '-' . $count;
            $date = $trancDate['mm'] . '-' . $trancDate['dd'] . '-' . $trancDate['yr'];
            $duedate = $this->input->post('duedate');   
            $std_num = $this->input->post('studentno');        
            $fname = $this->input->post('fname');
            $amount = number_format((float)$this->input->post('amount'), 2, '.', '');
            $trn_id = random_string('alnum', 12);
            $user_id = random_string('md5',32);
            $type = $this->input->post('type');
            $refnom = $this->Mhcs_Model->refnum($std_num);
            $sa = $this->Mhcs_Model->checkstd($std_num);
            $sbalance = number_format((float)$this->Mhcs_Model->sbalance($std_num), 2, '.', '');
            $lamount = number_format((float)$sbalance + $amount, 2, '.', '');
            $rbalance = number_format((float)$this->Mhcs_Model->rbalance($std_num), 2, '.', '');
            $lramount = number_format((float)$rbalance + $amount, 2, '.', '');
            $num['counttf'] = $this->Mhcs_Model->count_all_tf($std_num,$type);
            

            if($sa == FALSE){
                if($refnom != FALSE){
                    if($duedate == null){
                            $this->form_validation->set_message('testtran', 'The Due Date field is required.'); 
                        return FALSE;
                    }else{
                        if($type != "ID SYSTEM"){
                                $reference = ''.$type.'-'.$refnom['costumer_id'].'-'.$num['counttf'].'';
                            }else{
                                  $reference = $type;
                            }
                            $data = array('trn_id' => $trn_id, 'transaction_key' => $trancID, 'acnt_reference' => $reference, 'Std_Name' => $fname, 'Std_Number' => $std_num, 'date' => $date,'acnt_amount' => $amount,'due_date' => $duedate, 'Access_Token' => $user_id);
                            if($type == "TF"){
                                $tfbalance = number_format((float)$this->Mhcs_Model->tbalance($std_num), 2, '.', '');
                                $utfbal = number_format((float)$tfbalance + $amount, 2, '.', '');
                                    $tf_balance = $amount;
                                    $val = array('acnt_balance' => $lamount, 'tf_balance' => $utfbal, 'r_balance' => $lramount);
                                }else{
                                    $val = array('acnt_balance' => $lamount,'r_balance' => $lramount);
                                }
                                
                            $this->Mhcs_Model->addTransact($data);
                            $this->Mhcs_Model->updateTransact($val,$std_num);
                            $this->form_validation->set_message('testtran', 'Transaction Added.');
                        return FALSE;
                    }
                }else{
                            $this->form_validation->set_message('testtran', 'Student does not have Costumer ID.'); 
                        return FALSE;
                }
            }else{
                            $this->form_validation->set_message('testtran', 'Student No. not exist.'); 
                        return FALSE;
            } 
        
    }

//================ END of Student_Transact ==============//

//================ Start of Account_Management ==============//

public function Account_Management() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $num['count'] = $this->Mhcs_Model->count_All();
            
            
            
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
                redirect('LandingPage', 'refresh');
            }

            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data,  'online' => $online, 'num' => $num, 'num2' => $num2,  'stat' => $stat);
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Administrator_Accounts', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

//================ End of Account_Management ==============//


//============== Start of Student_Accounts ==============//

    public function Student_Accounting() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $online = array('user' => $this->Mhcs_Model->online_check(1));

            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $num3['count3'] = $this->Mhcs_Model->count_trnsfr();
            $num4['count4'] = $this->Mhcs_Model->count_diag();
            $num5['count5'] = $this->Mhcs_Model->count_cleared();
            $num6['count6'] = $this->Mhcs_Model->count_All4();
                  
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $parent_data = array('user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2, 'num3' => $num3
                , 'num4' => $num4, 'num5' => $num5, 'num6' => $num6,  'stat' => $stat, 'send' => $send);
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Student_Accounting', $parent_data);
            $this->load->view('includes/footer-Admin');

            if ($data['status'] == 3) {
                redirect('Login', 'refresh');
            }
        }else {
            redirect('Login', 'refresh');
        }
        
    }



    public function fetch_data_account() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $id = $this->session->userdata('id');
            $std_num = $this->session->userdata('std_num');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $sy = $this->input->get('SY');

        $fetch = $this->Mhcs_Model->fetchdataaccounting();
        foreach ($fetch as $key => $value) {
            if($value['payment_slip'] == null){
                    $status = '<span class="tag bg-darkIndigo fg-white">Pending <span class="mif-spinner4 mif-ani-spin"></span></span>';
                }else{
                   $status = '<span class="tag bg-lightGreen fg-white">Uploaded <span class="mif-checkmark mif-ani-flash"></span></span>';
                }
         $result['data'][$key] = array(
                $value['school_year'],
                $value['student_num'],
                $value['full_name'],
                $value['acnt_balance'],
                $status,
                '<center><a href="Assessment_View?SY='.$value['school_year'].'&std_num='.$value['student_num'].'"><span class="mif-enter" title="Enter"></span></a></center>'
            );
        }echo json_encode($result);
    }
    }


//============= End of Student_Accounts ===========//


//====================== Calendar Manage =====================//

    public function Calendar_Events() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }

            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2,  'stat' => $stat);
            $this->load->view('includes/header-Calendar', $parent_data);
            $this->load->view('Administrator/Administrator_Calendar', $parent_data);
            $this->load->view('includes/footer-Calendar');
        } else {
            redirect('Login', 'refresh');
        }
    }

    Public function getEvents() {

        $result = $this->Mhcs_Model->getEvents();
        echo json_encode($result);
    }

    /* Add new event */

    Public function addEvent() {
        $title = $this->input->post('title');
        $clock = $this->input->post('date');
        $desc = $this->input->post('description');
        $color = $this->input->post('color');
        $check = $this->Mhcs_Model->checkEvent();
        foreach ($check as $value) {
            $info = array(
                'date' => $value->date
            );
        }
        if ($check == $info) {
            echo "<script>alert('qwe');</script>";
        }
        $data = array('title' => $title, 'description' => $desc, 'color' => $color, 'date' => $clock);
        $result = $this->Mhcs_Model->addEvent($data);

        echo $result;
    }

    /* Update Event */

    Public function updateEvent() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $clock = $this->input->post('date');
        $desc = $this->input->post('description');
        $color = $this->input->post('color');
        $data = array('title' => $title, 'description' => $desc, 'color' => $color, 'date' => $clock);
        $result = $this->Mhcs_Model->updateEvent($data, $id);
        echo $result;
    }

    /* Delete Event */

    Public function deleteEvent() {
        $id = $this->input->get('id');
        $result = $this->Mhcs_Model->deleteEvent($id);
        echo $result;
    }

    Public function dragUpdateEvent() {

        $result = $this->Mhcs_Model->dragUpdateEvent();
        echo $result;
    }

//========== ACCOUNT MANAGEMENT =======//

    

    public function studentaccount_data() {
        $result = array('data' => array());
        $fetch = $this->Mhcs_Model->studentaccountdata();


        foreach ($fetch as $key => $value) {
            if ($value['Account_Status'] == 'Disabled') {
                $stat = "mif-switch fg-red";
            } else {
                $stat = "mif-switch fg-lightOlive";
            }
            if ($value['Account_Status'] == 'Active') {
                $AccStat = 'Diactivate';
            } elseif ($value['Account_Status'] == 'Disabled') {
                $AccStat = 'Active';
            } else {
                $AccStat = '';
            }
            $result['data'][$key] = array(
                $value['student_num'],
                $value['costumer_id'],
                $value['full_name'],
                $value['username'],
                $value['email'],
                $value['Account_Status'],
                '<a href="Account_Status?user_id=' . $value['user_id'] . '&stat=' . $value['Account_Status'] . '">'
                . '<span class="' . $stat . '" title="' . $AccStat . '"></span></a>' . '&nbsp;'
                . '<a href="Account_Settings?user_id=' . $value['user_id'] . '">'
                . '<span class="mif-wrench fg-violet" title="Update Info"></span></a>' . '&nbsp;' .
                '<a href="resetPass?user_id=' . $value['user_id'] . '">'
                . '<span class="mif-tools fg-blue" onclick="return resetconfirm();" title="Reset Password"></span></a>'
            );
        }echo json_encode($result);
    }

    public function adminaccount_data() {
        $result = array('data' => array());
        $fetch = $this->Mhcs_Model->adminaccountdata();


        foreach ($fetch as $key => $value) {
            if ($value['Account_Status'] == 'Disabled') {
                $stat = "mif-switch fg-red";
            } else {
                $stat = "mif-switch fg-lightOlive";
            }
            if ($value['Account_Status'] == 'Active') {
                $AccStat = 'Diactivate';
            } elseif ($value['Account_Status'] == 'Disabled') {
                $AccStat = 'Active';
            } else {
                $AccStat = '';
            }
            $result['data'][$key] = array(
                $value['full_name'],
                $value['username'],
                $value['Account_Status'],
                '<a href="Account_Status?user_id=' . $value['user_id'] . '&stat=' . $value['Account_Status'] . '">'
                . '<span class="' . $stat . '" title="' . $AccStat . '"></span></a>' . '&nbsp;'
                . '<a href="Account_Settings?user_id=' . $value['user_id'] . '">'
                . '<span class="mif-wrench fg-violet" title="Update Info"></span></a>' . '&nbsp;' .
                '<a href="Account_Change?user_id=' . $value['user_id'] . '">'
                . '<span class="mif-tools fg-blue" onclick="return resetconfirm();" title="Change Password"></span></a>' . '&nbsp;' .
                '<a href="deleteAccount?user_id=' . $value['user_id'] . '">'
                . '<span class="mif-bin fg-blue" onclick="return confirmation();" title="Delete User"></span></a>' . '&nbsp;' . ''
            );
        }echo json_encode($result);
    }



    public function Account_Status() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');
            $AccStat = $this->input->get('stat');
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }

            if ($AccStat == 'Active') {
                $AccStat = 'Disabled';
            } elseif ($AccStat == 'Disabled') {
                $AccStat = 'Active';
            } else {
                $AccStat = '';
            }
            $dataInsert = array('Account_Status' => $AccStat);
            $this->Mhcs_Model->updateStatusAccount($dataInsert, $user_id);
            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2,  'stat' => $stat);
            redirect('Account_Management');
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Account_Management', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function Account_Settings() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');
            $account = $this->Mhcs_Model->getStudentInfo($user_id);
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($account as $value) {
                $result = array(
                    'stdno' => $value->student_num,
                    'fname' => $value->full_name,
                    'cid' => $value->costumer_id,
                    'user' => $value->username
                );
            }

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_account' => $result, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2,  'stat' => $stat);
            if ($data['status'] == 1 || $data['status'] == 2) {
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Account-Management/Account_Manage', $parent_data);
            $this->load->view('includes/footer-Admin');
        }else{
            $this->load->view('includes/header-student', $parent_data);
            $this->load->view('Administrator/Account-Management/Account_Manage', $parent_data);
            $this->load->view('includes/footer-student');
        }
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function Account_Change() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }

            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2,  'stat' => $stat);
            if ($data['status'] == 1 || $data['status'] == 2) {
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Account-Management/changeAccountPass', $parent_data);
            $this->load->view('includes/footer-Admin');
        }else{
            $this->load->view('includes/header-student', $parent_data);
            $this->load->view('Administrator/Account-Management/changeAccountPass', $parent_data);
            $this->load->view('includes/footer-Admin');
        }

        } else {
            redirect('Login', 'refresh');
        }
    }

    public function Student_Account() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();
            $sy = $this->Mhcs_Model->fetch_sy();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
                redirect('LandingPage', 'refresh');
            }


            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2,  'stat' => $stat, 'schoolyear' => $sy);
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Account-Management/addStudentAccount', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function addStudent() {


        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();
            $sy = $this->Mhcs_Model->fetch_sy();

            $this->form_validation->set_rules('studentno', 'Student No.', 'required|callback_checkstudent');
            $this->form_validation->set_rules('email', 'Email Address', 'required');

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
                redirect('LandingPage', 'refresh');
            }


            

            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2,  'stat' => $stat, 'schoolyear' => $sy);
            if($this->form_validation->run() == FALSE){
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Account-Management/addStudentAccount', $parent_data);
            $this->load->view('includes/footer-Admin');
        }else{
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Account-Management/addStudentAccount', $parent_data);
            $this->load->view('includes/footer-Admin');
        }
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function checkstudent(){
                 $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.hostinger.ph',
             'smtp_port' => 587,
             'smtp_auth' => TRUE,
             'smtp_user' => 'accounting@mhcsaccounting.com',
             'smtp_pass' => 'mhcsccount',
             'charset'=>'utf-8',);
            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");
        $fname = $this->input->post('fname');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $user_id = random_string('md5',32);
            $sy = $this->input->post('sy');
            $std_num = $this->input->post('studentno');
            $costumer_id = $this->input->post('costumer_id');
            $pass = '$2a$08$pOJNIXXpyIqgI1Ck.j8af.UyVnLeMxu29RyIWHPnoLd/im72Q8BVm';
            $acc_stat = '3';

            $checkstd = $this->Mhcs_Model->checkstudentno($std_num);
            $checkemail = $this->Mhcs_Model->checkemail($email);

            if($checkstd == FALSE){
                if($checkemail == FALSE){
                     $data = array('user_id' => $user_id, 'student_num' => $std_num, 'full_name' => $fname, 'email' => $email, 'username' => $username, 'status' => $acc_stat, 'costumer_id' => $costumer_id, 'password' => $pass, 'Access_Token' => $user_id);
            $std = array('student_num' => $std_num, 'school_year' => $sy, 'Access_Token' => $user_id);
            $this->Mhcs_Model->addStudent($data);
            $this->Mhcs_Model->addStudentbalance($std);
            $mesg = $this->load->view('email/email',$data,true);


            $this->email->to($email);
            $this->email->from("accounting@mhcsaccounting.com", "MHCS - Portal");
            $this->email->subject("Student Portal Account");
            $this->email->message($mesg);
            $mail = $this->email->send();
            $this->form_validation->set_message('checkstudent', 'The Student successfully added.'); 
                        return FALSE;
                }else{
                    $this->form_validation->set_message('checkstudent', 'The Email Address is already exist.'); 
                        return FALSE;
                   
                }
            }else{
                
            $this->form_validation->set_message('checkstudent', 'The Student No. is already exist.'); 
                        return FALSE;
            }
    }

    public function Admin_Account() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
                redirect('LandingPage', 'refresh');
            }


            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2,  'stat' => $stat);
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Account-Management/addAdminAccount', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function addAdmin() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $fname = $this->input->post('fname');
            $username = $this->input->post('username');
            $user_id = random_string('sha1', 8);
            $pass = '$2a$08$Srn2AB.dgW3Ght4Bp4yag.Worku5.IOSmV8HrnwrSRsZkIVMhOh0y';
            $acc_stat = $this->input->post('status');
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
                redirect('LandingPage', 'refresh');
            }



            $data = array('user_id' => $user_id, 'full_name' => $fname, 'username' => $username, 'status' => $acc_stat, 'password' => $pass);
            $this->Mhcs_Model->addAdmin($data);

            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2,  'stat' => $stat);
            redirect('Account_Management');
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Account-Management/addAdminAccount', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function updateAccount() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');
            $fullname = $this->input->post('fullname');
            $costumerid = $this->input->post('costumerid');
            $studentnum = $this->input->post('studentnum');
            $username = $this->input->post('username');
            $account = $this->Mhcs_Model->getStudentInfo($user_id);
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($account as $value) {
                $result = array(
                    'stdno' => $value->student_num,
                    'fname' => $value->full_name,
                    'cid' => $value->costumer_id,
                    'user' => $value->username
                );
            }

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
                redirect('LandingPage', 'refresh');
            }


            $dataInsert = array('full_name' => $fullname, 'student_num' => $studentnum, 'costumer_id' => $costumerid, 'username' => $username);
            $this->Mhcs_Model->updateAccount($dataInsert, $user_id);
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2,  'stat' => $stat, 'user_account' => $result);
            
            $this->load->view('includes/header-Admin', $parent_data);
             $this->load->view('Administrator/Account-Management/Account_Manage', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function resetPass() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');
            $newpass = '$2a$08$ucXRgYPjTNxC5qtMYUpgmuHkkW/MqWuZ9g5HCiFC76Mil5KJVXiPO';
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
                redirect('LandingPage', 'refresh');
            }


            $dataInsert = array('password' => $newpass);
            $this->Mhcs_Model->updateAccount($dataInsert, $user_id);
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2,  'stat' => $stat);
            redirect('Account_Management', 'refresh');
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Account_Settings', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function changePass() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');

            $this->form_validation->set_rules('oldpassword', 'Old Password', 'required|callback_checkPass');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required');
            $this->form_validation->set_rules('rpassword', 'Confirm Password', 'required|matches[newpassword]');
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2, 'stat' => $stat);

            if ($this->form_validation->run() == FALSE) {
                if ($data['status'] == 1 || $data['status'] == 2) {
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('Administrator/Account-Management/changeAccountPass', $parent_data);
            $this->load->view('includes/footer-Admin');
        }else{
            $this->load->view('includes/header-student', $parent_data);
            $this->load->view('Administrator/Account-Management/changeAccountPass', $parent_data);
            $this->load->view('includes/footer-Admin');
        }
            } else {

                redirect('Account_Change?user_id=' . $user_id . '');
            }
        } else {
            redirect('Account_Change?user_id=' . $user_id . '');
        }
    }

    public function deleteAccount() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
                redirect('LandingPage', 'refresh');
            }


            $this->Mhcs_Model->deleteAccount($user_id);

            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2,  'stat' => $stat);
            $this->load->view('includes/header-Admin', $parent_data);
                $this->load->view('Administrator/Account-Management/Account_Manage', $parent_data);
                $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    //========== ACCOUNT MANAGEMENT =======//

    public function Transaction_Management() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }

            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $comp['comp'] = $this->Mhcs_Model->count_comp();
            $disp['disp'] = $this->Mhcs_Model->count_disp();
            $rema['rema'] = $this->Mhcs_Model->count_rema();
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2,  'stat' => $stat,
                'comp' => $comp, 'disp' => $disp, 'rema' => $rema,);
            $this->load->view('includes/header-transaction', $parent_data);
            $this->load->view('Administrator/Administrator_Transaction', $parent_data);
            $this->load->view('includes/footer-transaction');
        } else {
            redirect('Login', 'refresh');
        }
    }

    
    //=== CALLBACKS===//

    public function checkPass() {
        $_SESSION['last_login_timestamp'] = time();
        $user_id = $this->input->get('user_id');
        $oldpass = $this->input->post('oldpassword');
        $newpass = $this->input->post('newpassword');
        $rpass = $this->input->post('rpassword');
        $allpass = $this->Mhcs_Model->allPass($user_id);
        $new = $this->input->post('newpassword');
        $sNew = $this->bcrypt->hash_password($new);
        foreach ($allpass as $value) {
            $dt = array(
                'password' => $value->password
            );
        }

        $test = $this->bcrypt->check_password($newpass, $dt['password']);
        $test2 = $this->bcrypt->check_password($oldpass, $dt['password']);
        if($test2 == 1){
            if($test == 0){
              if($rpass == $newpass){
            $pdata = array('password' => $sNew);
                $this->Mhcs_Model->changePass($pdata, $user_id);
                $this->form_validation->set_message('checkPass', 'Password Updated!');
                return FALSE;
        }else{
             $this->form_validation->set_message('checkPass', 'Password do not match');
                return FALSE;
        }
        }else{
            $this->form_validation->set_message('checkPass', 'Please Dont use same password.');
            return FALSE;
        }
        }else{
            $this->form_validation->set_message('checkPass', 'Your Current Password was incorrect.');
            return FALSE;
        }

    }

    //===================== TRANSACT =================//

    public function Transact_Manage() {
        if ($this->session->userdata('admin_logged_in')) {
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $comp_id = $this->input->get('Token');
            $fetch_comp = $this->Mhcs_Model->transactManage_fetch($comp_id);
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $num3['count3'] = $this->Mhcs_Model->count_trnsfr();
            $num4['count4'] = $this->Mhcs_Model->count_diag();
            $num5['count5'] = $this->Mhcs_Model->count_cleared();
            $num6['count6'] = $this->Mhcs_Model->count_All4();
            $num10['count10'] = $this->Mhcs_Model->count_user();
            $zero = '';
            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }

            if ($comp_id == null) {
                redirect('Student_Accounts');
            }
            if ($fetch_comp == FALSE) {
                redirect('Student_Accounts');
            }

            foreach ($fetch_comp as $value) {
                $comp_data = array(
                    'key' => $value->transaction_key,
                    'name' => $value->Std_Name,
                    'refnum' => $value->acnt_reference,
                    'amount' => $value->acnt_amount,
                    'stdnum' => $value->Std_Number,
                    'status' => $value->trn_status,
                );
            }

            if ($comp_data['docComp'] == null) {
                $clear = 'disabled';
            } elseif ($comp_data['docComp'] != null) {
                $clear = 'disabled';
                if ($comp_data['treatment'] != null) {
                    $clear = 'disabled';
                }if ($comp_data['medication'] != null) {
                    $clear = 'disabled';
                }if ($comp_data['disposition'] != null) {
                    $clear = 'disabled';
                }if ($comp_data['remarks'] != null) {
                    $clear = '';
                }
            }

            $parent_data = array('user_log' => $data, 'online' => $online,
                'comp_log' => $comp_data, 'stat' => $stat, 'num' => $num,
                'num2' => $num2, 'num3' => $num3
                , 'num4' => $num4, 'num5' => $num5, 'num6' => $num6,
                'send' => $send, 'zero' => $zero,
                'cleared' => $clear, 'token' => $comp_id);
            $this->load->view('includes/header-medical', $parent_data);
            $this->load->view('Student/Student_Transactions', $parent_data);
            $this->load->view('includes/footer-medical');
        } else {
            redirect('infirmaryLoginSys', 'refresh');
        }
    }

        

    
//===========================END==================//

    public function about() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');
            
            
            
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();
            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }

            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2,
                 'num10' => $num10,  'stat' => $stat);
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('includes/about', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function App_Notification() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $user_id = $this->input->get('user_id');
            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $num3['count3'] = $this->Mhcs_Model->count_trnsfr();
            $num4['count4'] = $this->Mhcs_Model->count_diag();
            $num5['count5'] = $this->Mhcs_Model->count_cleared();
            $num6['count6'] = $this->Mhcs_Model->count_All4();
            $num7['count7'] = $this->Mhcs_Model->count_user();
            
            
            
            $num10['count10'] = $this->Mhcs_Model->count_user();
            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                $stat['status'] = 'Administrator';
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-clipboard icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-tootls icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';
            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }

            $num2['count2'] = $this->Mhcs_Model->count_All2();
            
            $parent_data = array('send' => $send, 'user_log' => $data, 'online' => $online, 'user_id' => $user_id, 'num' => $num, 'num2' => $num2,   'stat' => $stat);
            $this->load->view('includes/header-Admin', $parent_data);
            $this->load->view('In-App/inAppNotification', $parent_data);
            $this->load->view('includes/footer-Admin');
        } else {
            redirect('Login', 'refresh');
        }
    }

    public function Student_Assessments() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $id = $this->session->userdata('id');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $online = array('user' => $this->Mhcs_Model->online_check(1));

            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $num3['count3'] = $this->Mhcs_Model->count_trnsfr();
            $num4['count4'] = $this->Mhcs_Model->count_diag();
            $num5['count5'] = $this->Mhcs_Model->count_cleared();
            $num6['count6'] = $this->Mhcs_Model->count_All4();
                  
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';
            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $parent_data = array('user_log' => $data, 'online' => $online, 'num' => $num, 'num2' => $num2, 'num3' => $num3
                , 'num4' => $num4, 'num5' => $num5, 'num6' => $num6,  'stat' => $stat, 'send' => $send);
            $this->load->view('includes/header-student', $parent_data);
            $this->load->view('Student/Student_Assessments', $parent_data);
            $this->load->view('includes/footer-student');

            
        }else {
            redirect('Login', 'refresh');
        }

    }

    public function fetch_dataAssess() {
        date_default_timezone_set("Asia/Manila");
        $trancDate = array('yr' => date('Y'), "mm" => date('m'), "dd" => date('d'));
        $result = array('data' => array());
        $std_num = $this->session->userdata('std_num');
        $fetch = $this->Mhcs_Model->fetchdataAssess($std_num);
        foreach ($fetch as $key => $value) {
            $result['data'][$key] = array(
                '<center><a href="View_Assessment?SY='.$value['school_year'].'"><span class="mif-search"'
                . 'title="View"></span></a></center>',
                $value['school_year']
            );
        }echo json_encode($result);
    }
    

    public function View_Assessment() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $id = $this->session->userdata('id');
            $std_num = $this->session->userdata('std_num');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $sy = $this->input->get('SY');
            $sa1 = substr($sy, -2, 2);
            $sa2 = substr($sy, -6, 2);
            $so = 'As of SY '.$sa2.'-'.$sa1.'';
            $balance = $this->Mhcs_Model->fetch_balance($std_num,$sy);
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $attach = $this->Mhcs_Model->getAttachment($std_num);

            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $num3['count3'] = $this->Mhcs_Model->count_trnsfr();
            $num4['count4'] = $this->Mhcs_Model->count_diag();
            $num5['count5'] = $this->Mhcs_Model->count_cleared();
            $num6['count6'] = $this->Mhcs_Model->count_All4();
                  
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status,
                    'studentnum' => $value->student_num,
                    'name' => $value->full_name
                );
            }

            foreach ($balance as $value) {
                $info = array(
                    'tf_balance' => $value->tf_balance,
                    't_balance' => $value->acnt_balance,
                    'r_balance' => $value->r_balance,
                );
            }


            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $parent_data = array('images' => $attach,'usy' => $sy,'infos' => $info,'user_log' => $data, 'sy' => $so, 'online' => $online, 'num' => $num, 'num2' => $num2, 'num3' => $num3
                , 'num4' => $num4, 'num5' => $num5, 'num6' => $num6,  'stat' => $stat, 'send' => $send);
            if ($data['status'] == 1 || $data['status'] == 2) {
            redirect('Login', 'refresh');
        }else{
            $this->load->view('includes/header-medical', $parent_data);
            $this->load->view('Student/View_Assessment', $parent_data);
            $this->load->view('includes/footer-medical');
        }
        }else {
            redirect('Login', 'refresh');
        }
        
    }
    public function Assessment_View() {
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $id = $this->session->userdata('id');
            $std_num = $this->input->get('std_num');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $sy = $this->input->get('SY');
            $sa1 = substr($sy, -2, 2);
            $sa2 = substr($sy, -6, 2);
            $so = 'As of SY '.$sa2.'-'.$sa1.'';
            $balance = $this->Mhcs_Model->fetch_balance($std_num,$sy);
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $attach = $this->Mhcs_Model->getAttachment($std_num);
            $student = $this->Mhcs_Model->getStudentAssess($std_num);
            $payments = $this->Mhcs_Model->getPayments($std_num,$sy);

            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $num3['count3'] = $this->Mhcs_Model->count_trnsfr();
            $num4['count4'] = $this->Mhcs_Model->count_diag();
            $num5['count5'] = $this->Mhcs_Model->count_cleared();
            $num6['count6'] = $this->Mhcs_Model->count_All4();
                  
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($student as $value) {
                $cdata = array(
                    'name' => $value->full_name,
                    'stud_no' => $value->student_num,
                    'Access_Token' => $value->Access_Token
            );
            }

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }

            foreach ($balance as $value) {
                $info = array(
                    'tf_balance' => $value->tf_balance,
                    't_balance' => $value->acnt_balance,
                    'r_balance' => $value->r_balance
                );
            }


            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $parent_data = array('getPayments' => $payments,'cdata' => $cdata,'images' => $attach,'usy' => $sy,'infos' => $info,'user_log' => $data, 'sy' => $so, 'online' => $online, 'num' => $num, 'num2' => $num2, 'num3' => $num3
                , 'num4' => $num4, 'num5' => $num5, 'num6' => $num6,  'stat' => $stat, 'send' => $send);
 
            $this->load->view('includes/header-view-admin', $parent_data);
            $this->load->view('Administrator/View_Assessment', $parent_data);
            $this->load->view('includes/footer-view-admin');

        }else {
            redirect('Login', 'refresh');
        }
        
    }

    public function uploadSlip(){
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $id = $this->session->userdata('id');
            $std_num = $this->session->userdata('std_num');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $sy = $this->input->get('SY');
            $sa1 = substr($sy, -2, 2);
            $sa2 = substr($sy, -6, 2);
            $so = 'As of SY '.$sa2.'-'.$sa1.'';
            $balance = $this->Mhcs_Model->fetch_balance($std_num,$sy);
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $attach = $this->Mhcs_Model->getAttachment($std_num);

            $num['count'] = $this->Mhcs_Model->count_All();
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $num3['count3'] = $this->Mhcs_Model->count_trnsfr();
            $num4['count4'] = $this->Mhcs_Model->count_diag();
            $num5['count5'] = $this->Mhcs_Model->count_cleared();
            $num6['count6'] = $this->Mhcs_Model->count_All4();
                  
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status,
                    'studentnum' => $value->student_num,
                    'name' => $value->full_name
                );
            }

            foreach ($balance as $value) {
                $info = array(
                    'tf_balance' => $value->tf_balance,
                    't_balance' => $value->acnt_balance,
                    'r_balance' => $value->r_balance
                );
            }


            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $parent_data = array('images' => $attach,'infos' => $info,'user_log' => $data, 'sy' => $so, 'online' => $online, 'num' => $num, 'num2' => $num2, 'num3' => $num3
                , 'num4' => $num4, 'num5' => $num5, 'num6' => $num6,  'stat' => $stat, 'send' => $send);
        if(!empty($_FILES['file']['name'])){

     // Set preference
     $config['upload_path'] = 'uploads/'; 
     $config['allowed_types'] = 'jpg|jpeg|png|gif';
     $config['max_size'] = '1024'; // max_size in kb
     $config['file_name'] = $_FILES['file']['name'];
     $config['image_width'] = '500';
     $config['image_height'] = '300';

     //Load upload library
     $this->load->library('upload',$config); 

     // File upload
     if($this->upload->do_upload('file')){
       // Get data about the file
        foreach ($attach as $value) {
            $slip = array('img' => $value->payment_slip);
        }
       $uploadData = $this->upload->data();
       $loc = '<tr><td><img src="'.base_url().''.$config['upload_path'].''.$uploadData['file_name'].'" class="box bg-white" style="width:400px;height:200px;"></td><td><div id="lightgallery"><a href="'.base_url().''.$config['upload_path'].''.$uploadData['file_name'].'"><span class="mif-eye fg-lightGreen" title="View Image"></span></a></div></td>';
       $imgs = ''.$slip['img'].''.$loc.'';


       $path = array('payment_slip' => $imgs);

       $this->Mhcs_Model->uploadSlip($std_num,$path);
       $this->load->view('includes/header-student', $parent_data);
            $this->load->view('Student/View_Assessment', $parent_data,$error);
            $this->load->view('includes/footer-Admin');
     }else{
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('includes/header-student', $parent_data);
            $this->load->view('Student/View_Assessment', $parent_data,$error);
            $this->load->view('includes/footer-Admin');
     }
   }    
            redirect('View_Assessment?SY='.$sy.'', 'refresh');
     }
    }

    public function deductBalance(){
        if ($this->session->userdata('admin_logged_in')) {
            $_SESSION['last_login_timestamp'] = time();
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $id = $this->session->userdata('id');
            $std_num = $this->input->get('studentno');
            $fetch = $this->Mhcs_Model->fetch_where($id);
            $sy = $this->input->get('SY');
            $sa1 = substr($sy, -2, 2);
            $sa2 = substr($sy, -6, 2);
            $so = 'As of SY '.$sa2.'-'.$sa1.'';
            $balance = $this->Mhcs_Model->fetch_balance($std_num,$sy);
            $online = array('user' => $this->Mhcs_Model->online_check(1));
            $attach = $this->Mhcs_Model->getAttachment($std_num);
            $student = $this->Mhcs_Model->getStudentAssess($std_num);
            $payments = $this->Mhcs_Model->getPayments($std_num,$sy);
            $this->form_validation->set_rules('deduct', 'Amount', 'required|greater_than[0]|callback_checkdeduct');
            $num['count'] = $this->Mhcs_Model->count_All();
            $num10['count10'] = $this->Mhcs_Model->count_user();

            foreach ($student as $value) {
                $cdata = array(
                    'name' => $value->full_name,
                    'stud_no' => $value->student_num,
                    'Access_Token' => $value->Access_Token
            );
            }

            foreach ($fetch as $value) {
                $data = array(
                    'id' => $value->user_id,
                    'user' => $value->username,
                    'status' => $value->status
                );
            }

            foreach ($balance as $value) {
                $info = array(
                    'tf_balance' => $value->tf_balance,
                    't_balance' => $value->acnt_balance,
                    'r_balance' => $value->r_balance
                );
            }
            if ($data['status'] == 1 || $data['status'] == 2) {
                if($data['status'] == 1){
                    $stat['status'] = 'Administrator';
                }else{
                    $stat['status'] = 'Management';
            }
                $send['link'] = '<li><a href="Student_Accounts">
                                    <span class="mif-list icon" title="Student List"></span>
                                    <span class="title">Assessments</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Student_Accounting">
                                    <span class="mif-calculator2 icon" title="Student List"></span>
                                    <span class="title">Accounting</span>
                                    <span class="counter">' . $num['count'] . '</span>
                                </a></li>
                                <li><a href="Account_Management">
                                    <span class="mif-profile icon"></span>
                                    <span class="title">Users Profile</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>
                                <li><a href="Configurations">
                                    <span class="mif-cog icon"></span>
                                    <span class="title">Configurations</span>
                                    <span class="counter">' . $num10['count10'] . '</span>
                                </a></li>';

            } else {
                $stat['status'] = 'Student';
                $send['link'] = '';
            }
            $num2['count2'] = $this->Mhcs_Model->count_All2();
            $parent_data = array('getPayments' => $payments,'cdata' => $cdata,'images' => $attach,'usy' => $sy,'infos' => $info,'user_log' => $data, 'sy' => $so, 'online' => $online, 'num' => $num, 'stat' => $stat, 'send' => $send);

            if ($this->form_validation->run() == FALSE) {
                 $this->load->view('includes/header-view-admin', $parent_data);
            $this->load->view('Administrator/View_Assessment', $parent_data);
            $this->load->view('includes/footer-view-admin');
            } else {
                $this->load->view('includes/header-view-admin', $parent_data);
            $this->load->view('Administrator/View_Assessment', $parent_data);
            $this->load->view('includes/footer-view-admin');
            }
        } else {
            redirect('Login', 'refresh');
        }
        
    }

    public function checkdeduct(){
        $stud_no = $this->input->get('studentno');
        $sy = $this->input->get('SY');
        $token = $this->input->get('Access_Token');
        $amount = $this->input->post('deduct');
        $rbalance = number_format((float)$this->Mhcs_Model->rbalance($stud_no), 2, '.', '');
        $lamount = number_format((float)$rbalance - $amount, 2, '.', '');
        $trancDate = array('yr' => date('Y'), "mm" => date('m'), "dd" => date('d'));
                    $trancID = $trancDate['yr'] . '-' . $trancDate['mm'] . '-' . $trancDate['dd'];
        $cornum = $this->Mhcs_Model->cornum();
        $ornum = 'OR # '.$cornum.' - '.$trancID.' (bank)';
        $or = array('student_num' => $stud_no,'or_num' => $ornum,'or_value' => $amount,'or_date' => $trancID,'school_year' => $sy);
        $deduct = array('r_balance' => $lamount);
        
        if($amount != NULL){
            if($amount <= 0){
                 $this->form_validation->set_message('checkdeduct', 'The Amount must be greater than zero.'); 
                        return FALSE;
            }else{
                $this->Mhcs_Model->recordOR($or);
                $this->Mhcs_Model->updateBalance($stud_no,$deduct);
                $this->form_validation->set_message('checkdeduct', 'Amount Deducted.'); 
                        return FALSE;       
            }      
                    }else{
                        $this->form_validation->set_message('checkdeduct', 'The Amount field is required.'); 
                        return FALSE;
                    }
        
    }

    public function sendSMS() {
        $this->form_validation->set_rules('number', 'Mobile Number', 'required');
        $this->form_validation->set_rules('Message', 'Message', 'required');
        if ($this->form_validation->run()) {
            $mobile = $this->input->post('number');
            $message = $this->input->post('message');
            $data = $this->input->post();
            unset($data['submit']);
            $authkey = "";
            $senderId = "";
            $route = "";
            $postData = array(
                'authkey' => $authkey,
                'mobiles' => $mobile,
                'message' => $message,
                'sender' => $senderId,
                'route' => $route
            );
            $url = "http://api.";
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_PORT => TRUE,
                CURLOPT_POSTFIELDS => $postData
            ));
        } else {
            echo validation_errors();
        }
    }



    public function logout() {
        $user_id = $this->session->userdata('id');
        $val = array('online_status' => '0');
        $this->Mhcs_Model->logout($val, $user_id);
        $this->session->flashdata();
        session_destroy();
        redirect('Login', 'refresh');
    }

}
