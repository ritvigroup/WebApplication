<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Review_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        
        $this->UserReviewTbl        = 'UserReview';

    }


    public function getAllReviewForMe($UserProfileId) {
        $result = array();
        $this->db->select('*');
        $this->db->from($this->UserReviewTbl);
        $this->db->where('FriendUserProfileId', $UserProfileId);
        $this->db->where('ReviewStatus', 1);
        $this->db->order_by('ReviewOn', 'DESC');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $review = array();
            foreach($result AS $res) {
                $review[] = $this->getReviewDetail($res['UserReviewId']);
            }
        } else { 
            $review = array();
        }
        return $review;
    }


    public function getAllReviewByMe($UserProfileId) {
        $result = array();
        $this->db->select('*');
        $this->db->from($this->UserReviewTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->order_by('ReviewOn', 'DESC');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $review = array();
            foreach($result AS $res) {
                $review[] = $this->getReviewDetail($res['UserReviewId']);
            }
        } else { 
            $review = array();
        }
        return $review;
    }


    public function saveMyReview($insertData) {
        $this->db->insert($this->UserReviewTbl, $insertData);

        $review_id = $this->db->insert_id();

        return $review_id;
    }


    // Get Review Detail
    public function getReviewDetail($ReviewId) {
        $review_detail = array();
        if(isset($ReviewId) && $ReviewId > 0) {

            $query = $this->db->query("SELECT * FROM ".$this->UserReviewTbl." WHERE UserReviewId = '".$ReviewId."'");

            $res = $query->row_array();

            $review_detail = $this->returnReviewDetail($res);
        } else {
            $review_detail = array();
        }
        return $review_detail;
    }

    // Return Review Detail
    public function returnReviewDetail($res) {
        $UserReviewId           = $res['UserReviewId'];
        $UserProfileId          = $res['UserProfileId'];
        $FriendUserProfileId    = $res['FriendUserProfileId'];
        $UserReview             = $res['UserReview'];
        $ReviewStatus           = $res['ReviewStatus'];
        $ReviewOn               = return_time_ago($res['ReviewOn']);

        $ReviewBy               = $this->User_Model->getUserProfileWithUserInformation($UserProfileId);
        $ReviewFor              = $this->User_Model->getUserProfileWithUserInformation($FriendUserProfileId);

        $user_data_array = array(
                                "UserReviewId"          => $UserReviewId,
                                "UserProfileId"         => $UserProfileId,
                                "FriendUserProfileId"   => $FriendUserProfileId,
                                "UserReview"            => $UserReview,
                                "ReviewStatus"          => $ReviewStatus,
                                "ReviewOn"              => $ReviewOn,
                                "ReviewOnTime"          => $res['ReviewOn'],
                                "ReviewBy"              => $ReviewBy,
                                "ReviewFor"             => $ReviewFor,
                                );
        return $user_data_array;
    }
  

}