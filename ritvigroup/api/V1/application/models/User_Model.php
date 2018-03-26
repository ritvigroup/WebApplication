<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        $this->userAlbumTbl         = 'UserAlbum';
        $this->userPhotoTbl         = 'UserPhoto';
        $this->userLogTbl           = 'UserLog';
        $this->userFavUserTbl       = 'UserFavUser';
        $this->UserFriendTbl        = 'UserFriend';
    }

    // Login with username with password
    public function loginUsernamePassword($username, $password) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserName', $username);
        $this->db->where('UserPassword', md5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    // Verify Username and Password
    public function verifyUsernamePassword($username, $password) {
        $query = $this->loginUsernamePassword($username, $password);
        $result = $query->row_array();
        if ($query->num_rows() > 0)
        {
            return ($result);
        }
        else 
        {
            return false;
        }
    }


    public function loginMobileMpin($mobile, $mpin) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->where('UserMpin', $mpin);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    
    public function verifyMobileMpin($mobile, $mpin) {
        $query = $this->loginMobileMpin($mobile, $mpin);
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return ($result);
        } else {
            return false;
        }
    }

    
    public function userMobileExist($mobile) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return ($result);
        } else {
            return false;
        }
    }


    public function userUsernameExist($username) {
        $this->db->select('UserId, UserStatus, UserEmail');
        $this->db->from($this->userTbl);
        $this->db->where('UserName', $username);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return ($result);
        } else {
            return false;
        }
    }


    public function userMobileWithMpinExist($mobile) {
        $this->db->select('UserId, UserStatus, UserMpin');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return ($result);
        } else {
            return false;
        }
    }


    public function userExistForUsernameEmailMobile($UserName, $UserEmail, $UserMobile) {
        $this->db->select('UserId, UserStatus, UserName, UserEmail, UserMobile');
        $this->db->from($this->userTbl);
        $this->db->where('UserName', $UserName);
        $this->db->or_where('UserEmail', $UserEmail);
        $this->db->or_where('UserMobile', $UserMobile);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return ($result);
        } else {
            return false;
        }
    }


    public function updateLoginStatus($UserId, $updateData) {
        $this->db->where('UserId', $UserId);
        $this->db->update($this->userTbl, $updateData);
    }


    public function updateUserData($UserId, $updateData) {
        $this->db->where('UserId', $UserId);
        $this->db->update($this->userTbl, $updateData);
    }


    public function updateUserProfileData($UserProfileId, $updateData) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->update($this->userProfileTbl, $updateData);

        //print_r($this->db->last_query());

        //echo "Affected rows: ".$this->db->affected_rows();
        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getUserDetail($FriendUserId, $UserProfileId, $full_information = 0) {
        if(isset($FriendUserId) && $FriendUserId > 0) {

            $query = $this->db->query("SELECT u.*, uph.PhotoPath AS UserProfilePhoto, uch.PhotoPath AS UserCoverPhoto 
                                                        FROM ".$this->userTbl." AS u 
                                                        LEFT JOIN ".$this->userPhotoTbl." uph ON u.ProfilePhotoId = uph.UserPhotoId
                                                        LEFT JOIN ".$this->userPhotoTbl." uch ON u.CoverPhotoId = uch.UserPhotoId
                                                        WHERE 
                                                            u.`UserId` = '".$FriendUserId."'");

            $res_u = $query->row_array();

            $user_detail = $this->returnUserDetail($res_u);

            $UserProfileCitizen = $this->getCitizenProfileInformation($FriendUserId, $UserProfileId);

            $user_detail = array_merge($user_detail, array("UserProfileCitizen" => $UserProfileCitizen));

            if($full_information > 0) {
                $UserProfileLeader = $this->getLeaderProfileInformation($FriendUserId, $UserProfileId);

                $user_detail = array_merge($user_detail, array("UserProfileLeader" => $UserProfileLeader));

                $UserProfileSubLeader = $this->getSubLeaderProfileInformation($FriendUserId, $UserProfileId);

                $user_detail = array_merge($user_detail, array("UserProfileSubLeader" => $UserProfileSubLeader));
            }

        } else {
            $user_detail = array();
        }
        return $user_detail;
    }


    public function getUserDetailCitizen($FriendUserId, $UserProfileId) {
        if(isset($FriendUserId) && $FriendUserId > 0) {

            $query = $this->db->query("SELECT u.*, uph.PhotoPath AS UserProfilePhoto, uch.PhotoPath AS UserCoverPhoto 
                                                        FROM ".$this->userTbl." AS u 
                                                        LEFT JOIN ".$this->userPhotoTbl." uph ON u.ProfilePhotoId = uph.UserPhotoId
                                                        LEFT JOIN ".$this->userPhotoTbl." uch ON u.CoverPhotoId = uch.UserPhotoId
                                                        WHERE 
                                                            u.`UserId` = '".$FriendUserId."'");

            $res_u = $query->row_array();

            $user_detail = $this->returnUserDetail($res_u);

            $UserProfileCitizen = $this->getCitizenProfileInformation($FriendUserId, $UserProfileId);

            $user_detail = array_merge($user_detail, array("UserProfileCitizen" => $UserProfileCitizen));

        } else {
            $user_detail = array();
        }
        return $user_detail;
    }


    public function getUserDetailLeader($FriendUserId, $UserProfileId) {
        if(isset($FriendUserId) && $FriendUserId > 0) {

            $query = $this->db->query("SELECT u.*, uph.PhotoPath AS UserProfilePhoto, uch.PhotoPath AS UserCoverPhoto 
                                                        FROM ".$this->userTbl." AS u 
                                                        LEFT JOIN ".$this->userPhotoTbl." uph ON u.ProfilePhotoId = uph.UserPhotoId
                                                        LEFT JOIN ".$this->userPhotoTbl." uch ON u.CoverPhotoId = uch.UserPhotoId
                                                        WHERE 
                                                            u.`UserId` = '".$FriendUserId."'");

            $res_u = $query->row_array();

            $user_detail = $this->returnUserDetail($res_u);

            $UserProfileLeader = $this->getLeaderProfileInformation($FriendUserId, $UserProfileId);

            $user_detail = array_merge($user_detail, array("UserProfileLeader" => $UserProfileLeader));

        } else {
            $user_detail = array();
        }
        return $user_detail;
    }


    public function getUserDetailSubLeader($FriendUserId, $UserProfileId) {
        if(isset($FriendUserId) && $FriendUserId > 0) {

            $query = $this->db->query("SELECT u.*, uph.PhotoPath AS UserProfilePhoto, uch.PhotoPath AS UserCoverPhoto 
                                                        FROM ".$this->userTbl." AS u 
                                                        LEFT JOIN ".$this->userPhotoTbl." uph ON u.ProfilePhotoId = uph.UserPhotoId
                                                        LEFT JOIN ".$this->userPhotoTbl." uch ON u.CoverPhotoId = uch.UserPhotoId
                                                        WHERE 
                                                            u.`UserId` = '".$FriendUserId."'");

            $res_u = $query->row_array();

            $user_detail = $this->returnUserDetail($res_u);

            $UserProfileSubLeader = $this->getSubLeaderProfileInformation($FriendUserId, $UserProfileId);

            $user_detail = array_merge($user_detail, array("UserProfileSubLeader" => $UserProfileSubLeader));

        } else {
            $user_detail = array();
        }
        return $user_detail;
    }


    public function getUserDetailAll($FriendUserId, $UserProfileId) {
        if(isset($FriendUserId) && $FriendUserId > 0) {

            $query = $this->db->query("SELECT u.*, uph.PhotoPath AS UserProfilePhoto, uch.PhotoPath AS UserCoverPhoto 
                                                        FROM ".$this->userTbl." AS u 
                                                        LEFT JOIN ".$this->userPhotoTbl." uph ON u.ProfilePhotoId = uph.UserPhotoId
                                                        LEFT JOIN ".$this->userPhotoTbl." uch ON u.CoverPhotoId = uch.UserPhotoId
                                                        WHERE 
                                                            u.`UserId` = '".$FriendUserId."'");

            $res_u = $query->row_array();

            $user_detail = $this->returnUserDetail($res_u);

            $UserProfileCitizen = $this->getCitizenProfileInformation($FriendUserId, $UserProfileId);

            $user_detail = array_merge($user_detail, array("UserProfileCitizen" => $UserProfileCitizen));

            $UserProfileLeader = $this->getLeaderProfileInformation($FriendUserId, $UserProfileId);

            $user_detail = array_merge($user_detail, array("UserProfileLeader" => $UserProfileLeader));

            $UserProfileSubLeader = $this->getSubLeaderProfileInformation($FriendUserId, $UserProfileId);

            $user_detail = array_merge($user_detail, array("UserProfileSubLeader" => $UserProfileSubLeader));

        } else {
            $user_detail = array();
        }
        return $user_detail;
    }


    public function getUserProfileWithUserInformation($FriendUserProfileId, $UserProfileId) {
        $profile = $this->getUserProfileInformation($FriendUserProfileId, $UserProfileId);
        $detail = $this->getUserDetail($profile['UserId'], $UserProfileId, 0);

        $return['user_profile_detail'] = array(
                                'user_info' => $detail,
                                'profile' => $profile,
                            );

        return $return;
    }


    public function getUserProfileInformation($FriendUserProfileId, $UserProfileId = 0) {

        $query = $this->db->query("SELECT * FROM ".$this->userProfileTbl." WHERE `UserProfileId` = '".$FriendUserProfileId."'");

        $res_u = $query->row_array();


        $user_data_array = array(
                                "UserProfileId"                 => (($res_u['UserProfileId'] != NULL) ? $res_u['UserProfileId'] : ""),
                                "UserId"                        => (($res_u['UserId'] != NULL) ? $res_u['UserId'] : ""),
                                "ParentUserId"                  => (($res_u['ParentUserId'] != NULL) ? $res_u['ParentUserId'] : ""),
                                "FirstName"                     => (($res_u['FirstName'] != NULL) ? $res_u['FirstName'] : ""),
                                "MiddleName"                    => (($res_u['MiddleName'] != NULL) ? $res_u['MiddleName'] : ""),
                                "LastName"                      => (($res_u['LastName'] != NULL) ? $res_u['LastName'] : ""),
                                "Email"                         => (($res_u['Email'] != NULL) ? $res_u['Email'] : ""),
                                "UserProfileDeviceToken"        => (($res_u['UserProfileDeviceToken'] != NULL) ? $res_u['UserProfileDeviceToken'] : ""),
                                "Address"                       => (($res_u['Address'] != NULL) ? $res_u['Address'] : ""),
                                "City"                          => (($res_u['City'] != NULL) ? $res_u['City'] : ""),
                                "State"                         => (($res_u['State'] != NULL) ? $res_u['State'] : ""),
                                "ZipCode"                       => (($res_u['ZipCode'] != NULL) ? $res_u['ZipCode'] : ""),
                                "Mobile"                        => (($res_u['Mobile'] != NULL) ? $res_u['Mobile'] : ""),
                                "AltMobile"                     => (($res_u['AltMobile'] != NULL) ? $res_u['AltMobile'] : ""),
                                "ProfileStatus"                 => (($res_u['ProfileStatus'] != NULL) ? $res_u['ProfileStatus'] : ""),
                                "AddedBy"                       => (($res_u['AddedBy'] != NULL) ? $res_u['AddedBy'] : ""),
                                "UpdatedBy"                     => (($res_u['UpdatedBy'] != NULL) ? $res_u['UpdatedBy'] : ""),
                                "AddedOn"                       => return_time_ago($res_u['AddedOn']),
                                "AddedOnTime"                   => ($res_u['AddedOn']),
                                "UpdatedOn"                     => return_time_ago($res_u['UpdatedOn']),
                                "UpdatedOnTime"                 => ($res_u['UpdatedOn']),
                                );

        if($UserProfileId > 0) {
            $friend_response = $this->checkUserFriendRequest($UserProfileId, $FriendUserProfileId);


            if($friend_response['RequestAccepted'] != '') {
                if($friend_response['RequestAccepted'] == 0) {
                    $user_data_array = array_merge($user_data_array, array('MyFriend' => 1)); // Send Request
                } else if($friend_response['RequestAccepted'] == 1) {
                    $user_data_array = array_merge($user_data_array, array('MyFriend' => 2)); // Accepted Friend Request
                } else if($friend_response['RequestAccepted'] == 2) {
                    $user_data_array = array_merge($user_data_array, array('MyFriend' => 3)); // Not to Send Request
                } else {
                    $user_data_array = array_merge($user_data_array, array('MyFriend' => 0)); // Fresh
                }
            } else {
                $user_data_array = array_merge($user_data_array, array('MyFriend' => 0)); // Fresh
            }
        } else {
            $user_data_array = array_merge($user_data_array, array('MyFriend' => 0)); // Fresh
        }
        return $user_data_array;
    }


    public function getCitizenProfileInformation($UserId, $UserProfileId) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('UserId', $UserId);
        $this->db->where('UserTypeId', 1);
        $query = $this->db->get();
        $res_u = $query->row_array();

        return $this->getUserProfileInformation($res_u['UserProfileId'], $UserProfileId);
    }


    public function getLeaderProfileInformation($UserId, $UserProfileId) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('UserId', $UserId);
        $this->db->where('UserTypeId', 2);
        $query = $this->db->get();
        $res_u = $query->row_array();

        return $this->getUserProfileInformation($res_u['UserProfileId'], $UserProfileId);
    }

    public function getSubLeaderProfileInformation($UserId, $UserProfileId) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('UserId', $UserId);
        $this->db->where('UserTypeId', 3);
        $query = $this->db->get();
        $res_u = $query->result_array();

        $sub_leader = array();

        foreach($res_u AS $key => $result) {
            $sub_leader[] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
        }

        return $sub_leader;
    }


    public function searchCitizenProfiles($UserProfileId, $search) {
        if(is_array($search)) {
            $this->db->select('UserProfileId, UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where("UserProfileId != ", $UserProfileId);
            $this->db->where('UserTypeId', 1);
            $this->db->where('ProfileStatus', 1);
            foreach($search AS $search_text) {
                $this->db->group_start();
                $this->db->or_like('FirstName', $search_text);
                $this->db->or_like('LastName', $search_text);
                $this->db->or_like('Email', $search_text);
                $this->db->group_end();
            }
            $this->db->order_by('FirstName');
            $query = $this->db->get();
            $res_u = $query->result_array();


        } else {
            $this->db->select('UserProfileId, UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('UserTypeId', 1);
            $this->db->where('ProfileStatus', 1);
            $this->db->where("UserProfileId != ", $UserProfileId);
            $this->db->group_start();
            $this->db->or_like('FirstName', $search);
            $this->db->or_like('LastName', $search);
            $this->db->or_like('Email', $search);
            $this->db->group_end();
            $this->db->order_by('FirstName');
            $query = $this->db->get();
            $res_u = $query->result_array();
        }

        $user_profiles = array();
        foreach($res_u AS $key => $result) {
            $user_profiles['UserProfileCitizen'][] = $this->getUserDetailCitizen($result['UserId'], $UserProfileId);
        }
        return $user_profiles;
    }


    public function searchLeaderProfiles($UserProfileId, $search) {
        if(is_array($search)) {
            $this->db->select('UserProfileId, UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where("UserProfileId != ", $UserProfileId);
            $this->db->where('UserTypeId', 2);
            $this->db->where('ProfileStatus', 1);
            foreach($search AS $search_text) {
                $this->db->group_start();
                $this->db->or_like('FirstName', $search_text);
                $this->db->or_like('LastName', $search_text);
                $this->db->or_like('Email', $search_text);
                $this->db->group_end();
            }
            $this->db->order_by('FirstName');
            $query = $this->db->get();
            $res_u = $query->result_array();


        } else {
            $this->db->select('UserProfileId, UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('UserTypeId', 2);
            $this->db->where('ProfileStatus', 1);
            $this->db->where("UserProfileId != ", $UserProfileId);
            $this->db->group_start();
            $this->db->or_like('FirstName', $search);
            $this->db->or_like('LastName', $search);
            $this->db->or_like('Email', $search);
            $this->db->group_end();
            $this->db->order_by('FirstName');
            $query = $this->db->get();
            $res_u = $query->result_array();
        }

        $user_profiles = array();
        foreach($res_u AS $key => $result) {

            $MyFavouriteLeaderYesNo = 0;
            $MyFavouriteLeader = $this->checkUserSetAsFavourite($UserProfileId, $result['UserProfileId']);
            if($MyFavouriteLeader != false) {
                $MyFavouriteLeaderYesNo = 1;
            }

            $leader_detail = $this->getUserDetailLeader($result['UserId'], $UserProfileId);

            $leader_detail = array_merge($leader_detail, array('MyFavouriteLeader' => $MyFavouriteLeaderYesNo));


            $user_profiles['UserProfileLeader'][] = $leader_detail;
        }
        return $user_profiles;
    }


    public function searchSubLeaderProfiles($UserProfileId, $search) {
        if(is_array($search)) {
            $this->db->select('UserProfileId, UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where("UserProfileId != ", $UserProfileId);
            $this->db->where('UserTypeId', 3);
            $this->db->where('ProfileStatus', 1);
            foreach($search AS $search_text) {
                $this->db->group_start();
                $this->db->or_like('FirstName', $search_text);
                $this->db->or_like('LastName', $search_text);
                $this->db->or_like('Email', $search_text);
                $this->db->group_end();
            }
            $this->db->order_by('FirstName');
            $query = $this->db->get();
            $res_u = $query->result_array();


        } else {
            $this->db->select('UserProfileId, UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('UserTypeId', 3);
            $this->db->where('ProfileStatus', 1);
            $this->db->where("UserProfileId != ", $UserProfileId);
            $this->db->group_start();
            $this->db->or_like('FirstName', $search);
            $this->db->or_like('LastName', $search);
            $this->db->or_like('Email', $search);
            $this->db->group_end();
            $this->db->order_by('FirstName');
            $query = $this->db->get();
            $res_u = $query->result_array();
        }

        $user_profiles = array();
        foreach($res_u AS $key => $result) {
            $user_profiles['UserProfileSubLeader'][] = $this->getUserDetailSubLeader($result['UserId'], $UserProfileId);
        }
        return $user_profiles;
    }


    public function searchAllUserProfiles($UserProfileId, $search) {
        if(is_array($search)) {
            $this->db->select('UserProfileId, UserTypeId, UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where("UserProfileId != ", $UserProfileId);
            $this->db->where('ProfileStatus', 1);
            foreach($search AS $search_text) {
                $this->db->group_start();
                $this->db->or_like('FirstName', $search_text);
                $this->db->or_like('LastName', $search_text);
                $this->db->or_like('Email', $search_text);
                $this->db->group_end();
            }
            $this->db->order_by('FirstName');
            $query = $this->db->get();
            $res_u = $query->result_array();


        } else {
            $this->db->select('UserProfileId, UserTypeId, UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('ProfileStatus', 1);
            $this->db->where("UserProfileId != ", $UserProfileId);
            $this->db->group_start();
            $this->db->or_like('FirstName', $search);
            $this->db->or_like('LastName', $search);
            $this->db->or_like('Email', $search);
            $this->db->group_end();
            $this->db->order_by('FirstName');
            $query = $this->db->get();
            $res_u = $query->result_array();
        }

        $user_profiles = array();
        foreach($res_u AS $key => $result) {
            if($result['UserTypeId'] == 1) {
                $user_profiles['UserProfileCitizen'][] = $this->getUserDetailCitizen($result['UserId'], $UserProfileId);
            } else if($result['UserTypeId'] == 2) {
                $user_profiles['UserProfileLeader'][] = $this->getUserDetailLeader($result['UserId'], $UserProfileId);
            } else if($result['UserTypeId'] == 3) {
                $user_profiles['UserProfileSubLeader'][] = $this->getUserDetailSubLeader($result['UserId'], $UserProfileId);
            }
        }
        return $user_profiles;
    }


    public function returnUserDetail($res_u, $user_profile_id = 0) {
        $UserId             = $res_u['UserId'];
        $UserUniqueId       = $res_u['UserUniqueId'];
        
        $LoginDeviceToken   = (($res_u['LoginDeviceToken'] != NULL) ? $res_u['LoginDeviceToken'] : "");
        $UserStatus         = $res_u['UserStatus'];
        $LoginStatus        = $res_u['LoginStatus'];
        
        $UserName           = (($res_u['UserName'] != NULL) ? $res_u['UserName'] : "");
        $UserEmail          = (($res_u['UserEmail'] != NULL) ? $res_u['UserEmail'] : "");
        $UserMobile         = (($res_u['UserMobile'] != NULL) ? $res_u['UserMobile'] : "");
        $AddedOn            = return_time_ago($res_u['AddedOn']);
        $UpdatedOn          = return_time_ago($res_u['UpdatedOn']);       

        $user_data_array = array(
                                "UserId"                => $UserId,
                                "UserUniqueId"          => $UserUniqueId,
                                "LoginDeviceToken"      => $LoginDeviceToken,
                                "UserStatus"            => $UserStatus,
                                "LoginStatus"           => $LoginStatus,
                                "UserName"              => $UserName,
                                "UserEmail"             => $UserEmail,
                                "UserMobile"            => $UserMobile,
                                "AddedOn"               => $AddedOn,
                                "AddedOnTime"           => $res_u['AddedOn'],
                                "UpdatedOn"             => $UpdatedOn,
                                "UpdatedOnTime"         => $res_u['UpdatedOn'],
                                "DateOfBirth"           => (($res_u['DateOfBirth'] != NULL) ? $res_u['DateOfBirth'] : ""),
                                "Gender"                => (($res_u['Gender'] != NULL) ? $res_u['Gender'] : ""),
                                "ProfilePhotoId"        => (($res_u['ProfilePhotoId'] != NULL) ? $res_u['ProfilePhotoId'] : ""),
                                "ProfilePhotoPath"      => (($res_u['UserProfilePhoto'] != NULL) ? PROFILE_IMAGE_URL.$res_u['UserProfilePhoto'] : ""),
                                "CoverPhotoId"          => (($res_u['CoverPhotoId'] != NULL) ? $res_u['CoverPhotoId'] : ""),
                                "CoverPhotoPath"        => (($res_u['UserCoverPhoto'] != NULL) ? PROFILE_IMAGE_URL.$res_u['UserCoverPhoto'] : ""),
                                "FacebookProfileId"     => (($res_u['FacebookProfileId'] != NULL) ? $res_u['FacebookProfileId'] : ""),
                                "GoogleProfileId"       => (($res_u['GoogleProfileId'] != NULL) ? $res_u['GoogleProfileId'] : ""),
                                "LinkedinProfileId"     => (($res_u['LinkedinProfileId'] != NULL) ? $res_u['LinkedinProfileId'] : ""),
                                );
        return $user_data_array;
    }

    
    public function userMobileOtpValidate($mobile, $otp) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->where('LoginOtpValidTill >= ', date('Y-m-d H:i:s'));
        $this->db->where('LoginOtp', $otp);
        $this->db->limit(1);

        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }


    public function userMobileResetcodeValidate($mobile, $reset_code) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->where('ResetPasswordCodeValidTill >= ', date('Y-m-d H:i:s'));
        $this->db->where('ResetPasswordCode', $reset_code);
        $this->db->limit(1);

        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    
    public function insertUserLog($insertData) {
        $this->db->insert($this->userLogTbl, $insertData);
        if($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }


    public function insertUser($insertData) {
        $this->db->insert($this->userTbl, $insertData);

        return $this->db->insert_id();
    }


    public function insertUserProfile($insertData) {
        $this->db->insert($this->userProfileTbl, $insertData);

        return $this->db->insert_id();
    }


    public function validateUserSocialProfileLogin($id, $social_type) {

        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);        

        if($social_type == "facebook") { // FACEBOOK
            $this->db->where('FacebookProfileId', $id);
        } else if($social_type == "google") { // GOOGLE
            $this->db->where('GoogleProfileId', $id);
        } else if($social_type == "twitter") { // TWITTER
            $this->db->where('TwitterProfileId', $id);
        } else if($social_type == "linkedin") { // LINKEDIN
            $this->db->where('LinkedinProfileId', $id);
        }
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return ($result);
        } else {
            return false;
        }
    }


    public function getUserInformation($UserId) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserId', $UserId);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }


    public function isUserMobileExist($mobile) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }


    public function isUserEmailExist($email) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserEmail', $email);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }


    public function createUserAlbum($UserId, $photoTitle, $photoDescription) {

        $this->db->select('UserAlbumId');
        $this->db->from($this->userAlbumTbl);
        $this->db->where('UserId', $UserId);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        if($result['UserAlbumId'] > 0) {
            $album_id = $result['UserAlbumId'];
        } else {

            $insertData = array(
                    'UserId'            => $UserId,
                    'AlbumName'         => $photoTitle,
                    'AlbumDescription'  => $photoDescription,
                    'PrivacyType'       => 1,
                    'AlbumStatus'       => 1,
                    'AddedOn'           => date('Y-m-d H:i:s'),
                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                );
            $this->db->insert($this->userAlbumTbl, $insertData);

            $album_id = $this->db->insert_id();
        }
        return $album_id;
    }


    public function insertUserPhoto($UserId, $album_id, $profile_image, $photoTitle, $photoDescription) {
        $insertData = array(
                            'UserId'            => $UserId,
                            'UserAlbumId'       => $album_id,
                            'PhotoPath'         => $profile_image,
                            'PhotoStatus'       => 1,
                            'AddedOn'           => date('Y-m-d H:i:s'),
                            'UpdatedOn'         => date('Y-m-d H:i:s'),
                        );
        $this->db->insert($this->userPhotoTbl, $insertData);

        $photo_id = $this->db->insert_id();

        return $photo_id;
    }


    public function autoGenerateUserName() {
        $UserName = "kaajneeti".time();
        $this->db->select('UserId');
        $this->db->from($this->userTbl);
        $this->db->where('UserName', $UserName);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->autoGenerateUserName();
        }
        return $UserName;
    }


    public function autoGenerateUserUniqueId() {
        $UserUniqueId = mt_rand().time().rand();
        $this->db->select('UserId');
        $this->db->from($this->userTbl);
        $this->db->where('UserUniqueId', $UserUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->autoGenerateUserUniqueId();
        }
        return $UserUniqueId;
    }


    public function autoGenerateResetPasswordCode() {
        $ResetPasswordCode = mt_rand().time().rand();
        $this->db->select('UserId');
        $this->db->from($this->userTbl);
        $this->db->where('ResetPasswordCode', $ResetPasswordCode);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->autoGenerateResetPasswordCode();
        }
        return $ResetPasswordCode;
    }


    public function saveUserPhoto($photo_cover = 'photo', $UserId, $profile_or_cover = 1) {

        $photo_id = 0;
        $profile_file = basename($_FILES[$photo_cover]['name']);
        if($profile_file != '') {
            $profile_image = date('YmdHisA').'-'.time().'-PROFILE-'.mt_rand().'.'.end(explode('.', $profile_file));

            $path = PROFILE_IMAGE_DIR.$profile_image;
            $source = $_FILES[$photo_cover]['tmp_name'];

            $upload_result = uploadFileOnServer($source, $path);

            // Create album and save that photo
            if($profile_or_cover == 1) {
                $photoTitle = 'Profile';
                $photoDescription = 'My Profile';
            } else if($profile_or_cover == 2) {
                $photoTitle = 'Cover';
                $photoDescription = 'My Cover Photo';
            }
            $album_id = $this->createUserAlbum($UserId, $photoTitle, $photoDescription);

            $photo_id = $this->insertUserPhoto($UserId, $album_id, $profile_image, $photoTitle, $photoDescription);

            if($profile_or_cover == 1) {
                $updateData = array(
                                    'ProfilePhotoId' => $photo_id,
                                    'UpdatedOn' => date('Y-m-d H:i:s'),
                                    );
            }
            if($profile_or_cover == 2) {
                $updateData = array(
                                    'CoverPhotoId' => $photo_id,
                                    'UpdatedOn' => date('Y-m-d H:i:s'),
                                    );
            }
            $this->updateUserData($UserId, $updateData);
            
        }
        return $photo_id;
    }

    
    public function getUserCitizenDashboard($UserId) {
        $user_dashboard[] = array(
                                    'UserId' => 1,
                                    'UserName' => 'rajesh1may',
                                    'UserEmail' => 'rajesh1may@gmail.com',
                                    'StatusUpdatedOn' => 'Just Now',
                                    'PostTitle' => '',
                                    'UserId' => 1,
                                    'UserId' => 1,
                                    'UserId' => 1,
                                    );
    }

    
    public function isExistUserMobile($mobile, $UserId) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->where('UserId != ', $UserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return false;
        }
    }


    public function isExistUserEmail($email, $UserId) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserEmail', $email);
        $this->db->where('UserId != ', $UserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return false;
        }
    }


    public function isExistUserAndUserProfileMobile($mobile, $UserId) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->where('UserId != ', $UserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            $this->db->select('UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('UserId != ', $UserId);
            $this->db->group_start();
            $this->db->where('Mobile', $mobile);
            $this->db->or_where('AltMobile', $mobile);
            $this->db->group_end();
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $result = $query->row_array();
            } else {
                return false;
            }
        }
    }


    public function isExistUserAndUserProfileEmail($email, $UserId) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserEmail', $email);
        $this->db->where('UserId != ', $UserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            $this->db->select('UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('Email', $email);
            $this->db->where('UserId != ', $UserId);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $result = $query->row_array();
            } else {
                return false;
            }
        }
    }


    public function isExistUserAndUserProfileAltMobile($alt_mobile, $UserId) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserEmail', $alt_mobile);
        $this->db->where('UserId != ', $UserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            $this->db->select('UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('UserId != ', $UserId);
            $this->db->group_start();
            $this->db->where('Mobile', $alt_mobile);
            $this->db->or_where('AltMobile', $alt_mobile);
            $this->db->group_end();
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $result = $query->row_array();
            } else {
                return false;
            }
        }
    }



    public function existResetPasswordCode($resetpassword) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('ResetPasswordCode', $resetpassword);
        $this->db->where('ResetPasswordCodeValidTill >=', date('Y-m-d H:i:s'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return false;
        }
    }


    public function checkUserSetAsFavourite($UserProfileId, $FriendUserProfileId) {
        $this->db->select('UserProfileId, FriendUserProfileId');
        $this->db->from($this->userFavUserTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return false;
        }
    }


    public function checkUserFriendRequest($UserProfileId, $FriendUserProfileId) {
        /*$this->db->select('UserProfileId, FriendUserProfileId');
        $this->db->from($this->UserFriendTbl);
        $this->db->group_start();
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $this->db->group_end();
        $this->db->or_group_start();
        $this->db->where('UserProfileId', $FriendUserProfileId);
        $this->db->where('FriendUserProfileId', $UserProfileId);
        $this->db->group_end();*/

        $this->db->select('UserProfileId, FriendUserProfileId, RequestAccepted');
        $this->db->from($this->UserFriendTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return false;
        }
    }


    public function acceptUserFriendRequest($UserProfileId, $FriendUserProfileId) {

        $insertData = array(
                            'UserProfileId'         => $UserProfileId,
                            'FriendUserProfileId'   => $FriendUserProfileId,
                            'RequestSentOn'         => date('Y-m-d H:i:s'),
                            'RequestAccepted'       => '1',
                            'RequestAcceptedOn'     => date('Y-m-d H:i:s'),
                            );
        $this->db->insert($this->UserFriendTbl, $insertData);

        $updateData = array(
                            'RequestAccepted'       => '1',
                            'RequestAcceptedOn'     => date('Y-m-d H:i:s'),
                            );
        $this->db->where('UserProfileId', $FriendUserProfileId);
        $this->db->where('FriendUserProfileId', $UserProfileId);
        $this->db->update($this->UserFriendTbl, $updateData);

        return true;
    }

    public function sendUserFriendRequest($UserProfileId, $FriendUserProfileId) {
        $insertData = array(
                            'UserProfileId'         => $UserProfileId,
                            'FriendUserProfileId'   => $FriendUserProfileId,
                            'RequestSentOn'         => date('Y-m-d H:i:s'),
                            'RequestAccepted'       => '0',
                            );
        $this->db->insert($this->UserFriendTbl, $insertData);
        return true;
    }

    public function deleteUserFriendRequest($UserProfileId, $FriendUserProfileId) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $this->db->delete($this->UserFriendTbl);

        $this->db->where('UserProfileId', $FriendUserProfileId);
        $this->db->where('FriendUserProfileId', $UserProfileId);
        $this->db->delete($this->UserFriendTbl);

        return true;
    }


    public function cancelUserFriendRequest($UserProfileId, $FriendUserProfileId) {

        $updateData = array(
                            'RequestAccepted'      => '2',
                            'RequestDeletedOn'     => date('Y-m-d H:i:s'),
                            );
        $this->db->where('UserProfileId', $FriendUserProfileId);
        $this->db->where('FriendUserProfileId', $UserProfileId);
        $this->db->update($this->UserFriendTbl, $updateData);

        return true;
    }


    public function undoUserProfileFriendRequest($UserProfileId, $FriendUserProfileId) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $this->db->delete($this->UserFriendTbl);

        return true;
    }


    public function insertUserFavUser($insertData) {
        $this->db->insert($this->userFavUserTbl, $insertData);

        return $this->db->insert_id();
    }


    public function deleteUserFavUser($UserProfileId, $FriendUserProfileId) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $this->db->delete($this->userFavUserTbl);
    }


    public function getMyAllFavouriteLeader($UserId, $UserProfileId) {

        $query = $this->db->query("SELECT ufu.* 
                                        FROM ".$this->userFavUserTbl." AS ufu 
                                        LEFT JOIN ".$this->userProfileTbl." up ON ufu.FriendUserProfileId = up.UserProfileId
                                        WHERE 
                                            ufu.`UserProfileId` = '".$UserProfileId."'
                                        AND (up.UserTypeId = '2' OR up.UserTypeId = '3')");

        $res_u = $query->result_array();

        $fav_leader = array();

        foreach($res_u AS $key => $result) {
            $fav_leader[] = $this->getUserProfileWithUserInformation($result['FriendUserProfileId'], $UserProfileId);
        }

        return $fav_leader;
    }


    public function getMyAllFriendRequest($UserProfileId) {
        $query = $this->db->query("SELECT uf.UserProfileId, uf.RequestSentOn 
                                        FROM ".$this->UserFriendTbl." AS uf 
                                        WHERE 
                                            uf.`FriendUserProfileId` = '".$UserProfileId."'
                                        AND uf.RequestAccepted = '0'
                                        ORDER BY uf.RequestSentOn DESC");

        $res_u = $query->result_array();

        $friend_requests = array();

        foreach($res_u AS $key => $result) {

            $friend_profile = $this->getUserProfileWithUserInformation($result['UserProfileId'], $UserProfileId);
            $friend_profile = array_merge($friend_profile, array('RequestSentOn' => $result['RequestSentOn']));
            $friend_requests[] = $friend_profile;
        }

        return $friend_requests;
    }

    public function getMyAllRequestToFriends($UserProfileId) {
        $query = $this->db->query("SELECT uf.FriendUserProfileId, uf.RequestSentOn 
                                        FROM ".$this->UserFriendTbl." AS uf 
                                        WHERE 
                                            uf.`UserProfileId` = '".$UserProfileId."'
                                        AND uf.RequestAccepted = '0' 
                                        ORDER BY uf.RequestSentOn DESC");

        $res_u = $query->result_array();

        $request_friends = array();

        foreach($res_u AS $key => $result) {
            $friend_profile = $this->getUserProfileWithUserInformation($result['FriendUserProfileId'], $UserProfileId);
            $friend_profile = array_merge($friend_profile, array('RequestSentOn' => $result['RequestSentOn']));
            $request_friends[] = $friend_profile;
        }

        return $request_friends;
    }


    public function getMyAllFriends($UserProfileId) {
        $query = $this->db->query("SELECT uf.FriendUserProfileId 
                                        FROM ".$this->UserFriendTbl." AS uf 
                                        WHERE 
                                            uf.`UserProfileId` = '".$UserProfileId."'
                                        AND uf.RequestAccepted = '1' 
                                        ORDER BY uf.RequestAcceptedOn DESC");

        $res_u = $query->result_array();

        $friends = array();

        foreach($res_u AS $key => $result) {
            $friends[] = $this->getUserProfileWithUserInformation($result['FriendUserProfileId'], $UserProfileId);
        }

        return $friends;
    }


    public function sendFollowRequest($UserProfileId, $FriendUserProfileId) {
        
    }



}