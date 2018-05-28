<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fleet_Model extends CI_Model {

    function __construct() {
        $this->userTbl              = 'User';
        $this->userProfileTbl       = 'UserProfile';

        $this->VehicleTbl           = 'Vehicle';
        $this->FleetTbl             = 'Fleet';
        $this->FleetAttachmentTbl   = 'FleetAttachment';
    }



    public function saveMyFleet($insertData) {
        $this->db->insert($this->FleetTbl, $insertData);

        $fleet_id = $this->db->insert_id();

        return $fleet_id;
    }


    public function saveFleetImage($FleetId, $UserProfileId, $fleet_image) {
        for($i = 0; $i < count($fleet_image['name']); $i++) {
            
            $FleetImage = basename($fleet_image['name'][$i]);

            if($FleetImage != '') {
                $AttachmentFile = date('YmdHisA').'-'.time().'-FLEET-'.mt_rand().'.'.end(explode('.', $FleetImage));

                $path = DOC_DIR;
                $AttachmentTypeId = 1;

                $path = $path.$AttachmentFile;
                $source = $fleet_image['tmp_name'][$i];

                $upload_result = uploadFileOnServer($source, $path);

                $insertData = array(
                                    'FleetId'               => $FleetId,
                                    'AttachmentTypeId'      => $AttachmentTypeId,
                                    'AttachmentFile'        => $AttachmentFile,
                                    'AttachmentOrginalFile' => $FleetImage,
                                    'AttachmentThumb'       => '',
                                    'AttachmentOrder'       => '0',
                                    'AttachmentStatus'      => 1,
                                    'AddedBy'               => $UserProfileId,
                                    'AddedOn'               => date('Y-m-d H:i:s'),
                                    );
                $this->db->insert($this->FleetAttachmentTbl, $insertData);
            }
        }
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

    public function updateMyFleet($whereData, $updateData) {
        $this->db->where($whereData);
        $this->db->update($this->FleetTbl, $updateData);

        return $this->db->affected_rows();
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
            $this->db->where('FleetStatus !=', -1);
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

            $sql = "SELECT * FROM ".$this->FleetTbl." WHERE FleetId = '".$FleetId."'";
            $query = $this->db->query($sql);

            $res = $query->row_array();

            if($res['FleetId'] > 0) {
                $fleet_detail = $this->returnFleetDetail($res, $UserProfileId);
            }
        }
        return $fleet_detail;
    }

    
    public function returnFleetDetail($res, $UserProfileId = 0) {
        $FleetId            = $res['FleetId'];
        $AddedBy            = $res['UserProfileId'];
        $FleetName          = (($res['FleetName'] != NULL) ? $res['FleetName'] : "");
        $RegistrationNumber = (($res['RegistrationNumber'] != NULL) ? $res['RegistrationNumber'] : "");
        $DriverName         = (($res['DriverName'] != NULL) ? $res['DriverName'] : "");
        $FleetType         = (($res['FleetType'] != NULL) ? $res['FleetType'] : "");
        $VehicleQuantity    = (($res['VehicleQuantity'] != NULL) ? $res['VehicleQuantity'] : "");
        $FleetStatus        = (($res['FleetStatus'] != NULL) ? $res['FleetStatus'] : "");

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $FleetProfile       = $this->User_Model->getUserProfileInformation($AddedBy, $UserProfileId);

        $data_array = array(
                            "FleetId"               => $FleetId,
                            "UserProfileId"         => $AddedBy,
                            "FleetName"             => $FleetName,
                            "RegistrationNumber"    => $RegistrationNumber,
                            "DriverName"            => $DriverName,
                            "FleetType"             => $FleetType,
                            "VehicleQuantity"       => $VehicleQuantity,
                            "FleetStatus"           => $FleetStatus,
                            "AddedOn"               => $AddedOn,
                            "AddedOnTime"           => $res['AddedOn'],
                            "UpdatedOn"             => $UpdatedOn,
                            "UpdatedOnTime"         => $res['UpdatedOn'],
                            "FleetProfile"          => $FleetProfile,
                            );
        return $data_array;
    }


}