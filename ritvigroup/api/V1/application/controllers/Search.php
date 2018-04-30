<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Search
*/

class Search extends CI_Controller {
    
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


    public function getAllSearch() {
        $error_occured = false;

        $UserId             = $this->input->post('user_id');
        $UserProfileId      = $this->input->post('user_profile_id');
        $search_in          = $this->input->post('search_in');
        $search             = $this->input->post('q');
        $start              = (($this->input->post('start') > 0) ? $this->input->post('start') : 0);
        $end                = (($this->input->post('end') > 0) ? $this->input->post('end') : 10);


        
        $my_friend_user_profile_id = $this->User_Model->getMyFriendFollowerAndFollowingUserProfileId($UserProfileId);

      
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
        
            $result = array();

            $i = 0;
            
            $result['Event'] = array();
            if($search_in == 'all' || $search_in == 'event') {
                $sql = "SELECT EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded FROM `Event` WHERE `StartDate` <= '".date('Y-m-d H:i:s')."' AND `EndDate` >= '".date('Y-m-d H:i:s')."' AND `EventStatus` = '1' AND (`EventName` LIKE '%".$search."%' OR `EventDescription` LIKE '%".$search."%') AND `AddedBy` = '".$UserProfileId."' ";
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded FROM `Event` WHERE `StartDate` <= '".date('Y-m-d H:i:s')."' AND `EndDate` >= '".date('Y-m-d H:i:s')."' AND `EventStatus` = '1' AND (`EventName` LIKE '%".$search."%' OR `EventDescription` LIKE '%".$search."%') AND `AddedBy` IN (".implode(',', $my_friend_user_profile_id).") ";
                }
                $sql .= " ORDER BY DateAdded DESC LIMIT $start,$end";
                $query = $this->db->query($sql);
                $res = $query->result_array();
                foreach($res AS $key => $val) {
                    $result['Event'][] = array(
                                            'feedtype' => 'event',
                                            'eventdata' => $this->Event_Model->getEventDetail($val['Id'], $UserProfileId),
                                            );
                    $i++;
                }
            }

            
            $result['Poll'] = array();
            if($search_in == 'all' || $search_in == 'poll') {
                $sql = "SELECT PollId AS Id, 'Poll' AS DataType, AddedOn AS DateAdded FROM `Poll` WHERE `ValidFromDate` <= '".date('Y-m-d')."' AND `ValidEndDate` >= '".date('Y-m-d')."' AND `PollStatus` = '1' AND `PollQuestion` LIKE '%".$search."%' AND `AddedBy` = '".$UserProfileId."' "; 
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT PollId AS Id, 'Poll' AS DataType, AddedOn AS DateAdded FROM `Poll` WHERE `ValidFromDate` <= '".date('Y-m-d')."' AND `ValidEndDate` >= '".date('Y-m-d')."' AND `PollStatus` = '1' AND `PollQuestion` LIKE '%".$search."%' AND `AddedBy` IN (".implode(',', $my_friend_user_profile_id).") ";
                }
                $sql .= " ORDER BY DateAdded DESC LIMIT $start,$end";
                $query = $this->db->query($sql);
                $res = $query->result_array();
                foreach($res AS $key => $val) {
                    $result['Poll'][] = array(
                                            'feedtype' => 'poll',
                                            'polldata' => $this->Poll_Model->getPollDetail($val['Id'], $UserProfileId),
                                            );
                    $i++;
                }
            }

            
            $result['Post'] = array();
            if($search_in == 'all' || $search_in == 'post') {
                $sql = "SELECT PostId AS Id, 'Post' AS DataType, AddedOn AS DateAdded FROM `Post` WHERE `PostStatus` = '1' AND `PostTitle` LIKE '%".$search."%' AND `UserProfileId` = '".$UserProfileId."'  "; 
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT PostId AS Id, 'Post' AS DataType, AddedOn AS DateAdded FROM `Post` WHERE `PostStatus` = '1' AND `PostTitle` LIKE '%".$search."%' AND `UserProfileId`  IN (".implode(',', $my_friend_user_profile_id).") ";
                }
                $sql .= " ORDER BY DateAdded DESC LIMIT $start,$end";
                $query = $this->db->query($sql);
                $res = $query->result_array();
                foreach($res AS $key => $val) {
                    $result['Post'][] = array(
                                            'feedtype' => 'post',
                                            'postdata' => $this->Post_Model->getPostDetail($val['Id'], $UserProfileId),
                                            );
                    $i++;
                }
            }
            

            $result['Complaint'] = array();
            if($search_in == 'all' || $search_in == 'complaint') {
                $sql = "SELECT ComplaintId AS Id, 'Complaint' AS DataType, AddedOn AS DateAdded FROM `Complaint` WHERE `ComplaintStatus` = '1' AND (`ComplaintSubject` LIKE '%".$search."%' OR `ComplaintDescription` LIKE '%".$search."%') AND `AddedBy` = '".$UserProfileId."'  ";
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT ComplaintId AS Id, 'Complaint' AS DataType, AddedOn AS DateAdded FROM `Complaint` WHERE `ComplaintStatus` = '1' AND (`ComplaintSubject` LIKE '%".$search."%' OR `ComplaintDescription` LIKE '%".$search."%') AND `AddedBy` IN (".implode(',', $my_friend_user_profile_id).")  ";
                }
                $sql .= " ORDER BY DateAdded DESC LIMIT $start,$end";
                $query = $this->db->query($sql);
                $res = $query->result_array();
                foreach($res AS $key => $val) {
                    $result['Complaint'][] = array(
                                                'feedtype' => 'complaint',
                                                'complaintdata' => $this->Complaint_Model->getComplaintDetail($val['Id'], $UserProfileId),
                                                );
                    $i++;
                }
            }


            $result['Suggestion'] = array();
            if($search_in == 'all' || $search_in == 'suggestion') {
                $sql = "SELECT SuggestionId AS Id, 'Suggestion' AS DataType, AddedOn AS DateAdded FROM `Suggestion` WHERE `SuggestionStatus` = '1' AND (`SuggestionSubject` LIKE '%".$search."%' OR `SuggestionDescription` LIKE '%".$search."%') AND `AddedBy` = '".$UserProfileId."'  ";
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT SuggestionId AS Id, 'Suggestion' AS DataType, AddedOn AS DateAdded FROM `Suggestion` WHERE `SuggestionStatus` = '1' AND (`SuggestionSubject` LIKE '%".$search."%' OR `SuggestionDescription` LIKE '%".$search."%') AND `AddedBy`  IN (".implode(',', $my_friend_user_profile_id).") ";
                }
                $sql .= " ORDER BY DateAdded DESC LIMIT $start,$end";
                $query = $this->db->query($sql);
                $res = $query->result_array();
                foreach($res AS $key => $val) {
                    $result['Suggestion'][] = array(
                                                'feedtype' => 'suggestion',
                                                'suggestiondata' => $this->Suggestion_Model->getSuggestionDetail($val['Id'], $UserProfileId),
                                                );
                    $i++;
                }
            }

            $result['Profile'] = array();
            if($search_in == 'all' || $search_in == 'profile') {
                $sql = "SELECT UserProfileId AS Id, 'Profile' AS DataType, AddedOn AS DateAdded FROM `UserProfile` WHERE `ProfileStatus` = '1' AND (`FirstName` LIKE '%".$search."%' OR `LastName` LIKE '%".$search."%') AND `AddedBy` = '".$UserProfileId."'  ";
                if(count($my_friend_user_profile_id) > 0) {
                    //$sql .= " UNION SELECT UserProfileId AS Id, 'Profile' AS DataType, AddedOn AS DateAdded FROM `UserProfile` WHERE `ProfileStatus` = '1' AND (`FirstName` LIKE '%".$search."%' OR `LastName` LIKE '%".$search."%') AND `AddedBy`  IN (".implode(',', $my_friend_user_profile_id).") ";
                }
                $sql .= " ORDER BY DateAdded DESC LIMIT $start,$end";
                $query = $this->db->query($sql);
                $res = $query->result_array();
                foreach($res AS $key => $val) {
                    $result['Profile'][] = array(
                                                'feedtype' => 'profile',
                                                'profiledata' => $this->User_Model->getUserProfileInformation($val['Id'], $UserProfileId),
                                                );
                    $i++;
                }
            }

            if($i > 0) {
                $msg = "Search result found";
            } else {
                $msg = "No search result found";
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

}

