<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notification_Model extends CI_Model {

    function __construct() {
        $this->UserProfileTbl           = 'UserProfile';
        $this->NotificationTbl          = 'Notification';
        $this->NotificationFromToTbl    = 'NotificationFromTo';
    }


    public function saveNotification($insertData) {
        $this->db->insert($this->NotificationTbl, $insertData);
        $notification_id = $this->db->insert_id();
        return $notification_id;

    }

    public function saveNotificationFromTo($insertData) {
        $this->db->select('NotificationFromToId');
        $this->db->from($this->NotificationFromToTbl);
        $this->db->where('NotificationId', $insertData['NotificationId']);
        $this->db->where('NotificationFrom', $insertData['NotificationFrom']);
        $this->db->where('NotificationTo', $insertData['NotificationTo']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        } else {
            $this->db->insert($this->NotificationFromToTbl, $insertData);

            $this->sendNotificationToUser(); // Only for now. Will remove from here and put in CRON JOB
        }
    }


    public function sendNotificationToUser() {

        $this->db->select('nft.*, n.NotificationFeedId, n.NotificationAddedOn');
        $this->db->from($this->NotificationFromToTbl.' AS nft');
        $this->db->join($this->NotificationTbl.' AS n', 'nft.NotificationId = n.NotificationId', 'LEFT');
        $this->db->where('NotificationSentYesNo', 0);
        $query = $this->db->get();
        $res = $query->result_array();

        foreach($res AS $key => $val) {

            $from_user = $this->User_Model->getMinimumUserProfileInformation($val['NotificationFrom'], $val['NotificationFrom']);

            $limited_data_sent = array(
                                    'FeedId'                => $val['NotificationFeedId'],
                                    'FromUserProfilePic'    => $from_user['ProfilePhotoPath'],
                                    'FromUserProfileName'   => $from_user['FirstName']. ' '.$from_user['LastName'],
                                    'NotificationMessage'   => $val['NotificationDescription'],
                                    );

            $to_user = $this->User_Model->getMinimumUserProfileInformation($val['NotificationTo'], $val['NotificationTo']);

            sendAndroidNotification($to_user['UserProfileDeviceToken'], $val['NotificationType'], $val['NotificationDescription'], $val['NotificationDescription'], $limited_data_sent);


            $whereData = array(
                                'NotificationFromToId'      => $val['NotificationFromToId'],
                                );
            $updateData = array(
                                'NotificationSentYesNo'     => 1,
                                'NotificationReceivedYesNo' => 0,
                                'NotificationReadOn'        => date('Y-m-d H:i:s'),
                                );
            $this->db->where($whereData);
            $this->db->update($this->NotificationFromToTbl, $updateData);
        }
    }


    public function getMyAllNotification($UserProfileId) {
        $this->db->select('nft.*, n.NotificationFeedId, n.NotificationAddedOn');
        $this->db->from($this->NotificationFromToTbl.' AS nft');
        $this->db->join($this->NotificationTbl.' AS n', 'nft.NotificationId = n.NotificationId', 'LEFT');
        $this->db->where('nft.NotificationTo', $UserProfileId);
        $this->db->where('nft.NotificationSentYesNo', 1);
        $this->db->order_by('n.NotificationAddedOn', 'DESC');
        $this->db->limit(20, $this->start);
        $query = $this->db->get();
        $res = $query->result_array();

        //echo $this->db->last_query();

        $notifications = array();
        foreach($res AS $key => $val) {
            $notifications[] = array(
                                    'NotificationId'            => $val['NotificationId'],
                                    'NotificationFeedId'        => $val['NotificationFeedId'],
                                    'NotificationAddedOn'       => return_time_ago($val['NotificationAddedOn']),
                                    'NotificationAddedOnTime'   => $val['NotificationAddedOn'],
                                    'NotificationFrom'          => $val['NotificationFrom'],
                                    'NotificationFromProfile'   => $this->User_Model->getMinimumUserProfileInformation($val['NotificationFrom'], $val['NotificationFrom']),
                                    //'NotificationTo'            => $val['NotificationTo'],
                                    //'NotificationToProfile'     => $this->User_Model->getMinimumUserProfileInformation($val['NotificationTo'], $val['NotificationTo']),
                                    'NotificationType'          => $val['NotificationType'],
                                    'NotificationDescription'   => $val['NotificationDescription'],
                                    'NotificationSentYesNo'     => $val['NotificationSentYesNo'],
                                    'NotificationReceivedYesNo' => $val['NotificationReceivedYesNo'],
                                    'NotificationReadOn'        => return_time_ago($val['NotificationReadOn']),
                                    'NotificationReadOnTime'    => $val['NotificationReadOn'],
                                    'NotificationFromToStatus'  => $val['NotificationFromToStatus'],
                                    );
        }
        return $notifications;
    }


    public function markMyNotificationRead($UserProfileId, $NotificationId) {
        $whereData = array(
                            'NotificationTo'      => $UserProfileId,
                            'NotificationId'      => $NotificationId,
                            'NotificationReceivedYesNo'      => 0,
                            );
        $updateData = array(
                            'NotificationReceivedYesNo' => 1,
                            'NotificationReadOn'        => date('Y-m-d H:i:s'),
                            );
        $this->db->where($whereData);
        $this->db->update($this->NotificationFromToTbl, $updateData);

        return 1;
    }


    public function markMyAllNotificationRead($UserProfileId) {
        $whereData = array(
                            'NotificationTo'      => $UserProfileId,
                            'NotificationReceivedYesNo'      => 0,
                            );
        $updateData = array(
                            'NotificationReceivedYesNo' => 1,
                            'NotificationReadOn'        => date('Y-m-d H:i:s'),
                            );
        $this->db->where($whereData);
        $this->db->update($this->NotificationFromToTbl, $updateData);

        return 1;
    }

}