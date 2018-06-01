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
        $this->UserFollowTbl        = 'UserFollow';
        $this->FriendGroupTbl       = 'FriendGroup';
        $this->FriendGroupMemberTbl = 'FriendGroupMember';

        $this->UserRoleTbl              = 'UserRole';
        $this->UserRolePermissionTbl    = 'UserRolePermission';

        $this->UserProfileAddressTbl    = 'UserProfileAddress';
        $this->UserProfileEducationTbl  = 'UserProfileEducation';
        $this->UserProfileWorkTbl       = 'UserProfileWork';

        $this->genderTbl            = 'Gender';
        $this->politicalPartyTbl    = 'PoliticalParty';
        $this->DepartmentTbl        = 'Department';

        $this->SearchDataTbl        = 'SearchData';


        $this->AdminTbl             = 'Admin';
    }


    // Verify Admin Username and Password
    public function verifyAdminUsernamePassword($username, $password) {
        $query = $this->loginAdminUsernamePassword($username, $password);
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


    // Admin Login with username with password
    public function loginAdminUsernamePassword($username, $password) {
        $this->db->select('AdminId, UserStatus');
        $this->db->from($this->AdminTbl);
        $this->db->where('UserName', $username);
        $this->db->where('UserPassword', md5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
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


    // Verify Team Username and Password
    public function verifyTeamUsernamePassword($username, $password, $login_type) {

        if($login_type == 0) {

        }
        $this->db->select('*');
        $this->db->from($this->userProfileTbl);
        $this->db->where('ProfileUserName', $username);
        $this->db->where('ProfileUserPassword', md5($password));
        //$this->db->where('UserTypeId', $login_type);
        $this->db->limit(1);
        $query = $this->db->get();

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


    // Login Mobile With Pin
    public function loginMobileMpin($mobile, $mpin) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->where('UserMpin', $mpin);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    // Verify Mobile Mpin
    public function verifyMobileMpin($mobile, $mpin) {
        $query = $this->loginMobileMpin($mobile, $mpin);
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return ($result);
        } else {
            return false;
        }
    }

    // Mobile Exist for user 
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

    // Username exist for user
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

    // User Mobile with Mpin exist
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

    // User Exist username email mobile
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


    // Get All System User
    public function getAllSystemUser($AdminId) {
        $users = array();
        if($AdminId > 0) {

            $this->db->select('UserId');
            $this->db->from($this->userTbl);
            $this->db->order_by('AddedOn', 'DESC');
            $query = $this->db->get();
            $res = $query->result_array();
            if ($query->num_rows() > 0) {
                foreach($res AS $key => $result) {
                    $users[] = $this->getOnlyUserDetail($result['UserId']);
                }
                return $users;
            } else {
                return $users;
            }

        } else {
            return $users;
        }
    }


    // Get All Active User Profiles
    public function getAllActiveUserProfiles($UserProfileId, $ToGetByType = 1) {
        $users = array();
        
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('UserTypeId', $ToGetByType);
        $this->db->where('ProfileStatus', 1);
        $this->db->order_by('AddedOn', 'DESC');
        $query = $this->db->get();
        $res = $query->result_array();
        if ($query->num_rows() > 0) {
            foreach($res AS $key => $result) {
                $users[] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
            }
            
        }
        return $users;
    }

    // Get All Active User Profiles
    public function getAllInactiveUserProfiles($UserProfileId, $ToGetByType = 1) {
        $users = array();
        
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('UserTypeId', $ToGetByType);
        $this->db->where('ProfileStatus', 0);
        $this->db->order_by('AddedOn', 'DESC');
        $query = $this->db->get();
        $res = $query->result_array();
        if ($query->num_rows() > 0) {
            foreach($res AS $key => $result) {
                $users[] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
            }
            
        }
        return $users;
    }



    public function getOnlyUserDetail($UserId) {
        $query = $this->db->query("SELECT u.*, uph.PhotoPath AS UserProfilePhoto, uch.PhotoPath AS UserCoverPhoto 
                                                    FROM ".$this->userTbl." AS u 
                                                    LEFT JOIN ".$this->userPhotoTbl." uph ON u.ProfilePhotoId = uph.UserPhotoId
                                                    LEFT JOIN ".$this->userPhotoTbl." uch ON u.CoverPhotoId = uch.UserPhotoId
                                                    WHERE 
                                                        u.`UserId` = '".$UserId."'");

        $res_u = $query->row_array();

        $user_detail = $this->returnUserDetail($res_u);

        return $user_detail;
    }

    // Get User Detail [$FriendUserId, $UserProfileId, $full information]
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

    // Get User Deatail of Citizen
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

    // Get user detail of Leader
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

    // Get User Detail SubLeader
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


    public function getUserFullInformationByUniqueId($UserUniqueId) {
        $this->db->select('u.*, uph.PhotoPath AS UserProfilePhoto, uch.PhotoPath AS UserCoverPhoto');
        $this->db->from($this->userTbl.' AS u');
        $this->db->join($this->userPhotoTbl.' AS uph', 'u.ProfilePhotoId = uph.UserPhotoId', 'LEFT');
        $this->db->join($this->userPhotoTbl.' AS uch', 'u.CoverPhotoId = uch.UserPhotoId', 'LEFT');
        $this->db->where('u.UserUniqueId', $UserUniqueId);
        $query = $this->db->get();
        $res_u = $query->row_array();
        $user_detail = $this->returnUserDetail($res_u);

        return $user_detail;
    }

    // Get user Detail All [Citizen, Leader, Sub Leader]
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

    // Get User Profile User Information
    public function getUserProfileWithUserInformation($FriendUserProfileId, $UserProfileId) {
        $profile = $this->getUserProfileInformation($FriendUserProfileId, $UserProfileId);
        $detail = $this->getUserDetail($profile['UserId'], $UserProfileId, 0);

        $return['user_profile_detail'] = array(
                                'user_info' => $detail,
                                'profile' => $profile,
                            );

        return $return;
    }


    // Get User Profile User Information by Unique Id and Profile Id
    public function getUserprofileFriendsprofileInformationUniqueIdCheck($UserUniqueId, $FriendUserProfileId, $UserProfileId) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl.' AS up');
        $this->db->join($this->userTbl.' AS u', 'up.UserId = u.UserId', 'LEFT');
        $this->db->where('up.UserProfileId', $FriendUserProfileId);
        $this->db->where('u.UserUniqueId', $UserUniqueId);
        $query = $this->db->get();
        $res_u = $query->row_array();

        $user_profile = array();
        if($res_u['UserProfileId'] > 0) {
            $user_profile = $this->getUserProfileInformation($res_u['UserProfileId'], $UserProfileId);
        }
        return $user_profile;
    }

    // Get user profile information by unique id
    public function getUserprofileByUniqueProfileId($UserUniqueId, $UserProfileId, $user_type = 1) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl.' AS up');
        $this->db->join($this->userTbl.' AS u', 'up.UserId = u.UserId', 'LEFT');
        $this->db->where('u.UserUniqueId', $UserUniqueId);
        $this->db->where('up.UserTypeId', $user_type);
        $query = $this->db->get();
        $res_u = $query->row_array();

        $user_profile = array();
        if($res_u['UserProfileId'] > 0) {
            $user_profile = $this->getUserProfileInformation($res_u['UserProfileId'], $UserProfileId);
        }
        return $user_profile;
    }


    public function getUserProfileDeviceTokenFromUserProfileIds($UserProfileId) {
        $user_device_token = array();
        if(is_array($UserProfileId)) {
            foreach($UserProfileId AS $user_profile_id) {
                $this->db->select('UserProfileDeviceToken');
                $this->db->from($this->userProfileTbl);
                $this->db->where('UserProfileId', $user_profile_id);
                $query = $this->db->get();
                $res_u = $query->row_array();
                if($res_u['UserProfileDeviceToken'] != '') {
                    $user_device_token[] = $res_u['UserProfileDeviceToken'];
                }
            }
        } else {
            $this->db->select('UserProfileDeviceToken');
            $this->db->from($this->userProfileTbl);
            $this->db->where('UserProfileId', $UserProfileId);
            $query = $this->db->get();
            $res_u = $query->row_array();
            if($res_u['UserProfileDeviceToken'] != '') {
                $user_device_token[] = $res_u['UserProfileDeviceToken'];
            }
        }
        return $user_device_token;
    }


    public function getMyTotalConnections($UserProfileId, $for_type = 1, $total_or_list = 0, $RequestAccepted = 1) {

        if($total_or_list == 0) {
            $this->db->select('COUNT(uf.UserFriendId) AS TotalConnection');
        } else {
            $this->db->select('uf.FriendUserProfileId');
        }
        $this->db->from($this->UserFriendTbl. ' AS uf');
        $this->db->join($this->userProfileTbl .' AS up' , 'uf.FriendUserProfileId = up.UserProfileId', 'LEFT');
        $this->db->where('uf.UserProfileId', $UserProfileId);
        $this->db->where('uf.RequestAccepted', $RequestAccepted);
        
        if($for_type == 0) {
            $this->db->where('up.UserTypeId != ', 0);
        } else if($for_type > 0 && $for_type < 3) {
            $this->db->where('up.UserTypeId', $for_type);
        } else if($for_type > 2) {
            $this->db->where('up.UserTypeId > ', 2);
        }
        $this->db->order_by('uf.RequestAcceptedOn', 'DESC');

        $query = $this->db->get();
        
        if($total_or_list == 0) {
            $res_u = $query->row_array();

            if($res_u['TotalConnection'] > 0) {
                return $res_u['TotalConnection'];
            } else {
                return 0;
            }
        } else {
            $users = array();
            $res_u = $query->result_array();

            foreach($res_u AS $connections) {
                $users[] = $this->getUserProfileInformation($connections['FriendUserProfileId'], $UserProfileId);
            }
            return $users;
        }
    }

    public function getMyTotalFollowers($UserProfileId, $total_or_list = 0) {
        
        if($total_or_list == 0) {
            $this->db->select('COUNT(uf.UserFriendId) AS TotalConnection');
        } else {
            $this->db->select('uf.UserProfileId');
        }
        $this->db->from($this->UserFollowTbl. ' AS uf');
        $this->db->join($this->userProfileTbl .' AS up' , 'uf.UserProfileId = up.UserProfileId', 'LEFT');
        $this->db->where('uf.FollowUserProfileId', $UserProfileId);
        $this->db->order_by('uf.FollowOn', 'DESC');

        $query = $this->db->get();

        if($total_or_list == 0) {
            $res_u = $query->row_array();

            if($res_u['TotalConnection'] > 0) {
                return $res_u['TotalConnection'];
            } else {
                return 0;
            }
        } else {
            $users = array();
            $res_u = $query->result_array();
            foreach($res_u AS $connections) {
                $users[] = $this->getUserProfileInformation($connections['UserProfileId'], $UserProfileId);
            }
            return $users;
        }
    }


    public function getMyTotalFriendGroup($UserProfileId, $total_or_list = 0) {
        
        if($total_or_list == 0) {
            $this->db->select('COUNT(fg.FriendGroupId) AS TotalConnection');
        } else {
            $this->db->select('fg.FriendGroupId');
        }
        $this->db->from($this->FriendGroupTbl.' AS fg');
        $this->db->join($this->FriendGroupMemberTbl.' AS fgm', 'fgm.FriendGroupId = fg.FriendGroupId', 'LEFT');
        $this->db->where('fgm.UserProfileId', $UserProfileId);
        $this->db->order_by('fgm.AddedOn','DESC');
        $query = $this->db->get();

        if($total_or_list == 0) {
            $res_u = $query->row_array();

            if($res_u['TotalConnection'] > 0) {
                return $res_u['TotalConnection'];
            } else {
                return 0;
            }
        } else {
            $friend_group = array();

            $res_u = $query->result_array();
            foreach($res_u AS $key => $result) {
                $friend_group[] = $this->getFriendgroupDetail($result['FriendGroupId'], $UserProfileId);
            }
            return $friend_group;
        }
    }


    public function getMyTotalFollowings($UserProfileId, $total_or_list = 0) {
        
        if($total_or_list == 0) {
            $this->db->select('COUNT(uf.UserFriendId) AS TotalConnection');
        } else {
            $this->db->select('uf.FollowUserProfileId');
        }
        $this->db->from($this->UserFollowTbl. ' AS uf');
        $this->db->join($this->userProfileTbl .' AS up' , 'uf.FollowUserProfileId = up.UserProfileId', 'LEFT');
        $this->db->where('uf.UserProfileId', $UserProfileId);
        $this->db->order_by('uf.FollowOn', 'DESC');

        $query = $this->db->get();

        if($total_or_list == 0) {
            $res_u = $query->row_array();

            if($res_u['TotalConnection'] > 0) {
                return $res_u['TotalConnection'];
            } else {
                return 0;
            }
        } else {
            $users = array();
            $res_u = $query->result_array();
            foreach($res_u AS $connections) {
                $users[] = $this->getUserProfileInformation($connections['FollowUserProfileId'], $UserProfileId);
            }
            return $users;
        }
    }

    public function updateMyProfileTeam($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->userProfileTbl, $updateData);

        return $this->db->affected_rows();
    }


    // Get User Profile Information
    public function getUserProfileInformation($FriendUserProfileId, $UserProfileId = 0) {

        $query = $this->db->query("SELECT up.*, ur.RoleName, d.DepartmentName, pp.PoliticalPartyName, 
                                            uph.PhotoPath AS UserProfilePhoto, 
                                            uch.PhotoPath AS UserCoverPhoto,
                                            u.UserUniqueId  
                                        FROM ".$this->userProfileTbl." AS up 
                                        LEFT JOIN ".$this->politicalPartyTbl." AS pp ON up.PoliticalPartyId = pp.PoliticalPartyId
                                        LEFT JOIN ".$this->DepartmentTbl." AS d ON up.UserDepartment = d.DepartmentId
                                        LEFT JOIN ".$this->userPhotoTbl." uph ON up.ProfilePhotoId = uph.UserPhotoId
                                        LEFT JOIN ".$this->userPhotoTbl." uch ON up.CoverPhotoId = uch.UserPhotoId
                                        LEFT JOIN ".$this->UserRoleTbl." ur ON up.UserRoleId = ur.UserRoleId
                                        LEFT JOIN ".$this->userTbl." u ON up.UserId = u.UserId
                                        WHERE 
                                            up.`UserProfileId` = '".$FriendUserProfileId."'");

        $res_u = $query->row_array();

        $ParentUserProfileInformation = array();
        if($res_u['ParentUserProfileId'] > 0) {
            $ParentUserProfileInformation = $this->getUserProfileInformation($res_u['ParentUserProfileId'], $UserProfileId);
        }

        $MyTotalConnections         = $this->getMyTotalConnections($FriendUserProfileId, 0, 0, 1);
        $MyTotalCitizenConnections  = $this->getMyTotalConnections($FriendUserProfileId, 1, 0, 1);
        $MyTotalLeaderConnections   = $this->getMyTotalConnections($FriendUserProfileId, 2, 0, 1);
        $MyTotalOtherConnections    = $this->getMyTotalConnections($FriendUserProfileId, 3, 0, 1);
        
        $MyTotalIncomingConnections    = $this->getMyAllFriendRequest($FriendUserProfileId, 1);
        $MyTotalOutgoingConnections    = $this->getMyAllRequestToFriends($FriendUserProfileId, 1);


        $MyTotalFollowers           = $this->getMyTotalFollowers($FriendUserProfileId, 0);
        $MyTotalFollowings          = $this->getMyTotalFollowings($FriendUserProfileId, 0);
        
        $MyTotalGroupWithAssociated = $this->getMyTotalFriendGroup($FriendUserProfileId, 0);


        $user_data_array = array(
                                "UserProfileId"                 => (($res_u['UserProfileId'] != NULL) ? $res_u['UserProfileId'] : ""),
                                "UserUniqueId"                  => (($res_u['UserUniqueId'] != NULL) ? $res_u['UserUniqueId'] : ""),
                                "UserId"                        => (($res_u['UserId'] != NULL) ? $res_u['UserId'] : ""),
                                "ParentUserProfileId"           => (($res_u['ParentUserProfileId'] != NULL) ? $res_u['ParentUserProfileId'] : ""),
                                "ParentUserProfileInformation"  => $ParentUserProfileInformation,
                                "FirstName"                     => (($res_u['FirstName'] != NULL) ? $res_u['FirstName'] : ""),
                                "MiddleName"                    => (($res_u['MiddleName'] != NULL) ? $res_u['MiddleName'] : ""),
                                "LastName"                      => (($res_u['LastName'] != NULL) ? $res_u['LastName'] : ""),
                                "UserTypeId"                    => (($res_u['UserTypeId'] != NULL) ? $res_u['UserTypeId'] : ""),
                                "DateOfBirth"                   => (($res_u['DateOfBirth'] != '0000-00-00' && $res_u['DateOfBirth'] != NULL && $res_u['DateOfBirth'] != '') ? $res_u['DateOfBirth'] : ""),
                                "Gender"                        => (($res_u['Gender'] != NULL) ? $res_u['Gender'] : ""),
                                "MaritalStatus"                 => (($res_u['MaritalStatus'] != NULL) ? $res_u['MaritalStatus'] : ""),
                                "Email"                         => (($res_u['Email'] != NULL) ? $res_u['Email'] : ""),
                                "UserDepartment"                => (($res_u['UserDepartment'] != NULL) ? $res_u['UserDepartment'] : "0"),
                                "DepartmentName"                => (($res_u['DepartmentName'] != NULL) ? $res_u['DepartmentName'] : ""),
                                
                                "UserRoleId"                    => (($res_u['UserRoleId'] != NULL) ? $res_u['UserRoleId'] : ""),
                                "RoleName"                      => (($res_u['RoleName'] != NULL) ? $res_u['RoleName'] : ""),
                                "ProfileUserName"               => (($res_u['ProfileUserName'] != NULL) ? $res_u['ProfileUserName'] : ""),
                                "ProfileLoginStatus"            => (($res_u['ProfileLoginStatus'] != NULL) ? $res_u['ProfileLoginStatus'] : "0"),
                                
                                "UserProfileDeviceToken"        => (($res_u['UserProfileDeviceToken'] != NULL) ? $res_u['UserProfileDeviceToken'] : ""),
                                "PoliticalPartyId"              => (($res_u['PoliticalPartyId'] > 0) ? $res_u['PoliticalPartyId'] : "0"),
                                "PoliticalPartyName"            => (($res_u['PoliticalPartyName'] != NULL) ? $res_u['PoliticalPartyName'] : ""),
                                "Address"                       => (($res_u['Address'] != NULL) ? $res_u['Address'] : ""),
                                "City"                          => (($res_u['City'] != NULL) ? $res_u['City'] : ""),
                                "State"                         => (($res_u['State'] != NULL) ? $res_u['State'] : ""),
                                "ZipCode"                       => (($res_u['ZipCode'] != NULL) ? $res_u['ZipCode'] : ""),
                                "Country"                       => (($res_u['Country'] != NULL) ? $res_u['Country'] : ""),
                                "Mobile"                        => (($res_u['Mobile'] != NULL) ? $res_u['Mobile'] : ""),
                                "AltMobile"                     => (($res_u['AltMobile'] != NULL) ? $res_u['AltMobile'] : ""),
                                "UserBio"                       => (($res_u['UserBio'] != NULL) ? $res_u['UserBio'] : ""),
                                "ProfileStatus"                 => (($res_u['ProfileStatus'] != NULL) ? $res_u['ProfileStatus'] : ""),
                                "AddedBy"                       => (($res_u['AddedBy'] != NULL) ? $res_u['AddedBy'] : ""),
                                "UpdatedBy"                     => (($res_u['UpdatedBy'] != NULL) ? $res_u['UpdatedBy'] : ""),
                                "ProfilePhotoId"                => (($res_u['ProfilePhotoId'] != NULL) ? $res_u['ProfilePhotoId'] : ""),
                                "ProfilePhotoPath"              => (($res_u['UserProfilePhoto'] != NULL) ? PROFILE_IMAGE_URL.$res_u['UserProfilePhoto'] : ""),
                                "CoverPhotoId"                  => (($res_u['CoverPhotoId'] != NULL) ? $res_u['CoverPhotoId'] : ""),
                                "CoverPhotoPath"                => (($res_u['UserCoverPhoto'] != NULL) ? PROFILE_IMAGE_URL.$res_u['UserCoverPhoto'] : ""),
                                
                                "WebsiteUrl"                    => (($res_u['WebsiteUrl'] != NULL) ? $res_u['WebsiteUrl'] : ""),
                                "FacebookPageUrl"               => (($res_u['FacebookPageUrl'] != NULL) ? $res_u['FacebookPageUrl'] : ""),
                                "TwitterPageUrl"                => (($res_u['TwitterPageUrl'] != NULL) ? $res_u['TwitterPageUrl'] : ""),
                                "GooglePageUrl"                 => (($res_u['GooglePageUrl'] != NULL) ? $res_u['GooglePageUrl'] : ""),
                                
                                "UserProfileDeviceToken"        => (($res_u['UserProfileDeviceToken'] != NULL) ? $res_u['UserProfileDeviceToken'] : ""),
                                
                                "MyTotalConnections"            => $MyTotalConnections,
                                "MyTotalCitizenConnections"     => $MyTotalCitizenConnections,
                                "MyTotalLeaderConnections"      => $MyTotalLeaderConnections,
                                "MyTotalOtherConnections"       => $MyTotalOtherConnections,

                                "MyTotalIncomingConnections"    => $MyTotalIncomingConnections,
                                "MyTotalOutgoingConnections"    => $MyTotalOutgoingConnections,

                                "MyTotalFollowers"              => $MyTotalFollowers,
                                "MyTotalFollowings"             => $MyTotalFollowings,

                                "MyTotalGroupWithAssociated"    => $MyTotalGroupWithAssociated,

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
                    $user_data_array = array_merge($user_data_array, array('MyFriend' => 3)); // Accepted Friend Request
                } else if($friend_response['RequestAccepted'] == 2) {
                    $user_data_array = array_merge($user_data_array, array('MyFriend' => 4)); // Not to Send Request
                } else {
                    $user_data_array = array_merge($user_data_array, array('MyFriend' => 0)); // Fresh
                }

                $GetNotification = ($friend_response['GetNotification'] != '') ? $friend_response['GetNotification'] : 0;
                $user_data_array = array_merge($user_data_array, array('GetNotification' => $GetNotification)); // Get Notification
            } else {
                $friend_response = $this->checkUserFriendRequest($FriendUserProfileId, $UserProfileId);

                if($friend_response['RequestAccepted'] != '') {
                    if($friend_response['RequestAccepted'] == 0) {
                        $user_data_array = array_merge($user_data_array, array('MyFriend' => 2)); // Incoming Request
                    } else if($friend_response['RequestAccepted'] == 1) {
                        $user_data_array = array_merge($user_data_array, array('MyFriend' => 3)); // Accepted Friend Request
                    } else if($friend_response['RequestAccepted'] == 2) {
                        $user_data_array = array_merge($user_data_array, array('MyFriend' => 4)); // Not to Send Request
                    } else {
                        $user_data_array = array_merge($user_data_array, array('MyFriend' => 0)); // Fresh
                    }

                } else {
                    $user_data_array = array_merge($user_data_array, array('MyFriend' => 0)); // Fresh
                }
                $GetNotification = ($friend_response['GetNotification'] != '') ? $friend_response['GetNotification'] : 0;
                $user_data_array = array_merge($user_data_array, array('GetNotification' => $GetNotification)); // Get Notification
            }



            // Following and Follower
            $follow_response = $this->checkUserFollow($UserProfileId, $FriendUserProfileId);
            if($follow_response['UserProfileId'] > 0) {
                $user_data_array = array_merge($user_data_array, array('Following' => 1)); // Following
            } else {
                $user_data_array = array_merge($user_data_array, array('Following' => 0)); // Following
            }
            $follow_response = $this->checkUserFollow($FriendUserProfileId, $UserProfileId);
            if($follow_response['UserProfileId'] > 0) {
                $user_data_array = array_merge($user_data_array, array('Follower' => 1)); // Follower
            } else {
                $user_data_array = array_merge($user_data_array, array('Follower' => 0)); // Follower
            }

        } else {
            $user_data_array = array_merge($user_data_array, array('MyFriend' => -1)); // Self Profile
        }
        return $user_data_array;
    }

    // Get Citizen Profile Information
    public function getCitizenProfileInformation($UserId, $UserProfileId = 0) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('UserId', $UserId);
        $this->db->where('UserTypeId', 1);
        $query = $this->db->get();
        $res_u = $query->row_array();

        return $this->getUserProfileInformation($res_u['UserProfileId'], $UserProfileId);
    }

    // Get Leader Profile Information
    public function getLeaderProfileInformation($UserId, $UserProfileId = 0) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('UserId', $UserId);
        $this->db->where('UserTypeId', 2);
        $query = $this->db->get();
        $res_u = $query->row_array();

        return $this->getUserProfileInformation($res_u['UserProfileId'], $UserProfileId);
    }

    // Get Subleader profile Information
    public function getSubLeaderProfileInformation($UserId, $UserProfileId = 0) {
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

    // Search Citizen profile
    public function searchCitizenProfiles($UserProfileId, $search) {

        if(is_array($search)) {
            $this->db->select('up.UserProfileId, up.UserId');
            $this->db->from($this->userProfileTbl." AS up");
            $this->db->join($this->userTbl. " AS u", ' up.UserId = u.UserId');
            $this->db->where("up.UserProfileId != ", $UserProfileId);
            $this->db->where('up.UserTypeId', 1);
            $this->db->where('up.ProfileStatus', 1);
            foreach($search AS $search_text_key => $search_text_val) {
                if($search_text_key == "search_text") {
                    $this->db->group_start();
                    $this->db->or_like('up.FirstName', $search_text_val);
                    $this->db->or_like('up.LastName', $search_text_val);
                    $this->db->or_like('up.Email', $search_text_val);
                    $this->db->group_end();
                } else if($search_text_key == "gender") {
                    $this->db->group_start();
                    $this->db->where('u.Gender', $search_text_val);
                    $this->db->group_end();
                } else if($search_text_key == "political_party") {
                    $this->db->group_start();
                    $this->db->where('up.PoliticalPartyId', $search_text_val);
                    $this->db->group_end();
                }
            }
            $this->db->order_by('up.FirstName');
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
            $user_profiles['UserProfileCitizen'][] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
        }
        return $user_profiles;
    }

    // Search Leader Profile
    public function searchLeaderProfiles($UserProfileId, $search) {
        if(is_array($search)) {
            $this->db->select('up.UserProfileId, up.UserId');
            $this->db->from($this->userProfileTbl." AS up");
            $this->db->join($this->userTbl. " AS u", ' up.UserId = u.UserId', 'LEFT');
            $this->db->where("up.UserProfileId != ", $UserProfileId);
            $this->db->where('up.UserTypeId', 2);
            $this->db->where('up.ProfileStatus', 1);
            foreach($search AS $search_text_key => $search_text_val) {
                if($search_text_key == "search_text") {
                    $this->db->group_start();
                    $this->db->or_like('up.FirstName', $search_text_val);
                    $this->db->or_like('up.LastName', $search_text_val);
                    $this->db->or_like('up.Email', $search_text_val);
                    $this->db->group_end();
                } else if($search_text_key == "gender") {
                    $this->db->group_start();
                    $this->db->where('u.Gender', $search_text_val);
                    $this->db->group_end();
                } else if($search_text_key == "political_party") {
                    $this->db->group_start();
                    $this->db->where('up.PoliticalPartyId', $search_text_val);
                    $this->db->group_end();
                }
            }
            $this->db->order_by('up.FirstName');
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

        //die ($this->db->last_query());

        $user_profiles = array();
        foreach($res_u AS $key => $result) {

            $MyFavouriteLeaderYesNo = 0;
            $MyFavouriteLeader = $this->checkUserSetAsFavourite($UserProfileId, $result['UserProfileId']);
            if($MyFavouriteLeader != false) {
                $MyFavouriteLeaderYesNo = 1;
            }

            $leader_detail = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);

            $leader_detail = array_merge($leader_detail, array('MyFavouriteLeader' => $MyFavouriteLeaderYesNo));


            $user_profiles['UserProfileLeader'][] = $leader_detail;
        }
        return $user_profiles;
    }

    // Search SubLeader Profile
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
            $user_profiles['UserProfileSubLeader'][] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
        }
        return $user_profiles;
    }


    public function searchUserProfilesForConnect($UserProfileId, $search) {
        if(is_array($search)) {

            /*$this->db->select('UserProfileId AS ProfileId, UserTypeId, UserId');
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
            $res_u = $query->result_array();*/

            $sql = "SELECT uf.FriendUserProfileId AS ProfileId, uf.RequestSentOn AS DateSent FROM ".$this->UserFriendTbl." AS uf 
                                    LEFT JOIN ".$this->userProfileTbl." AS up ON uf.FriendUserProfileId = up.UserProfileId
                                    WHERE 
                                        up.UserProfileId != '".$UserProfileId."'";
            foreach($search AS $search_text) {
                $sql .= " AND (";
                $sql .= " up.FirstName LIKE '%".$search_text."%' ";
                $sql .= " OR up.LastName LIKE '%".$search_text."%' ";
                $sql .= " OR up.Email LIKE '%".$search_text."%' ";
                $sql .= " )";
            }
            $sql .= " UNION ";

            $sql .= "SELECT up.UserProfileId AS ProfileId, up.UpdatedOn AS DateSent FROM ".$this->userProfileTbl." AS up 
                                    WHERE 
                                        up.UserProfileId != '".$UserProfileId."'";
            foreach($search AS $search_text) {
                $sql .= " AND (";
                $sql .= " up.FirstName LIKE '%".$search_text."%' ";
                $sql .= " OR up.LastName LIKE '%".$search_text."%' ";
                $sql .= " OR up.Email LIKE '%".$search_text."%' ";
                $sql .= " )";
            }
            $sql .= " ORDER BY DateSent DESC";

            $query = $this->db->query($sql);

            $res_u = $query->result_array();


        } else {
            /*$this->db->select('UserProfileId, UserTypeId, UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('ProfileStatus', 1);
            $this->db->where("UserProfileId != ", $UserProfileId);
            $this->db->group_start();
            $this->db->or_like('FirstName', $search);
            $this->db->or_like('LastName', $search);
            $this->db->or_like('Email', $search);
            $this->db->group_end();
            $this->db->order_by('FirstName');*/

            $sql = "SELECT uf.FriendUserProfileId AS ProfileId, uf.RequestSentOn AS DateSent 
                                    FROM 
                                        ".$this->UserFriendTbl." AS uf 
                                    LEFT JOIN ".$this->userProfileTbl." AS up ON uf.FriendUserProfileId = up.UserProfileId
                                    WHERE 
                                        up.UserProfileId != '".$UserProfileId."'";
            if($search != '') {
                $sql .= " AND (";
                $sql .= " up.FirstName LIKE '%".$search."%' ";
                $sql .= " OR up.LastName LIKE '%".$search."%' ";
                $sql .= " OR up.Email LIKE '%".$search."%' ";
                $sql .= " )";
            }
            $sql .= " UNION ";

            $sql .= "SELECT up.UserProfileId AS ProfileId, up.UpdatedOn AS DateSent 
                                    FROM 
                                        ".$this->userProfileTbl." AS up 
                                    WHERE 
                                        up.UserProfileId != '".$UserProfileId."'";
            if($search != '') {
                $sql .= " AND (";
                $sql .= " up.FirstName LIKE '%".$search."%' ";
                $sql .= " OR up.LastName LIKE '%".$search."%' ";
                $sql .= " OR up.Email LIKE '%".$search."%' ";
                $sql .= " )";
            }
            $sql .= " ORDER BY DateSent DESC";

            $query = $this->db->query($sql);
            $res_u = $query->result_array();
        }

        $user_array = array();
        $user_profiles = array();
        foreach($res_u AS $key => $result) {
            if(!@in_array($result['ProfileId'], $user_array)) {
                $user_profiles[] = $this->getUserProfileInformation($result['ProfileId'], $UserProfileId);
                $user_array[] = $result['ProfileId'];
            }
        }
        return $user_profiles;
    }

    // Search All User Profiles
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

        $user_profiles['UserProfileCitizen'] = array();
        $user_profiles['UserProfileLeader'] = array();
        $user_profiles['UserProfileSubLeader'] = array();
        foreach($res_u AS $key => $result) {
            if($result['UserTypeId'] == 1) {
                $user_profiles['UserProfileCitizen'][] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
            }
            if($result['UserTypeId'] == 2) {
                $user_profiles['UserProfileLeader'][] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
            }
            if($result['UserTypeId'] == 3) {
                //$user_profiles['UserProfileSubLeader'][] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
            }
        }
        return $user_profiles;
    }

    // Return User Deatil
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

                                "MaritalStatus"         => (($res_u['MaritalStatus'] == 0) ? 0 : 1),
                                "MaritalStatusName"     => (($res_u['MaritalStatus'] == 0) ? "Un Married" : "Married"),

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

    // Validate User Mobile with OTP
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

    // Get User Mobile Reset Code Validate
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

    // Insert User Log
    public function insertUserLog($insertData) {
        $this->db->insert($this->userLogTbl, $insertData);
        if($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    // Insert User
    public function insertUser($insertData) {
        $this->db->insert($this->userTbl, $insertData);

        return $this->db->insert_id();
    }

    // Insert User Profile
    public function insertUserProfile($insertData) {
        $this->db->insert($this->userProfileTbl, $insertData);

        return $this->db->insert_id();
    }

    // Validate User Social profile for Login
    public function validateUserSocialProfileLogin($id, $social_type, $login_type = 1) {

        $this->db->select('u.*, up.*');
        $this->db->from($this->userProfileTbl.' AS up');
        $this->db->join($this->userTbl.' AS u', 'up.UserId = u.UserId', 'LEFT');        

        if($social_type == "facebook") { // FACEBOOK
            $this->db->where('up.FacebookProfileId', $id);
        } else if($social_type == "google") { // GOOGLE
            $this->db->where('up.GoogleProfileId', $id);
        } else if($social_type == "twitter") { // TWITTER
            $this->db->where('up.TwitterProfileId', $id);
        } else if($social_type == "linkedin") { // LINKEDIN
            $this->db->where('up.LinkedinProfileId', $id);
        }
        $this->db->where('up.UserTypeId', $login_type);
        $this->db->limit(1);
        $query = $this->db->get();

        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return ($result);
        } else {
            return false;
        }
    }

    // Get Admin Information
    public function getAdminInformation($AdminId) {
        $this->db->select('*');
        $this->db->from($this->AdminTbl);
        $this->db->where('AdminId', $AdminId);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    // get User Information
    public function getUserInformation($UserId) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserId', $UserId);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    // Get User Information by Unique Profile Id
    public function getUserInformationByUniqueProfileId($UserUniqueId) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserUniqueId', $UserUniqueId);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    // Validate Mobile exist for another user
    public function isUserMobileExist($mobile) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserMobile', $mobile);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    // Validate Mobile exist for another user profile
    public function isUserProfileMobileExist($mobile, $login_type) {
        $this->db->select('*');
        $this->db->from($this->userProfileTbl);
        $this->db->where('Mobile', $mobile);
        $this->db->where('UserTypeId', $login_type);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    // Validate Email exist for another user
    public function isUserEmailExist($email) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserEmail', $email);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }


    // Validate Email exist for another user profile
    public function isUserProfileEmailExist($email, $login_type) {
        $this->db->select('*');
        $this->db->from($this->userProfileTbl);
        $this->db->where('Email', $email);
        $this->db->where('UserTypeId', $login_type);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    // Create User Album for User
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

    // Auto generate Username
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

    // Auto Generate User Unique Id
    public function autoGenerateUserUniqueId() {
        $UserUniqueId = mt_rand().time().rand();

        $UserUniqueId = substr( str_shuffle( $UserUniqueId ), 0, 14);

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

    // Auto Geneerate Reset Password Code
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

    // Save user Photo on server
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

            return $photo_id;
            
        }    
    }

    // Save User Photo
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


    // Save user profile Photo on server
    public function saveUserProfilePhoto($photo_cover = 'photo', $UserId, $UserProfileId, $profile_or_cover = 1) {

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
            $this->updateUserProfileData($UserProfileId, $updateData);

            return $photo_id;
            
        }    
    }

    // Get User Citizen Dabhboard 
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

    // Is exist user mobile
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

    // Is existt User Email
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

    // Validate User and User Profile Mobile
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

    // Validate User and User Profile Email
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

    // Validate User and User Profile Alternate Mobile
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

    // Exist Reset Password Code
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

    // Check user set as favourite
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

    // Check User Follow
    public function checkUserFollow($UserProfileId, $FollowUserProfileId) {
        $this->db->select('UserProfileId, FollowUserProfileId');
        $this->db->from($this->UserFollowTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FollowUserProfileId', $FollowUserProfileId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return false;
        }
    }

    // Check User Friend Request
    public function checkUserFriendRequest($UserProfileId, $FriendUserProfileId) {

        $this->db->select('*');
        $this->db->from($this->UserFriendTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return 0;
        }
    }

    // Accept user Friend Request
    public function acceptUserFriendRequest($UserProfileId, $FriendUserProfileId) {

        $insertData = array(
                            'UserProfileId'         => $UserProfileId,
                            'FriendUserProfileId'   => $FriendUserProfileId,
                            'RequestSentOn'         => date('Y-m-d H:i:s'),
                            'RequestAccepted'       => '1',
                            'GetNotification'       => '1',
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

    // send User Frined Request
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


    // Update Get Notification From Friend
    public function updateGetNotification($UserProfileId, $FriendUserProfileId, $GetNotification) {
        $updateData = array(
                            'GetNotification'       => $GetNotification,
                            );
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $this->db->update($this->UserFriendTbl, $updateData);
    }


    // Delete User Friend Request
    public function deleteUserFriendRequest($UserProfileId, $FriendUserProfileId) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $this->db->delete($this->UserFriendTbl);

        $this->db->where('UserProfileId', $FriendUserProfileId);
        $this->db->where('FriendUserProfileId', $UserProfileId);
        $this->db->delete($this->UserFriendTbl);

        return true;
    }

    // Cancel User Friend Request
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

    // Undo User Profile Friend Request
    public function undoUserProfileFriendRequest($UserProfileId, $FriendUserProfileId) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $this->db->delete($this->UserFriendTbl);

        return true;
    }

    // Insert User Favourite User
    public function insertUserFavUser($insertData) {
        $this->db->insert($this->userFavUserTbl, $insertData);

        return $this->db->insert_id();
    }

    // Delete User Favourite user
    public function deleteUserFavUser($UserProfileId, $FriendUserProfileId) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FriendUserProfileId', $FriendUserProfileId);
        $this->db->delete($this->userFavUserTbl);
    }

    // Insert User Follow User
    public function insertUserFollowUser($insertData) {
        $this->db->insert($this->UserFollowTbl, $insertData);

        return $this->db->insert_id();
    }

    // Delete user follow User
    public function deleteUserFollowUser($UserProfileId, $FollowUserProfileId) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('FollowUserProfileId', $FollowUserProfileId);
        $this->db->delete($this->UserFollowTbl);
    }

    // Get My All Followers
    public function getMyAllFollowers($UserId, $UserProfileId) {

        $query = $this->db->query("SELECT ufu.*, up.UserId 
                                        FROM ".$this->UserFollowTbl." AS ufu 
                                        LEFT JOIN ".$this->userProfileTbl." up ON ufu.UserProfileId = up.UserProfileId
                                        WHERE 
                                            ufu.`FollowUserProfileId` = '".$UserProfileId."'");

        $res_u = $query->result_array();

        $follow_user = array();

        foreach($res_u AS $key => $result) {
            $follow_user[] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
        }

        return $follow_user;
    }

    // Get My All Followings
    public function getMyAllFollowings($UserId, $UserProfileId) {

        $query = $this->db->query("SELECT ufu.*, up.UserId 
                                        FROM ".$this->UserFollowTbl." AS ufu 
                                        LEFT JOIN ".$this->userProfileTbl." up ON ufu.FollowUserProfileId = up.UserProfileId
                                        WHERE 
                                            ufu.`UserProfileId` = '".$UserProfileId."'");

        $res_u = $query->result_array();

        $follow_user = array();

        foreach($res_u AS $key => $result) {
            $follow_user[] = $this->getUserProfileInformation($result['FollowUserProfileId'], $UserProfileId);
        }

        return $follow_user;
    }

    // Get My All Favourite Leader
    public function getMyAllFavouriteLeader($UserId, $UserProfileId, $search_text = '') {

        $sql = "SELECT ufu.*, up.UserId 
                                        FROM ".$this->userFavUserTbl." AS ufu 
                                        LEFT JOIN ".$this->userProfileTbl." up ON ufu.FriendUserProfileId = up.UserProfileId
                                        WHERE 
                                            ufu.`UserProfileId` = '".$UserProfileId."'
                                        AND (up.UserTypeId = '2' OR up.UserTypeId = '3')";

        if($search_text != '') {
            $sql .= " AND (up.FirstName LIKE '%".$search_text."%' OR up.LastName LIKE '%".$search_text."%' OR up.Email LIKE '%".$search_text."%')";
            $sql .= " LIMIT 0, 20";

        }
        $query = $this->db->query($sql);

        $res_u = $query->result_array();

        $fav_leader = array();

        foreach($res_u AS $key => $result) {
            $fav_leader[] = $this->getUserProfileInformation($result['FriendUserProfileId'], $UserProfileId);
        }

        return $fav_leader;
    }

    // Get My All Friend Request
    public function getMyAllFriendRequest($UserProfileId, $only_total = 0) {
        $query = $this->db->query("SELECT uf.UserProfileId, uf.RequestSentOn 
                                        FROM ".$this->UserFriendTbl." AS uf 
                                        WHERE 
                                            uf.`FriendUserProfileId` = '".$UserProfileId."'
                                        AND uf.RequestAccepted = '0'
                                        ORDER BY uf.RequestSentOn DESC");

        $res_u = $query->result_array();

        $friend_requests = array();

        $total = 0;
        foreach($res_u AS $key => $result) {

            if($only_total == 0) {
                $friend_profile = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
                $friend_profile = array_merge($friend_profile, array('RequestSentOn' => $result['RequestSentOn']));
                $friend_requests[] = $friend_profile;
            } else {
                $total++;
            }
        }
        if($only_total == 0) {
            return $friend_requests;
        } else {
            return $total;
        }
    }

    // Get My All Request To Friends
    public function getMyAllRequestToFriends($UserProfileId, $only_total = 0) {
        $query = $this->db->query("SELECT uf.FriendUserProfileId, uf.RequestSentOn 
                                        FROM ".$this->UserFriendTbl." AS uf 
                                        WHERE 
                                            uf.`UserProfileId` = '".$UserProfileId."'
                                        AND uf.RequestAccepted = '0' 
                                        ORDER BY uf.RequestSentOn DESC");

        $res_u = $query->result_array();

        $request_friends = array();
        $total = 0;
        foreach($res_u AS $key => $result) {
            if($only_total == 0) {
                $friend_profile = $this->getUserProfileInformation($result['FriendUserProfileId'], $UserProfileId);
                $friend_profile = array_merge($friend_profile, array('RequestSentOn' => $result['RequestSentOn']));
                $request_friends[] = $friend_profile;
            } else {
                $total++;
            }
        }
        if($only_total == 0) {
            return $request_friends;
        } else {
            return $total;
        }
    }

    // Get My All Friends
    public function getMyAllFriends($UserProfileId, $onlyUserProfileId = 0) {
        $query = $this->db->query("SELECT uf.FriendUserProfileId 
                                        FROM ".$this->UserFriendTbl." AS uf 
                                        WHERE 
                                            uf.`UserProfileId` = '".$UserProfileId."'
                                        AND uf.RequestAccepted = '1' 
                                        ORDER BY uf.RequestAcceptedOn DESC");

        $res_u = $query->result_array();

        $friends = array();

        $fiends_profile_id = array();

        foreach($res_u AS $key => $result) {
            $friends[] = $this->getUserProfileInformation($result['FriendUserProfileId'], $UserProfileId);

            if($onlyUserProfileId == 1) {
                $fiends_profile_id[] = $result['FriendUserProfileId'];
            }
        }

        if($onlyUserProfileId == 1) { 
            return $fiends_profile_id;
        }
        return $friends;
    }

    // Get My All Created Team for Leader
    public function getMyAllCreatedTeam($UserProfileId) {

        $my_team = array();
        $sql = "SELECT up.UserProfileId 
                                        FROM ".$this->userProfileTbl." AS up 
                                        WHERE 
                                            up.`AddedBy` = '".$UserProfileId."'
                                        AND up.UserTypeId = '3' 
                                        AND up.ProfileStatus != -1
                                        ORDER BY up.AddedOn DESC";
        $query = $this->db->query($sql);

        $res_u = $query->result_array();

        foreach($res_u AS $key => $result) {
            $my_team[] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
        }

        return $my_team;
    }

    // Get All Gender
    public function getAllGender() {
        $this->db->select('*');
        $this->db->from($this->genderTbl);
        $this->db->where('GenderStatus', 1);
        $query = $this->db->get();
        $res = $query->result_array();
        if ($query->num_rows() > 0) {
            $gender = array();
            foreach($res AS $key => $result) {
                $gender[] = $this->returnGender($result);
            }
            return $gender;
        } else {
            return false;
        }
    }

    // Return Gender
    public function returnGender($result) {
        $detail = array(
                        'GenderId'       => $result['GenderId'],
                        'GenderName'     => $result['GenderName'],
                        'GenderStatus'   => $result['GenderStatus'],
                        );
        return $detail;
    }

    // Update Profile Address
    public function updateProfileAddress($UserProfileId, $post_data) {
        $address_id     = is_array($post_data['address_id']) ? $post_data['address_id'] : explode('~', $post_data['address_id']);
        $address        = is_array($post_data['address']) ? $post_data['address'] : explode('~', $post_data['address']);
        $city           = is_array($post_data['city']) ? $post_data['city'] : explode('~', $post_data['city']);
        $state          = is_array($post_data['state']) ? $post_data['state'] : explode('~', $post_data['state']);
        $landmark       = is_array($post_data['landmark']) ? $post_data['landmark'] : explode('~', $post_data['landmark']);
        $country        = is_array($post_data['country']) ? $post_data['country'] : explode('~', $post_data['country']);
        $pincode        = is_array($post_data['pincode']) ? $post_data['pincode'] : explode('~', $post_data['pincode']);
        $default        = is_array($post_data['default']) ? $post_data['default'] : explode('~', $post_data['default']);
        $home_work      = is_array($post_data['home_work']) ? $post_data['home_work'] : explode('~', $post_data['home_work']);
        $private_public = is_array($post_data['private_public']) ? $post_data['private_public'] : explode('~', $post_data['private_public']);

        $j = 0;

        for($i = 0; $i < count($address); $i++) {
            if($address_id[$i] > 0) {
                $update_address = array(
                                        'UserProfileId'     => $UserProfileId,
                                        'Address'           => $address[$i],
                                        'City'              => $city[$i],
                                        'State'             => $state[$i],
                                        'Landmark'          => $landmark[$i],
                                        'Country'           => $country[$i],
                                        'Pincode'           => $pincode[$i],
                                        'Default'           => $default[$i],
                                        'HomeWork'          => $home_work[$i],
                                        'Status'            => 1,
                                        'PrivatePublic'     => $private_public[$i],
                                        'UpdatedOn'         => date('Y-m-d H:i:s'),
                                        );
                $this->db->where('UserProfileAddressId', $address_id[$i]);
                $this->db->update($this->UserProfileAddressTbl, $update_address);

                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'Address', $address[$i]);
                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'City', $city[$i]);
                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'State', $state[$i]);

                $j++;
            } else {
                $update_address = array(
                                        'UserProfileId'     => $UserProfileId,
                                        'Address'           => $address[$i],
                                        'City'              => $city[$i],
                                        'State'             => $state[$i],
                                        'Landmark'          => $landmark[$i],
                                        'Country'           => $country[$i],
                                        'Pincode'           => $pincode[$i],
                                        'Default'           => $default[$i],
                                        'HomeWork'          => $home_work[$i],
                                        'Status'            => 1,
                                        'PrivatePublic'     => $private_public[$i],
                                        'AddedOn'           => date('Y-m-d H:i:s'),
                                        'UpdatedOn'         => date('Y-m-d H:i:s'),
                                        );
                 $this->db->insert($this->UserProfileAddressTbl, $update_address);

                 $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'Address', $address[$i]);
                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'City', $city[$i]);
                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'State', $state[$i]);

                 $j++;
            }
        }
        if($j > 0) {
            return true;
        } else {
            return false;
        }
    }


    // Delete Profile Address
    public function deleteProfileAddress($UserProfileId, $address_id) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('UserProfileAddressId', $address_id);
        $this->db->delete($this->UserProfileAddressTbl);

        return true;
    }

    // Get user Profile Address
    public function getUserProfileAddress($UserProfileId) {

        $user_profile_address = array();
        $this->db->select('*');
        $this->db->from($this->UserProfileAddressTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->order_by('UserProfileAddressId', 'ASC');
        $query = $this->db->get();
        $res = $query->result_array();
        if ($query->num_rows() > 0) {
            $user_profile_address = array();
            foreach($res AS $key => $result) {
                $user_profile_address[] = $this->returnUserProfileAddress($result);
            }
            return $user_profile_address;
        } else {
            return $user_profile_address;
        }
    }

    // Return User Profile Address
    public function returnUserProfileAddress($result) {
        $detail = array(
                        'UserProfileAddressId'      => $result['UserProfileAddressId'],
                        'UserProfileId'             => $result['UserProfileId'],
                        'Address'                   => $result['Address'],
                        'City'                      => $result['City'],
                        'State'                     => $result['State'],
                        'Landmark'                  => $result['Landmark'],
                        'Country'                   => $result['Country'],
                        'Pincode'                   => $result['Pincode'],
                        'Status'                    => $result['Status'],
                        'Default'                   => $result['Default'],
                        'HomeWork'                  => $result['HomeWork'],
                        'PrivatePublic'             => $result['PrivatePublic'],
                        'AddedOn'                   => return_time_ago($result['AddedOn']),
                        'UpdatedOn'                 => return_time_ago($result['UpdatedOn']),
                        'AddedOnTime'               => $result['AddedOn'],
                        'UpdatedOnTime'             => $result['UpdatedOn'],
                        );
        return $detail;
    }

    // Update Profile Education
    public function updateProfileEducation($UserProfileId, $post_data) {
        $education_id   = is_array($post_data['education_id']) ? $post_data['education_id'] : explode('~', $post_data['education_id']);
        $qualification  = is_array($post_data['qualification']) ? $post_data['qualification'] : explode('~', $post_data['qualification']);
        $location       = is_array($post_data['location']) ? $post_data['location'] : explode('~', $post_data['location']);
        $university     = is_array($post_data['university']) ? $post_data['university'] : explode('~', $post_data['university']);
        $from           = is_array($post_data['from']) ? $post_data['from'] : explode('~', $post_data['from']);
        $to             = is_array($post_data['to']) ? $post_data['to'] : explode('~', $post_data['to']);
        $persuing       = is_array($post_data['persuing']) ? $post_data['persuing'] : explode('~', $post_data['persuing']);
        $private_public = is_array($post_data['private_public']) ? $post_data['private_public'] : explode('~', $post_data['private_public']);

        $j = 0;

        for($i = 0; $i < count($qualification); $i++) {
            if($education_id[$i] > 0) {
                $update_education = array(
                                        'UserProfileId'             => $UserProfileId,
                                        'Qualification'             => $qualification[$i],
                                        'QualificationLocation'     => $location[$i],
                                        'QualificationUniversity'   => $university[$i],
                                        'QualificationFrom'         => date('Y-m-d', strtotime($from[$i])),
                                        'QualificationTo'           => date('Y-m-d', strtotime($to[$i])),
                                        'Persuing'                  => $persuing[$i],
                                        'Status'                    => 1,
                                        'PrivatePublic'             => $private_public[$i],
                                        'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                        );
                $this->db->where('UserProfileEducationId', $education_id[$i]);
                $this->db->update($this->UserProfileEducationTbl, $update_education);

                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'Qualification', $qualification[$i]);
                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'College', $university[$i]);

                $j++;
            } else {
                $update_education = array(
                                        'UserProfileId'             => $UserProfileId,
                                        'Qualification'             => $qualification[$i],
                                        'QualificationLocation'     => $location[$i],
                                        'QualificationUniversity'   => $university[$i],
                                        'QualificationFrom'         => date('Y-m-d', strtotime($from[$i])),
                                        'QualificationTo'           => date('Y-m-d', strtotime($to[$i])),
                                        'Persuing'                  => $persuing[$i],
                                        'Status'                    => 1,
                                        'PrivatePublic'             => $private_public[$i],
                                        'AddedOn'                   => date('Y-m-d H:i:s'),
                                        'UpdatedOn'                 => date('Y-m-d H:i:s'),
                                        );
                 $this->db->insert($this->UserProfileEducationTbl, $update_education);

                 $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'Qualification', $qualification[$i]);
                 $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'College', $university[$i]);
                 $j++;
            }
        }
        if($j > 0) {
            return true;
        } else {
            return false;
        }
    }


    // Delete Profile Education
    public function deleteProfileEducation($UserProfileId, $qualification_id) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('UserProfileEducationId', $qualification_id);
        $this->db->delete($this->UserProfileEducationTbl);

        return true;
    }

    // Get User Profile Education
    public function getUserProfileEducation($UserProfileId) {

        $user_profile_education = array();
        $this->db->select('*');
        $this->db->from($this->UserProfileEducationTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->order_by('UserProfileEducationId', 'ASC');
        $query = $this->db->get();
        $res = $query->result_array();
        if ($query->num_rows() > 0) {
            $user_profile_education = array();
            foreach($res AS $key => $result) {
                $user_profile_education[] = $this->returnUserProfileEducation($result);
            }
            return $user_profile_education;
        } else {
            return $user_profile_education;
        }
    }

    // Return User Profile Education
    public function returnUserProfileEducation($result) {
        $detail = array(
                        'UserProfileEducationId'    => $result['UserProfileEducationId'],
                        'UserProfileId'             => $result['UserProfileId'],
                        'Qualification'             => $result['Qualification'],
                        'QualificationLocation'     => $result['QualificationLocation'],
                        'QualificationUniversity'   => $result['QualificationUniversity'],
                        'QualificationFrom'         => $result['QualificationFrom'],
                        'QualificationTo'           => $result['QualificationTo'],
                        'Persuing'                  => $result['Persuing'],
                        'Status'                    => $result['Status'],
                        'PrivatePublic'             => $result['PrivatePublic'],
                        'AddedOn'                   => return_time_ago($result['AddedOn']),
                        'UpdatedOn'                 => return_time_ago($result['UpdatedOn']),
                        'AddedOnTime'               => $result['AddedOn'],
                        'UpdatedOnTime'             => $result['UpdatedOn'],
                        );
        return $detail;
    }


    // Update Profile Work
    public function updateProfileWork($UserProfileId, $post_data) {
        $work_id    = is_array($post_data['work_id']) ? $post_data['work_id'] : explode('~', $post_data['work_id']);
        $work       = is_array($post_data['work']) ? $post_data['work'] : explode('~', $post_data['work']);
        $place      = is_array($post_data['place']) ? $post_data['place'] : explode('~', $post_data['place']);
        $location   = is_array($post_data['location']) ? $post_data['location'] : explode('~', $post_data['location']);
        $from       = is_array($post_data['from']) ? $post_data['from'] : explode('~', $post_data['from']);
        $to         = is_array($post_data['to']) ? $post_data['to'] : explode('~', $post_data['to']);
        $currently  = is_array($post_data['currently']) ? $post_data['currently'] : explode('~', $post_data['currently']);
        $private_public = is_array($post_data['private_public']) ? $post_data['private_public'] : explode('~', $post_data['private_public']);

        $j = 0;

        for($i = 0; $i < count($work); $i++) {
            if($work_id[$i] > 0) {
                $update_work = array(
                                    'UserProfileId'     => $UserProfileId,
                                    'WorkCompany'      => $work[$i],
                                    'WorkPosition'         => $place[$i],
                                    'WorkLocation'      => $location[$i],
                                    'WorkFrom'          => $from[$i],
                                    'WorkTo'            => $to[$i],
                                    'CurrentlyWorking'  => $currently[$i],
                                    'PrivatePublic'     => $private_public[$i],
                                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                                    );
                $this->db->where('UserProfileWorkId', $work_id[$i]);
                $this->db->update($this->UserProfileWorkTbl, $update_work);

                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'Company', $work[$i]);
                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'WorkPosition', $place[$i]);

                $j++;
            } else {
                $update_work = array(
                                    'UserProfileId'     => $UserProfileId,
                                    'WorkCompany'      => $work[$i],
                                    'WorkPosition'         => $place[$i],
                                    'WorkLocation'      => $location[$i],
                                    'WorkFrom'          => $from[$i],
                                    'WorkTo'            => $to[$i],
                                    'CurrentlyWorking'  => $currently[$i],
                                    'PrivatePublic'     => $private_public[$i],
                                    'AddedOn'           => date('Y-m-d H:i:s'),
                                    'UpdatedOn'         => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->UserProfileWorkTbl, $update_work);
                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'Company', $work[$i]);
                $this->searchAndSaveDataForSearchOfUser($UserProfileId, 'WorkPosition', $place[$i]);

                 $j++;
            }
        }
        if($j > 0) {
            return true;
        } else {
            return false;
        }
    }


    // Delete Profile Work
    public function deleteProfileWork($UserProfileId, $work_id) {
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->where('UserProfileWorkId', $work_id);
        $this->db->delete($this->UserProfileWorkTbl);
        return true;
    }

    // Get User Profile Work
    public function getUserProfileWork($UserProfileId) {

        $user_profile_work = array();
        $this->db->select('*');
        $this->db->from($this->UserProfileWorkTbl);
        $this->db->where('UserProfileId', $UserProfileId);
        $this->db->order_by('UserProfileWorkId', 'ASC');
        $query = $this->db->get();
        $res = $query->result_array();
        if ($query->num_rows() > 0) {
            $user_profile_work = array();
            foreach($res AS $key => $result) {
                $user_profile_work[] = $this->returnUserProfileWork($result);
            }
            return $user_profile_work;
        } else {
            return $user_profile_work;
        }
    }

    // Return User Profile Work
    public function returnUserProfileWork($result) {
        $detail = array(
                        'UserProfileWorkId'         => $result['UserProfileWorkId'],
                        'UserProfileId'             => $result['UserProfileId'],
                        'WorkCompany'               => $result['WorkCompany'],
                        'WorkPosition'              => $result['WorkPosition'],
                        'WorkLocation'              => $result['WorkLocation'],
                        'WorkFrom'                  => $result['WorkFrom'],
                        'WorkTo'                    => $result['WorkTo'],
                        'CurrentlyWorking'          => $result['CurrentlyWorking'],
                        'PrivatePublic'             => $result['PrivatePublic'],
                        'AddedOn'                   => return_time_ago($result['AddedOn']),
                        'UpdatedOn'                 => return_time_ago($result['UpdatedOn']),
                        'AddedOnTime'               => $result['AddedOn'],
                        'UpdatedOnTime'             => $result['UpdatedOn'],
                        );
        return $detail;
    }


    // Update Admin Login Status
    public function updateAdminLoginStatus($UserId, $updateData) {
        $this->db->where('AdminId', $UserId);
        $this->db->update($this->AdminTbl, $updateData);
    }



    // Update Login Status
    public function updateLoginStatus($UserId, $updateData) {
        $this->db->where('UserId', $UserId);
        $this->db->update($this->userTbl, $updateData);
    }

    // Update User Data
    public function updateUserData($UserId, $updateData) {
        $this->db->where('UserId', $UserId);
        $this->db->update($this->userTbl, $updateData);
    }

    // Update User Profile Data
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


    // Get My All Friends, Follower, Followings Id
    public function getMyFriendFollowerAndFollowingUserProfileId($UserProfileId) {

        $follow_user = array();
        $user_prifile_id_array = array();

        $search_text = trim($search_text);
        // Followers
        $sql = "SELECT ufu.*, up.UserId 
                                        FROM ".$this->UserFollowTbl." AS ufu 
                                        LEFT JOIN ".$this->userProfileTbl." up ON ufu.UserProfileId = up.UserProfileId
                                        WHERE 
                                            ufu.`FollowUserProfileId` = '".$UserProfileId."' 
                                        AND up.ProfileStatus = 1";


        //echo $sql.'<br>';
        $query = $this->db->query($sql);

        $res_u = $query->result_array();

        foreach($res_u AS $key => $result) {
            if(!@in_array($result['UserProfileId'], $user_prifile_id_array)) {
                $user_prifile_id_array[] = $result['UserProfileId'];
            }
        }

        // Followings
        $sql = "SELECT ufu.*, up.UserId 
                                        FROM ".$this->UserFollowTbl." AS ufu 
                                        LEFT JOIN ".$this->userProfileTbl." up ON ufu.FollowUserProfileId = up.UserProfileId
                                        WHERE 
                                            ufu.`UserProfileId` = '".$UserProfileId."'
                                        AND up.ProfileStatus = 1";

        
        //echo $sql.'<br>';
        $query = $this->db->query($sql);

        $res_u = $query->result_array();
        foreach($res_u AS $key => $result) {
            if(!@in_array($result['FollowUserProfileId'], $user_prifile_id_array)) {
                $user_prifile_id_array[] = $result['FollowUserProfileId'];
            }
        }


        // Friends
        $sql = "SELECT uf.FriendUserProfileId 
                                        FROM ".$this->UserFriendTbl." AS uf  
                                        LEFT JOIN ".$this->userProfileTbl." up ON uf.FriendUserProfileId = up.UserProfileId 
                                        WHERE 
                                            uf.`UserProfileId` = '".$UserProfileId."' 
                                        AND uf.RequestAccepted = '1' 
                                        AND up.ProfileStatus = 1"; 

        $sql .= " ORDER BY uf.RequestAcceptedOn DESC";
        //echo $sql.'<br>';

        $query = $this->db->query($sql);

        $res_u = $query->result_array();

        foreach($res_u AS $key => $result) {
            if(!@in_array($result['FriendUserProfileId'], $user_prifile_id_array)) {
                $user_prifile_id_array[] = $result['FriendUserProfileId'];
            }
        }

        return $user_prifile_id_array;
    }



    // Get My All Followers Search
    public function searchMyFriendFollowerAndFollowing($UserProfileId, $search_text) {

        $follow_user = array();
        $user_prifile_id_array = array();

        $search_text = trim($search_text);
        // Followers
        $sql = "SELECT ufu.*, up.UserId 
                                        FROM ".$this->UserFollowTbl." AS ufu 
                                        LEFT JOIN ".$this->userProfileTbl." up ON ufu.UserProfileId = up.UserProfileId
                                        WHERE 
                                            ufu.`FollowUserProfileId` = '".$UserProfileId."' 
                                        AND up.`ProfileStatus` != -1 ";

        if($search_text != '') {
            $sql .= " AND ( ";
            $sql .= " up.FirstName LIKE '%".$search_text."%' ";
            $sql .= " OR up.LastName LIKE '%".$search_text."%' ";
            $sql .= " ) ";
        }

        //echo $sql.'<br>';
        $query = $this->db->query($sql);

        $res_u = $query->result_array();

        foreach($res_u AS $key => $result) {
            if(!@in_array($result['UserProfileId'], $user_prifile_id_array)) {
                $follow_user[] = $this->getUserProfileInformation($result['UserProfileId'], $UserProfileId);
                $user_prifile_id_array[] = $result['UserProfileId'];
            }
        }

        // Followings
        $sql = "SELECT ufu.*, up.UserId 
                                        FROM ".$this->UserFollowTbl." AS ufu 
                                        LEFT JOIN ".$this->userProfileTbl." up ON ufu.FollowUserProfileId = up.UserProfileId
                                        WHERE 
                                            ufu.`UserProfileId` = '".$UserProfileId."' 
                                        AND up.`ProfileStatus` != -1 ";

        if($search_text != '') {
            $sql .= " AND ( ";
            $sql .= " up.FirstName LIKE '%".$search_text."%' ";
            $sql .= " OR up.LastName LIKE '%".$search_text."%' ";
            $sql .= " ) ";
        }
        
        //echo $sql.'<br>';
        $query = $this->db->query($sql);

        $res_u = $query->result_array();
        foreach($res_u AS $key => $result) {
            if(!@in_array($result['FollowUserProfileId'], $user_prifile_id_array)) {
                $follow_user[] = $this->getUserProfileInformation($result['FollowUserProfileId'], $UserProfileId);
                $user_prifile_id_array[] = $result['FollowUserProfileId'];
            }
        }


        // Friends
        $sql = "SELECT uf.FriendUserProfileId 
                                        FROM ".$this->UserFriendTbl." AS uf  
                                        LEFT JOIN ".$this->userProfileTbl." up ON uf.FriendUserProfileId = up.UserProfileId 
                                        WHERE 
                                            uf.`UserProfileId` = '".$UserProfileId."' 
                                        AND up.`ProfileStatus` != -1 
                                        AND uf.RequestAccepted = '1'"; 

        if($search_text != '') {
            $sql .= " AND ( ";
            $sql .= " up.FirstName LIKE '%".$search_text."%' ";
            $sql .= " OR up.LastName LIKE '%".$search_text."%' ";
            $sql .= " ) ";
        }
        $sql .= " ORDER BY uf.RequestAcceptedOn DESC";
        //echo $sql.'<br>';

        $query = $this->db->query($sql);

        $res_u = $query->result_array();

        foreach($res_u AS $key => $result) {
            if(!@in_array($result['FriendUserProfileId'], $user_prifile_id_array)) {
                $follow_user[] = $this->getUserProfileInformation($result['FriendUserProfileId'], $UserProfileId);
                $user_prifile_id_array[] = $result['FriendUserProfileId'];
            }
        }

        return $follow_user;
    }


    // Minimum Friend List of User
    public function getUserProrifleMinFriendList($FriendUserProfileId, $UserProfileId = 0) {

        $minimum_friend_show = 6;
        $user_friends = array();
        $sql = "SELECT uf.FriendUserProfileId 
                                        FROM ".$this->UserFriendTbl." AS uf  
                                        LEFT JOIN ".$this->userProfileTbl." up ON uf.FriendUserProfileId = up.UserProfileId 
                                        WHERE 
                                            uf.`UserProfileId` = '".$FriendUserProfileId."'
                                        AND uf.RequestAccepted = '1'"; 

        $sql .= " ORDER BY uf.RequestAcceptedOn DESC LIMIT 0, $minimum_friend_show";

        $query = $this->db->query($sql);

        $res = $query->result_array();

        if ($query->num_rows() > 0) {
            $user_friends = array();
            foreach($res AS $key => $result) {
                $user_friends[] = $this->getUserProfileInformation($result['FriendUserProfileId'], $UserProfileId);
            }
            return $user_friends;
        } else {
            return $user_friends;
        }
    }



    // Friend List of User
    public function getUserProrifleFriendList($FriendUserProfileId, $UserProfileId = 0) {

        $user_friends = array();
        $sql = "SELECT uf.FriendUserProfileId 
                                        FROM ".$this->UserFriendTbl." AS uf  
                                        LEFT JOIN ".$this->userProfileTbl." up ON uf.FriendUserProfileId = up.UserProfileId 
                                        WHERE 
                                            uf.`UserProfileId` = '".$FriendUserProfileId."'
                                        AND uf.RequestAccepted = '1'"; 

        $sql .= " ORDER BY uf.RequestAcceptedOn DESC";

        $query = $this->db->query($sql);

        $res = $query->result_array();

        if ($query->num_rows() > 0) {
            $user_friends = array();
            foreach($res AS $key => $result) {
                $user_friends[] = $this->getUserProfileInformation($result['FriendUserProfileId'], $UserProfileId);
            }
            return $user_friends;
        } else {
            return $user_friends;
        }
    }


    // search all education added by any user
    public function getAllEducactionsAddedByAnyUser($UserProfileId, $search_for, $search) {

        $result = array();
        if($search_for == 'qualification') {

            $sql = "SELECT Qualification FROM `UserProfileEducation` WHERE `Status` = '1' AND `Qualification` LIKE '%".$search."%' GROUP BY Qualification ORDER BY Qualification LIMIT 0, 20";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result[] = $val['Qualification'];
                }
            }
            return $result;
        }


        if($search_for == 'location') {

            $sql = "SELECT QualificationLocation FROM `UserProfileEducation` WHERE `Status` = '1' AND `QualificationLocation` LIKE '%".$search."%' GROUP BY QualificationLocation ORDER BY QualificationLocation LIMIT 0, 20";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result[] = $val['QualificationLocation'];
                }
            }
            return $result;
        }


        if($search_for == 'university') {

            $sql = "SELECT QualificationUniversity FROM `UserProfileEducation` WHERE `Status` = '1' AND `QualificationUniversity` LIKE '%".$search."%' GROUP BY QualificationUniversity ORDER BY QualificationUniversity LIMIT 0, 20";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result[] = $val['QualificationUniversity'];
                }
            }
            return $result;
        }
    }


    // search all work added by any user
    public function getAllWorkAddedByAnyUser($UserProfileId, $search_for, $search) {

        $result = array();
        if($search_for == 'work') {

            $sql = "SELECT WorkCompany FROM `UserProfileWork` WHERE `Status` = '1' AND `WorkCompany` LIKE '%".$search."%' GROUP BY WorkCompany ORDER BY WorkCompany LIMIT 0, 20";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result[] = $val['WorkCompany'];
                }
            }
            return $result;
        }


        if($search_for == 'place') {
            $sql = "SELECT WorkPosition FROM `UserProfileWork` WHERE `Status` = '1' AND `WorkPosition` LIKE '%".$search."%' GROUP BY WorkPosition ORDER BY WorkPosition LIMIT 0, 20";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result[] = $val['WorkPosition'];
                }
            }
            return $result;
        }


        if($search_for == 'location') {

            $sql = "SELECT WorkLocation FROM `UserProfileWork` WHERE `Status` = '1' AND `WorkLocation` LIKE '%".$search."%' GROUP BY WorkLocation ORDER BY WorkLocation LIMIT 0, 20";

            $query = $this->db->query($sql);
            $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result[] = $val['WorkLocation'];
                }
            }
            return $result;
        }
    }


    // Validate User Profile Username Exist for my team
    public function validateNewUsernameForUserprofileExist($UserName) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('ProfileUserName', $UserName);
        $this->db->where('ProfileStatus !=', -1);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    // Validate User Profile Username Exist for my team
    public function validateUsernameForUserprofileExist($UserName, $UserProfileId) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('ProfileUserName', $UserName);
        $this->db->where('UserProfileId !=', $UserProfileId);
        $this->db->where('ProfileStatus !=', -1);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getAllSearchDataAddedByAnyUsers($UserProfileId, $search_type, $search_text) {
        $this->db->select('SearchData');
        $this->db->from($this->SearchDataTbl);
        $this->db->where('SearchDataType', $search_type);
        $this->db->like('lower(SearchData)', strtolower($search_text));
        $this->db->limit(10);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result[] = array('data' => $val['SearchData']);
                }
            }
            return $result;
        } else {
            return false;
        }
    }


    public function getAllSearchDataAddedByMyself($UserProfileId, $search_type, $search_text) {
        $this->db->select('SearchData');
        $this->db->from($this->SearchDataTbl);
        $this->db->where('SearchDataType', $search_type);
        $this->db->where('AddedBy', $UserProfileId);
        $this->db->like('SearchData', $search_text);
        $this->db->limit(10);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             $res = $query->result_array();

            if(count($res) > 0) {
                foreach($res AS $key => $val) {
                    $result[] = $val['SearchData'];
                }
            }
            return $result;
        } else {
            return false;
        }
    }



    public function searchAndSaveDataForSearchOfUser($UserProfileId, $search_type, $save_data) {
        $this->db->select('SearchData');
        $this->db->from($this->SearchDataTbl);
        $this->db->where('SearchDataType', $search_type);
        $this->db->where('lower(SearchData)', strtolower($save_data));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        } else {
            $insertData = array(
                                'SearchData'        => ucwords($save_data),
                                'SearchDataType'    => $search_type,
                                'AddedBy'           => $UserProfileId,
                                'AddedOn'           => date('Y-m-d H:i:s'),
                                );
            $this->db->insert($this->SearchDataTbl, $insertData);
        }
    }

    
}