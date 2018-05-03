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


    // Get All Educations of Users
    public function getAllEducactionsAddedByAnyUser() {
        $UserProfileId  = $this->input->post('user_profile_id');
        $search_for     = $this->input->post('search_for'); 
        $search         = $this->input->post('q'); 
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $education_list = $this->User_Model->getAllEducactionsAddedByAnyUser($UserProfileId, $search_for, $search);

            if(count($education_list) > 0) {
                $msg = "Education list found";
            } else {
                $msg = "No any education found";
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
                           "status"   => 'success',
                           "result"   => $education_list,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get All Work of Users
    public function getAllWorkAddedByAnyUser() {
        $UserProfileId  = $this->input->post('user_profile_id');
        $search_for     = $this->input->post('search_for'); 
        $search         = $this->input->post('q'); 
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $work_list = $this->User_Model->getAllWorkAddedByAnyUser($UserProfileId, $search_for, $search);

            if(count($work_list) > 0) {
                $msg = "Work list found";
            } else {
                $msg = "No any work found";
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
                           "status"   => 'success',
                           "result"   => $work_list,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get All Search For Whole Application
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
                $sql = "SELECT EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded FROM `Event` WHERE `EventStatus` = '1' AND (`EventName` LIKE '%".$search."%' OR `EventDescription` LIKE '%".$search."%') AND `AddedBy` = '".$UserProfileId."' ";
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded FROM `Event` WHERE `EventStatus` = '1' AND (`EventName` LIKE '%".$search."%' OR `EventDescription` LIKE '%".$search."%') AND `AddedBy` IN (".implode(',', $my_friend_user_profile_id).") ";
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
            if($search_in == 'all' || $search_in == 'people') {
                $sql = "SELECT UserProfileId AS Id, 'Profile' AS DataType, AddedOn AS DateAdded FROM `UserProfile` WHERE `ProfileStatus` = '1' AND (`FirstName` LIKE '%".$search."%' OR `LastName` LIKE '%".$search."%') ";
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


    // Get All Search Filter for People Result
    public function getAllSearchFilterForPeople() {

        $error_occured = false;

        $UserId                 = $this->input->post('user_id');
        $UserProfileId          = $this->input->post('user_profile_id');

        $result = array();
       
        if($UserId == "") {
            $msg = "Please select user";
            $error_occured = true;
        } else if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
        
            $result = array();
            $result['Location'] = array();
            $result['Qualification'] = array();
            $result['Work'] = array();
            $sql = "SELECT City, Country FROM `UserProfileAddress` WHERE `UserProfileId` = '".$UserProfileId."' AND `Status` = '1' GROUP BY City,  Country ORDER BY Address";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result['Location'][$key] = $val;
                }
            }

            $sql = "SELECT Qualification, QualificationUniversity FROM `UserProfileEducation` WHERE `UserProfileId` = '".$UserProfileId."' AND `Status` = '1' GROUP BY Qualification, QualificationUniversity ORDER BY Qualification";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result['Qualification'][$key] = $val;
                }
            }

            $sql = "SELECT WorkPosition, WorkLocation FROM `UserProfileWork` WHERE `UserProfileId` = '".$UserProfileId."' AND `Status` = '1' GROUP BY WorkPosition, WorkLocation ORDER BY WorkPosition";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result['Work'][$key] = $val;
                }
            }

            $msg = "Filters found";
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

