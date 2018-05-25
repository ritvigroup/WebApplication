<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Event Management
*/

class Event extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Event_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function saveMyEvent() {
		$error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $EventName          = $this->input->post('event_name');
        $EventDescription   = $this->input->post('event_description');
        $EventLocation      = $this->input->post('event_location');
        $StartDate          = $this->input->post('start_date');
        $EndDate            = $this->input->post('end_date');
        $EveryYear          = $this->input->post('every_year');
        $EveryMonth         = $this->input->post('every_month');
        $EventPrivacy       = $this->input->post('privacy'); // 1= Public , 0 = Private

        $EventPrivacy = ($EventPrivacy > 0) ? $EventPrivacy : 0;

        $event_attendee = $this->input->post('event_attendee'); // Should be multiple profiles in array


        $EventUniqueId = $this->Event_Model->generateEventUniqueId();
        
        if($UserProfileId == "") {
			$msg = "Please select your profile";
			$error_occured = true;
		} else if($EventName == "") {
			$msg = "Please enter some text to name of event";
			$error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'EventUniqueId'     => $EventUniqueId,
                                'EventName'         => $EventName,
                                'EventDescription'  => $EventDescription,
                                'EventLocation'     => $EventLocation,
                                'StartDate'         => date('Y-m-d H:i:s', strtotime($StartDate)),
                                'EndDate'           => date('Y-m-d H:i:s', strtotime($EndDate)),
                                'EveryYear'         => $EveryYear,
                                'EveryMonth'        => $EveryMonth,
                                'EventPrivacy'      => $EventPrivacy,
                                'EventStatus'       => 1,
                                'AddedBy'           => $UserProfileId,
                                'UpdatedBy'         => $UserProfileId,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );

			$EventId = $this->Event_Model->saveMyEvent($insertData);

            if($EventId > 0) {
                
                $this->Event_Model->saveMyEventAttendee($EventId, $UserProfileId, $event_attendee);
                
                $this->Event_Model->saveMyEventAttachment($EventId, $UserProfileId, $_FILES['file']);

                $this->db->query("COMMIT");

                $event_detail = $this->Event_Model->getEventDetail($EventId, $UserProfileId);

                $msg = "Event added successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Event not saved. Error occured";
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
                           "status"         => 'success',
                           "result"         => $event_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function deleteMyEvent() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $EventId        = $this->input->post('event_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($EventId == "") {
            $msg = "Please select event";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $updateData = array(
                                'EventStatus'   => -1,
                                'UpdatedOn'     => date('Y-m-d H:i:s'),
                            );
            $whereData = array(
                                'AddedBy'       => $UserProfileId,
                                'EventId'       => $EventId,
                                );

            $event_delete = $this->Event_Model->updateMyEvent($whereData, $updateData);

            if($event_delete == true) {

                $this->db->query("COMMIT");

                $event_detail = $this->Event_Model->getEventDetail($EventId, $UserProfileId);

                $msg = "Event deleted successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Event not deleted. Not authorised to delete this event";
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
                           "status"         => 'success',
                           "result"         => $event_detail,
                           "message"        => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function saveLikeUnlikeEvent() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $EventId        = $this->input->post('event_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($EventId == "") {
            $msg = "Please select event";
            $error_occured = true;
        } else {

            $event_like = 0;
            $EventLikeDetail = $this->Event_Model->getEventLikeByUserProfileId($EventId, $UserProfileId);
            if($EventLikeDetail['EventLikeId'] > 0) {
                $this->Event_Model->deleteEventLike($EventId, $UserProfileId);

                $msg = "Event unliked successfully";
            } else {

                $insertData = array(
                                    'EventId'           => $EventId,
                                    'UserProfileId'     => $UserProfileId,
                                    'LikedOn'           => date('Y-m-d H:i:s'),
                                );
                $this->Event_Model->saveEventLike($insertData);

                $msg = "Event liked successfully";
                $event_like = 1;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"       => 'success',
                           "result"       => $event_like,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getEventLikeDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $EventId          = $this->input->post('event_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($EventId == "") {
            $msg = "Please select event";
            $error_occured = true;
        } else {

            $event_like_detail = $this->Event_Model->getEventLikeDetail($EventId, $UserProfileId);
            
            if(count($event_like_detail) > 0) {
                $msg = "Event likes fetched successfully";
            } else {
                $msg = "Event likes not found";
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
                           "status"             => 'success',
                           "result"   => $event_like_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }

        
    public function getEventDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $EventId          = $this->input->post('event_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($EventId == "") {
            $msg = "Please select event";
            $error_occured = true;
        } else {

            $event_detail = $this->Event_Model->getEventDetail($EventId, $UserProfileId);
            
            if(count($event_detail) > 0) {
                $msg = "Event fetched successfully";
            } else {
                $msg = "Event not found";
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
                           "status"             => 'success',
                           "result"   => $event_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllEvent() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $FriendProfileId    = $this->input->post('friend_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendProfileId == "") {
            $msg = "Please select friend profile";
            $error_occured = true;
        } else {

            $events = $this->Event_Model->getMyAllEvent($UserProfileId, $FriendProfileId);
            if(count($events) > 0) {
                $msg = "Event fetched successfully";
            } else {
                $msg = "No event added by you";
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
                           "result"     => $events,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getAllEventWhereMyselfAssociated() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $events = $this->Event_Model->getAllEventWhereMyselfAssociated($UserProfileId);
            if(count($events) > 0) {
                $msg = "Event fetched successfully";
            } else {
                $msg = "No event added by you";
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
                           "result"     => $events,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function AttendEventByApproval() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $EventId        = $this->input->post('event_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($EventId == "") {
            $msg = "Please select event to approve";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $validate_poll_already = $this->Event_Model->validateUserProfileAlreadyPolled($PollId, $UserProfileId);

            if($validate_poll_already > 0) { 
                $this->db->query("ROLLBACK");
                $msg = "You had already participated in this poll.";
                $error_occured = true;
            } else {

                $insertData = array(
                                    'PollId'            => $PollId,
                                    'PollAnswerId'      => $PollAnswerId,
                                    'PollParticipationDescription'       => '',
                                    'AddedBy'           => $UserProfileId,
                                    'UpdatedBy'         => $UserProfileId,
                                    'AddedOn'           => date('Y-m-d H:i:s'),
                                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                                );
                $PollParticipationId = $this->Poll_Model->participatePollWithAnswer($insertData);

                if($PollParticipationId > 0) {

                    $this->db->query("COMMIT");
                    
                    $poll_detail = $this->Poll_Model->getPollDetail($PollId);


                    $msg = "Poll answer submitted successfully";

                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Poll answer not participated. Error occured";
                    $error_occured = true;
                }
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"             => 'success',
                           "result"       => $poll_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function saveMyEventInterest() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $EventId        = $this->input->post('event_id');
        $interest_type  = $this->input->post('interest_type');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($EventId == "") {
            $msg = "Please select event to approve";
            $error_occured = true;
        } else if($interest_type == "0") {
            $msg = "Please select your interest type";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $validate_event_already = $this->Event_Model->validateUserProfileAlreadyInterested($EventId, $UserProfileId);

            if($validate_event_already['EventInterestId'] > 0) { 
                // $this->db->query("ROLLBACK");
                // $msg = "You had already shows your interest";
                // $error_occured = true;

                $EventInterestId = $validate_event_already['EventInterestId'];

                $updateData = array(
                                    'InterestType'      => $interest_type,
                                    'AddedOn'           => date('Y-m-d H:i:s'),
                                );

                $whereData = array(
                                    'EventInterestId'   => $EventInterestId,
                                );

                $this->Event_Model->updateMyEventInterest($updateData, $whereData);

                $this->db->query("COMMIT");
                    
                $event_detail = $this->Event_Model->getEventDetail($EventId, $UserProfileId);

                $msg = "Event Interest updated successfully";

            } else {

                $insertData = array(
                                    'EventId'           => $EventId,
                                    'UserProfileId'     => $UserProfileId,
                                    'InterestType'      => $interest_type,
                                    'AddedOn'           => date('Y-m-d H:i:s'),
                                );
                $EventInterestId = $this->Event_Model->saveMyEventInterest($insertData);

                if($EventInterestId > 0) {

                    $this->db->query("COMMIT");
                    
                    $event_detail = $this->Event_Model->getEventDetail($EventId, $UserProfileId);

                    $msg = "Event Interest submitted successfully";

                } else {
                    $this->db->query("ROLLBACK");
                    $msg = "Event Interest not saved. Error occured";
                    $error_occured = true;
                }
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"       => 'success',
                           "result"       => $event_detail,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }

}

