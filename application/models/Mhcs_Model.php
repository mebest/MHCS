<?php

class Mhcs_Model extends CI_Model {
    var $table1 = 'student_accounting';
    var $table2 = 'student_compile_grade';
    var $table4 = 'transaction_list';
    var $stat0 = 0;
    var $stat1 = 1;
    var $stat2 = 2;

    function fetch_where($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('acct_tbl');
        return $query->result();
    }

    function getStudentAssess($std_num) {
        $this->db->where('student_num', $std_num);
        $query = $this->db->get('acct_tbl');
        return $query->result();
    }
    function getPayments($std_num,$sy) {
        $check = array('student_num' => $std_num, 'school_year' => $sy);
        $this->db->where($check);
        $query = $this->db->get('or_tbl');
        return $query->result();
    }

    function checkstudentno($stdno) {
        $this->db->like('student_num', $stdno);
    $query = $this->db->get('acct_tbl');
    if ($query->num_rows() > 0){
        return true;
    }
    }
        


    function fetch_balance($std_num,$sy) {
        $check = array('student_num' => $std_num, 'school_year' => $sy);
        $this->db->where($check);
        $query = $this->db->get('student_acct_balance');
        return $query->result();
    }    

    function checkemail($email) {
           $this->db->where('email',$email);
    $query = $this->db->get('acct_tbl');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
    }

    function checkstd($stdno) {
        $this->db->where('student_num',$stdno);
    $query = $this->db->get('acct_tbl');
    if ($query->num_rows() > 0){
        return false;
    }
    else{
        return true;
    }
    }

    function updateBalance($std_num, $path) {
        $this->db->set($path);
        $this->db->where('student_num', $std_num);
        $this->db->update('student_acct_balance');
    }

    function updatepass($data, $Access_Token) {
        $this->db->set($data);
        $this->db->where('Access_Token', $Access_Token);
        $this->db->update('acct_tbl');
    }

    function uploadSlip($std_num, $path) {
        $this->db->set($path);
        $this->db->where('student_num', $std_num);
        $this->db->update('student_acct_balance');
    }


    function getAttachment($std_num) {
        $this->db->select('payment_slip');
        $this->db->where('student_num', $std_num);
        $query = $this->db->get('student_acct_balance');
        return $query->result();
    }

    function refnum($std_num) {
        $this->db->select('costumer_id');
        $this->db->where('student_num', $std_num);
        $query = $this->db->get('acct_tbl');

    if ( $query->num_rows() > 0 )
    {
        $row = $query->row_array();
        return $row;
    }else{
        return false;
    }
    }


    function getStudentInfo($id) {
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $query = $this->db->get('acct_tbl');
        return $query->result();
    }

    function fetchdataAssess($std_num) {
        $this->db->where('student_num', $std_num);
        $query = $this->db->get('student_acct_balance');
        return $query->result_array();
    }

    function sbalance($student_num) {
        $this->db->select('acnt_balance');
        $this->db->from('student_acct_balance');
        $this->db->where('student_num', $student_num);
        $query = $this->db->get();
        $result = $query->row();
        return $result->acnt_balance;
    }
    function tbalance($student_num) {
        $this->db->select('tf_balance');
        $this->db->from('student_acct_balance');
        $this->db->where('student_num', $student_num);
        $query = $this->db->get();
        $result = $query->row();
        return $result->tf_balance;
    }

    function rbalance($student_num) {
        $this->db->select('r_balance');
        $this->db->from('student_acct_balance');
        $this->db->where('student_num', $student_num);
        $query = $this->db->get();
        $result = $query->row();
        return $result->r_balance;
    }
    public function updateTransact($val,$std_num) {
        $this->db->set($val);
        $this->db->where('student_num', $std_num);
        $this->db->update('student_acct_balance');
    }
    

    function sform($name) {
        $this->db->select('*');
        $this->db->where('Std_Name', $name);
        $query = $this->db->get('student_compile_grade');
        return $query->result();
    }
    
    function allPass($id) {
        $this->db->select('password');
        $this->db->where('user_id', $id);
        $query = $this->db->get('acct_tbl');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }



    function online_check() {
        $where = "status!='3' AND online_status='1'";
        $this->db->select('username');
        $this->db->where($where);
        $query = $this->db->get('acct_tbl');
        return $query->result();
    }

    //complain-request



    //Datatable
    public function fetchdata() {
        $this->db->select('*');
        $query = $this->db->get('student_accounting');
        return $query->result_array();
    }
    public function fetchdataaccounting() {
        $this->db->select('acct_tbl.student_num, acct_tbl.full_name, student_acct_balance.acnt_balance, student_acct_balance.school_year, student_acct_balance.payment_slip')
  ->from('acct_tbl')
  ->join('student_acct_balance', 'student_acct_balance.student_num = acct_tbl.student_num')->where('acct_tbl.status', 3);
$result = $this->db->get();
        return $result->result_array();
    }

    public function fetch_types() {
        $this->db->select('type');
        $query = $this->db->get('transaction_types');
        return $query->result_array();
    }

    public function fetch_sy() {
        $this->db->select('name');
        $this->db->where('status', 1);
        $query = $this->db->get('school_year');
        return $query->result_array();
    }

    public function transactManage_fetch($id) {
        $this->db->where('Access_Token', $id);
        $query = $this->db->get('student_accounting');
        return $query->result();
    }

    public function studentdata() {
        
        $sql = "SELECT * FROM student_compile_grade";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function fetch_item() {
        $this->db->select('*');
        $query = $this->db->get('infirmary_inventory_medicine');
        return $query->result();
    }

    public function studentaccountdata() {
        $sql = "SELECT * FROM acct_tbl where status = '3'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function adminaccountdata() {
        $sql = "SELECT * FROM acct_tbl where status = '1' OR status = '2'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function searchRecord($data) {
        $this->db->select('*');
        $this->db->where('Std_Name', $data);
        $query = $this->db->get('infirmary_daily_complain');
        return $query->result_array();
    }

    //selection
    
    //-- Insert Student Complain --//
    function addTransact($data) {
        $this->db->insert('student_accounting', $data);
    }

    function addStudent($data) {
        $this->db->insert('acct_tbl', $data);
    }

    function addAdmin($data) {
        $this->db->insert('acct_tbl', $data);
    }

    function addStudentbalance($data) {
        $this->db->insert('student_acct_balance', $data);
    }
    
    function addInfo($data) {
        $this->db->insert('infirmary_medical_record', $data);
    }

   

    function addComp($data) {
        $this->db->insert('complaint_list', $data);
    }

    function recordOR($data) {
        $this->db->insert('or_tbl', $data);
    }

    function addDisp($data) {
        $this->db->insert('disposition_list', $data);
    }

    function addRemak($data) {
        $this->db->insert('remarks_list', $data);
    }
    
    function addFinding($data,$token) {
        $this->db->set($data);
        $this->db->where('Access_Token',$token);
        $this->db->update('infirmary_annual_record');
    }
    
    function addNewAnnualRecord($data) {
        $this->db->insert('infirmary_annual_record', $data);
    }


    //-- Update Nurse Profile --//

    function updateAccount($data, $id) {
        $this->db->set($data);
        $this->db->where('user_id', $id);
        $this->db->update('acct_tbl');
    }

    function updateStatusAccount($data, $id) {
        $this->db->set($data);
        $this->db->where('user_id', $id);
        $this->db->update('acct_tbl');
    }

    function resetAccount($data, $id) {
        $this->db->set($data);
        $this->db->where('user_id', $id);
        $this->db->update('acct_tbl');
    }

    function changePass($data, $id) {
        $this->db->set($data);
        $this->db->where('user_id', $id);
        $this->db->update('acct_tbl');
    }

    //-- Delete Student Complain --//
    function deleteCluster($data) {
        $this->db->delete('cluster_student_list', $data);
    }

    function deleteSection($data) {
        $this->db->delete('section_student_list', $data);
    }

    function deleteComp($data) {
        $this->db->delete('complaint_list', $data);
    }

    function deleteDisp($data) {
        $this->db->delete('disposition_list', $data);
    }

    function deleteRemak($data) {
        $this->db->delete('remarks_list', $data);
    }

    function deleteAccount($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('acct_tbl');
    }
 


    //-- Calendar Event --//
    public function addEvent($event) {
        $this->db->insert('infirmary_calendar_event', $event);
    }

    public function deleteEvent($id) {
        $this->db->delete('infirmary_calendar_event', array('id' => $id));
    }

    public function updateEvent($event, $id) {
        $this->db->update('infirmary_calendar_event', $event, array('id' => $id));
    }

    public function getEvents() {
        $q = $this->db->get('infirmary_calendar_event');

        return $q->result();
    }

    public function getEventsById($id) {
        $x = $this->db->get_where('infirmary_calendar_event', array('id' => $id));
        return $x->result();
    }

    public function get_day($year, $month) {
        $events = array();

        $query = $this->db->select('*')->from('infirmary_calendar_event')->like('date', "$year-$month")->get();

        $query = $query->result();

        foreach ($query as $row) {

            $day = (int) substr($row->date, 8, 2);
            $events[(int) $day] = $row->date;
        }

        return $events;
    }

    public function display_events($date) {
        $x = $this->db->get_where('infirmary_calendar_event', array('date' => $date));
        return $x->result();
    }

    //count
    public function count_all() {
        $this->db->from($this->table1);
        return $this->db->count_all_results();
    }

    public function cornum() {
        $this->db->from('or_tbl');
        return $this->db->count_all_results();
    }

    public function count_all_tf($std_number,$type) {
        $this->db->select("*");
        $this->db->from('student_accounting');
        $this->db->where('std_number',$std_number);
        $this->db->like('acnt_reference', $type);
        return $this->db->count_all_results();
    }
    
    public function count_rec() {
        $this->db->from('infirmary_annual_record');
        return $this->db->count_all_results();
    }

    public function count_all2() {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }

    public function count_all3() {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }

    public function count_all4() {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }



    public function count_comp() {
        $this->db->from('complaint_list');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_disp() {
        $this->db->from('disposition_list');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_rema() {
        $this->db->from('remarks_list');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_trnsfr() {
        $this->db->from($this->table1);
        $this->db->where('Status', 0);
        return $this->db->count_all_results();
    }

    public function count_diag() {
        $this->db->from($this->table1);
        $this->db->where('Status', 1);
        return $this->db->count_all_results();
    }

    public function count_cleared() {
        $this->db->from($this->table1);
        $this->db->where('Status', 2);
        return $this->db->count_all_results();
    }

    public function count_user() {
        $this->db->from('acct_tbl');
        return $this->db->count_all_results();
    }

    public function count_doctor() {
        $this->db->from('acct_tbl');
        $this->db->where('Status', 1);
        return $this->db->count_all_results();
    }

    public function count_nurse() {
        $this->db->from('acct_tbl');
        $this->db->where('Status', 2);
        return $this->db->count_all_results();
    }





    public function login($username,$send) {
        $this->db->select('*');
        if($send == 1){
            $this->db->where('student_num', $username);
        }else{
            $this->db->where('username', $username);
        }        
        $query = $this->db->get('acct_tbl');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function onlogin($val, $user_id) {
        $this->db->set($val);
        $this->db->where('username', $user_id);
        $this->db->update('acct_tbl');
    }
    
    public function logout($val, $user_id) {
        $this->db->set($val);
        $this->db->where('user_id', $user_id);
        $this->db->update('acct_tbl');
    }

}
