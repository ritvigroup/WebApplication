<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->eventTbl             = 'Event';
        $this->eventAttachmentTbl   = 'EventAttachment';
        $this->eventAttendeeTbl     = 'EventAttendee';

        $this->EventLikeTbl         = 'EventLike';
        $this->EventInterestTbl     = 'EventInterest';
        $this->EventInterestTypeTbl = 'EventInterestType';
    }


    public function generateEventUniqueId() {
        $EventUniqueId = "EVENT".mt_rand().time();
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


    public function updateMyEvent($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->eventTbl, $updateData);

        return $this->db->affected_rows();
    }


    public function saveMyEventInterest($insertData) {
        $this->db->insert($this->EventInterestTbl, $insertData);

        $event_interest_id = $this->db->insert_id();

        return $event_interest_id;
    }


    public function updateMyEventInterest($updateData, $whereData) {
        $this->db->update($this->EventInterestTbl, $updateData);

        foreach($updateData AS $ud_key => $ud_val) {
            $this->db->set($ud_key, $ud_val); 
        }

        foreach($whereData AS $wd_key => $wd_val) {
            $this->db->where($wd_key, $wd_val);  
        }
        $this->db->update($this->EventInterestTbl);

        return true;
    }


    public function saveMyEventAttendee($EventId, $UserProfileId, $event_member) {
        foreach($event_member AS $key => $member_user_profile_id) {
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
                $this->db->insert($this->eventAttachmentTbl, $insertData);
            }
        }
        return true;
    }


    public function likeEvent($UserProfileId, $EventId) {
        $res = $this->db->select('*')->from($this->EventLikeTbl)->where(array('EventId'=> $EventId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['EventLikeId'] > 0) {
            $updateData = array(
                                'EventLike'      => 1,
                                'EventUnlike'    => 0,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'EventId'        => $EventId,
                                'UserProfileId' => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->EventLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'EventLike'      => 1,
                                'EventUnlike'    => 0,
                                'EventId'        => $EventId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->EventLikeTbl, $insertData);
        }
        return $this->getTotalLike($EventId);
    }

    public function unlikeEvent($UserProfileId, $EventId) {
        $res = $this->db->select('*')->from($this->EventLikeTbl)->where(array('EventId'=> $EventId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['EventLikeId'] > 0) {
            $updateData = array(
                                'EventLike'      => 0,
                                'EventUnlike'    => 1,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'EventId'        => $EventId,
                                'UserProfileId' => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->EventLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'EventLike'      => 0,
                                'EventUnlike'    => 1,
                                'EventId'        => $EventId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->EventLikeTbl, $insertData);
        }
        return $this->getTotalUnLike($EventId);
    }

    public function getMeLike($UserProfileId, $EventId) {
        $res = $this->db->select('EventLike')->from($this->EventLikeTbl)->where(array('EventId'=> $EventId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['EventLike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalLike($EventId) {
        $res = $this->db->select('COUNT(EventLikeId) AS TotalLike')->from($this->EventLikeTbl)->where(array('EventId'=> $EventId, 'EventLike' => 1))->get()->row_array();
        return $res['TotalLike'];
    }

    public function getMeUnLike($UserProfileId, $EventId) {
        $res = $this->db->select('EventUnlike')->from($this->EventLikeTbl)->where(array('EventId'=> $EventId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['EventUnlike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalUnLike($EventId) {
        $res = $this->db->select('COUNT(EventLikeId) AS TotalUnLike')->from($this->EventLikeTbl)->where(array('EventId'=> $EventId, 'EventUnlike' => 1))->get()->row_array();
        return $res['TotalUnLike'];
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


    public function getMyAllEvent($UserProfileId, $FriendProfileId) {
        $events = array();
        if($FriendProfileId > 0) {

            if($UserProfileId != $FriendProfileId) {
                $this->db->select('EventId');
                $this->db->from($this->eventTbl);
                $this->db->where('AddedBy', $FriendProfileId);
                $this->db->where('EventStatus', '1');
                $this->db->where('EventPrivacy', '1');
                $this->db->order_by('AddedOn','DESC');
            } else {
                $this->db->select('EventId');
                $this->db->from($this->eventTbl);
                $this->db->where('AddedBy', $FriendProfileId);
                $this->db->where('EventStatus !=', -1);
                $this->db->order_by('AddedOn','DESC');
            }

            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $events[] = array(
                                'feedtype' => 'event',
                                'eventdata' => $this->getEventDetail($result['EventId'], $UserProfileId),
                                );
            }
        }
        return $events;
    }


    // Get All Event Where Myself Associated
    public function getAllEventWhereMyselfAssociated($UserProfileId) {
        $events = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('e.EventId');
            $this->db->from($this->eventAttendeeTbl.' AS ea');
            $this->db->join($this->eventTbl.' AS e', 'ea.EventId = e.EventId', 'LEFT');
            $this->db->where('ea.UserProfileId', $UserProfileId);
            $this->db->where('ea.EventApprovedStatus !=', -1); // Declined
            $this->db->order_by('e.StartDate', 'DESC');
            $query = $this->db->get();

            //echo $this->db->last_query();
            
            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $events[] = array(
                                'feedtype' => 'event',
                                'eventdata' => $this->getEventDetail($result['EventId'], $UserProfileId),
                                );
            }
        } else {
            $events = array();
        }
        return $events;
    }


    public function validateUserProfileAlreadyInterested($EventId, $UserProfileId) {
        
        $event_interest_detail = array();
        if(isset($EventId) && $EventId > 0 && isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT EventInterestId FROM $this->EventInterestTbl WHERE EventId = '".$EventId."' AND UserProfileId = '".$UserProfileId."'");

            $res = $query->row_array();

            $event_interest_detail = $res;
        } else {
            $event_interest_detail = array();
        }
        return $event_interest_detail;
    }


    
    public function getEventDetail($EventId, $UserProfileId = 0) {
        $event_detail = array();
        if(isset($EventId) && $EventId > 0) {

            $query = $this->db->query("SELECT * FROM $this->eventTbl WHERE EventId = '".$EventId."'");

            $res = $query->row_array();

            if($res['EventId'] > 0) {
                $event_detail = $this->returnEventDetail($res, $UserProfileId);
            }
        } else {
            $event_detail = array();
        }
        return $event_detail;
    }

    
    public function returnEventDetail($res, $UserProfileId = 0) {
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

        $EventPrivacy       = (($res['EventPrivacy'] != NULL) ? $res['EventPrivacy'] : ""); // 1 = Public , 0 = Private
        
        $EventStatus        = $res['EventStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $EventProfile       = $this->User_Model->getUserProfileInformation($AddedBy);
        $EventAttendee      = $this->getEventAttendee($EventId);
        $EventAttachment    = $this->getEventAttachment($EventId);
        $TotalEventInterest = $this->getTotalEventInterest($EventId, 0);
        $EventInterestTotal = $this->getTotalEventInterest($EventId, 1);
        $MeInterested       = $this->getMeEventInterest($EventId, $UserProfileId);


        $TotalLikes     = $this->getTotalLike($EventId);
        $TotalUnLikes   = $this->getTotalUnLike($EventId);
        $MeLike         = $this->getMeLike($UserProfileId, $EventId);
        $MeUnLike       = $this->getMeUnLike($UserProfileId, $EventId);
        $TotalComment   = 0;


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
                                "EventPrivacy"       => $EventPrivacy,
                                "AddedOn"            => $AddedOn,
                                "AddedOnTime"        => $res['AddedOn'],
                                "UpdatedOn"          => $UpdatedOn,
                                "UpdatedOnTime"      => $res['UpdatedOn'],
                                "EventProfile"       => $EventProfile,
                                "EventAttendee"      => $EventAttendee,
                                "EventAttachment"    => $EventAttachment,

                                "TotalLikes"                => $TotalLikes,
                                "TotalUnLikes"              => $TotalUnLikes,
                                "MeLike"                    => $MeLike,
                                "MeUnLike"                  => $MeUnLike,
                                "TotalComment"              => $TotalComment,

                                "TotalEventInterest" => $TotalEventInterest,
                                "EventInterestTotal" => $EventInterestTotal,
                                "MeInterested"       => $MeInterested,
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
            $EventAttendee[] = $this->User_Model->getUserProfileInformation($result['UserProfileId']);
        }

        return $EventAttendee;
    }

    
    public function getTotalEventInterest($EventId, $OnlyTotal = 0) {

        $query = $this->db->query("SELECT * FROM ".$this->EventInterestTypeTbl." ORDER BY EventInterestTypeName");
        $interests = $query->result_array();
        
        $query = $this->db->query("SELECT InterestType, COUNT(InterestType) AS CountInterestType FROM ".$this->EventInterestTbl." WHERE `EventId` = '".$EventId."' GROUP BY InterestType");
        $res = $query->result_array();

        $TotalEventInterest = array();
        foreach($interests AS $interest) {

            $total_count = 0;
            foreach($res AS $result) {
                if($interest['EventInterestTypeId'] == $result['InterestType']) {
                    $total_count = $result['CountInterestType'];
                    break;
                }
                
            }
            $int = array_merge($interest, array('TotalCount' => $total_count));
            $TotalEventInterest[] = $int;

            $total_interests += $total_count;
        }

        if($OnlyTotal > 0) {
            return $total_interests;
        }

        // echo '<pre>';
        // print_r($interests);
        // print_r($res);
        // print_r($TotalEventInterest);
        // die;

        //$TotalEventInterest = ($res['TotalEventInterest'] > 0) ? $res['TotalEventInterest'] : 0;

        return $TotalEventInterest;
    }


    public function getMeEventInterest($EventId, $UserProfileId) {
        $query = $this->db->query("SELECT InterestType FROM ".$this->EventInterestTbl." WHERE `EventId` = '".$EventId."' AND `UserProfileId` = '".$UserProfileId."'");

        
        $res = $query->row_array();

        $InterestType = ($res['InterestType'] > 0) ? $res['InterestType'] : 0;

        return $InterestType;
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
                                'AddedBy'               => $this->User_Model->getUserProfileInformation($result['AddedBy']),
                                'AddedOn'               => return_time_ago($result['AddedOn']),
                                'AddedOnTime'           => $result['AddedOn'],
                                );
        }

        return $EventAttachment;
    }
    

}