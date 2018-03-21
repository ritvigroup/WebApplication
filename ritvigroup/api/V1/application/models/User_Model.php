<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

    function __construct() {
        $this->userTbl          = 'User';
        $this->userProfileTbl   = 'UserProfile';
        $this->userAlbumTbl     = 'UserAlbum';
        $this->userPhotoTbl     = 'UserPhoto';
        $this->userLogTbl       = 'UserLog';
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

        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getUserDetail($UserId, $full_information = 0) {
        if(isset($UserId) && $UserId > 0) {

            $query = $this->db->query("SELECT u.*, uph.PhotoPath AS UserProfilePhoto, uch.PhotoPath AS UserCoverPhoto 
                                                        FROM ".$this->userTbl." AS u 
                                                        LEFT JOIN ".$this->userPhotoTbl." uph ON u.ProfilePhotoId = uph.UserPhotoId
                                                        LEFT JOIN ".$this->userPhotoTbl." uch ON u.CoverPhotoId = uch.UserPhotoId
                                                        WHERE 
                                                            u.`UserId` = '".$UserId."'");

            $res_u = $query->row_array();

            $user_detail = $this->returnUserDetail($res_u);

            $UserProfileCitizen = $this->getCitizenProfileInformation($UserId);

            $user_detail = array_merge($user_detail, array("UserProfileCitizen" => $UserProfileCitizen));

            if($full_information > 0) {
                $UserProfileCitizen = $this->getLeaderProfileInformation($UserId);

                $user_detail = array_merge($user_detail, array("UserProfileCitizen" => $UserProfileCitizen));
            }

        } else {
            $user_detail = array();
        }
        return $user_detail;
    }


    public function getUserProfileWithUserInformation($UserProfileId) {
        $profile = $this->getUserProfileInformation($UserProfileId);
        $detail = $this->getUserDetail($profile['UserId']);

        $return['user_profile_detail'] = array(
                                'user_info' => $detail,
                                'profile' => $profile,
                            );

        return $return;
    }


    public function getUserProfileInformation($UserProfileId) {

        $query = $this->db->query("SELECT * FROM ".$this->userProfileTbl." WHERE `UserProfileId` = '".$UserProfileId."'");

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
                                "Mobile"                        => (($res_u['Mobile'] != NULL) ? $res_u['Mobile'] : ""),
                                "AltMobile"                     => (($res_u['AltMobile'] != NULL) ? $res_u['AltMobile'] : ""),
                                "ProfileStatus"                 => (($res_u['ProfileStatus'] != NULL) ? $res_u['ProfileStatus'] : ""),
                                "AddedBy"                       => (($res_u['AddedBy'] != NULL) ? $res_u['AddedBy'] : ""),
                                "UpdatedBy"                     => (($res_u['UpdatedBy'] != NULL) ? $res_u['UpdatedBy'] : ""),
                                "AddedOn"                       => return_time_ago($res_u['AddedOn']),
                                "UpdatedOn"                     => return_time_ago($res_u['UpdatedOn']),
                                );
        return $user_data_array;
    }


    public function getCitizenProfileInformation($UserId) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('UserId', $UserId);
        $this->db->where('UserTypeId', 1);
        $query = $this->db->get();
        $res_u = $query->row_array();

        return $this->getUserProfileInformation($res_u['UserProfileId']);
    }


    public function getLeaderProfileInformation($UserId) {
        $this->db->select('UserProfileId');
        $this->db->from($this->userProfileTbl);
        $this->db->where('UserId', $UserId);
        $this->db->where('UserTypeId', 2);
        $query = $this->db->get();
        $res_u = $query->row_array();

        return $this->getUserProfileInformation($res_u['UserProfileId']);
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
                                "UpdatedOn"             => $UpdatedOn,
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
        $this->db->and_where('UserId != ', $UserId);
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
        $this->db->and_where('UserId != ', $UserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            return false;
        }
    }


    public function isExistUserAltMobile($alt_mobile, $UserId) {
        $this->db->select('UserId, UserStatus');
        $this->db->from($this->userTbl);
        $this->db->where('UserEmail', $alt_mobile);
        $this->db->and_where('UserId != ', $UserId);
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
        $this->db->and_where('UserId != ', $UserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            $this->db->select('UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('Mobile', $mobile);
            $this->db->or_where('AltMobile', $mobile);
            $this->db->where('UserId != ', $UserId);
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
        $this->db->and_where('UserId != ', $UserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            $this->db->select('UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('Email', $email);
            $this->db->and_where('UserId != ', $UserId);
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
        $this->db->and_where('UserId != ', $UserId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $result = $query->row_array();
        } else {
            $this->db->select('UserId');
            $this->db->from($this->userProfileTbl);
            $this->db->where('Mobile', $alt_mobile);
            $this->db->or_where('AltMobile', $alt_mobile);
            $this->db->where('UserId != ', $UserId);
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

}