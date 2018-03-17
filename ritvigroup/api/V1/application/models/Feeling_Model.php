<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feeling_Model extends CI_Model {

    function __construct() {
        $this->feelingTbl   = 'Feeling';
    }


    public function getAllFeelings() {
        $this->db->select('*');
        $this->db->from($this->feelingTbl);
        $this->db->where('FeelingStatus', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() > 0) {
            $feeling = array();
            foreach($result AS $key => $result) {
                $feeling[] = array(
                                    'FeelingId'         => $result['FeelingId'],
                                    'FeelingName'       => $result['FeelingName'],
                                    'FeelingImagePath'  => LIKE_IMAGE_URL.$result['FeelingImagePath'],
                                    );
            }
            return $feeling;
        } else {
            return false;
        }
    }


    public function getFeelingDetail($feeling_id) {
        $this->db->select('*');
        $this->db->from($this->feelingTbl);
        $this->db->where('FeelingId', $feeling_id);
        $this->db->where('FeelingStatus', 1);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
                $feeling = array(
                                'FeelingId'         => $result['FeelingId'],
                                'FeelingName'       => $result['FeelingName'],
                                'FeelingImagePath'  => LIKE_IMAGE_URL.$result['FeelingImagePath'],
                                );
            return $feeling;
        } else {
            return false;
        }
    }

} 