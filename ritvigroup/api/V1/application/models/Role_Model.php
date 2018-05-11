<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';
        
        $this->UserRoleTbl              = 'UserRole';
        $this->UserRolePermissionTbl    = 'UserRolePermission';

    }


    public function getMyAllUserRole($UserProfileId) {
        $role = array();
        $this->db->select('UserRoleId');
        $this->db->from($this->UserRoleTbl);
        $this->db->where('AddedBy', $UserProfileId);
        $this->db->order_by('RoleName', 'ASC');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach($result AS $res) {
                $role[] = $this->getUserRoleDetail($res['UserRoleId']);
            }
        } else { 
            $role = array();
        }
        return $role;
    }


    public function getMyAllUserRoleWithDefault($UserProfileId) {
        $role = array();
        $this->db->select('UserRoleId');
        $this->db->from($this->UserRoleTbl);
        $this->db->where('AddedBy', $UserProfileId);
        $this->db->or_where('IsDefault', '1');
        $this->db->order_by('RoleName', 'ASC');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            foreach($result AS $res) {
                $role[] = $this->getUserRoleDetail($res['UserRoleId']);
            }
        } else { 
            $role = array();
        }
        return $role;
    }



    public function saveUserRole($insertData) {
        $this->db->insert($this->UserRoleTbl, $insertData);

        $role_id = $this->db->insert_id();

        return $role_id;
    }


    public function getUserRoleExistForUser($role_name, $UserProfileId) {
        $this->db->select('UserRoleId');
        $this->db->from($this->UserRoleTbl);
        $this->db->like('RoleName', $role_name);
        $this->db->where('AddedBy', $UserProfileId);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    // Get Role Detail
    public function getUserRoleDetail($UserRoleId) {
        $roll_detail = array();
        if(isset($UserRoleId) && $UserRoleId > 0) {

            $query = $this->db->query("SELECT * FROM ".$this->UserRoleTbl." WHERE UserRoleId = '".$UserRoleId."'");

            $res = $query->row_array();

            $roll_detail = $this->returnUserRoleDetail($res);
        } else {
            $roll_detail = array();
        }
        return $roll_detail;
    }

    // Return User Role Detail
    public function returnUserRoleDetail($res) {
        $UserRoleId             = $res['UserRoleId'];
        $RoleName               = $res['RoleName'];
        $RoleDescription        = $res['RoleDescription'];
        $RoleStatus             = $res['RoleStatus'];
        $IsDefault              = $res['IsDefault'];
        $AddedBy                = $res['AddedBy'];
        $UpdatedBy              = $res['UpdatedBy'];
        $AddedOn                = return_time_ago($res['AddedOn']);
        $UpdatedOn              = return_time_ago($res['UpdatedOn']);

        $AddedBy               = $this->User_Model->getUserProfileWithUserInformation($AddedBy);

        $user_data_array = array(
                                "UserRoleId"        => $UserRoleId,
                                "RoleName"          => $RoleName,
                                "RoleDescription"   => $RoleDescription,
                                "RoleStatus"        => $RoleStatus,
                                "IsDefault"         => $IsDefault,
                                "AddedBy"           => $AddedBy,
                                "AddedOn"           => $AddedOn,
                                "AddedOnTime"       => $res['AddedOn'],
                                );
        return $user_data_array;
    }
  

}