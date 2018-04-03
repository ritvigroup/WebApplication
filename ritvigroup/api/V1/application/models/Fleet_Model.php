<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fleet_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';

        $this->VehicleTbl    = 'Vehicle';
        $this->FleetTbl      = 'Fleet';
    }



    public function saveMyFleet($insertData) {
        $this->db->insert($this->FleetTbl, $insertData);

        $fleet_id = $this->db->insert_id();

        return $fleet_id;
    }


    public function saveFleet($UserProfileId, $fleet_data) {
        $i = 0;


        $j = 0;
        for($i = 0; $i < count($fleet_data['vehicle_id']); $i++) {
            $VehicleId          = $fleet_data['vehicle_id'][$i];
            $VehicleQuantity    = $fleet_data['vehicle_quantity'][$i];
            $VehicleQuantity    = ($VehicleQuantity > 0) ? $VehicleQuantity : 0; 


            if($VehicleId != '') {

                $this->db->select('FleetId');
                $this->db->from($this->FleetTbl);
                $this->db->where('UserProfileId', $UserProfileId);
                $this->db->where('VehicleId', $VehicleId);
                $query = $this->db->get();

                $vehicle = $query->row_array();

                if($vehicle['FleetId'] > 0) {
                    $this->db->where('UserProfileId', $UserProfileId);
                    $this->db->where('VehicleId', $VehicleId);
                    $updateData = array(
                                        'VehicleQuantity'   => $VehicleQuantity,
                                        'UpdatedOn'         => date('Y-m-d H:i:s'),
                                        );
                    $this->db->update($this->FleetTbl, $updateData);
                } else {
                    $insertData = array(
                                        'UserProfileId'     => $UserProfileId,
                                        'VehicleId'         => $VehicleId,
                                        'VehicleQuantity'   => $VehicleQuantity,
                                        'FleetStatus'       => 1,
                                        'AddedOn'           => date('Y-m-d H:i:s'),
                                        'UpdatedOn'         => date('Y-m-d H:i:s'),
                                        );
                    $this->db->insert($this->FleetTbl, $insertData);
                }
                $j++;
            }
        }

        if($j > 0) {
            return true;
        }
        return false;
    }


    public function getAllVehicle($UserProfileId) {
        $vehicle = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('*');
            $this->db->from($this->VehicleTbl);
            $this->db->where('VehicleStatus', 1);
            $this->db->order_by('VehicleName','ASC');
            $query = $this->db->get();

            $vehicle = $query->result_array();

        } else {
            $vehicle = array();
        }
        return $vehicle;
    }


    public function getMyAllFleet($UserProfileId) {
        $fleets = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('FleetId');
            $this->db->from($this->FleetTbl);
            $this->db->where('UserProfileId', $UserProfileId);
            $this->db->order_by('AddedOn','DESC');
            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $fleets[] = $this->getFleetDetail($result['FleetId'], $UserProfileId);
            }
        } else {
            $fleets = array();
        }
        return $fleets;
    }

    
    public function getFleetDetail($FleetId, $UserProfileId = 0) {
        $fleet_detail = array();
        if(isset($FleetId) && $FleetId > 0) {

            $sql = "SELECT f.*, v.VehicleName FROM 
                                                ".$this->FleetTbl." AS f 
                                            LEFT JOIN ".$this->VehicleTbl." AS v ON f.VehicleId = v.VehicleId
                                            WHERE 
                                                f.FleetId = '".$FleetId."'
                                            ORDER BY f.AddedOn DESC";
            $query = $this->db->query($sql);

            $res = $query->row_array();

            if($res['FleetId'] > 0) {
                $fleet_detail = $this->returnFleetDetail($res, $UserProfileId);
            }
        } else {
            $fleet_detail = array();
        }
        return $fleet_detail;
    }

    
    public function returnFleetDetail($res, $UserProfileId = 0) {
        $FleetId            = $res['FleetId'];
        $UserProfileId      = $res['UserProfileId'];
        $VehicleId          = $res['VehicleId'];
        $VehicleName        = (($res['VehicleName'] != NULL) ? $res['VehicleName'] : "");
        $VehicleQuantity    = (($res['VehicleQuantity'] != NULL) ? $res['VehicleQuantity'] : "");
        $FleetStatus        = (($res['FleetStatus'] != NULL) ? $res['FleetStatus'] : "");

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $FleetProfile       = $this->User_Model->getUserProfileWithUserInformation($UserProfileId);

        $doc_folder_data_array = array(
                                    "FleetId"           => $FleetId,
                                    "UserProfileId"     => $UserProfileId,
                                    "VehicleId"         => $VehicleId,
                                    "VehicleName"       => $VehicleName,
                                    "VehicleQuantity"   => $VehicleQuantity,
                                    "FleetStatus"       => $FleetStatus,
                                    "AddedOn"           => $AddedOn,
                                    "AddedOnTime"       => $res['AddedOn'],
                                    "UpdatedOn"         => $UpdatedOn,
                                    "UpdatedOnTime"     => $res['UpdatedOn'],
                                    "FleetProfile"      => $FleetProfile,
                                    );
        return $doc_folder_data_array;
    }


}