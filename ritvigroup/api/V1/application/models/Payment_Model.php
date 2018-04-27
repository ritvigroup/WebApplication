<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_Model extends CI_Model {

    function __construct() {

        $this->PaymentGatewayTbl        = 'PaymentGateway';
        $this->PaymentGatewayAPITbl     = 'PaymentGatewayAPI';
        $this->PaymentTransactionLogTbl = 'PaymentTransactionLog';


        $this->PointTransactionLogTbl   = 'PointTransactionLog';

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
            $this->db->order_by('AddedOn', 'DESC');
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


    // Get My Payment Debit Transaction Log
    public function getMyAllPaymentDebitTransactionLog($UserProfileId) {
        $log_detail = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('PaymentTransactionLogId');
            $this->db->from($this->PaymentTransactionLogTbl);
            $this->db->where('DebitOrCredit', 0);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $this->db->order_by('AddedOn', 'DESC');

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


    // Get My Payment Credit Transaction Log
    public function getMyAllPaymentCreditTransactionLog($UserProfileId) {
        $log_detail = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('PaymentTransactionLogId');
            $this->db->from($this->PaymentTransactionLogTbl);
            $this->db->where('DebitOrCredit', 1);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $this->db->order_by('AddedOn', 'DESC');

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
        
       
        $PaymentGatewayName         = (($res['PaymentGatewayName'] != NULL) ? $res['PaymentGatewayName'] : "");
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


    // Get My Point Transaction Log
    public function getMyAllPointTransactionLog($UserProfileId) {
        $log_detail = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('PointTransactionLogId');
            $this->db->from($this->PointTransactionLogTbl);
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->order_by('AddedOn', 'DESC');
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                $res = $query->result_array();
                foreach($res AS $key => $result) {
                    $log_detail[] = $this->getPointTransactionLogDetail($result['PointTransactionLogId']);
                }
            }
            
        } else {
            $log_detail = array();
        }
        return $log_detail;
    }


    // Get Point Transaction Detail
    public function getPointTransactionLogDetail($PointTransactionLogId) {
        $log_detail = array();
        if(isset($PointTransactionLogId) && $PointTransactionLogId > 0) {

            $this->db->select('*');
            $this->db->from($this->PointTransactionLogTbl);
            $this->db->where('PointTransactionLogId', $PointTransactionLogId);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $log_detail = $this->returnPointTransactionLogDetail($res);
            }
            
        } else {
            $log_detail = array();
        }
        return $log_detail;
    }


    // Return Point Transaction Log Detail
    public function returnPointTransactionLogDetail($res) {
        $PointTransactionLogId      = $res['PointTransactionLogId'];
        $PointByName                = $res['PointByName'];
        $PointById                  = $res['PointById'];
        
       
        $TransactionId              = (($res['TransactionId'] != NULL) ? $res['TransactionId'] : "");
        $TransactionDate            = (($res['TransactionDate'] != NULL) ? $res['TransactionDate'] : "");
        $TransactionPoint           = (($res['TransactionPoint'] != NULL) ? $res['TransactionPoint'] : "");
        $TransactionChargePoint     = (($res['TransactionChargePoint'] != NULL) ? $res['TransactionChargePoint'] : "");
        $DebitOrCredit              = (($res['DebitOrCredit'] != NULL) ? $res['DebitOrCredit'] : "");
        $TransactionComment         = (($res['TransactionComment'] != NULL) ? $res['TransactionComment'] : "");
        $TransactionStatus          = $res['TransactionStatus'];

        $AddedOn         = return_time_ago($res['AddedOn']);

        $PaymentBy       = $this->User_Model->getUserProfileWithUserInformation($res['PaymentBy']);
        $PaymentTo       = $this->User_Model->getUserProfileWithUserInformation($res['PaymentTo']);

        $data_array = array(
                            "PointTransactionLogId"         => $PointTransactionLogId,
                            "PointByName"                   => $PointByName,
                            "PointById"                     => $PointById,
                            "TransactionId"                 => $TransactionId,
                            "TransactionDate"               => $TransactionDate,
                            "TransactionPoint"              => $TransactionPoint,
                            "TransactionChargePoint"        => $TransactionChargePoint,
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


    // My Point Detail
    public function getMyTotalPointDetail($UserProfileId) {
        $log_detail = array(
                            'MyPointBalance' => 0,
                            'TotalDebit' => 0,
                            'TotalCredit' => 0,
                            );
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('SUM(TransactionPoint) AS TotalDebit');
            $this->db->from($this->PointTransactionLogTbl);
            $this->db->where('DebitOrCredit', 0);
            $this->db->where('TransactionStatus', 1);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $query = $this->db->get();
            
            $TotalDebit = 0;
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $TotalDebit = ($res['TotalDebit'] > 0) ? $res['TotalDebit'] : 0;
            }

            $this->db->select('SUM(TransactionPoint) AS TotalCredit');
            $this->db->from($this->PointTransactionLogTbl);
            $this->db->where('DebitOrCredit', 1);
            $this->db->where('TransactionStatus', 1);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $query = $this->db->get();
            
            $TotalCredit = 0;
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $TotalCredit = ($res['TotalCredit'] > 0) ? $res['TotalCredit'] : 0;
            }

            $log_detail = array(
                            'MyPointBalance' => ($TotalCredit - $TotalDebit),
                            'TotalDebit' => $TotalDebit,
                            'TotalCredit' => $TotalCredit,
                            );
            
        }
        return $log_detail;
    }


    // My Wallet Amount
    public function getMyTotalWalletAmount($UserProfileId) {
        $log_detail = array(
                            'MyWalletBalance' => 0.00,
                            'TotalDebit' => 0.00,
                            'TotalCredit' => 0.00,
                            );
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('SUM(TransactionAmount) AS TotalDebit');
            $this->db->from($this->PaymentTransactionLogTbl);
            $this->db->where('DebitOrCredit', 0);
            $this->db->where('TransactionStatus', 1);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $query = $this->db->get();
            
            $TotalDebit = 0.00;
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $TotalDebit = ($res['TotalDebit'] > 0) ? $res['TotalDebit'] : 0.00;
            }

            $this->db->select('SUM(TransactionAmount) AS TotalCredit');
            $this->db->from($this->PaymentTransactionLogTbl);
            $this->db->where('DebitOrCredit', 1);
            $this->db->where('TransactionStatus', 1);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $query = $this->db->get();
            
            $TotalCredit = 0.00;
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $TotalCredit = ($res['TotalCredit'] > 0) ? $res['TotalCredit'] : 0.00;
            }

            $log_detail = array(
                            'MyWalletBalance' => number_format(($TotalCredit - $TotalDebit), 2, '.', ''),
                            'TotalDebit' => number_format($TotalDebit, 2, '.', ''),
                            'TotalCredit' => number_format($TotalCredit, 2, '.', ''),
                            );
            
        }
        return $log_detail;
    }


    ////////////////// ============= NEW ==================/////////////////
    // Get My Total Wallet Amount and Points
    public function getMyTotalWalletAmountAndPoints($UserProfileId) {
        $log_detail = array(
                            'MyWalletBalance'       => 0.00,
                            'TotalWalletDebit'      => 0.00,
                            'TotalWalletCredit'     => 0.00,
                            'MyPointBalance'        => 0,
                            'TotalPointDebit'       => 0,
                            'TotalPointCredit'      => 0,
                            );

        if(isset($UserProfileId) && $UserProfileId > 0) {

            $this->db->select('SUM(TransactionPoint) AS TotalPointDebit');
            $this->db->from($this->PointTransactionLogTbl);
            $this->db->where('DebitOrCredit', 0);
            $this->db->where('TransactionStatus', 1);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $query = $this->db->get();
            
            $TotalPointDebit = 0;
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $TotalPointDebit = ($res['TotalPointDebit'] > 0) ? $res['TotalPointDebit'] : 0;
            }

            $this->db->select('SUM(TransactionPoint) AS TotalPointCredit');
            $this->db->from($this->PointTransactionLogTbl);
            $this->db->where('DebitOrCredit', 1);
            $this->db->where('TransactionStatus', 1);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $query = $this->db->get();
            
            $TotalPointCredit = 0;
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $TotalPointCredit = ($res['TotalPointCredit'] > 0) ? $res['TotalPointCredit'] : 0;
            }
           

            $this->db->select('SUM(TransactionAmount) AS TotalWalletDebit');
            $this->db->from($this->PaymentTransactionLogTbl);
            $this->db->where('DebitOrCredit', 0);
            $this->db->where('TransactionStatus', 1);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $query = $this->db->get();
            
            $TotalWalletDebit = 0.00;
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $TotalWalletDebit = ($res['TotalWalletDebit'] > 0) ? $res['TotalWalletDebit'] : 0.00;
            }

            $this->db->select('SUM(TransactionAmount) AS TotalWalletCredit');
            $this->db->from($this->PaymentTransactionLogTbl);
            $this->db->where('DebitOrCredit', 1);
            $this->db->where('TransactionStatus', 1);
            $this->db->group_start();
            $this->db->where('PaymentBy', $UserProfileId);
            $this->db->or_where('PaymentTo', $UserProfileId);
            $this->db->group_end();
            $query = $this->db->get();
            
            $TotalWalletCredit = 0.00;
            if ($query->num_rows() > 0) {
                $res = $query->row_array();
                $TotalWalletCredit = ($res['TotalWalletCredit'] > 0) ? $res['TotalWalletCredit'] : 0.00;
            }

            $log_detail = array(
                            'MyPointBalance'        => ($TotalPointCredit - $TotalPointDebit),
                            'TotalPointDebit'       => $TotalPointDebit,
                            'TotalPointCredit'      => $TotalPointCredit,
                            'MyWalletBalance'       => number_format(($TotalWalletCredit - $TotalWalletDebit), 2, '.', ''),
                            'TotalWalletDebit'      => number_format($TotalWalletDebit, 2, '.', ''),
                            'TotalWalletCredit'     => number_format($TotalWalletCredit, 2, '.', ''),
                            );
            
        }
        return $log_detail;
    }


    // Get My Payment And Point Transaction Log
    public function getMyAllPaymentAndPointTransactionLog($UserProfileId) {
        $log_detail = array();
        if(isset($UserProfileId) && $UserProfileId > 0) {

            $sql = "SELECT 'Payment' AS PaymentPointType, `PaymentTransactionLogId` AS LogId, `AddedOn` AS DateAdded 
                                                FROM ".$this->PaymentTransactionLogTbl." 
                                            WHERE 
                                                (`PaymentBy`= '".$UserProfileId."' OR `PaymentTo` = '".$UserProfileId."')";
            $sql .= " UNION ";

            $sql .= "SELECT 'Point' AS PaymentPointType, `PointTransactionLogId` AS LogId, `AddedOn` AS DateAdded 
                                                FROM ".$this->PointTransactionLogTbl." 
                                            WHERE 
                                                (`PaymentBy`= '".$UserProfileId."' OR `PaymentTo` = '".$UserProfileId."')";
            $sql .= " ORDER BY `DateAdded` DESC LIMIT 0, 200";

            $query = $this->db->query($sql);
            
            if ($query->num_rows() > 0) {
                $res = $query->result_array();
                foreach($res AS $key => $result) {

                    if($result['PaymentPointType'] == 'Payment') {
                        $log_detail[] = array(
                                            'feedtype'      => 'payment',
                                            'paymentdata'   => $this->getPaymentTransactionLogDetail($result['LogId']),
                                            );
                    } else if($result['PaymentPointType'] == 'Point') {
                        $log_detail[] = array(
                                            'feedtype'      => 'point',
                                            'pointdata'     => $this->getPointTransactionLogDetail($result['LogId']),
                                            );
                    }
                }
            }
            
        } else {
            $log_detail = array();
        }
        return $log_detail;
    }
    
}