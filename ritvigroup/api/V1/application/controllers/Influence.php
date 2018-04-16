<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Inflence Management
*/

class Influence extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Influence_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }


    // Email Sent
    public function saveEmailSent() {
		$error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $EmailType          = $this->input->post('email_text');
        $EmailSubject       = $this->input->post('subject_text');
        $EmailMessage       = $this->input->post('message_text');
        
        if($UserProfileId == "") {
			$msg = "Please select your profile";
			$error_occured = true;
		} else if($EmailSubject == "") {
			$msg = "Please enter subject";
			$error_occured = true;
		} else {

            $this->db->query("BEGIN");

            $EmailSentUniqueId = $this->Influence_Model->generateEmailSentUniqueId();

            $insertData = array(
                                'EmailSentUniqueId' => $EmailSentUniqueId,
                                'UserProfileId'     => $UserProfileId,
                                'EmailType'         => $EmailType,
                                'EmailSubject'      => $EmailSubject,
                                'EmailMessage'      => $EmailMessage,
                                'SentOn'            => date('Y-m-d H:i:s'),
                            );

			$EmailSentId = $this->Influence_Model->saveEmailSent($insertData);

            if($EmailSentId > 0) {
                
                $this->Influence_Model->saveEmailSentTo($EmailSentId, $UserProfileId, $EmailType);
                
                $this->Influence_Model->saveEmailAttachment($EmailSentId, $UserProfileId, $_FILES['file']);

                $this->db->query("COMMIT");

                $email_sent_detail = $this->Influence_Model->getEmailSent($EmailSentId, $UserProfileId);

                $msg = "Email sent successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Email not saved. Error occured";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $email_sent_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    
    public function getEmailSent() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $EmailSentId     = $this->input->post('email_sent_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($EmailSentId == "") {
            $msg = "Please select email sent";
            $error_occured = true;
        } else {

            $email_detail = $this->Influence_Model->getEmailSent($EmailSentId, $UserProfileId);
            
            if(count($email_detail) > 0) {
                $msg = "Email sent fetched successfully";
            } else {
                $msg = "Email sent not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $email_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getEmailSentByUniqueId() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $EmailSentUniqueId  = $this->input->post('email_unique_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($EmailSentUniqueId == "") {
            $msg = "Please select email sent";
            $error_occured = true;
        } else {

            $email_sent_detail = $this->Influence_Model->getEmailSentByUniqueId($EmailSentUniqueId, $UserProfileId);
            
            if(count($email_sent_detail) > 0) {
                $msg = "Email sent fetched successfully";
            } else {
                $msg = "Email sent not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $email_sent_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMySentEmail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $email_sent = $this->Influence_Model->getMySentEmail($UserProfileId);
            if(count($email_sent) > 0) {
                $msg = "Email sent fetched successfully";
            } else {
                $msg = "No email sent by you";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $email_sent,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // SMS Sent
    public function saveSmsSent() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $SmsTo              = $this->input->post('sms_text');
        $SmsMessage         = $this->input->post('message_text');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SmsTo == "") {
            $msg = "Please enter sms sent to";
            $error_occured = true;
        } else if($SmsMessage == "") {
            $msg = "Please enter sms message";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $SmsSentUniqueId = $this->Influence_Model->generateSmsSentUniqueId();

            $insertData = array(
                                'SmsSentUniqueId'   => $SmsSentUniqueId,
                                'UserProfileId'     => $UserProfileId,
                                'SmsTo'             => $SmsTo,
                                'SmsMessage'        => $SmsMessage,
                                'SentOn'            => date('Y-m-d H:i:s'),
                            );

            $SmsSentId = $this->Influence_Model->saveSmsSent($insertData);

            if($SmsSentId > 0) {
                
                $this->db->query("COMMIT");

                $sms_sent_detail = $this->Influence_Model->getSmsSent($SmsSentId, $UserProfileId);

                $msg = "Sms sent successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Sms not saved. Error occured";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $sms_sent_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getSmsSent() {
        $error_occured = false;

        $UserProfileId  = $this->input->post('user_profile_id');
        $SmsSentId      = $this->input->post('sms_sent_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SmsSentId == "") {
            $msg = "Please select email sent";
            $error_occured = true;
        } else {

            $sms_detail = $this->Influence_Model->getSmsSent($SmsSentId, $UserProfileId);
            
            if(count($sms_detail) > 0) {
                $msg = "Sms sent fetched successfully";
            } else {
                $msg = "Sms sent not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $sms_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getSmsSentByUniqueId() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $SmsSentUniqueId    = $this->input->post('sms_unique_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SmsSentUniqueId == "") {
            $msg = "Please select sms sent";
            $error_occured = true;
        } else {

            $sms_sent_detail = $this->Influence_Model->getSmsSentByUniqueId($SmsSentUniqueId, $UserProfileId);
            
            if(count($sms_sent_detail) > 0) {
                $msg = "Sms sent fetched successfully";
            } else {
                $msg = "Sms sent not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $sms_sent_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMySentSms() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $sms_sent = $this->Influence_Model->getMySentSms($UserProfileId);
            if(count($sms_sent) > 0) {
                $msg = "Sms sent fetched successfully";
            } else {
                $msg = "No sms sent by you";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $sms_sent,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Social Sent
    public function saveSocialSent() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $SocialType         = $this->input->post('social_type');
        $SocialSubject      = $this->input->post('subject_text');
        $SocialMessage      = $this->input->post('message_text');
        $SocialUrl          = $this->input->post('url_text');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SocialSubject == "") {
            $msg = "Please enter subject";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $SocialSentUniqueId = $this->Influence_Model->generateSocialSentUniqueId();

            $insertData = array(
                                'SocialSentUniqueId' => $SocialSentUniqueId,
                                'UserProfileId'      => $UserProfileId,
                                'SocialType'         => $SocialType,
                                'SocialSubject'      => $SocialSubject,
                                'SocialMessage'      => $SocialMessage,
                                'SocialUrl'          => $SocialUrl,
                                'SentOn'             => date('Y-m-d H:i:s'),
                            );

            $SocialSentId = $this->Influence_Model->saveSocialSent($insertData);

            if($SocialSentId > 0) {
                                
                $this->Influence_Model->saveSocialAttachment($SocialSentId, $UserProfileId, $_FILES['file']);

                $this->db->query("COMMIT");

                $social_sent_detail = $this->Influence_Model->getSocialSent($SocialSentId, $UserProfileId);

                $msg = "Social post successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Social post not saved. Error occured";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $social_sent_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    
    public function getSocialSent() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $SocialSentId    = $this->input->post('social_sent_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SocialSentId == "") {
            $msg = "Please select social sent";
            $error_occured = true;
        } else {

            $social_detail = $this->Influence_Model->getSocialSent($SocialSentId, $UserProfileId);
            
            if(count($social_detail) > 0) {
                $msg = "Social post fetched successfully";
            } else {
                $msg = "Social post not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $social_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getSocialSentByUniqueId() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $SocialSentUniqueId = $this->input->post('social_unique_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($SocialSentUniqueId == "") {
            $msg = "Please select social unique sent";
            $error_occured = true;
        } else {

            $social_sent_detail = $this->Influence_Model->getSocialSentByUniqueId($SocialSentUniqueId, $UserProfileId);
            
            if(count($social_sent_detail) > 0) {
                $msg = "Social post fetched successfully";
            } else {
                $msg = "Social post not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $social_sent_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMySentSocial() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $social_sent = $this->Influence_Model->getMySentSocial($UserProfileId);
            if(count($social_sent) > 0) {
                $msg = "Social post fetched successfully";
            } else {
                $msg = "No social post by you";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"    => 'failed',
                            "message"   => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $social_sent,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

}

