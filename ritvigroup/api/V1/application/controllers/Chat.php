<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Chat Management
*/

class Chat extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Chat_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    public function sendChat() {
		$error_occured = false;

        $UserProfileId          = $this->input->post('user_profile_id');
        $FriendUserProfileId    = ($this->input->post('friend_user_profile_id') > 0) ? $this->input->post('friend_user_profile_id') : 0;
        $UserGroupId            = ($this->input->post('group_id') > 0) ? $this->input->post('group_id') : 0;
        $ChatType               = $this->input->post('chat_type');
        $ChatText               = $this->input->post('chat_text');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($FriendUserProfileId == "" && $UserGroupId == "") {
            $msg = "Please select friend profile or group to send message";
            $error_occured = true;
        } else if($FriendUserProfileId == "0" && $UserGroupId == "0") {
            $msg = "Please select friend profile or group to send message";
            $error_occured = true;
        } else if($ChatType == "") {
            $msg = "Please give chat type";
            $error_occured = true;
        } else if($ChatText == "") {
			$msg = "Please enter some text to chat";
			$error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $chat_detail = array();

            $insertData = array(
                                    'UserProfileId'         => $UserProfileId,
                                    'FriendUserProfileId'   => $FriendUserProfileId,
                                    'UserGroupId'           => $UserGroupId,
                                    'ChatType'              => $ChatType,
                                    'ChatText'              => $ChatText,
                                    'SentOn'                => date('Y-m-d H:i:s'),
                                );

            if(count($_FILES['file']['name']) == 0) {
    			
                $ChatId = $this->Chat_Model->saveMyChat($insertData);

                $chat_detail = $this->Chat_Model->getChatDetail($ChatId);

            } else if(count($_FILES['file']['name']) > 0) {
                
                $chat_array = $this->Chat_Model->saveMyChatAttachment($insertData, $_FILES['file']);

                foreach($chat_array AS $ChatId) {
                    $chat_detail[] = $this->Chat_Model->getChatDetail($ChatId);
                }

            }

            if($ChatId > 0 || count($chat_array) > 0) {
                
                $this->db->query("COMMIT");

                $msg = "Chat send successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Chat not saved. Error occured";
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
                           "result"   => $chat_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }
    
    
    public function getChatDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $ChatId          = $this->input->post('chat_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($ChatId == "") {
            $msg = "Please select chat";
            $error_occured = true;
        } else {

            $chat_detail = $this->Chat_Model->getChatDetail($ChatId);

            if(count($chat_detail) > 0) {
                $msg = "Chat fetched successfully";
            } else {
                $msg = "Chat not found";
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
                           "result"   => $chat_detail,
                           "message"            => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllChat() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $chats = $this->Chat_Model->getMyAllChat($UserProfileId);
            if(count($chats) > 0) {
                $msg = "Chat fetched successfully";
            } else {
                $msg = "No chat added by you";
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
                           "status"       => 'success',
                           "result"   => $chats,
                           "message"      => $msg,
                           );
        }
        displayJsonEncode($array);
    }


}

