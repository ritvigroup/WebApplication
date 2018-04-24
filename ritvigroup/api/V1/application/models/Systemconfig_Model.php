<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Systemconfig_Model extends CI_Model {

    function __construct() {

        $this->SystemConfigTbl = 'SystemConfig';
    }



    public function getSystemConfiguration() {
        $result = array();
        $this->db->select('*');
        $this->db->from($this->SystemConfigTbl);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();

            if(count($result) > 0) {
                foreach($result AS $key => $val) {
                
                    $result[] = array(
                                    'SystemConfigName' => $val['SystemConfigName'],
                                    'SystemConfigValue' => $val['SystemConfigValue'],
                                    );
                }
            }
            
        }
        return $result;
    }


    public function getSystemConfigurationByConfigName($SystemConfigName) {
        $result = array();
        $this->db->select('*');
        $this->db->from($this->SystemConfigTbl);
        $this->db->where('SystemConfigName', $SystemConfigName);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $res = $query->result();

            $result = array(
                            'SystemConfigId'        => $res[0]->SystemConfigId,
                            'SystemConfigName'      => $res[0]->SystemConfigName,
                            'SystemConfigValue'     => $res[0]->SystemConfigValue,
                            );
        }
        return $result;
    }
}