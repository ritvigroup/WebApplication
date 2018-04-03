<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Plan_Model extends CI_Model {

    function __construct() {

        $this->UserTypeTbl              = 'UserType';
        $this->PlanTbl                  = 'Plan';
        $this->PlanTargetPopulationTbl  = 'PlanTargetPopulation';
        $this->PlanFundTbl              = 'PlanFund';
        $this->VehicleTbl               = 'Vehicle';
        $this->StateCityTbl             = 'StateCity';
        $this->FundTbl                  = 'Fund';
    }


    public function generatePlanUniqueId() {
        $PlanUniqueId = "P".mt_rand().time();
        $this->db->select('PlanUniqueId');
        $this->db->from($this->PlanTbl);
        $this->db->where('PlanUniqueId', $PlanUniqueId);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->generatePlanUniqueId();
        }
        return $PlanUniqueId;
    }


    public function saveMyLeaderPlan($insertData) {
        $this->db->insert($this->PlanTbl, $insertData);

        $plan_id = $this->db->insert_id();

        return $plan_id;
    }


    public function savePlanTargetPopulation($insertData) {
        $this->db->insert($this->PlanTargetPopulationTbl, $insertData);

        return true;
    }


    public function savePlanFund($PlanId, $funds) {
        foreach($funds AS $key => $fund) {
            $insertData = array(
                                'PlanId'    => $PlanId,
                                'FundId'    => $fund,
                                );
            $this->db->insert($this->PlanFundTbl, $insertData);
        }
        return true;
    }


    public function getMyAllPlan($UserProfileId) {
        $plans = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('PlanId');
            $this->db->from($this->PlanTbl);
            $this->db->where('UserProfileId', $UserProfileId);
            $this->db->order_by('AddedOn','DESC');
            $query = $this->db->get();

            $res = $query->result_array();

            foreach($res AS $key => $result) {
                $plans[] = array(
                                'feedtype' => 'plan',
                                'plandata' => $this->getPlanDetail($result['PlanId'], $UserProfileId),
                                );
            }
        } else {
            $plans = array();
        }
        return $plans;
    }



    public function getPlanDetail($PlanId, $UserProfileId = 0) {
        $plan_detail = array();
        if(isset($PlanId) && $PlanId > 0) {

            $query = $this->db->query("SELECT * FROM $this->PlanTbl WHERE PlanId = '".$PlanId."'");

            $res = $query->row_array();

            if($res['PlanId'] > 0) {
                $plan_detail = $this->returnPlanDetail($res, $UserProfileId);
            }
        } else {
            $plan_detail = array();
        }
        return $plan_detail;
    }

    
    public function returnPlanDetail($res, $UserProfileId = 0) {
        $PlanId            = $res['PlanId'];
        $PlanUniqueId      = $res['PlanUniqueId'];
        
        $AddedBy      = $res['UserProfileId'];
        $UserTypeId         = $res['UserTypeId'];
        $StateId            = (($res['StateId'] > 0) ? $res['StateId'] : "");
        $CityId             = (($res['CityId'] > 0) ? $res['CityId'] : "");
        $TotalTeamMale      = (($res['TotalTeamMale'] != NULL) ? $res['TotalTeamMale'] : "");
        $TotalTeamFemale    = (($res['TotalTeamFemale'] != NULL) ? $res['TotalTeamFemale'] : "");
        $TotalBudget        = (($res['TotalBudget'] != NULL) ? $res['TotalBudget'] : "");
        $TotalEvent         = (($res['TotalEvent'] != NULL) ? $res['TotalEvent'] : "");
        $TotalVehicle       = (($res['TotalVehicle'] != NULL) ? $res['TotalVehicle'] : "");
        $PlanStatus         = $res['PlanStatus'];

        $AddedOn            = return_time_ago($res['AddedOn']);
        $UpdatedOn          = return_time_ago($res['UpdatedOn']);

        $PlanProfile        = $this->User_Model->getUserProfileWithUserInformation($AddedBy);
        
        $PlanFund               = $this->getPlanFund($PlanId);
        $PlanTargetPopulation   = $this->getPlanTargetPopulation($PlanId);
        $UserTypeDetail         = $this->getUserTypeDetail($UserTypeId);

        $UserType = $UserTypeDetail['TypeName'];

        $user_data_array = array(
                                "PlanId"            => $PlanId,
                                "PlanUniqueId"      => $PlanUniqueId,
                                "UserProfileId"     => $AddedBy,
                                "UserTypeId"        => $UserTypeId,
                                "UserType"          => $UserType,
                                "StateId"           => $StateId,
                                "CityId"            => $CityId,
                                "TotalTeamMale"     => $TotalTeamMale,
                                "TotalTeamFemale"   => $TotalTeamFemale,
                                "TotalBudget"       => $TotalBudget,
                                "TotalEvent"        => $TotalEvent,
                                "TotalVehicle"      => $TotalVehicle,
                                "PlanStatus"        => $PlanStatus,
                                "PlanProfile"       => $PlanProfile,
                                "PlanFund"          => $PlanFund,
                                "PlanTargetPopulation"        => $PlanTargetPopulation,
                                "AddedOn"            => $AddedOn,
                                "AddedOnTime"        => $res['AddedOn'],
                                "UpdatedOn"          => $UpdatedOn,
                                "UpdatedOnTime"      => $res['UpdatedOn'],
                                );
        return $user_data_array;
    }



    public function getPlanFund($PlanId) {
        
        $PlanFund = array();

        $query = $this->db->query("SELECT f.FundName 
                                            FROM ".$this->PlanFundTbl." AS pf 
                                            LEFT JOIN ".$this->FundTbl." AS f ON pf.FundId = f.FundId
                                            WHERE 
                                                pf.`PlanId` = '".$PlanId."'");

        
        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $PlanFund[] = $result['FundName'];
        }

        return $PlanFund;
    }


    public function getPlanTargetPopulation($PlanId) {
        
        $PlanTargetPopulation = array();

        $query = $this->db->query("SELECT * FROM ".$this->PlanTargetPopulationTbl." WHERE `PlanId` = '".$PlanId."'");

        $res = $query->result_array();

        foreach($res AS $key => $result) {
            $PlanTargetPopulation[] = array(
                                           'PlanId'                 => $result['PlanId'],
                                           'TotalPopulation'        => $result['TotalPopulation'],
                                           'MalePopulation'         => $result['MalePopulation'],
                                           'FemalePopulation'       => $result['FemalePopulation'],
                                           'Above18_30Population'   => $result['Above18_30Population'],
                                           'Above31_50Population'   => $result['Above31_50Population'],
                                           'Above51_60Population'   => $result['Above51_60Population'],
                                           'Above60Population'      => $result['Above60Population'],
                                           'TotalArea'              => $result['TotalArea'],
                                            );
        }

        return $PlanTargetPopulation;
    }


    public function getUserTypeDetail($UserTypeId) {
        $UserTypeDetail = array();
        if($UserTypeId > 0) {
            $this->db->select('TypeName, TypeDescription');
            $this->db->from($this->UserTypeTbl);
            $this->db->where('UserTypeId', $UserTypeId);
            $query = $this->db->get();
            $res = $query->row_array();
            $UserTypeDetail = array(
                                    'TypeName'          => $res['TypeName'],
                                    'TypeDescription'   => $res['TypeDescription'],
                                    );
        }
        return $UserTypeDetail;
    }


    public function getAllNonDefaultUserType() {
        $UserType = array();
        $this->db->select('*');
        $this->db->from($this->UserTypeTbl);
        $this->db->where('TypeDefault', 0);
        $this->db->where('TypeStatus', 1);
        $this->db->order_by('TypeName', 'ASC');
        $query = $this->db->get();
        $res = $query->result_array();
        foreach($res AS $key => $result) {
            $UserType[] = array(
                                'UserTypeId'        => $result['UserTypeId'],
                                'TypeName'          => $result['TypeName'],
                                'TypeDescription'   => $result['TypeDescription'],
                                );
        }
        return $UserType;
    }


    public function getAllVehicle() {
        $Vehicle = array();
        $this->db->select('*');
        $this->db->from($this->VehicleTbl);
        $this->db->where('VehicleStatus', 1);
        $this->db->order_by('VehicleName', 'ASC');
        $query = $this->db->get();
        $res = $query->result_array();
        foreach($res AS $key => $result) {
            $Vehicle[] = array(
                                'VehicleId'             => $result['VehicleId'],
                                'VehicleName'           => $result['VehicleName'],
                                'VehicleDescription'    => $result['VehicleDescription'],
                                );
        }
        return $Vehicle;
    }


    public function searchCity($search_text, $UserProfileId) {
        $City = array();
        $this->db->select('*');
        $this->db->from($this->StateCityTbl);
        $this->db->where('CityStatus', 1);
        $this->db->like('CityName', $search_text);
        $this->db->order_by('CityName', 'ASC');
        $this->db->limit(15);
        $query = $this->db->get();
        $res = $query->result_array();
        foreach($res AS $key => $result) {
            $City[] = $this->returnCity($result);
        }
        return $City;
    }


    public function searchCityByCityId($state_id_city_id, $UserProfileId) {

        $exp_state_id_city_id = explode("_", $state_id_city_id);
        $state_id   = $exp_state_id_city_id[0];
        $city_id    = $exp_state_id_city_id[1];
        $City = array();
        if($city_id > 0) {
            $this->db->select('*');
            $this->db->from($this->StateCityTbl);
            $this->db->where('CityStatus', 1);
            $this->db->where('CityId', $city_id);
            $this->db->order_by('CityName', 'ASC');
            $query = $this->db->get();
            $res = $query->result_array();
            foreach($res AS $key => $result) {
                $City = $this->returnCity($result);
            }
        }
        return $City;
    }



    public function getAllStateCity($UserProfileId) {
        $City = array();
        $this->db->select('*');
        $this->db->from($this->StateCityTbl);
        $this->db->where('CityStatus', 1);
        $this->db->order_by('CityName', 'ASC');
        $query = $this->db->get();
        $res = $query->result_array();
        foreach($res AS $key => $result) {
            $City[] = $this->returnCity($result);
        }
        return $City;
    }

    public function returnCity($result) {
        $city = array(
                    'CityId'                => $result['CityId'],
                    'StateId'               => $result['StateId'],
                    'CityName'              => $result['CityName'],
                    'CityLatitude'          => (($result['CityLatitude'] != NULL) ? $result['CityLatitude'] : ""),
                    'CityLongitude'         => (($result['CityLongitude'] != NULL) ? $result['CityLongitude'] : ""),
                    'TotalPopulation'       => (($result['TotalPopulation'] != NULL) ? $result['TotalPopulation'] : ""),
                    'MalePopulation'        => (($result['MalePopulation'] != NULL) ? $result['MalePopulation'] : ""),
                    'FemalePopulation'      => (($result['FemalePopulation'] != NULL) ? $result['FemalePopulation'] : ""),
                    'Above18_30Population'  => (($result['Above18_30Population'] != NULL) ? $result['Above18_30Population'] : ""),
                    'Above31_50Population'  => (($result['Above31_50Population'] != NULL) ? $result['Above31_50Population'] : ""),
                    'Above51_60Population'  => (($result['Above51_60Population'] != NULL) ? $result['Above51_60Population'] : ""),
                    'Above60Population'     => (($result['Above60Population'] != NULL) ? $result['Above60Population'] : ""),
                    'TotalArea'             => (($result['TotalArea'] != NULL) ? $result['TotalArea'] : ""),
                    );
        return $city;
    }


    public function getAllFund() {
        $Fund = array();
        $this->db->select('*');
        $this->db->from($this->FundTbl);
        $this->db->where('FundStatus', 1);
        $query = $this->db->get();
        $res = $query->result_array();
        foreach($res AS $key => $result) {
            $Fund[] = array(
                            'FundId'             => $result['FundId'],
                            'FundName'           => $result['FundName'],
                            );
        }
        return $Fund;
    }


    
    

}