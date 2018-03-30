<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Plan_Model extends CI_Model {

    function __construct() {

        $this->UserTypeTbl          = 'UserType';
        $this->VehicleTbl           = 'Vehicle';
        $this->StateCityTbl         = 'StateCity';
        $this->FundTbl              = 'Fund';
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
            $City[] = array(
                                'CityId'                => $result['CityId'],
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
                                );
        }
        return $City;
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