<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Poll_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->pollTbl                  = 'Poll';
        $this->pollAnswerTbl            = 'PollAnswer';
        $this->PollLikeTbl              = 'PollLike';
        $this->pollParticipationTbl     = 'PollParticipation';
        $this->PollCommentTbl           = 'PollComment';

        $this->pollTagTbl               = 'PollTag';
    }


    public function generatePollUniqueId() {
        $PollUniqueId = "P".time().mt_rand();
        $this->db->select('PollUniqueId');
        $this->db->from($this->pollTbl);
        $this->db->where('PollUniqueId', $PollUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generatePollUniqueId();
        }
        return $PollUniqueId;
    }


    public function saveMyPoll($insertData) {
        $this->db->insert($this->pollTbl, $insertData);

        $poll_id = $this->db->insert_id();

        return $poll_id;
    }

    public function updateMyPoll($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->pollTbl, $updateData);

        return $this->db->affected_rows();
    }

    
    public function getPollLocation($PollId, $UserProfileId) {

        $location = array();

        $query_lr = $this->db->query("SELECT l.* FROM `LocationRelation` AS lr LEFT JOIN `Location` AS l ON lr.LocationId = l.LocationId WHERE lr.`PollId` = '".$PollId."'");

        $res_lr = $query_lr->row_array();
        if($res_lr['LocationId'] > 0) {
            $location = array(
                            'LocationId'            => $res_lr['LocationId'],
                            'PlaceId'               => $res_lr['PlaceId'],
                            'LocationLattitude'     => $res_lr['LocationLattitude'],
                            'LocationLongitude'     => $res_lr['LocationLongitude'],
                            'LocationUrl'           => $res_lr['LocationUrl'],
                            'LocationAddress'       => $res_lr['LocationAddress'],
                            'LocationVicinity'      => $res_lr['LocationVicinity'],
                            );
        } else {
            $location = NULL;
        }
        return $location;
    }

    
    public function saveMyPollLocation($PollId, $UserProfileId, $LocationArray) {

        $PlaceId            = $LocationArray['place_id'];
        $LocationName       = $LocationArray['location_name'];
        $LocationLattitude  = $LocationArray['location_lant'];
        $LocationLongitude  = $LocationArray['location_long'];
        $LocationUrl        = $LocationArray['location_url'];
        $LocationAddress    = $LocationArray['location_address'];
        $LocationVicinity   = $LocationArray['location_vicinity'];

        if($PlaceId != '') {

            $sql = "SELECT LocationId FROM `Location` WHERE `PlaceId` = '".$PlaceId."'";
            $query = $this->db->query($sql);

            $res = $query->row_array();
            if($res['LocationId'] > 0) {

                $query_lr = $this->db->query("SELECT LocationRelationId FROM `LocationRelation` WHERE `LocationId` = '".$res['LocationId']."'");

                $res_lr = $query_lr->row_array();

                $LocationRelationId = $res_lr['LocationRelationId'];
            } else {
                $insertData = array(
                                    'PlaceId'               => $PlaceId,
                                    'LocationName'          => $LocationName,
                                    'LocationLattitude'     => $LocationLattitude,
                                    'LocationLongitude'     => $LocationLongitude,
                                    'LocationUrl'           => $LocationUrl,
                                    'LocationAddress'       => $LocationAddress,
                                    'LocationVicinity'      => $LocationVicinity,
                                    );
                $this->db->insert('Location', $insertData);

                $location_id = $this->db->insert_id();

                $insertData = array(
                                    'LocationId'    => $location_id,
                                    'PostId'        => 0,
                                    'EventId'       => 0,
                                    'PollId'        => 0,
                                    'ComplaintId'   => 0,
                                    );
                $this->db->insert('LocationRelation', $insertData);

                $LocationRelationId = $this->db->insert_id();
            }
            $whereData = array(
                                'LocationRelationId' => $LocationRelationId,
                                );
            $updateData = array(
                                'PollId' => $PollId,
                                );
            $this->db->where($whereData);
            $this->db->update('LocationRelation', $updateData);
        }
        return true;
    }

    
    public function removeMyPollLocation($PollId, $UserProfileId) {
        $whereData = array(
                            'PollId' => $PollId,
                            );
        $updateData = array(
                            'PollId' => 0,
                            );
        $this->db->where($whereData);
        $this->db->update('LocationRelation', $updateData);
    }


    public function validatePollAddedByMe($PollId, $UserProfileId) {
        $this->db->select('PollId');
        $this->db->from($this->pollTbl);
        $this->db->where('PollId', $PollId);
        $this->db->where('AddedBy', $UserProfileId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function likePoll($UserProfileId, $PollId) {
        $res = $this->db->select('*')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollLikeId'] > 0) {
            $PollLike   = (($res[0]['PollLike'] > 0) ? 0 : 1);
            $PollUnlike = (($res[0]['PollUnlike'] > 0) ? 0 : 1);
            $updateData = array(
                                'PollLike'      => $PollLike,
                                'PollUnlike'    => $PollUnlike,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'PollId'        => $PollId,
                                'UserProfileId' => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->PollLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'PollLike'      => 1,
                                'PollUnlike'    => 0,
                                'PollId'        => $PollId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->PollLikeTbl, $insertData);
        }
        return $this->getTotalLike($PollId);
    }

    public function unlikePoll($UserProfileId, $PollId) {
        $res = $this->db->select('*')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollLikeId'] > 0) {
            $updateData = array(
                                'PollLike'      => 0,
                                'PollUnlike'    => 1,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $whereData = array(
                                'PollId'        => $PollId,
                                'UserProfileId' => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->PollLikeTbl, $updateData);
        } else {
            $insertData = array(
                                'PollLike'      => 0,
                                'PollUnlike'    => 1,
                                'PollId'        => $PollId,
                                'UserProfileId' => $UserProfileId,
                                'LikedOn'       => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->PollLikeTbl, $insertData);
        }
        return $this->getTotalUnLike($PollId);
    }

    public function getMeLike($UserProfileId, $PollId) {
        $res = $this->db->select('PollLike')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollLike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalLike($PollId) {
        $res = $this->db->select('COUNT(PollLikeId) AS TotalLike')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'PollLike' => 1))->get()->row_array();
        return (($res['TotalLike'] > 0) ? $res['TotalLike'] : 0);
    }

    public function getMeUnLike($UserProfileId, $PollId) {
        $res = $this->db->select('PollUnlike')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollUnlike'] > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getTotalUnLike($PollId) {
        $res = $this->db->select('COUNT(PollLikeId) AS TotalUnLike')->from($this->PollLikeTbl)->where(array('PollId'=> $PollId, 'PollUnlike' => 1))->get()->row_array();
        return (($res['TotalUnLike'] > 0) ? $res['TotalUnLike'] : 0);
    }

    
    public function saveMyPollImage($PollId, $poll_image) {

        $upload_file_name = $poll_image['name'];
        
        if($upload_file_name != '') {

            $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

            $AttachmentFile = date('YmdHisA').'-'.time().'-POLL-'.mt_rand().'.'.end(explode('.', $upload_file_name));

            if($AttachmentTypeId == 1) {
                $path = POLL_IMAGE_DIR;
            } else if($AttachmentTypeId == 2) {
                $path = POLL_VIDEO_DIR;
            } else if($AttachmentTypeId == 4) {
                $path = POLL_AUDIO_DIR;
            } else {
                $path = POLL_DOC_DIR;
            }
            $path = $path.$AttachmentFile;
            $source = $poll_image['tmp_name'];

            $upload_result = uploadFileOnServer($source, $path);

            $updateData = array(
                                'PollImage'   => $AttachmentFile,
                                'UpdatedOn'   => date('Y-m-d H:i:s'),
                                );
            $this->db->where('PollId', $PollId);
            $this->db->update($this->pollTbl, $updateData);
        }
    }


    public function saveMyPollAnswer($PollId, $UserProfileId, $poll_answer, $poll_answer_image) {
        $i = 0;
        foreach($poll_answer AS $answer) {

            if($answer != '' || $poll_answer_image['name'][$i] != '') {
                $insertData = array(
                                    'PollId'             => $PollId,
                                    'PollAnswer'         => $answer,
                                    'PollAnswerStatus'   => 1,
                                    'AddedBy'            => $UserProfileId,
                                    'UpdatedBy'          => $UserProfileId,
                                    'AddedOn'            => date('Y-m-d H:i:s'),
                                    'UpdatedOn'          => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->pollAnswerTbl, $insertData);

                $PollAnswerId = $this->db->insert_id();

                $upload_file_name = $poll_answer_image['name'][$i];
            
                if($upload_file_name != '') {

                    $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                    $AttachmentFile = date('YmdHisA').'-'.time().'-POLL-ANSWER-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                    if($AttachmentTypeId == 1) {
                        $path = POLL_IMAGE_DIR;
                    } else if($AttachmentTypeId == 2) {
                        $path = POLL_VIDEO_DIR;
                    } else if($AttachmentTypeId == 4) {
                        $path = POLL_AUDIO_DIR;
                    } else {
                        $path = POLL_DOC_DIR;
                    }
                    $path = $path.$AttachmentFile;
                    $source = $poll_answer_image['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);

                    $updateData = array(
                                        'PollAnswerImage'   => $AttachmentFile,
                                        'UpdatedOn'         => date('Y-m-d H:i:s'),
                                        );
                    $this->db->where('PollAnswerId', $PollAnswerId);
                    $this->db->update($this->pollAnswerTbl, $updateData);
                }
            }
            $i++;
            
        }
        return true;
    }


    public function updateMyPollImage($PollId, $poll_image) {

        $upload_file_name = $poll_image['name'];
        
        if($upload_file_name != '') {

            $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

            $AttachmentFile = date('YmdHisA').'-'.time().'-POLL-'.mt_rand().'.'.end(explode('.', $upload_file_name));

            if($AttachmentTypeId == 1) {
                $path = POLL_IMAGE_DIR;
            } else if($AttachmentTypeId == 2) {
                $path = POLL_VIDEO_DIR;
            } else if($AttachmentTypeId == 4) {
                $path = POLL_AUDIO_DIR;
            } else {
                $path = POLL_DOC_DIR;
            }
            $path = $path.$AttachmentFile;
            $source = $poll_image['tmp_name'];

            $upload_result = uploadFileOnServer($source, $path);

            $updateData = array(
                                'PollImage'   => $AttachmentFile,
                                'UpdatedOn'   => date('Y-m-d H:i:s'),
                                );
            $this->db->where('PollId', $PollId);
            $this->db->update($this->pollTbl, $updateData);
        }
    }


    public function updateMyPollAnswer($PollId, $UserProfileId, $poll_answer, $poll_answer_image) {
        $i = 0;
        
        foreach($poll_answer AS $answer) {

            if($answer['answer_text'] != '' || $poll_answer_image['name'][$i] != '') {
                
                $this->db->set('PollAnswer',        $answer['answer_text']);
                $this->db->set('UpdatedBy',         $UserProfileId);
                $this->db->set('UpdatedOn',         date('Y-m-d H:i:s'));
                $this->db->where('PollAnswerId',    $answer['answer_id']);
                $this->db->update($this->pollAnswerTbl);

                $upload_file_name = $poll_answer_image['name'][$i];
            
                if($upload_file_name != '') {

                    $AttachmentTypeId = $this->getAttachmentTypeId($upload_file_name);

                    $AttachmentFile = date('YmdHisA').'-'.time().'-POLL-ANSWER-'.mt_rand().'.'.end(explode('.', $upload_file_name));

                    if($AttachmentTypeId == 1) {
                        $path = POLL_IMAGE_DIR;
                    } else if($AttachmentTypeId == 2) {
                        $path = POLL_VIDEO_DIR;
                    } else if($AttachmentTypeId == 4) {
                        $path = POLL_AUDIO_DIR;
                    } else {
                        $path = POLL_DOC_DIR;
                    }
                    $path = $path.$AttachmentFile;
                    $source = $poll_answer_image['tmp_name'][$i];

                    $upload_result = uploadFileOnServer($source, $path);

                    $updateData = array(
                                        'PollAnswerImage'   => $AttachmentFile,
                                        'UpdatedOn'         => date('Y-m-d H:i:s'),
                                        );
                    $this->db->where('PollAnswerId', $answer['answer_id']);
                    $this->db->update($this->pollAnswerTbl, $updateData);
                }
            }
            $i++;
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



    public function participatePollWithAnswer($insertData) {
        $this->db->insert($this->pollParticipationTbl, $insertData);

        $PollParticipationId = $this->db->insert_id();

        return $PollParticipationId;
    }

    public function deleteMyParticipationOnPoll($PollId, $UserProfileId) {
        $this->db->where('PollId', $PollId);
        $this->db->where('AddedBy', $UserProfileId);
        $this->db->delete($this->pollParticipationTbl);
    }

    
    public function getMyAllPoll($UserProfileId, $FriendProfileId) {
        $polls = array();

        if($FriendProfileId > 0) {

            if($UserProfileId != $FriendProfileId) {

                $this->db->select('PollId');
                $this->db->from($this->pollTbl);
                $this->db->where('AddedBy', $FriendProfileId);
                $this->db->where('PollStatus', '1');
                $this->db->where('PollPrivacy', '1');
                $this->db->order_by('AddedOn','DESC');

            } else {
                $this->db->select('PollId');
                $this->db->from($this->pollTbl);

                $search_in = $this->input->post('search_in');
            
                if($search_in == "poll") {
                    
                    $posted_by_me       = $this->input->post('posted_by_me'); // By Me
                    $date_from          = $this->input->post('date_from');
                    $date_to            = $this->input->post('date_to');
                    $location           = $this->input->post('location');
                    $participated       = $this->input->post('participated');

                    
                    if($posted_by_me == '1') {
                        $this->db->where('AddedBy', $FriendProfileId);
                    }
                    if($location != '') {
                        $this->db->like('PollLocation', $location);
                    }
                    if($participated > 0) {
                        $this->db->where($FriendProfileId." IN (SELECT pp.AddedBy FROM `PollParticipation` AS pp WHERE pp.PollId = p.PollId AND pp.PollAnswerId > 0 AND pp.AddedBy = '".$FriendProfileId."')");
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
                } else {
                    $this->db->where('AddedBy', $FriendProfileId);
                }

                $this->db->where('PollStatus != ', -1);
                $this->db->order_by('AddedOn','DESC');
            }
            $query = $this->db->get();

            //echo $this->db->last_query();
            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $polls[] = array(
                                'feedtype' => 'poll',
                                'polldata' => $this->getPollDetail($result['PollId'], $UserProfileId),
                                );
            }
        }
        return $polls;
    }


    public function getMyAllPollAndWhereITagged($UserProfileId, $FriendProfileId) {
        $polls = array();

        if($FriendProfileId > 0) {

            $this->db->select('p.PollId');
            $this->db->from($this->pollTbl.' AS p');
            $this->db->join($this->pollTagTbl.' AS pt', 'p.PollId = pt.PollId', 'LEFT');

            $search_in = $this->input->post('search_in');
        
            if($search_in == "poll") {
                
                $posted_by_me       = $this->input->post('posted_by_me'); // By Me
                $date_from          = $this->input->post('date_from');
                $date_to            = $this->input->post('date_to');
                $location           = $this->input->post('location');
                $location_place_id  = $this->input->post('location_place_id');
                $tagged_in          = $this->input->post('tagged_in');
                $participated       = $this->input->post('participated');
                $poll_ongoing       = $this->input->post('poll_ongoing');
                $poll_ended         = $this->input->post('poll_ended');

                if($posted_by_me == '1') {
                    $this->db->where('p.AddedBy', $FriendProfileId);
                } else {
                    $this->db->group_start();
                    $this->db->where('p.AddedBy', $FriendProfileId);
                    $this->db->or_where('pt.UserProfileId', $FriendProfileId);
                    $this->db->group_end();
                }
                // if($location != '') {
                //     $this->db->like('p.PollLocation', $location);
                // }
                if($location != '' || $location_place_id != '') {

                    $this->db->where($location_place_id, "
                                    (
                                        SELECT l.PlaceId 
                                        FROM `Location` AS l 
                                        LEFT JOIN `LocationRelation` AS lr ON l.LocationId = lr.LocationId 
                                        WHERE 
                                            lr.PollId = p.PollId
                                    )");
                }
                if($participated > 0) {
                    $this->db->where($FriendProfileId." IN (SELECT pp.AddedBy FROM `PollParticipation` AS pp WHERE pp.PollId = p.PollId AND pp.PollAnswerId > 0 AND pp.AddedBy = '".$FriendProfileId."')");
                }
                if($tagged_in > 0) {
                    $this->db->where("0 < (SELECT COUNT(pt1.PollTagId) FROM `PollTag` AS pt1 WHERE pt1.PollId = p.PollId AND pt1.UserProfileId = '".$FriendProfileId."')");
                }
                
                if($date_from != '' && $date_to != '') {

                    $date_from          = date('Y-m-d', strtotime($date_from));
                    $date_to            = date('Y-m-d', strtotime($date_to));

                    // if($date_from == $date_to) {
                    //     $this->db->group_start();
                    //     $this->db->where("(p.ValidFromDate BETWEEN '".$date_from."' AND '".$date_to."')");
                    //     $this->db->where("(p.ValidEndDate BETWEEN '".$date_from."' AND '".$date_to."')");
                    //     $this->db->group_end();
                    // } else {
                    //     $this->db->group_start();
                    //     $this->db->where("(p.ValidFromDate BETWEEN '".$date_from."' AND '".$date_to."')");
                    //     $this->db->where("(p.ValidEndDate BETWEEN '".$date_from."' AND '".$date_to."')");
                    //     $this->db->group_end();
                    // }
                    $this->db->group_start();
                    $this->db->where("(p.ValidFromDate BETWEEN '".$date_from."' AND '".$date_to."')");
                    $this->db->where("(p.ValidEndDate BETWEEN '".$date_from."' AND '".$date_to."')");
                    $this->db->group_end();
                }
            } else {
                $this->db->group_start();
                $this->db->where('p.AddedBy', $FriendProfileId);
                $this->db->or_where('pt.UserProfileId', $FriendProfileId);
                $this->db->group_end();
            }

            $this->db->where('p.PollStatus != ', -1);
            $this->db->order_by('p.AddedOn','DESC');
            $query = $this->db->get();

            //echo $this->db->last_query();
            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $polls[] = array(
                                'feedtype' => 'poll',
                                'polldata' => $this->getPollDetail($result['PollId'], $UserProfileId),
                                );
            }
        }
        return $polls;
    }


    public function getPollDetailByUniqueId($PollUniqueId, $UserProfileId) {
        $poll_detail = array();
        if(isset($PollUniqueId) && $PollUniqueId != '') {
            $query = $this->db->query("SELECT * FROM $this->pollTbl WHERE PollUniqueId = '".$PollUniqueId."'");

            $res = $query->row_array();

            if($res['PollId'] > 0) {
                $poll_detail = $this->returnPollDetail($res, $UserProfileId);
            } 
        } else {
            $poll_detail = array();
        }
        return $poll_detail;
    }


    
    public function getPollDetail($PollId, $UserProfileId) {
        $poll_detail = array();
        if(isset($PollId) && $PollId > 0) {

            $query = $this->db->query("SELECT * FROM $this->pollTbl WHERE PollId = '".$PollId."'");

            $res = $query->row_array();

            if($res['PollId'] > 0) {
                $poll_detail = $this->returnPollDetail($res, $UserProfileId);
            } 
        } else {
            $poll_detail = array();
        }
        return $poll_detail;
    }

    
    public function returnPollDetail($res, $UserProfileId) {
        $PollId             = $res['PollId'];
        $PollUniqueId       = $res['PollUniqueId'];
        $AddedBy            = $res['AddedBy'];
        $UpdatedBy          = $res['UpdatedBy'];
        
        $PollQuestion       = $res['PollQuestion'];
        $ValidFromDate      = (($res['ValidFromDate'] != NULL) ? $res['ValidFromDate'] : "");
        $ValidEndDate       = (($res['ValidEndDate'] != NULL) ? $res['ValidEndDate'] : "");
        $PollLocation       = (($res['PollLocation'] != NULL) ? $res['PollLocation'] : "");
        $PollPrivacy        = $res['PollPrivacy'];
        $PollStatus         = $res['PollStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $PollProfile        = $this->User_Model->getMinimumUserProfileInformation($AddedBy, $UserProfileId);
        //$PollAnswer         = $this->getPollAnswer($PollId);
        
        $PollTotalParticipation = $this->getPollTotalParticipation($PollId);
        $PollAnswerWithTotalParticipation = $this->getPollAnswerWithTotalParticipation($PollId, $UserProfileId);

        $validate_poll_already = $this->validateUserProfileAlreadyPolled($PollId, $UserProfileId);

        $TotalLikes     = $this->getTotalLike($PollId);
        $TotalUnLikes   = $this->getTotalUnLike($PollId);
        $MeLike         = $this->getMeLike($UserProfileId, $PollId);
        $MeUnLike       = $this->getMeUnLike($UserProfileId, $PollId);
        $TotalComment   = $this->getAllPollComment($PollId, $UserProfileId, 1);
        $LocationDetail = $this->getPollLocation($PollId, $UserProfileId);

        $PollTag        = $this->getPollTag($PollId);


        $user_data_array = array(
                                "PollId"                    => $PollId,
                                "PollUniqueId"              => $PollUniqueId,
                                "PollQuestion"              => $PollQuestion,
                                "ValidFromDate"             => $ValidFromDate,
                                "ValidEndDate"              => $ValidEndDate,
                                "PollLocation"              => $PollLocation,
                                "PollPrivacy"               => $PollPrivacy,
                                "PollStatus"                => $PollStatus,
                                "LocationDetail"            => $LocationDetail,
                                "AddedOn"                   => $AddedOn,
                                "AddedOnTime"               => $res['AddedOn'],
                                "UpdatedOn"                 => $UpdatedOn,
                                "UpdatedOnTime"             => $res['UpdatedOn'],
                                "PollProfile"               => $PollProfile,
                                'PollImage'                 => (($res['PollImage'] != '') ? POLL_IMAGE_URL.$res['PollImage'] : ''),
                                "PollTag"                   => $PollTag,
                                //"PollAnswer"                => $PollAnswer,
                                "PollTotalParticipation"    => $PollTotalParticipation,
                                "PollAnswerWithTotalParticipation"    => $PollAnswerWithTotalParticipation,
                                
                                "TotalLikes"                => $TotalLikes,
                                "TotalUnLikes"              => $TotalUnLikes,
                                "MeLike"                    => $MeLike,
                                "MeUnLike"                  => $MeUnLike,
                                "TotalComment"              => $TotalComment,

                                "MeParticipated"            => $validate_poll_already,
                                );
        return $user_data_array;
    }


    public function saveMyPollTags($PollId, $UserProfileId, $poll_tag) {
        foreach($post_tag AS $tag_user_profile_id) {
            $insertData = array(
                                'PollId'            => $PollId,
                                'UserProfileId'     => $tag_user_profile_id,
                                'TagStatus'         => 1,
                                'TagApproved'       => 1,
                                'AddedBy'           => $UserProfileId,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->pollTagTbl, $insertData);
        }
        return true;
    }


    public function deleteMyPollTags($PollId, $UserProfileId) {
        $this->db->where('PollId', $PollId);
        $this->db->delete($this->pollTagTbl);
    }


    public function getPollTag($PollId) {
        
        $PollTag = array();

        $query = $this->db->query("SELECT up.UserProfileId 
                                            FROM ".$this->pollTagTbl." AS pt 
                                            LEFT JOIN ".$this->userProfileTbl." up ON pt.UserProfileId = up.UserProfileId
                                            WHERE 
                                                pt.`PollId` = '".$PollId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $PollTag[] = $this->User_Model->getMinimumUserProfileInformation($result['UserProfileId']);
            //$PostTag[] = $result['UserProfileId'];
        }

        return $PollTag;
    }


    public function getPollAnswer($PollId) {
        
        $PollAnswer = array();

        $query = $this->db->query("SELECT * FROM ".$this->pollAnswerTbl." WHERE `PollId` = '".$PollId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $PollAnswer[] = array(
                                    'PollId'            => $result['PollId'],
                                    'PollAnswer'        => $result['PollAnswer'],
                                    'PollAnswerStatus'  => $result['PollAnswerStatus'],
                                );
        }

        return $PollAnswer;
    }


    public function getPollAnswerWithTotalParticipation($PollId, $UserProfileId) {
        
        $PollAnswer = array();

        $query = $this->db->query("SELECT * FROM ".$this->pollAnswerTbl." WHERE `PollId` = '".$PollId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $PollAnswer[] = array(
                                    'PollAnswerId'      => $result['PollAnswerId'],
                                    'PollId'            => $result['PollId'],
                                    'PollAnswer'        => $result['PollAnswer'],
                                    'PollAnswerImage'   => (($result['PollAnswerImage'] != '') ? POLL_IMAGE_URL.$result['PollAnswerImage'] : ''),
                                    'PollAnswerStatus'  => $result['PollAnswerStatus'],
                                    'TotalAnswerdMe'    => $this->getPollAnswerTotalParticipation($result['PollAnswerId']),
                                    'MeAnsweredYesNo'   => $this->meAnsweredOnPollAnswer($result['PollAnswerId'], $UserProfileId),
                                );
        }

        return $PollAnswer;
    }


    public function meAnsweredOnPollAnswer($PollAnswerId, $UserProfileId) {
        $this->db->select('PollParticipationId');
        $this->db->from($this->pollParticipationTbl);
        $this->db->where('PollAnswerId', $PollAnswerId);
        $this->db->where('AddedBy', $UserProfileId);
        $query = $this->db->get();
        //$result = $query->row_array();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }


    public function getPollTotalParticipation($PollId) {
        $this->db->select('COUNT(PollParticipationId) AS total_participation');
        $this->db->from($this->pollParticipationTbl);
        $this->db->where('PollId', $PollId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return (($result['total_participation'] > 0) ? $result['total_participation'] : 0);
        } else {
            return 0;
        }
    }


    public function getPollAnswerTotalParticipation($PollAnswerId) {
        $this->db->select('COUNT(PollParticipationId) AS total_participation');
        $this->db->from($this->pollParticipationTbl);
        $this->db->where('PollAnswerId', $PollAnswerId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return (($result['total_participation'] > 0) ? $result['total_participation'] : 0);
        } else {
            return 0;
        }
    }
    

    public function validateUserProfileAlreadyPolled($PollId, $UserProfileId) {
        $this->db->select('PollParticipationId');
        $this->db->from($this->pollParticipationTbl);
        $this->db->where('PollId', $PollId);
        $this->db->where('AddedBy', $UserProfileId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }


    public function savePollComment($insertData) {
        $this->db->insert($this->PollCommentTbl, $insertData);

        $PollCommentId = $this->db->insert_id();

        return $PollCommentId;
    }

    public function getAllPollComment($PollId, $UserProfileId, $total_list = 0) {
        $comments = array();
        $query = $this->db->query("SELECT PollCommentId FROM ".$this->PollCommentTbl." WHERE `PollId` = '".$PollId."' AND `CommentStatus` = '1' ORDER BY CommentOn DESC");
        $res = $query->result_array();

        if($total_list > 0) {
            return $query->num_rows();
        }
        if($query->num_rows() > 0) {
            foreach($res AS $comment) {
                if($comment['PollCommentId'] > 0) {
                    $comments[] = $this->getPollCommentDetail($PollId, $comment['PollCommentId'], $UserProfileId);
                }
            }
        }
        return $comments;
    }

    public function getPollCommentDetail($PollId, $CommentId, $UserProfileId) {
        $comment_detail = array();
        $query = $this->db->query("SELECT * FROM ".$this->PollCommentTbl." WHERE `PollId` = '".$PollId."' AND `PollCommentId` = '".$CommentId."'");
        $res = $query->row_array();
        if($res['PollCommentId'] > 0) {
            $comment_detail = $this->returnPollCommentDetail($res, $UserProfileId);
        }
        return $comment_detail;
    }

    public function returnPollCommentDetail($res, $UserProfileId) {
        $PollCommentId      = $res['PollCommentId'];
        $PollId             = $res['PollId'];
        $AddedBy            = $res['UserProfileId'];
        $CommentText        = (($res['CommentText'] != NULL) ? $res['CommentText'] : "");
        $CommentPhoto       = (($res['CommentPhoto'] != NULL) ? $res['CommentPhoto'] : "");
        $ParentId           = $res['ParentId'];
        $CommentStatus      = $res['CommentStatus'];

        $CommentOn          = return_time_ago($res['CommentOn']);

        $CommentProfile        = $this->User_Model->getMinimumUserProfileInformation($AddedBy);

        $data_array = array(
                                "PollCommentId"     => $PollCommentId,
                                "PollId"            => $PollId,
                                "AddedBy"           => $AddedBy,
                                "CommentText"       => $CommentText,
                                "CommentPhoto"      => $CommentPhoto,
                                "ParentId"          => $ParentId,
                                "CommentStatus"     => $CommentStatus,
                                "CommentOn"         => $CommentOn,
                                "CommentOnTime"     => $res['CommentOn'],
                                "CommentProfile"    => $CommentProfile,
                                );
        return $data_array;
    }

    public function deletePollComment($UserProfileId, $PollCommentId) {
        $res = $this->db->select('*')->from($this->PollCommentTbl)->where(array('PollCommentId'=> $PollCommentId, 'UserProfileId' => $UserProfileId))->get()->result_array();
        if($res[0]['PollCommentId'] > 0) {
            $updateData = array(
                                'CommentStatus' => -1,
                                );
            $whereData = array(
                                'PollCommentId'        => $PollCommentId,
                                'UserProfileId'        => $UserProfileId,
                                );
            $this->db->where($whereData);
            $this->db->update($this->PollCommentTbl, $updateData);
            return 1;
        } else {
            return 0;
        }
    }
    

}