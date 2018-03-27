<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Politicalparty_Model extends CI_Model {

    function __construct() {
        $this->politicalPartyTbl   = 'PoliticalParty';
    }


    public function getAllPoliticalParty() {
        $this->db->select('*');
        $this->db->from($this->politicalPartyTbl);
        $this->db->where('PoliticalPartyStatus', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() > 0) {
            $politicalparty = array();
            foreach($result AS $key => $result) {
                $politicalparty[] = $this->returnPoliticalParty($result);
            }
            return $politicalparty;
        } else {
            return false;
        }
    }


    public function getPoliticalPartyDetail($political_party_id) {
        $this->db->select('*');
        $this->db->from($this->politicalPartyTbl);
        $this->db->where('PoliticalPartyId', $political_party_id);
        $this->db->where('PoliticalPartyStatus', 1);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
                $feeling = $this->returnPoliticalParty($result);
            return $feeling;
        } else {
            return false;
        }
    }


    public function returnPoliticalParty($result) {
        $detail = array(
                        'PoliticalPartyId'              => $result['PoliticalPartyId'],
                        'PoliticalPartyName'            => $result['PoliticalPartyName'],
                        'PoliticalPartyCode'            => $result['PoliticalPartyCode'],
                        'PoliticalPartyDescription'     => $result['PoliticalPartyDescription'],
                        'PoliticalPartyWebsite'         => $result['PoliticalPartyWebsite'],
                        'PoliticalPartyLocation'        => $result['PoliticalPartyLocation'],
                        'PoliticalPartyEstablishedYear' => $result['PoliticalPartyEstablishedYear'],
                        'PoliticalPartyPresidentName'   => $result['PoliticalPartyPresidentName'],
                        'PoliticalPartyStatus'          => $result['PoliticalPartyStatus'],
                        );
        return $detail;
    }

} 