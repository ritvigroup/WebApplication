<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Leader
*/

class Leader extends CI_Controller {
    
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


    public function getAllHomePageData() {
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
            $sql = "
            
            SELECT EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded FROM `Event` WHERE `StartDate` <= '".date('Y-m-d H:i:s')."' AND `EndDate` >= '".date('Y-m-d H:i:s')."' AND `EventStatus` = '1' AND `AddedBy` = '".$UserProfileId."'

            UNION 

            SELECT PollId AS Id, 'Poll' AS DataType, AddedOn AS DateAdded FROM `Poll` WHERE `ValidFromDate` <= '".date('Y-m-d')."' AND `ValidEndDate` >= '".date('Y-m-d')."' AND `PollStatus` = '1' AND `AddedBy` = '".$UserProfileId."'
            UNION 

            SELECT PostId AS Id, 'Post' AS DataType, AddedOn AS DateAdded FROM `Post` WHERE `PostStatus` = '1' AND `UserProfileId` = '".$UserProfileId."'

            ORDER BY DateAdded DESC LIMIT 0,50
            
            ";
            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {

                    if($val['DataType'] == "Post") {
                        $Data[] = array(
                                        'feedtype' => 'post',
                                        'postdata' => $this->Post_Model->getPostDetail($val['Id']),
                                        );
                    } else if($val['DataType'] == "Event") {
                        $Data[] = array(
                                        'feedtype' => 'event',
                                        'eventdata' => $this->Event_Model->getEventDetail($val['Id']),
                                        );
                    } else if($val['DataType'] == "Poll") {
                        $Data[] = array(
                                        'feedtype' => 'poll',
                                        'polldata' => $this->Poll_Model->getPollDetail($val['Id']),
                                        );
                    } else {
                        $Data = array();
                    }
                    $result = $Data;
                }
                $msg = "Home data found";
            } else {
                $msg = "No post found";
                $error_occured = true;
            }
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
