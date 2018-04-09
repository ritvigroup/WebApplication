<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_Model extends CI_Model {

    function __construct() {

        $this->PaymentGatewayTbl        = 'PaymentGateway';
        $this->PaymentGatewayAPITbl     = 'PaymentGatewayAPI';
        $this->PaymentTransactionLogTbl = 'PaymentTransactionLog';

    }



    public function getAllPaymentGateway() {
        $result = array();
        $this->db->select('*');
        $this->db->from($this->PaymentGatewayTbl);
        $this->db->where('PaymentGatewayStatus', 1);
        $this->db->order_by('PaymentGatewayName', 'ASC');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }


    // Get Payment API Detail
    public function getPaymentGatewayApiDetail($PaymentGatewayId) {
        $api_detail = array();
        if(isset($PaymentGatewayId) && $PaymentGatewayId > 0) {

            $this->db->select('*');
            $this->db->from($this->PaymentGatewayAPITbl);
            $this->db->where('PaymentGatewayId', $PaymentGatewayId);
            $this->db->where('ApiStatus', 1);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $api_detail = $this->returnPaymentGatewayApiDetail($res);
            }
            
        } else {
            $api_detail = array();
        }
        return $api_detail;
    }


    // Return Payment Gateway Api Detail
    public function returnPaymentGatewayApiDetail($res) {
        $PaymentGatewayAPI     = $res['PaymentGatewayAPI'];
        $PaymentGatewayId      = $res['PaymentGatewayId'];
        
        $ApiUrl             = (($res['ApiUrl'] != NULL) ? $res['ApiUrl'] : "");
        $ApiMerchantKey     = (($res['ApiMerchantKey'] != NULL) ? $res['ApiMerchantKey'] : "");
        $ApiUsername        = (($res['ApiUsername'] != NULL) ? $res['ApiUsername'] : "");
        $ApiPassword        = (($res['ApiPassword'] != NULL) ? $res['ApiPassword'] : "");
        $ApiAccessKey       = (($res['ApiAccessKey'] != NULL) ? $res['ApiAccessKey'] : "");
        $ApiStatus          = $res['ApiStatus'];

        $data_array = array(
                            "PaymentGatewayAPI"     => $PaymentGatewayAPI,
                            "PaymentGatewayId"      => $PaymentGatewayId,
                            "ApiUrl"                => $ApiUrl,
                            "ApiMerchantKey"        => $ApiMerchantKey,
                            "ApiUsername"           => $ApiUsername,
                            "ApiPassword"           => $ApiPassword,
                            "ApiAccessKey"          => $ApiAccessKey,
                            "ApiStatus"             => $ApiStatus,
                            );
        return $data_array;
    }


    public function savePaymentTransactionLog($insertData) {
        $this->db->insert($this->PaymentTransactionLogTbl, $insertData);

        $log_id = $this->db->insert_id();

        return $log_id;
    }


    // Get My Payment Transaction Log
    public function getMyAllPaymentTransactionLog($UserProfileId) {
        $log_detail = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('PaymentTransactionLogId');
            $this->db->from($this->PaymentTransactionLogTbl);
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->order_by('TransactionDate', 'DESC');
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                $res = $query->result_array();
                foreach($res AS $key => $result) {
                    $log_detail[] = $this->getPaymentTransactionLogDetail($result['PaymentTransactionLogId']);
                }
            }
            
        } else {
            $log_detail = array();
        }
        return $log_detail;
    }


    // Get Payment Transaction Detail
    public function getPaymentTransactionLogDetail($PaymentTransactionLogId) {
        $log_detail = array();
        if(isset($PaymentTransactionLogId) && $PaymentTransactionLogId > 0) {

            $this->db->select('ptl.*, pg.PaymentGatewayName');
            $this->db->from($this->PaymentTransactionLogTbl.' AS ptl');
            $this->db->join($this->PaymentGatewayTbl.' AS pg', 'ptl.PaymentGatewayId = pg.PaymentGatewayId' , 'LEFT');
            $this->db->where('ptl.PaymentTransactionLogId', $PaymentTransactionLogId);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $log_detail = $this->returnPaymentTransactionLogDetail($res);
            }
            
        } else {
            $log_detail = array();
        }
        return $log_detail;
    }


    // Return Payment Transaction Log Detail
    public function returnPaymentTransactionLogDetail($res) {
        $PaymentTransactionLogId    = $res['PaymentTransactionLogId'];
        $PaymentGatewayId           = $res['PaymentGatewayId'];
        $PaymentGatewayName         = $res['PaymentGatewayName'];
        
       
        $TransactionId              = (($res['TransactionId'] != NULL) ? $res['TransactionId'] : "");
        $TransactionDate            = (($res['TransactionDate'] != NULL) ? $res['TransactionDate'] : "");
        $TransactionAmount          = (($res['TransactionAmount'] != NULL) ? $res['TransactionAmount'] : "");
        $TransactionShippingAmount  = (($res['TransactionShippingAmount'] != NULL) ? $res['TransactionShippingAmount'] : "");
        $DebitOrCredit              = (($res['DebitOrCredit'] != NULL) ? $res['DebitOrCredit'] : "");
        $TransactionComment         = (($res['TransactionComment'] != NULL) ? $res['TransactionComment'] : "");
        $TransactionStatus          = $res['TransactionStatus'];

        $AddedOn         = return_time_ago($res['AddedOn']);

        $PaymentBy       = $this->User_Model->getUserProfileWithUserInformation($res['PaymentBy']);
        $PaymentTo       = $this->User_Model->getUserProfileWithUserInformation($res['PaymentTo']);

        $data_array = array(
                            "PaymentTransactionLogId"       => $PaymentTransactionLogId,
                            "PaymentGatewayId"              => $PaymentGatewayId,
                            "PaymentGatewayName"            => $PaymentGatewayName,
                            "TransactionId"                 => $TransactionId,
                            "TransactionDate"               => $TransactionDate,
                            "TransactionAmount"             => $TransactionAmount,
                            "TransactionShippingAmount"     => $TransactionShippingAmount,
                            "DebitOrCredit"                 => $DebitOrCredit,
                            "TransactionComment"            => $TransactionComment,
                            "TransactionStatus"             => $TransactionStatus,
                            "AddedOn"                       => $AddedOn,
                            "AddedOnTime"                   => $res['AddedOn'],
                            "PaymentBy"                     => $PaymentBy,
                            "PaymentTo"                     => $PaymentTo,
                            );
        return $data_array;
    }
}