<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->eventTbl             = 'Event';
        $this->eventAttachmentTbl   = 'EventAttachment';
        $this->eventAttendeeTbl     = 'EventAttendee';
    }


    public function generateEventUniqueId() {
        $EventUniqueId = "C".mt_rand().time();
        $this->db->select('EventUniqueId');
        $this->db->from($this->eventTbl);
        $this->db->where('EventUniqueId', $EventUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generateEventUniqueId();
        }
        return $EventUniqueId;
    }


    public function saveMyEvent($insertData) {
        $this->db->insert($this->eventTbl, $insertData);

        $event_id = $this->db->insert_id();

        return $event_id;
    }


    public function saveMyEventAttendee($EventId, $UserProfileId, $event_member) {
        foreach($event_member AS $member_user_profile_id) {
            $insertData = array(
                                'EventId'               => $EventId,
                                'UserProfileId'         => $member_user_profile_id,
                                'EventApprovedStatus'   => 0,
                                'AddedBy'               => $UserProfileId,
                                'ApprovedOn'            => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->eventAttendeeTbl, $insertData);
        }
        return true;
    }


    public function saveMyEventAttachment($EventId, $UserProfileId, $event_attachment) {
        $j = 0;

        for($i = 0; $i < count($event_attachment['name']); $i++) {

            $upload_file_name = $event_attachment['name'][$i];


            
            if($upload_file_name != '') {

                $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                $AttachmentFile = date('YmdHisA').'-'.time().'-EVENT-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                if($AttachmentTypeId == 1) {
                    $path = EVENT_IMAGE_DIR;
                } else if($AttachmentTypeId == 2) {
                    $path = EVENT_VIDEO_DIR;
                } else if($AttachmentTypeId == 4) {
                    $path = EVENT_AUDIO_DIR;
                } else {
                    $path = EVENT_DOC_DIR;
                }
                $path = $path.$AttachmentFile;
                $source = $event_attachment['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $AttachmentThumb = '';
                if($_FILES['thumb']['name'][$i] != '') {
                    $AttachmentThumb = date('YmdHisA').'-'.time().'-EVENT-THUMB-'.mt_rand().'.'.end(explode('.', $_FILES['thumb']['name'][$i]));
                    $path = EVENT_IMAGE_DIR.$AttachmentThumb;
                    $source = $_FILES['thumb']['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);
                }

                

                $insertData = array(
                                    'EventId'               => $EventId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $upload_file_name,
                                    'AttachmentThumb'       => $AttachmentThumb,
                                    'AttachmentOrder'       => $j,
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $j++;
                $this->db->insert($this->eventAttachmentTbl, $insertData);
            }
        }
        return true;
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


    public function getMyAllEvent($UserProfileId) {
        $events = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT EventId FROM $this->eventTbl WHERE `AddedBy` = '".$UserProfileId."'");

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $events[] = $this->getEventDetail($result['EventId']);
            }
        } else {
            $events = array();
        }
        return $events;
    }


    
    public function getEventDetail($EventId) {
        $event_detail = array();
        if(isset($EventId) && $EventId > 0) {

            $query = $this->db->query("SELECT * FROM $this->eventTbl WHERE EventId = '".$EventId."'");

            $res = $query->row_array();

            $event_detail = $this->returnEventDetail($res);
        } else {
            $event_detail = array();
        }
        return $event_detail;
    }

    
    public function returnEventDetail($res) {
        $EventId            = $res['EventId'];
        $EventUniqueId      = $res['EventUniqueId'];
        $AddedBy            = $res['AddedBy'];
        $UpdatedBy          = $res['UpdatedBy'];
        
        $EventName          = $res['EventName'];
        $EventDescription   = (($res['EventDescription'] != NULL) ? $res['EventDescription'] : "");
        $EventLocation      = (($res['EventLocation'] != NULL) ? $res['EventLocation'] : "");
        $StartDate          = (($res['StartDate'] != NULL) ? $res['StartDate'] : "");
        $EndDate            = (($res['EndDate'] != NULL) ? $res['EndDate'] : "");
        $EveryYear          = (($res['EveryYear'] != NULL) ? $res['EveryYear'] : "");
        $EveryMonth         = (($res['EveryMonth'] != NULL) ? $res['EveryMonth'] : "");
        $EventStatus        = $res['EventStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $EventProfile       = $this->User_Model->getUserProfileWithUserInformation($AddedBy);
        $EventAttendee      = $this->getEventAttendee($EventId);
        $EventAttachment    = $this->getEventAttachment($EventId);

        $user_data_array = array(
                                "EventId"            => $EventId,
                                "EventUniqueId"      => $EventUniqueId,
                                "EventName"          => $EventName,
                                "EventDescription"   => $EventDescription,
                                "EventLocation"      => $EventLocation,
                                "StartDate"          => $StartDate,
                                "EndDate"            => $EndDate,
                                "EveryYear"          => $EveryYear,
                                "EveryMonth"         => $EveryMonth,
                                "EventStatus"        => $EventStatus,
                                "AddedOn"            => $AddedOn,
                                "UpdatedOn"          => $UpdatedOn,
                                "EventProfile"       => $EventProfile,
                                "EventAttendee"      => $EventAttendee,
                                "EventAttachment"    => $EventAttachment,
                                );
        return $user_data_array;
    }



    public function getEventAttendee($EventId) {
        
        $EventAttendee = array();

        $query = $this->db->query("SELECT up.UserProfileId 
                                            FROM ".$this->eventAttendeeTbl." AS ea 
                                            LEFT JOIN ".$this->userProfileTbl." up ON ea.UserProfileId = up.UserProfileId
                                            WHERE 
                                                ea.`EventId` = '".$EventId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $EventAttendee[] = $this->User_Model->getUserProfileWithUserInformation($result['UserProfileId']);
        }

        return $EventAttendee;
    }



    public function getEventAttachment($EventId) {
        
        $EventAttachment = array();

        $query = $this->db->query("SELECT ea.*, at.TypeName 
                                            FROM ".$this->eventAttachmentTbl." AS ea 
                                            LEFT JOIN ".$this->attachmentTypeTbl." at ON ea.AttachmentTypeId = at.AttachmentTypeId
                                            WHERE 
                                                ea.`EventId` = '".$EventId."'");

        $res = $query->result_array();


        foreach($res AS $key => $result) {
            $AttachmentTypeId = $result['AttachmentTypeId'];

            if($AttachmentTypeId == 1) {
                $path = EVENT_IMAGE_URL;
            } else if($AttachmentTypeId == 2) {
                $path = EVENT_VIDEO_URL;
            } else if($AttachmentTypeId == 4) {
                $path = EVENT_AUDIO_URL;
            } else {
                $path = EVENT_DOC_URL;
            }
            $AttachmentThumb = '';

            if($AttachmentTypeId == 2) {
                $AttachmentThumb = EVENT_IMAGE_URL.$result['AttachmentThumb'];
            }

            $EventAttachment[] = array(
                                'EventAttachmentId'     => $result['EventAttachmentId'],
                                'EventId'               => $result['EventId'],
                                'AttachmentTypeId'      => $result['AttachmentTypeId'],
                                'AttachmentType'        => $result['TypeName'],
                                'AttachmentFile'        => $path.$result['AttachmentFile'],
                                'AttachmentOrginalFile' => $result['AttachmentOrginalFile'],
                                'AttachmentThumb'       => $AttachmentThumb,
                                'AttachmentOrder'       => $result['AttachmentOrder'],
                                'AttachmentStatus'      => $result['AttachmentStatus'],
                                'AddedBy'               => $this->User_Model->getUserProfileWithUserInformation($result['AddedBy']),
                                'AddedOn'               => return_time_ago($result['AddedOn']),
                                );
        }

        return $EventAttachment;
    }
    

}