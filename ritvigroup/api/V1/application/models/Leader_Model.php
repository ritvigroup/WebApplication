<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Leader_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->attachmentTypeTbl    = 'AttachmentType';

        $this->eventTbl             = 'Event';
        $this->eventAttachmentTbl   = 'EventAttachment';
        $this->eventAttendeeTbl     = 'EventAttendee';
    }



    
    public function getAllHomePageData($UserProfileId) {
        $home_page = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $query = $this->db->query("SELECT  FROM $this->eventTbl WHERE EventId = '".$EventId."'");

            $res = $query->row_array();

            $home_page = $this->returnEventDetail($res);
        } else {
            $home_page = array();
        }
        return $home_page;
    }    

}