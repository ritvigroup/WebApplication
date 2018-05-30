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
        $this->search           = $this->input->post('q'); 
    }


    // Get All Search Data Added By Users
    public function getAllSearchDataAddedByAnyUsers() {
        $UserProfileId  = $this->input->post('user_profile_id');
        $search_type     = $this->input->post('search_type'); 
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $search_data = $this->User_Model->getAllSearchDataAddedByAnyUsers($UserProfileId, $search_type, $this->search);

            if(count($search_data) > 0) {
                $msg = "Search list found";
            } else {
                $msg = "No any search found";
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
                           "result"   => $search_data,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get All Search Data Added By Users
    public function searchAndSaveDataForSearchOfUser() {
        $UserProfileId  = $this->input->post('user_profile_id');
        $search_type    = $this->input->post('search_type'); 
        $save_search    = $this->input->post('save_search'); 
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $save_data = $this->User_Model->searchAndSaveDataForSearchOfUser($UserProfileId, $search_type, $save_search);

            if($save_data == true) {
                $msg = "Search data saved successfully";
            } else {
                $msg = "Not able to save";
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
                           "result"   => $save_data,
                           "message"  => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get All Educations of Users
    public function getAllEducactionsAddedByAnyUser() {
        $UserProfileId  = $this->input->post('user_profile_id');
        $search_for     = $this->input->post('search_for'); 
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $education_list = $this->User_Model->getAllEducactionsAddedByAnyUser($UserProfileId, $search_for, $this->search);

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
        
        if($UserProfileId == "") {
            $msg = "Please select user profile";
            $error_occured = true;
        } else {
            $work_list = $this->User_Model->getAllWorkAddedByAnyUser($UserProfileId, $search_for, $this->search);

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
                $sql = "SELECT EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded FROM `Event` WHERE `EventStatus` = '1' AND (`EventName` LIKE '%".$this->search."%' OR `EventDescription` LIKE '%".$this->search."%') AND `AddedBy` = '".$UserProfileId."' ";
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded FROM `Event` WHERE `EventStatus` = '1' AND (`EventName` LIKE '%".$this->search."%' OR `EventDescription` LIKE '%".$this->search."%') AND `AddedBy` IN (".implode(',', $my_friend_user_profile_id).") ";
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

                $poll_search_condition = '';

                $participated   = $this->input->post('participated'); // 1 / 0
                $posted_by      = $this->input->post('posted_by'); // You / YourFriend / Group
                $post_type      = $this->input->post('post_type');
                $date_from      = $this->input->post('date_from');
                $date_to        = $this->input->post('date_to');
                $location       = $this->input->post('location');

                if($search_in == "poll") {

                    if($posted_by != '') {
                        if($posted_by == "You") {
                            $poll_search_condition .= " AND `UserProfileId` = '".$UserProfileId."'";
                        }
                        if($posted_by == "YourFriend") {
                            $poll_search_condition .= " AND `UserProfileId` IN (".implode(',', $my_friend_user_profile_id).")";
                        }
                        if($posted_by == "Group") {
                            //$poll_search_condition .= " AND `UserProfileId` = '".$UserProfileId."'";
                        }
                    } 
                    if($location != '') {
                        $poll_search_condition .= " AND `PollLocation` LIKE '%".$location."%'";
                    }
                    if($date_from != '' && $date_to != '') {
                        $poll_search_condition .= " AND `AddedOn` BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59'";
                    }
                } else {
                    $poll_search_condition .= " AND `AddedBy` = '".$UserProfileId."'";
                }

                if($this->search != '') {
                    $poll_search_condition .= " AND `PollQuestion` LIKE '%".$this->search."%' ";
                }

                $sql = "SELECT PollId AS Id, 'Poll' AS DataType, AddedOn AS DateAdded FROM `Poll` WHERE `ValidFromDate` <= '".date('Y-m-d')."' AND `ValidEndDate` >= '".date('Y-m-d')."' AND `PollStatus` = '1' ".$poll_search_condition; 
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT PollId AS Id, 'Poll' AS DataType, AddedOn AS DateAdded FROM `Poll` WHERE `ValidFromDate` <= '".date('Y-m-d')."' AND `ValidEndDate` >= '".date('Y-m-d')."' AND `PollStatus` = '1' AND `PollQuestion` LIKE '%".$this->search."%' AND `AddedBy` IN (".implode(',', $my_friend_user_profile_id).") ";
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
                $post_search_condition = '';
                if($search_in == "post") {
                    $posted_by   = $this->input->post('posted_by'); // You / YourFriend / Group
                    $post_type   = $this->input->post('post_type'); // Trending / Most Viewed
                    $date_from   = $this->input->post('date_from');
                    $date_to     = $this->input->post('date_to');
                    $location    = $this->input->post('location');

                    
                    if($posted_by != '') {
                        if($posted_by == "You") {
                            $post_search_condition .= " AND `UserProfileId` = '".$UserProfileId."'";
                        }
                        if($posted_by == "YourFriend") {
                            $post_search_condition .= " AND `UserProfileId` IN (".implode(',', $my_friend_user_profile_id).")";
                        }
                        if($posted_by == "Group") {
                            //$post_search_condition .= " AND `UserProfileId` = '".$UserProfileId."'";
                        }
                    }
                    if($location != '') {
                        $post_search_condition .= " AND ApplicantAddress LIKE '%".$location."%'";
                    }
                    if($date_from != '' && $date_to != '') {
                        $post_search_condition .= " AND AddedOn BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59'";
                    }
                } else {
                    $post_search_condition .= " AND `UserProfileId` = '".$UserProfileId."'";
                }


                $sql = "SELECT PostId AS Id, 'Post' AS DataType, AddedOn AS DateAdded FROM `Post` WHERE `PostStatus` = '1' AND `PostTitle` LIKE '%".$this->search."%' ".$post_search_condition; 
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT PostId AS Id, 'Post' AS DataType, AddedOn AS DateAdded FROM `Post` WHERE `PostStatus` = '1' AND `PostTitle` LIKE '%".$this->search."%' AND `UserProfileId`  IN (".implode(',', $my_friend_user_profile_id).") ";
                }


                $sql .= " ORDER BY DateAdded DESC LIMIT $start, $end";
                $query = $this->db->query($sql);
                $res = $query->result_array();

                $post_array = array();
                foreach($res AS $key => $val) {
                    if(!in_array($val['Id'], $post_array)) {
                        $result['Post'][] = array(
                                                'feedtype' => 'post',
                                                'postdata' => $this->Post_Model->getPostDetail($val['Id'], $UserProfileId),
                                                );
                        $post_array[] = $val['Id'];
                        $i++;
                    }
                }
            }
            

            $result['Complaint'] = array();
            if($search_in == 'all' || $search_in == 'complaint') {
                $sql = "SELECT ComplaintId AS Id, 'Complaint' AS DataType, AddedOn AS DateAdded FROM `Complaint` WHERE `ComplaintStatus` = '1' AND (`ComplaintSubject` LIKE '%".$this->search."%' OR `ComplaintDescription` LIKE '%".$this->search."%') AND `AddedBy` = '".$UserProfileId."'  ";
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT ComplaintId AS Id, 'Complaint' AS DataType, AddedOn AS DateAdded FROM `Complaint` WHERE `ComplaintStatus` = '1' AND (`ComplaintSubject` LIKE '%".$this->search."%' OR `ComplaintDescription` LIKE '%".$this->search."%') AND `AddedBy` IN (".implode(',', $my_friend_user_profile_id).")  ";
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
                $sql = "SELECT SuggestionId AS Id, 'Suggestion' AS DataType, AddedOn AS DateAdded FROM `Suggestion` WHERE `SuggestionStatus` = '1' AND (`SuggestionSubject` LIKE '%".$search."%' OR `SuggestionDescription` LIKE '%".$this->search."%') AND `AddedBy` = '".$UserProfileId."'  ";
                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT SuggestionId AS Id, 'Suggestion' AS DataType, AddedOn AS DateAdded FROM `Suggestion` WHERE `SuggestionStatus` = '1' AND (`SuggestionSubject` LIKE '%".$this->search."%' OR `SuggestionDescription` LIKE '%".$this->search."%') AND `AddedBy`  IN (".implode(',', $my_friend_user_profile_id).") ";
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

                if($search_in == 'people') {
                    $friend_of_friend   = $this->input->post('friend_of_friend');
                    $city               = $this->input->post('city');
                    $education          = $this->input->post('education');
                    $work               = $this->input->post('work');

                    $people_search_condition = '';
                    if($city != '') {
                        $people_search_condition .= " AND upa.City = '".$city."'";
                    }
                    if($education != '') {
                        $people_search_condition .= " AND upe.Qualification = '".$education."'";
                    }
                    if($work != '') {
                        $people_search_condition .= " AND upw.WorkCompany = '".$work."'";
                    }
                }
                $sql = "SELECT up.UserProfileId AS Id, 'Profile' AS DataType, up.AddedOn AS DateAdded 
                                    FROM `UserProfile` AS up 
                                    LEFT JOIN `UserProfileAddress` AS upa ON up.UserProfileId = upa.UserProfileId 
                                    LEFT JOIN `UserProfileEducation` AS upe ON up.UserProfileId = upe.UserProfileId 
                                    LEFT JOIN `UserProfileWork` AS upw ON up.UserProfileId = upw.UserProfileId 
                                    WHERE 
                                        up.`ProfileStatus` = '1' 
                                    AND (up.`FirstName` LIKE '%".$this->search."%' OR up.`LastName` LIKE '%".$this->search."%') ";
                $sql .= $people_search_condition;

                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION 
                                SELECT up.UserProfileId AS Id, 'Profile' AS DataType, up.AddedOn AS DateAdded 
                                        FROM `UserProfile` AS up 
                                        LEFT JOIN `UserProfileAddress` AS upa ON up.UserProfileId = upa.UserProfileId 
                                        LEFT JOIN `UserProfileEducation` AS upe ON up.UserProfileId = upe.UserProfileId 
                                        LEFT JOIN `UserProfileWork` AS upw ON up.UserProfileId = upw.UserProfileId 
                                        WHERE 
                                            up.`ProfileStatus` = '1' 
                                        AND (up.`FirstName` LIKE '%".$this->search."%' OR up.`LastName` LIKE '%".$this->search."%') 
                                        AND up.`UserProfileId`  IN (".implode(',', $my_friend_user_profile_id).") ";
                }
                $sql .= " ORDER BY DateAdded DESC LIMIT $start,$end";
                $query = $this->db->query($sql);
                $res = $query->result_array();

                $people_array = array();
                foreach($res AS $key => $val) {

                    if(!in_array($val['Id'], $people_array) && $val['Id'] != $UserProfileId) {
                        $result['Profile'][] = array(
                                                    'feedtype' => 'profile',
                                                    'profiledata' => $this->User_Model->getUserProfileInformation($val['Id'], $UserProfileId),
                                                    );

                        $people_array[] = $val['Id'];
                        $i++;
                    }
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
            $sql = "SELECT City, Country FROM `UserProfileAddress` WHERE `UserProfileId` = '".$UserProfileId."' AND `Status` = '1' GROUP BY City,  Country ORDER BY UserProfileAddressId DESC";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result['Location'][$key] = $val;
                }
            }

            $sql = "SELECT Qualification, QualificationUniversity FROM `UserProfileEducation` WHERE `UserProfileId` = '".$UserProfileId."' AND `Status` = '1' GROUP BY Qualification, QualificationUniversity ORDER BY UserProfileEducationId DESC";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result['Qualification'][$key] = $val;
                }
            }

            $sql = "SELECT WorkCompany, WorkLocation FROM `UserProfileWork` WHERE `UserProfileId` = '".$UserProfileId."' AND `Status` = '1' GROUP BY WorkCompany, WorkLocation ORDER BY UserProfileWorkId DESC";

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

