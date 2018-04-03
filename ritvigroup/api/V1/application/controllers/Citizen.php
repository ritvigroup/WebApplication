<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Citizen
*/

class Citizen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Event_Model');
        $this->load->model('Information_Model');
        $this->load->model('Poll_Model');
        $this->load->model('Post_Model');
        $this->load->model('Suggestion_Model');
        $this->load->model('Leader_Model');
        $this->load->model('Feeling_Model');
        $this->load->model('Politicalparty_Model');
        $this->load->model('Suggestion_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function getMyAllSummaryTotal() {
        $error_occured = false;

        $UserId             = $this->input->post('user_id');
        $UserProfileId      = $this->input->post('user_profile_id');

       
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
        
            $result = array();
            
            $sql = "SELECT COUNT(EventId) AS TotalEvent FROM `Event` WHERE `AddedBy` = '".$UserProfileId."'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalEvent = ($res['TotalEvent'] > 0) ? $res['TotalEvent'] : 0; 

            $sql = "SELECT COUNT(PollId) AS TotalPoll FROM `Poll` WHERE `AddedBy` = '".$UserProfileId."'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalPoll = ($res['TotalPoll'] > 0) ? $res['TotalPoll'] : 0; 

            $sql = "SELECT COUNT(PostId) AS TotalPost FROM `Post` WHERE `UserProfileId` = '".$UserProfileId."'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalPost = ($res['TotalPost'] > 0) ? $res['TotalPost'] : 0; 

            $sql = "SELECT COUNT(SuggestionId) AS TotalSuggestion FROM `Suggestion` WHERE `AddedBy` = '".$UserProfileId."'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalSuggestion = ($res['TotalSuggestion'] > 0) ? $res['TotalSuggestion'] : 0; 

            $sql = "SELECT COUNT(InformationId) AS TotalInformation FROM `Information` WHERE `AddedBy` = '".$UserProfileId."'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalInformation = ($res['TotalInformation'] > 0) ? $res['TotalInformation'] : 0; 

            $sql = "SELECT COUNT(ComplaintId) AS TotalComplaint FROM `Complaint` WHERE `AddedBy` = '".$UserProfileId."'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalComplaint = ($res['TotalComplaint'] > 0) ? $res['TotalComplaint'] : 0; 

            $result = array(
                        'TotalEvent'        => $TotalEvent,
                        'TotalPoll'         => $TotalPoll,
                        'TotalPost'         => $TotalPost,
                        'TotalSuggestion'   => $TotalSuggestion,
                        'TotalInformation'  => $TotalInformation,
                        'TotalComplaint'    => $TotalComplaint,
                        );

            $msg = "User summary data found";
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $result,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

}

