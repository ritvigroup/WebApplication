<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Citizen
*/

class Citizen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Complaint_Model');
        $this->load->model('Event_Model');
        $this->load->model('Information_Model');
        $this->load->model('Poll_Model');
        $this->load->model('Post_Model');
        $this->load->model('Suggestion_Model');
        $this->load->model('Leader_Model');
        $this->load->model('Feeling_Model');
        $this->load->model('Politicalparty_Model');
        $this->load->model('Suggestion_Model');
        $this->load->model('Document_Model');

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
        $start              = (($this->input->post('start') > 0) ? $this->input->post('start') : 0);
        $end                = (($this->input->post('end') > 0) ? $this->input->post('end') : 10);

       
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

            UNION 

            SELECT ComplaintId AS Id, 'Complaint' AS DataType, AddedOn AS DateAdded FROM `Complaint` WHERE `ComplaintStatus` = '1' AND `AddedBy` = '".$UserProfileId."'

            UNION 

            SELECT SuggestionId AS Id, 'Suggestion' AS DataType, AddedOn AS DateAdded FROM `Suggestion` WHERE `SuggestionStatus` = '1' AND `AddedBy` = '".$UserProfileId."'

            ORDER BY DateAdded DESC LIMIT $start,$end";


            //echo $sql;die;
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
                    } else if($val['DataType'] == "Complaint") {
                        $Data[] = array(
                                        'feedtype' => 'complaint',
                                        'complaintdata' => $this->Complaint_Model->getComplaintDetail($val['Id']),
                                        );
                    } else if($val['DataType'] == "Suggestion") {
                        $Data[] = array(
                                        'feedtype' => 'suggestion',
                                        'suggestiondata' => $this->Suggestion_Model->getSuggestionDetail($val['Id']),
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

            $sql = "SELECT COUNT(UserFriendId) AS TotalFriends FROM `UserFriend` WHERE (`UserProfileId` = '".$UserProfileId."' OR `FriendUserProfileId` = '".$UserProfileId."') AND `RequestAccepted` = '1'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalFriends = ($res['TotalFriends'] > 0) ? $res['TotalFriends'] : 0; 

            $result = array(
                        'TotalEvent'        => $TotalEvent,
                        'TotalPoll'         => $TotalPoll,
                        'TotalPost'         => $TotalPost,
                        'TotalSuggestion'   => $TotalSuggestion,
                        'TotalInformation'  => $TotalInformation,
                        'TotalComplaint'    => $TotalComplaint,
                        'TotalFriends'      => $TotalFriends,
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


    public function getAllFriendHomePageData() {
        $error_occured = false;

        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');
        $FriendUserProfileId    = $this->input->post('friend_user_profile_id');
        $start                  = (($this->input->post('start') > 0) ? $this->input->post('start') : 0);
        $end                    = (($this->input->post('end') > 0) ? $this->input->post('end') : 10);

       
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
        
            $result = array();
            $sql = "
            
            SELECT EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded FROM `Event` WHERE `StartDate` <= '".date('Y-m-d H:i:s')."' AND `EndDate` >= '".date('Y-m-d H:i:s')."' AND `EventPrivacy` = '1' AND `EventStatus` = '1' AND `AddedBy` = '".$FriendUserProfileId."'

            UNION 

            SELECT PollId AS Id, 'Poll' AS DataType, AddedOn AS DateAdded FROM `Poll` WHERE `ValidFromDate` <= '".date('Y-m-d')."' AND `ValidEndDate` >= '".date('Y-m-d')."' AND `PollPrivacy` = '1' AND `PollStatus` = '1' AND `AddedBy` = '".$FriendUserProfileId."'
            UNION 

            SELECT PostId AS Id, 'Post' AS DataType, AddedOn AS DateAdded FROM `Post` WHERE `PostStatus` = '1' AND `PostPrivacy` = '1' AND `UserProfileId` = '".$FriendUserProfileId."'

            UNION 

            SELECT ComplaintId AS Id, 'Complaint' AS DataType, AddedOn AS DateAdded FROM `Complaint` WHERE `ComplaintStatus` = '1' AND `ComplaintPrivacy` = '1' AND `AddedBy` = '".$FriendUserProfileId."'

            ORDER BY DateAdded DESC LIMIT $start,$end";


            //echo $sql;die;
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
                    } else if($val['DataType'] == "Complaint") {
                        $Data[] = array(
                                        'feedtype' => 'complaint',
                                        'complaintdata' => $this->Complaint_Model->getComplaintDetail($val['Id']),
                                        );
                    } else if($val['DataType'] == "Suggestion") {
                        $Data[] = array(
                                        'feedtype' => 'suggestion',
                                        'suggestiondata' => $this->Suggestion_Model->getSuggestionDetail($val['Id']),
                                        );
                    } else {
                        $Data = array();
                    }
                    $result = $Data;
                }
                $msg = "Friend profile data found";
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


    public function getFriendAllSummaryTotal() {
        $error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id'); // Logged In User Profile id
        $FriendUserProfileId    = $this->input->post('friend_user_profile_id'); // Friend User Profile Id

       
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "") {
            $msg = "Please select friend user profile";
            $error_occured = true;
        } else {
        
            $result = array();
            
            $sql = "SELECT COUNT(EventId) AS TotalEvent FROM `Event` WHERE `AddedBy` = '".$FriendUserProfileId."' AND `EventStatus` = '1' AND `EventPrivacy` = '1'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalEvent = ($res['TotalEvent'] > 0) ? $res['TotalEvent'] : 0; 

            $sql = "SELECT COUNT(PollId) AS TotalPoll FROM `Poll` WHERE `AddedBy` = '".$FriendUserProfileId."' AND `PollStatus` = '1' AND `PollPrivacy` = '1'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalPoll = ($res['TotalPoll'] > 0) ? $res['TotalPoll'] : 0; 

            $sql = "SELECT COUNT(PostId) AS TotalPost FROM `Post` WHERE `UserProfileId` = '".$FriendUserProfileId."' AND `PostStatus` = '1' AND `PostPrivacy` = '1'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalPost = ($res['TotalPost'] > 0) ? $res['TotalPost'] : 0; 

            $sql = "SELECT COUNT(UserFriendId) AS TotalFriends FROM `UserFriend` WHERE (`UserProfileId` = '".$FriendUserProfileId."' OR `FriendUserProfileId` = '".$FriendUserProfileId."') AND `RequestAccepted` = '1'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalFriends = ($res['TotalFriends'] > 0) ? $res['TotalFriends'] : 0; 

            $sql = "SELECT COUNT(ComplaintId) AS TotalComplaint FROM `Complaint` WHERE `AddedBy` = '".$FriendUserProfileId."' AND `ComplaintPrivacy` = '1' AND `ComplaintStatus` = '1'";
            $query = $this->db->query($sql);
            $res = $query->row_array();
            $TotalComplaint = ($res['TotalComplaint'] > 0) ? $res['TotalComplaint'] : 0; 

            $result[]=array('type' => 'Friend', 'total' =>  $TotalFriends);
            $result[]=array('type' => 'Event', 'total' =>  $TotalEvent);
            $result[]=array('type' => 'Poll', 'total' =>  $TotalPoll);
            $result[]=array('type' => 'Post', 'total' =>  $TotalPost);
            $result[]=array('type' => 'Complaint', 'total' =>  $TotalComplaint);

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

