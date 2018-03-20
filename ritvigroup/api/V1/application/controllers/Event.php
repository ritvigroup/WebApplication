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
                                'StartDate'         => $StartDate,
                                'EndDate'           => $EndDate,
                                'EveryYear'         => $EveryYear,
                                'EveryMonth'        => $EveryMonth,
                                'EventStatus'       => 1,
                                'AddedBy'           => $UserProfileId,
                                'UpdatedBy'         => $UserProfileId,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                'UpdatedOn'         => date('Y-m-d H:i:s'),
                            );
			$EventId = $this->Event_Model->saveMyEvent($insertData);

            if($EventId > 0) {

                $this->db->query("COMMIT");
                
                $this->Event_Model->saveMyEventAttendee($EventId, $UserProfileId, $event_attendee);
                
                $this->Event_Model->saveMyEventAttachment($EventId, $UserProfileId, $_FILES['file']);

                $event_detail = $this->Event_Model->getEventDetail($EventId);

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
                           "status"             => 'success',
                           "event_detail"       => $event_detail,
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

            $event_detail = $this->Event_Model->getEventDetail($EventId);
            
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
                           "event_detail"   => $event_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllEvent() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $events = $this->Event_Model->getMyAllEvent($UserProfileId);
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
                           "events"     => $events,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

}

