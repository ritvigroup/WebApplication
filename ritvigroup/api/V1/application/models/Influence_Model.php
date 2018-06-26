<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Influence_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->EmailSentTbl             = 'EmailSent';
        $this->EmailSentToTbl           = 'EmailSentTo';
        $this->EmailSentAttachmentTbl   = 'EmailSentAttachment';

        $this->SmsSentTbl               = 'SmsSent';

        $this->SocialSentTbl            = 'SocialSent';
        $this->SocialSentAttachmentTbl  = 'SocialSentAttachment';
    }



    public function getAttachmentTypeId($file_name) {
        $photo_file_array = array('jpg', 'jpeg', 'bmp', 'png');
        $doc_file_array = array('doc', 'docx', 'xls', 'pdf', 'txt');
        $video_file_array = array('mp4', 'dat', '3gp');
        $audio_file_array = array('mp3', 'wav');

        $file_extension = strtolower(end(explode('.', $file_name)));

        $AttachmentTypeId = $this->validateAttachmentExtension($extension);
        if(@in_array($file_extension, $photo_file_array)) {
            $AttachmentTypeId = 1;
        } else if(@in_array($file_extension, $video_file_array)) {
            $AttachmentTypeId = 2;
        } else if(@in_array($file_extension, $audio_file_array)) {
            $AttachmentTypeId = 4;
        } else {
            $AttachmentTypeId = 3;
        }
        return $AttachmentTypeId;
    }


    public function validateAttachmentExtension($extension) {
        $query = $this->db->query("SELECT AttachmentTypeId FROM ".$this->attachmentTypeTbl." 
                                                        WHERE 
                                                            `TypeExtensions` LIKE '%".$extension."%'");

        $res_u = $query->row_array();
        if($res_u['AttachmentTypeId'] > 0) {
            return $res_u['AttachmentTypeId'];
        } else {
            return 0;
        }
    }



    //////////////////////////////// EMAIL //////////////////////////////////////////////
    public function generateEmailSentUniqueId() {
        $EmailSentUniqueId = "EMAIL".mt_rand()."SENT".time();
        $this->db->select('EmailSentUniqueId');
        $this->db->from($this->EmailSentTbl);
        $this->db->where('EmailSentUniqueId', $EmailSentUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generateEmailSentUniqueId();
        }
        return $EmailSentUniqueId;
    }


    public function saveEmailSent($insertData) {
        $this->db->insert($this->EmailSentTbl, $insertData);

        $email_sent_id = $this->db->insert_id();

        return $email_sent_id;
    }


    public function saveEmailSentTo($EmailSentId, $UserProfileId, $email_members) {

        $email_member = explode(';', $email_members); // Explode email via ';'
        foreach($email_member AS $key => $member_email) {

            if($member_email != '') {
                $insertData = array(
                                    'EmailSentId'           => $EmailSentId,
                                    'UserProfileId'         => $UserProfileId,
                                    'EmailAddress'          => $member_email,
                                    'SentStatus'            => 1,
                                    'SentOn'                => date('Y-m-d H:i:s'),
                                    'DeliveredStatus'       => 1,
                                    'DeliveredOn'           => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->EmailSentToTbl, $insertData);
            }
        }
        return true;
    }


    public function saveEmailAttachment($EmailSentId, $UserProfileId, $email_sent_attachment) {
        $j = 0;

        for($i = 0; $i < count($email_sent_attachment['name']); $i++) {

            $upload_file_name = $email_sent_attachment['name'][$i];

           
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-EMAIL-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                if($AttachmentTypeId == 1) {
                    $path = EMAIL_IMAGE_DIR;
                } else if($AttachmentTypeId == 2) {
                    $path = EMAIL_VIDEO_DIR;
                } else if($AttachmentTypeId == 4) {
                    $path = EMAIL_AUDIO_DIR;
                } else {
                    $path = EMAIL_DOC_DIR;
                }
                $path = $path.$AttachmentFile;
                $source = $email_sent_attachment['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $AttachmentThumb = '';
                if($_FILES['thumb']['name'][$i] != '') {
                    $AttachmentThumb = date('YmdHisA').'-'.time().'-EMAIL-THUMB-'.mt_rand().'.'.end(explode('.', $_FILES['thumb']['name'][$i]));
                    $path = EMAIL_IMAGE_DIR.$AttachmentThumb;
                    $source = $_FILES['thumb']['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);
                }

                $insertData = array(
                                    'EmailSentId'           => $EmailSentId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentThumb'       => $AttachmentThumb,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->EmailSentAttachmentTbl, $insertData);
            }
        }
        return true;
    }


    public function getMySentEmail($UserProfileId) {
        $email = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('EmailSentId');
            $this->db->from($this->EmailSentTbl);
            $this->db->where('UserProfileId', $UserProfileId);
            $this->db->order_by('SentOn','DESC');
            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $email[] = $this->getEmailSent($result['EmailSentId'], $UserProfileId);
            }
        } else {
            $email = array();
        }
        return $email;
    }

    
    public function getEmailSent($EmailSentId, $UserProfileId = 0) {
        $email_detail = array();
        if(isset($EmailSentId) && $EmailSentId > 0) {

            $query = $this->db->query("SELECT * FROM $this->EmailSentTbl WHERE EmailSentId = '".$EmailSentId."'");

            $res = $query->row_array();

            if($res['EmailSentId'] > 0) {
                $email_detail = $this->returnEmailSent($res, $UserProfileId);
            }
        } else {
            $email_detail = array();
        }
        return $email_detail;
    }

    
    public function returnEmailSent($res, $UserProfileId = 0) {
        $EmailSentId        = $res['EmailSentId'];
        $EmailSentUniqueId  = $res['EmailSentUniqueId'];
        $EmailType          = $res['EmailType'];
        
        $EmailSubject       = $res['EmailSubject'];
        $EmailMessage       = (($res['EmailMessage'] != NULL) ? $res['EmailMessage'] : "");

        $SentOn             = return_time_ago($res['SentOn']);

        $EmailSentTo        = $this->getEmailSentTo($EmailSentId);
        $EmailAttachment    = $this->getEmailAttachment($EmailSentId);


        $user_data_array = array(
                                "EmailSentId"       => $EmailSentId,
                                "EmailSentUniqueId" => $EmailSentUniqueId,
                                "EmailType"         => $EmailType,
                                "EmailSubject"      => $EmailSubject,
                                "EmailMessage"      => $EmailMessage,
                                "SentOn"            => $SentOn,
                                "SentOnTime"        => $res['SentOn'],


                                "EmailSentTo"       => $EmailSentTo,
                                "EmailAttachment"   => $EmailAttachment,
                                );
        return $user_data_array;
    }


    public function getEmailSentTo($EmailSentId) {
        
        $EmailSentTo = array();

        $query = $this->db->query("SELECT up.UserProfileId 
                                            FROM ".$this->EmailSentToTbl." AS ea 
                                            LEFT JOIN ".$this->userProfileTbl." up ON ea.UserProfileId = up.UserProfileId
                                            WHERE 
                                                ea.`EmailSentId` = '".$EmailSentId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $EmailSentTo[] = $this->User_Model->getUserProfileWithUserInformation($result['UserProfileId']);
        }

        return $EmailSentTo;
    }


    public function getEmailSentByUniqueId($EmailSentUniqueId, $UserProfileId) {
        
        $email_detail = array();
        if(isset($EmailSentUniqueId) && $EmailSentUniqueId != '') {

            $sql = "SELECT * FROM $this->EmailSentTbl WHERE EmailSentUniqueId = '".$EmailSentUniqueId."' AND UserProfileId = '".$UserProfileId."'";
            $query = $this->db->query($sql);

            $res = $query->row_array();

            if($res['EmailSentId'] > 0) {
                $email_detail = $this->returnEmailSent($res, $UserProfileId);
            }
        } else {
            $email_detail = array();
        }
        return $email_detail;
    }


    public function getEmailAttachment($EmailSentId) {
        
        $EventAttachment = array();

        $query = $this->db->query("SELECT esa.*, at.TypeName 
                                            FROM ".$this->EmailSentAttachmentTbl." AS esa 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON esa.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                esa.`EmailSentId` = '".$EmailSentId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            if($AttachmentTypeId == 1) {
                $path = EMAIL_IMAGE_URL;
            } else if($AttachmentTypeId == 2) {
                $path = EMAIL_VIDEO_URL;
            } else if($AttachmentTypeId == 4) {
                $path = EMAIL_AUDIO_URL;
            } else {
                $path = EMAIL_DOC_URL;
            }
            $AttachmentThumb = '';

            if($AttachmentTypeId == 2) {
                $AttachmentThumb = EMAIL_IMAGE_URL.$result['AttachmentThumb'];
            }

            $EventAttachment[] = array(
                                'EmailSentAttachmentId' => $result['EmailSentAttachmentId'],
                                'EmailSentId'           => $result['EmailSentId'],
                                'AttachmentTypeId'      => $result['AttachmentTypeId'],
                                'AttachmentType'        => $result['TypeName'],
                                'AttachmentFile'        => $path.$result['AttachmentFile'],
                                'AttachmentOrginalFile' => $result['AttachmentOrginalFile'],
                                'AttachmentThumb'       => $AttachmentThumb,
                                'AttachmentOrder'       => $result['AttachmentOrder'],
                                'AttachmentStatus'      => $result['AttachmentStatus'],
                                'AddedOn'               => return_time_ago($result['AddedOn']),
                                'AddedOnTime'           => $result['AddedOn'],
                                );
        }

        return $EventAttachment;
    }
    


    /////////////////////////////////////// SMS //////////////////////////////////////////
    public function generateSmsSentUniqueId() {
        $SmsSentUniqueId = "SMS".mt_rand()."SENT".time();
        $this->db->select('SmsSentUniqueId');
        $this->db->from($this->SmsSentTbl);
        $this->db->where('SmsSentUniqueId', $SmsSentUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generateSmsSentUniqueId();
        }
        return $SmsSentUniqueId;
    }


    public function saveSmsSent($insertData) {
        $this->db->insert($this->SmsSentTbl, $insertData);

        $sms_sent_id = $this->db->insert_id();

        return $sms_sent_id;
    }


    public function getSmsSent($SmsSentId, $UserProfileId = 0) {
        $sms_detail = array();
        if(isset($SmsSentId) && $SmsSentId > 0) {

            $query = $this->db->query("SELECT * FROM $this->SmsSentTbl WHERE SmsSentId = '".$SmsSentId."'");

            $res = $query->row_array();

            if($res['SmsSentId'] > 0) {
                $sms_detail = $this->returnSmsSent($res, $UserProfileId);
            }
        } else {
            $sms_detail = array();
        }
        return $sms_detail;
    }

    
    public function returnSmsSent($res, $UserProfileId = 0) {
        $SmsSentId        = $res['SmsSentId'];
        $SmsSentUniqueId  = $res['SmsSentUniqueId'];
        $UserProfileId    = $res['UserProfileId'];
        $SmsTo            = (($res['SmsTo'] != NULL) ? $res['SmsTo'] : "");
        $SmsMessage       = (($res['SmsMessage'] != NULL) ? $res['SmsMessage'] : "");

        $SentOn             = return_time_ago($res['SentOn']);


        $user_data_array = array(
                                "SmsSentId"         => $SmsSentId,
                                "SmsSentUniqueId"   => $SmsSentUniqueId,
                                "UserProfileId"     => $UserProfileId,
                                "SmsTo"             => $SmsTo,
                                "SmsMessage"        => $SmsMessage,
                                "SentOn"            => $SentOn,
                                "SentOnTime"        => $res['SentOn'],
                                );
        return $user_data_array;
    }


    public function getSmsSentByUniqueId($SmsSentUniqueId, $UserProfileId) {
        
        $sms_detail = array();
        if(isset($SmsSentUniqueId) && $SmsSentUniqueId != '') {

            $sql = "SELECT * FROM $this->SmsSentTbl WHERE SmsSentUniqueId = '".$SmsSentUniqueId."' AND UserProfileId = '".$UserProfileId."'";
            $query = $this->db->query($sql);

            $res = $query->row_array();

            if($res['SmsSentId'] > 0) {
                $sms_detail = $this->returnSmsSent($res, $UserProfileId);
            }
        } else {
            $sms_detail = array();
        }
        return $sms_detail;
    }


    public function getMySentSms($UserProfileId) {
        $sms = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('SmsSentId');
            $this->db->from($this->SmsSentTbl);
            $this->db->where('UserProfileId', $UserProfileId);
            $this->db->order_by('SentOn','DESC');
            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $sms[] = $this->getSmsSent($result['SmsSentId'], $UserProfileId);
            }
        } else {
            $sms = array();
        }
        return $sms;
    }


    //////////////////////////////// SOCIAL //////////////////////////////////////////////
    public function generateSocialSentUniqueId() {
        $SocialSentUniqueId = "SOCIAL".mt_rand()."SENT".time();
        $this->db->select('SocialSentUniqueId');
        $this->db->from($this->SocialSentTbl);
        $this->db->where('SocialSentUniqueId', $SocialSentUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generateSocialSentUniqueId();
        }
        return $SocialSentUniqueId;
    }


    public function saveSocialSent($insertData) {
        $this->db->insert($this->SocialSentTbl, $insertData);

        $social_sent_id = $this->db->insert_id();

        return $social_sent_id;
    }


    public function saveSocialAttachment($SocialSentId, $UserProfileId, $social_sent_attachment) {
        $j = 0;

        for($i = 0; $i < count($social_sent_attachment['name']); $i++) {

            $upload_file_name = $social_sent_attachment['name'][$i];

           
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-SOCIAL-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                if($AttachmentTypeId == 1) {
                    $path = SOCIAL_IMAGE_DIR;
                } else if($AttachmentTypeId == 2) {
                    $path = SOCIAL_VIDEO_DIR;
                } else if($AttachmentTypeId == 4) {
                    $path = SOCIAL_AUDIO_DIR;
                } else {
                    $path = SOCIAL_DOC_DIR;
                }
                $path = $path.$AttachmentFile;
                $source = $social_sent_attachment['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $AttachmentThumb = '';
                if($_FILES['thumb']['name'][$i] != '') {
                    $AttachmentThumb = date('YmdHisA').'-'.time().'-SOCIAL-THUMB-'.mt_rand().'.'.end(explode('.', $_FILES['thumb']['name'][$i]));
                    $path = SOCIAL_IMAGE_DIR.$AttachmentThumb;
                    $source = $_FILES['thumb']['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);
                }

                $insertData = array(
                                    'SocialSentId'          => $SocialSentId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentThumb'       => $AttachmentThumb,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->SocialSentAttachmentTbl, $insertData);
            }
        }
        return true;
    }


    public function getMySentSocial($UserProfileId) {
        $social = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('SocialSentId');
            $this->db->from($this->SocialSentTbl);
            $this->db->where('UserProfileId', $UserProfileId);
            $this->db->order_by('SentOn','DESC');
            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $social[] = $this->getSocialSent($result['SocialSentId'], $UserProfileId);
            }
        } else {
            $social = array();
        }
        return $social;
    }

    
    public function getSocialSent($SocialSentId, $UserProfileId = 0) {
        $social_detail = array();
        if(isset($SocialSentId) && $SocialSentId > 0) {

            $query = $this->db->query("SELECT * FROM $this->SocialSentTbl WHERE SocialSentId = '".$SocialSentId."'");

            $res = $query->row_array();

            if($res['SocialSentId'] > 0) {
                $social_detail = $this->returnSocialSent($res, $UserProfileId);
            }
        } else {
            $social_detail = array();
        }
        return $social_detail;
    }

    
    public function returnSocialSent($res, $UserProfileId = 0) {
        $SocialSentId        = $res['SocialSentId'];
        $SocialSentUniqueId  = $res['SocialSentUniqueId'];
        $UserProfileId       = $res['UserProfileId'];
        $SocialType          = $res['SocialType'];
        
        $SocialSubject       = (($res['SocialSubject'] != NULL) ? $res['SocialSubject'] : "");
        $SocialMessage       = (($res['SocialMessage'] != NULL) ? $res['SocialMessage'] : "");
        $SocialUrl           = (($res['SocialUrl'] != NULL) ? $res['SocialUrl'] : "");

        $SentOn             = return_time_ago($res['SentOn']);

        $SocialAttachment    = $this->getSocialAttachment($SocialSentId);


        $user_data_array = array(
                                "SocialSentId"          => $SocialSentId,
                                "SocialSentUniqueId"    => $SocialSentUniqueId,
                                "UserProfileId"         => $UserProfileId,
                                "SocialType"            => $SocialType,
                                "SocialSubject"         => $SocialSubject,
                                "SocialMessage"         => $SocialMessage,
                                "SocialUrl"             => $SocialUrl,
                                "SentOn"                => $SentOn,
                                "SentOnTime"            => $res['SentOn'],


                                "SocialAttachment"   => $SocialAttachment,
                                );
        return $user_data_array;
    }


    public function getSocialSentByUniqueId($SocialSentUniqueId, $UserProfileId) {
        
        $social_detail = array();
        if(isset($SocialSentUniqueId) && $SocialSentUniqueId != '') {

            $sql = "SELECT * FROM $this->SocialSentTbl WHERE SocialSentUniqueId = '".$SocialSentUniqueId."' AND UserProfileId = '".$UserProfileId."'";
            $query = $this->db->query($sql);

            $res = $query->row_array();

            if($res['SocialSentId'] > 0) {
                $social_detail = $this->returnSocialSent($res, $UserProfileId);
            }
        } else {
            $social_detail = array();
        }
        return $social_detail;
    }


    public function getSocialAttachment($SocialSentId) {
        
        $SocialAttachment = array();

        $query = $this->db->query("SELECT ssa.*, at.TypeName 
                                            FROM ".$this->SocialSentAttachmentTbl." AS ssa 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON ssa.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                ssa.`SocialSentId` = '".$SocialSentId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            if($AttachmentTypeId == 1) {
                $path = SOCIAL_IMAGE_URL;
            } else if($AttachmentTypeId == 2) {
                $path = SOCIAL_VIDEO_URL;
            } else if($AttachmentTypeId == 4) {
                $path = SOCIAL_AUDIO_URL;
            } else {
                $path = SOCIAL_DOC_URL;
            }
            $AttachmentThumb = '';

            if($AttachmentTypeId == 2) {
                $AttachmentThumb = SOCIAL_IMAGE_URL.$result['AttachmentThumb'];
            }

            $SocialAttachment[] = array(
                                'SocialSentAttachmentId'=> $result['SocialSentAttachmentId'],
                                'SocialSentId'          => $result['SocialSentId'],
                                'AttachmentTypeId'      => $result['AttachmentTypeId'],
                                'AttachmentType'        => $result['TypeName'],
                                'AttachmentFile'        => $path.$result['AttachmentFile'],
                                'AttachmentOrginalFile' => $result['AttachmentOrginalFile'],
                                'AttachmentThumb'       => $AttachmentThumb,
                                'AttachmentOrder'       => $result['AttachmentOrder'],
                                'AttachmentStatus'      => $result['AttachmentStatus'],
                                'AddedOn'               => return_time_ago($result['AddedOn']),
                                'AddedOnTime'           => $result['AddedOn'],
                                );
        }

        return $SocialAttachment;
    }

}