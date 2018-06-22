<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Notification
*/

class Notification extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Notification_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os        = $this->input->post('device_os');
        $this->start 		    = (($this->input->post('start') > 0) ? $this->input->post('start') : 0);
    }

    

    public function getMyAllNotification() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $notifications = $this->Notification_Model->getMyAllNotification($UserProfileId);
            if(count($notifications) > 0) {
                $msg = "Notifications fetched successfully";
            } else {
                $msg = "No any notifications found";
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
                           "result"     => $notifications,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function markMyNotificationRead() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $NotificationId   = $this->input->post('notification_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($NotificationId == "") {
            $msg = "Please select your notification";
            $error_occured = true;
        } else {

            $notification_read = $this->Notification_Model->markMyNotificationRead($UserProfileId, $NotificationId);
            if($notification_read > 0) {
                $msg = "Notifications marked as read successfully";
            } else {
                $msg = "No any notifications found";
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
                           "result"     => $notification_read,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function markMyAllNotificationRead() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $notification_read = $this->Notification_Model->markMyAllNotificationRead($UserProfileId);
            if($notification_read > 0) {
                $msg = "Notifications marked as read successfully";
            } else {
                $msg = "No any notifications found";
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
                           "result"     => $notification_read,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

       
    
}

