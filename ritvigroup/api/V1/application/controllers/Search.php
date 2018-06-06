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
            
            $result['Event'] = array(); // Done CI code
            if($search_in == 'all' || $search_in == 'event') {
                
                $this->db->select("EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded");
                $this->db->from('Event');
                $this->db->where('AddedBy', $UserProfileId);
                $this->db->group_start();
                $this->db->like('EventName', $this->search);
                $this->db->or_like('EventDescription', $this->search);
                $this->db->group_end();
                if($search_in == "event") {
                    
                    $posted_by_me       = $this->input->post('posted_by_me'); // By Me
                    $myself_tagged      = $this->input->post('myself_tagged'); // My self tagged
                    $date_from          = $this->input->post('date_from');
                    $date_to            = $this->input->post('date_to');
                    $location           = $this->input->post('location');
                    $participated       = $this->input->post('participated');

                    
                    if($posted_by_me == '1') {
                        $this->db->where('AddedBy', $UserProfileId);
                    }
                    if($myself_tagged == '1') {
                        $this->db->where($UserProfileId." IN (SELECT ea.UserProfileId FROM `EventAttendee` AS ea WHERE ea.EventId = Event.EventId AND ea.EventApprovedStatus != -1)");
                    }
                    if($location != '') {
                        $this->db->like('EventLocation', $location);
                    }
                    if($participated > 0) {
                        $this->db->where($UserProfileId." IN (SELECT ei.UserProfileId FROM `EventInterest` AS ei WHERE ei.EventId = Event.EventId AND ei.InterestType = '".$participated."')");
                    }
                    
                    if($date_from != '' && $date_to != '') {
                        if($date_from == $date_to) {
                            $this->db->group_start();
                            $this->db->where("(StartDate BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59')");
                            $this->db->where("(EndDate BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59')");
                            $this->db->group_end();
                        } else {
                            $this->db->group_start();
                            $this->db->where("(StartDate BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59')");
                            $this->db->where("(EndDate BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59')");
                            $this->db->group_end();
                        }
                    }
                }
                
                $this->db->where('EventStatus !=', -1);

                if(count($my_friend_user_profile_id) > 0) {

                    $query1 = $this->db->get_compiled_select();

                    $this->db->select("EventId AS Id, 'Event' AS DataType, AddedOn AS DateAdded");
                    $this->db->from('Event');
                    $this->db->group_start();
                    $this->db->like('EventName', $this->search);
                    $this->db->or_like('EventDescription', $this->search);
                    $this->db->group_end();

                    if($search_in == "event") {
                        
                        if($posted_by_me == '1') {
                            $this->db->where('AddedBy', $UserProfileId);
                        }
                        if($myself_tagged == '1') {
                            $this->db->where($UserProfileId." IN (SELECT ea.UserProfileId FROM `EventAttendee` AS ea WHERE ea.EventId = Event.EventId AND ea.EventApprovedStatus != -1)");
                        }
                        if($location != '') {
                            $this->db->like('EventLocation', $location);
                        }
                        if($participated > 0) {
                            $this->db->where($UserProfileId." IN (SELECT ei.UserProfileId FROM `EventInterest` AS ei WHERE ei.EventId = Event.EventId AND ei.InterestType = '".$participated."')");
                        }
                        
                        if($date_from != '' && $date_to != '') {
                            if($date_from == $date_to) {
                                $this->db->group_start();
                                $this->db->where("(StartDate BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59')");
                                $this->db->where("(EndDate BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59')");
                                $this->db->group_end();
                            } else {
                                $this->db->group_start();
                                $this->db->where("(StartDate BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59')");
                                $this->db->where("(EndDate BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59')");
                                $this->db->group_end();
                            }
                        }
                    }
                    $this->db->where("AddedBy IN (".implode(',', $my_friend_user_profile_id).")" );
                    

                    $this->db->where('EventStatus', 1);
                    $this->db->where('EventPrivacy', 1);
                    

                    $query2 = $this->db->get_compiled_select();

                    $sql = '(' . $query1 . ') UNION (' . $query2 . ')';

                    $sql .= " ORDER BY DateAdded DESC ";
                    $sql .= " LIMIT $start,$end";

                    $query = $this->db->query($sql);

                } else {
                    $this->db->order_by('DateAdded','DESC');
                    $this->db->limit($end, $start);

                    $query = $this->db->get();
                }

                //echo $this->db->last_query();
                
                $res = $query->result_array();
                foreach($res AS $key => $val) {
                    $result['Event'][] = array(
                                            'feedtype' => 'event',
                                            'eventdata' => $this->Event_Model->getEventDetail($val['Id'], $UserProfileId),
                                            );
                    $i++;
                }
            }

            
            $result['Poll'] = array(); // Done CI Code
            if($search_in == 'all' || $search_in == 'poll') {

                $this->db->select("PollId AS Id, 'Poll' AS DataType, AddedOn AS DateAdded");
                $this->db->from('Poll');
                $this->db->where('AddedBy', $UserProfileId);
                $this->db->like('PollQuestion', $this->search);
                if($search_in == "poll") {
                    
                    $posted_by_me       = $this->input->post('posted_by_me'); // By Me
                    $date_from          = $this->input->post('date_from');
                    $date_to            = $this->input->post('date_to');
                    $location           = $this->input->post('location');
                    $participated       = $this->input->post('participated');

                    
                    if($posted_by_me == '1') {
                        $this->db->where('AddedBy', $UserProfileId);
                    }
                    if($location != '') {
                        $this->db->like('PollLocation', $location);
                    }
                    if($participated > 0) {
                        $this->db->where($UserProfileId." IN (SELECT pp.AddedBy FROM `PollParticipation` AS pp WHERE pp.PollId = Poll.PollId AND pp.PollAnswerId > 0 AND pp.AddedBy = '".$UserProfileId."')");
                    }
                    
                    if($date_from != '' && $date_to != '') {
                        if($date_from == $date_to) {
                            $this->db->group_start();
                            $this->db->where("(ValidFromDate BETWEEN '".$date_from."' AND '".$date_to."')");
                            $this->db->where("(ValidEndDate BETWEEN '".$date_from."' AND '".$date_to."')");
                            $this->db->group_end();
                        } else {
                            $this->db->group_start();
                            $this->db->where("(ValidFromDate BETWEEN '".$date_from."' AND '".$date_to."')");
                            $this->db->where("(ValidEndDate BETWEEN '".$date_from."' AND '".$date_to."')");
                            $this->db->group_end();
                        }
                    }
                }
                
                $this->db->where('PollStatus !=', -1);

                if(count($my_friend_user_profile_id) > 0) {

                    $query1 = $this->db->get_compiled_select();

                    $this->db->select("PollId AS Id, 'Poll' AS DataType, AddedOn AS DateAdded");
                    $this->db->from('Poll');
                    $this->db->like('PollQuestion', $this->search);

                    if($search_in == "poll") {
                        
                        if($posted_by_me == '1') {
                            $this->db->where('AddedBy', $UserProfileId);
                        }
                        if($location != '') {
                            $this->db->like('PollLocation', $location);
                        }
                        if($participated > 0) {
                            $this->db->where($UserProfileId." IN (SELECT pp.AddedBy FROM `PollParticipation` AS pp WHERE pp.PollId = Poll.PollId AND pp.PollAnswerId > 0 AND pp.AddedBy = '".$UserProfileId."')");
                        }
                        
                        if($date_from != '' && $date_to != '') {
                            if($date_from == $date_to) {
                                $this->db->group_start();
                                $this->db->where("(ValidFromDate BETWEEN '".$date_from."' AND '".$date_to."')");
                                $this->db->where("(ValidEndDate BETWEEN '".$date_from."' AND '".$date_to."')");
                                $this->db->group_end();
                            } else {
                                $this->db->group_start();
                                $this->db->where("(ValidFromDate BETWEEN '".$date_from."' AND '".$date_to."')");
                                $this->db->where("(ValidEndDate BETWEEN '".$date_from."' AND '".$date_to."')");
                                $this->db->group_end();
                            }
                        }
                    }
                    $this->db->where("AddedBy IN (".implode(',', $my_friend_user_profile_id).")" );
                    

                    $this->db->where('PollStatus', 1);
                    $this->db->where('PollPrivacy', 1);
                    

                    $query2 = $this->db->get_compiled_select();

                    $sql = '(' . $query1 . ') UNION (' . $query2 . ')';

                    $sql .= " ORDER BY DateAdded DESC ";
                    $sql .= " LIMIT $start,$end";

                    $query = $this->db->query($sql);

                } else {
                    $this->db->order_by('DateAdded','DESC');
                    $this->db->limit($end, $start);

                    $query = $this->db->get();
                }

                //echo $this->db->last_query();

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
                    
                    $posted_by_me       = $this->input->post('posted_by_me'); // By Me
                    $posted_by_friend   = $this->input->post('posted_by_friend'); // By Your Friend
                    $myself_tagged      = $this->input->post('myself_tagged'); // My self tagged
                    $date_from          = $this->input->post('date_from');
                    $date_to            = $this->input->post('date_to');
                    $location           = $this->input->post('location');
                    $me_liked           = $this->input->post('me_liked');
                    $me_commented       = $this->input->post('me_commented');


                    
                    if($posted_by_me == '1') {
                        $post_search_condition .= " AND `UserProfileId` = '".$UserProfileId."'";
                    }
                    if($posted_by_friend == '1') {
                        $my_friend_user_profile_id = $this->User_Model->getMyFriendFollowerAndFollowingUserProfileId($UserProfileId);
                        $post_search_condition .= " AND `PostPrivacy` = '1' AND `UserProfileId` IN (".$UserProfileId.")";
                    } else {
                        $post_search_condition .= " AND `UserProfileId` = '".$UserProfileId."'";
                    }
                    if($myself_tagged == '1') {
                        $post_search_condition .= " AND ".$UserProfileId." IN (SELECT pt.UserProfileId FROM `PostTag` AS pt WHERE pt.PostId = Post.PostId)";
                    }
                    if($location != '') {
                        $post_search_condition .= " AND `PostLocation` LIKE '%".$location."%'";
                    }
                    if($me_liked == '1') {
                        $post_search_condition .= " AND 1 <= (SELECT COUNT(pl.UserProfileId) FROM `PostLike` AS pl WHERE pl.PostId = Post.PostId AND pl.PostLike = '1')";
                    }
                    if($me_commented == '1') {
                        $post_search_condition .= " AND 1 <= (SELECT COUNT(pc.UserProfileId) FROM `PostComment` AS pc WHERE pc.PostId = Post.PostId AND pc.CommentStatus = '1')";
                    }
                    
                    if($date_from != '' && $date_to != '') {
                        if($date_from == $date_to) {
                            $post_search_condition .= " AND AddedOn LIKE '%".$date_from."%' ";
                        } else {
                            $post_search_condition .= " AND AddedOn BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59'";
                        }
                    }
                } else {
                    $post_search_condition .= " AND `UserProfileId` = '".$UserProfileId."'";
                }

                $sql = "SELECT PostId AS Id, 'Post' AS DataType, AddedOn AS DateAdded FROM `Post` WHERE `PostStatus` != -1 AND `PostTitle` LIKE '%".$this->search."%' ". $post_search_condition;

                if(count($my_friend_user_profile_id) > 0) {
                    if($posted_by_me != '1' || $posted_by_friend == 1) {
                        $sql .= " UNION SELECT PostId AS Id, 'Post' AS DataType, AddedOn AS DateAdded FROM `Post` WHERE `PostStatus` = '1' AND `PostPrivacy` = '1' AND `PostTitle` LIKE '%".$this->search."%' AND `UserProfileId` IN (".implode(',', $my_friend_user_profile_id).") ";
                    }
                }


                $sql .= " ORDER BY DateAdded DESC LIMIT $start, $end";
                $query = $this->db->query($sql);

                //echo $this->db->last_query();

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
                
                $complaint_search_condition = '';
                if($search_in == "complaint") {
                    $posted_by_me   = $this->input->post('posted_by_me'); // By Me
                    $me_associated  = $this->input->post('me_associated'); // You / YourFriend / Group
                    $date_from   = $this->input->post('date_from');
                    $date_to     = $this->input->post('date_to');

                    
                    if($posted_by_me == '1') {
                        $complaint_search_condition .= " AND `AddedBy` = '".$UserProfileId."'";
                    }
                    
                    if($date_from != '' && $date_to != '') {
                        if($date_from == $date_to) {
                            $complaint_search_condition .= " AND AddedOn LIKE '%".$date_from."%' ";
                        } else {
                            $complaint_search_condition .= " AND AddedOn BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59'";
                        }
                    }
                } else {
                    $complaint_search_condition .= " AND `AddedBy` = '".$UserProfileId."'";
                }


                $sql = "SELECT ComplaintId AS Id, 'Complaint' AS DataType, AddedOn AS DateAdded FROM `Complaint` WHERE `ComplaintStatus` != -1 AND (`ComplaintSubject` LIKE '%".$this->search."%' OR `ComplaintDescription` LIKE '%".$this->search."%') ".$complaint_search_condition;

                $sql .= " UNION SELECT c.ComplaintId AS Id, 'Complaint' AS DataType, c.AddedOn AS DateAdded FROM `Complaint` AS c 
                        LEFT JOIN `ComplaintMember` AS cm ON cm.ComplaintId = c.ComplaintId 
                        WHERE 
                            c.`ComplaintStatus`     != -1  
                        AND cm.`UserProfileId`      = '".$UserProfileId."' 
                        AND cm.AcceptedYesNo        != '2' 
                        AND (c.`ComplaintSubject` LIKE '%".$this->search."%' OR c.`ComplaintDescription` LIKE '%".$this->search."%') ";
                if($search_in == "complaint") {
                    if($me_associated == '1') {
                        $sql .= " AND cm.`UserProfileId` = '".$UserProfileId."' ";
                    }
                    if($date_from != '' && $date_to != '') {
                        if($date_from == $date_to) {
                            $sql .= " AND c.AddedOn LIKE '%".$date_from."%' ";
                        } else {
                            $sql .= " AND c.AddedOn BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59'";
                        }
                    }
                }

                if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT ComplaintId AS Id, 'Complaint' AS DataType, AddedOn AS DateAdded FROM `Complaint` WHERE `ComplaintStatus` != -1 AND ComplaintPrivacy = 1 AND (`ComplaintSubject` LIKE '%".$this->search."%' OR `ComplaintDescription` LIKE '%".$this->search."%') AND `AddedBy` IN (".implode(',', $my_friend_user_profile_id).")  ";
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

                $suggestion_where_condition = "";            
                if($search_in == "suggestion") {
                    
                    $date_from          = $this->input->post('date_from');
                    $date_to            = $this->input->post('date_to');

                    if($date_from != '' && $date_to != '') {
                        if($date_from == $date_to) {
                            $suggestion_where_condition = " AND AddedOn BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59' ";
                        } else {
                            $suggestion_where_condition = " AND AddedOn BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59' ";
                        }
                    }
                }

                $sql = "SELECT SuggestionId AS Id, 'Suggestion' AS DataType, AddedOn AS DateAdded FROM `Suggestion` WHERE `SuggestionStatus` = '1' AND (`SuggestionSubject` LIKE '%".$this->search."%' OR `SuggestionDescription` LIKE '%".$this->search."%') AND `AddedBy` = '".$UserProfileId."'  ";
                $sql .= $suggestion_where_condition;

                /*if(count($my_friend_user_profile_id) > 0) {
                    $sql .= " UNION SELECT SuggestionId AS Id, 'Suggestion' AS DataType, AddedOn AS DateAdded FROM `Suggestion` WHERE `SuggestionStatus` = '1' AND (`SuggestionSubject` LIKE '%".$this->search."%' OR `SuggestionDescription` LIKE '%".$this->search."%') AND `AddedBy`  IN (".implode(',', $my_friend_user_profile_id).") ";
                    $sql .= $suggestion_where_condition;
                }*/
                $sql .= " UNION SELECT SuggestionId AS Id, 'Suggestion' AS DataType, AddedOn AS DateAdded 
                                            FROM 
                                                `Suggestion` 
                                            WHERE 
                                                `SuggestionStatus` = '1' 
                                            AND (`SuggestionSubject` LIKE '%".$this->search."%' OR `SuggestionDescription` LIKE '%".$this->search."%') 
                                            AND `SuggestionId` IN (SELECT SuggestionId FROM `SuggestionAssigned` AS sa WHERE sa.AssignedTo = '".$UserProfileId."' AND sa.SuggestionId = Suggestion.SuggestionId) ";
                $sql .= $suggestion_where_condition;

                $sql .= " ORDER BY DateAdded DESC LIMIT $start,$end";
                $query = $this->db->query($sql);

                //echo $this->db->last_query();

                $res = $query->result_array();
                foreach($res AS $key => $val) {
                    $result['Suggestion'][] = array(
                                                'feedtype' => 'suggestion',
                                                'suggestiondata' => $this->Suggestion_Model->getSuggestionDetail($val['Id'], $UserProfileId),
                                                );
                    $i++;
                }
            }


            $result['Information'] = array();
            if($search_in == 'all' || $search_in == 'information') {

                $information_where_condition = "";            
                if($search_in == "information") {
                    
                    $date_from          = $this->input->post('date_from');
                    $date_to            = $this->input->post('date_to');

                    if($date_from != '' && $date_to != '') {
                        if($date_from == $date_to) {
                            $information_where_condition = " AND AddedOn BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59' ";
                        } else {
                            $information_where_condition = " AND AddedOn BETWEEN '".$date_from." 00:00:00' AND '".$date_to." 23:59:59' ";
                        }
                    }
                }

                $sql = "SELECT InformationId AS Id, 'Information' AS DataType, AddedOn AS DateAdded FROM `Information` WHERE `InformationStatus` = '1' AND (`InformationSubject` LIKE '%".$this->search."%' OR `InformationDescription` LIKE '%".$this->search."%') AND `AddedBy` = '".$UserProfileId."'  ";
                $sql .= $information_where_condition;


                $sql .= " ORDER BY DateAdded DESC LIMIT $start,$end";
                $query = $this->db->query($sql);

                //echo $this->db->last_query();
                
                $res = $query->result_array();
                foreach($res AS $key => $val) {
                    $result['Information'][] = array(
                                                'feedtype' => 'information',
                                                'informationdata' => $this->Information_Model->getInformationDetail($val['Id'], $UserProfileId),
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

