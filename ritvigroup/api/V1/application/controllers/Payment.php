<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Payment Management
*/

class Payment extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('User_Model');
        $this->load->model('Payment_Model');
        $this->load->model('Systemconfig_Model');

        $this->device_token 	= $this->input->post('device_token');
        $this->location_lant 	= $this->input->post('location_lant');
        $this->location_long 	= $this->input->post('location_long');
        $this->device_name 		= $this->input->post('device_name');
        $this->device_os 		= $this->input->post('device_os');
    }

    

    public function getAllPaymentGateway() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $payment_gateway = $this->Payment_Model->getAllPaymentGateway();
            if(count($payment_gateway) > 0) {
                $msg = "Payment gateway fetched successfully";
            } else {
                $msg = "No payment gateway found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $payment_gateway,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

       
    public function getPaymentGatewayApiDetail() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $PaymentGatewayId   = $this->input->post('payment_gateway_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($PaymentGatewayId == "") {
            $msg = "Please select payment gateway";
            $error_occured = true;
        } else {

            $api_detail = $this->Payment_Model->getPaymentGatewayApiDetail($PaymentGatewayId);

            if(count($api_detail) > 0) {
                $msg = "API fetched successfully";
            } else {
                $msg = "API not found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $api_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get My Total Wallet Amount and Points
    public function getMyTotalWalletAmountAndPoints() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $payment_log = $this->Payment_Model->getMyTotalWalletAmountAndPoints($UserProfileId);
            if(count($payment_log) > 0) {
                $msg = "Wallet and point fetched successfully";
            } else {
                $msg = "No wallet found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $payment_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    // Get My Payment and Point Transaction Log
    public function getMyAllPaymentAndPointTransactionLog() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        $Payment_Point   = $this->input->post('payment_point'); // All / Payment / Point
        $debit_credit    = $this->input->post('debit_credit'); // All / 0 / 1
        $ContributeYesNo = $this->input->post('contribute'); // 0 / 1
 
        $Payment_Point = ($Payment_Point != '') ? $Payment_Point : 'All';
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $payment_log = $this->Payment_Model->getMyAllPaymentAndPointTransactionLog($UserProfileId, $Payment_Point, $debit_credit, $ContributeYesNo);
            if(count($payment_log) > 0) {
                $msg = "Payment and Point Log fetched successfully";
            } else {
                $msg = "No Payment log found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $payment_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }

    
    // Save Payment Transaction and Contribution Transaction
    public function savePaymentTransactionLog() {
        $error_occured = false;

        $UserProfileId              = $this->input->post('user_profile_id');
        $PaymentGatewayId           = $this->input->post('payment_gateway_id');
        $IsWalletUse                = ($this->input->post('is_wallet_use') > 0) ? $this->input->post('is_wallet_use') : 0;
        $TransactionId              = $this->input->post('transaction_id');
        $PaymentTo                  = $this->input->post('payment_to_user_profile_id');
        $TransactionDate            = date('Y-m-d H:i:s', strtotime($this->input->post('transaction_date')));
        $TransactionAmount          = $this->input->post('transaction_amount');
        if($IsWalletUse == 0) {
            $GatewayTransaction         = $TransactionAmount;
            $WalletTransaction          = 0.00;
        } else {
            $GatewayTransaction         = 0.00;
            $WalletTransaction          = $TransactionAmount;
        }
        $TransactionShippingAmount  = $this->input->post('transaction_shipping_amount');
        $TransactionStatus          = $this->input->post('transaction_status'); // 0 = Unsuccessful, 1 = Successful
        $DebitOrCredit              = $this->input->post('debit_or_credit'); // 0 = Debit, 1 = Credit
        $TransactionComment         = $this->input->post('comments');
        $IsContribute               = $this->input->post('contribute');
        $IsContribute               = ($IsContribute > 0) ? $IsContribute : 0;
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($TransactionId == "") {
            $msg = "Please enter transaction id";
            $error_occured = true;
        } else {

            $this->db->query("BEGIN");

            $insertData = array(
                                'PaymentGatewayId'          => $PaymentGatewayId,
                                'IsWalletUse'               => $IsWalletUse,
                                'TransactionId'             => $TransactionId,
                                'PaymentBy'                 => $UserProfileId,
                                'PaymentTo'                 => $PaymentTo,
                                'TransactionDate'           => $TransactionDate,
                                'TransactionAmount'         => $TransactionAmount,
                                'GatewayTransaction'        => $GatewayTransaction,
                                'WalletTransaction'         => $WalletTransaction,
                                'TransactionShippingAmount' => $TransactionShippingAmount,
                                'DebitOrCredit'             => $DebitOrCredit,
                                'IsContribute'              => $IsContribute,
                                'TransactionStatus'         => $TransactionStatus,
                                'TransactionComment'        => $TransactionComment,
                                'AddedOn'                   => date('Y-m-d H:i:s'),
                            );
            $PaymentTransactionLogId = $this->Payment_Model->savePaymentTransactionLog($insertData);

            if($PaymentTransactionLogId > 0) {

                $this->db->query("COMMIT");

                $log_detail = $this->Payment_Model->getPaymentTransactionLogDetail($PaymentTransactionLogId);

                $msg = "Payment log added successfully";

            } else {
                $this->db->query("ROLLBACK");
                $msg = "Payment log not saved. Error occured";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $log_detail,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    /***************************** OLD *********************************/
    public function getMyAllPaymentTransactionLog() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $payment_log = $this->Payment_Model->getMyAllPaymentTransactionLog($UserProfileId);
            if(count($payment_log) > 0) {
                $msg = "Payment Log fetched successfully";
            } else {
                $msg = "No Payment log found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $payment_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllPaymentDebitTransactionLog() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $payment_log = $this->Payment_Model->getMyAllPaymentDebitTransactionLog($UserProfileId);
            if(count($payment_log) > 0) {
                $msg = "Payment debit Log fetched successfully";
            } else {
                $msg = "No Payment debit log found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $payment_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    public function getMyAllPaymentCreditTransactionLog() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $payment_log = $this->Payment_Model->getMyAllPaymentCreditTransactionLog($UserProfileId);
            if(count($payment_log) > 0) {
                $msg = "Payment credit Log fetched successfully";
            } else {
                $msg = "No Payment credit log found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $payment_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get My Total Wallet Amout
    public function getMyTotalWalletAmount() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $payment_log = $this->Payment_Model->getMyTotalWalletAmount($UserProfileId);
            if(count($payment_log) > 0) {
                $msg = "Wallet fetched successfully";
            } else {
                $msg = "No wallet found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $payment_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get My All Transaction Log
    public function getMyAllPointTransactionLog() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $point_log = $this->Payment_Model->getMyAllPointTransactionLog($UserProfileId);
            if(count($point_log) > 0) {
                $msg = "Point Log fetched successfully";
            } else {
                $msg = "No point log found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $point_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Get My Total Points Detail
    public function getMyTotalPointDetail() {
        $error_occured = false;

        $UserProfileId   = $this->input->post('user_profile_id');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else {

            $point_log = $this->Payment_Model->getMyTotalPointDetail($UserProfileId);
            if(count($point_log) > 0) {
                $msg = "Points fetched successfully";
            } else {
                $msg = "No point found";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $point_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Convert My Point To Rupee
    public function convertPointToRupee() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $point              = $this->input->post('point');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($point < 100) {
            $msg = "Please enter point greater than 100";
            $error_occured = true;
        } else {

            $point_log = $this->Payment_Model->getMyTotalPointDetail($UserProfileId);
            

            if($point_log['MyPointBalance'] < $point) {
                $msg = "You have no sufficient points to covert into rupee";
                $error_occured = true;
            } else {
                $point_rate = $this->Systemconfig_Model->getSystemConfigurationByConfigName('ConvertRateFromPointToMoney');

                $MyPointBalance = $point_log['MyPointBalance'];


                $point_ratio = $point_rate['SystemConfigValue'];
                $point_ratio = str_replace('{', '', $point_ratio);
                $point_ratio = str_replace('}', '', $point_ratio);

                $point_ratio_exp = explode(':', $point_ratio);

                $transaction_amount = number_format(($point / $point_ratio_exp[0]), 2, '.', '');

                $TransactionComment = 'Converted point to rupee';

                $TransactionId = time().$UserProfileId.mt_rand().rand();

                $PaymentGatewayDetail = $this->Payment_Model->getPaymentGatewayDetailByName('Wallet');

                $insertData = array(
                                    'PaymentGatewayId'          => $PaymentGatewayDetail['PaymentGatewayId'],
                                    'IsWalletUse'               => 1,
                                    'TransactionId'             => $TransactionId,
                                    'PaymentBy'                 => $UserProfileId,
                                    'PaymentTo'                 => $UserProfileId,
                                    'TransactionDate'           => date('Y-m-d H:i:s'),
                                    'TransactionAmount'         => $transaction_amount,
                                    'GatewayTransaction'        => 0.00,
                                    'WalletTransaction'         => $transaction_amount,
                                    'TransactionShippingAmount' => 0.00,
                                    'DebitOrCredit'             => 1,
                                    'TransactionStatus'         => 1,
                                    'TransactionComment'        => $TransactionComment,
                                    'AddedOn'                   => date('Y-m-d H:i:s'),
                                );
                $PaymentTransactionLogId = $this->Payment_Model->savePaymentTransactionLog($insertData);

                $insertPointData = array(
                                        'PointByName'           => 'PointToRupee',
                                        'PaymentGatewayId'      => $PaymentGatewayDetail['PaymentGatewayId'],
                                        'IsWalletUse'           => 1,
                                        'PointById'             => 0,
                                        'TransactionId'         => $TransactionId,
                                        'PaymentBy'             => $UserProfileId,
                                        'PaymentTo'             => $UserProfileId,
                                        'TransactionDate'       => date('Y-m-d H:i:s'),
                                        'AddedOn'               => date('Y-m-d H:i:s'),
                                        'TransactionPoint'      => $point,
                                        'TransactionChargePoint' => 0,
                                        'DebitOrCredit'         => 0,
                                        'TransactionStatus'     => 1,
                                        'TransactionComment'    => $TransactionComment,
                                        );

                $this->db->insert('PointTransactionLog', $insertPointData);

                $point_log = $this->Payment_Model->getMyTotalPointDetail($UserProfileId);

                $msg = "Point converted to rupee successfully";
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $point_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }


    // Convert My Rupee To Point
    public function convertRupeeToPoint() {
        $error_occured = false;

        $UserProfileId      = $this->input->post('user_profile_id');
        $rupee              = $this->input->post('rupee');
        
        if($UserProfileId == "") {
            $msg = "Please select your profile";
            $error_occured = true;
        } else if($rupee < 10) {
            $msg = "Please enter rupee greater than 10";
            $error_occured = true;
        } else {

            $wallet_log = $this->Payment_Model->getMyTotalWalletAmount($UserProfileId);

            if($wallet_log['MyWalletBalance'] < $rupee) {
                $msg = "You have no sufficient points to covert into rupee";
                $error_occured = true;
            } else {
                $rupee_rate = $this->Systemconfig_Model->getSystemConfigurationByConfigName('ConvertRateFromMoneyToPoint');

                $MyWalletBalance = $wallet_log['MyWalletBalance'];


                $rupee_ratio = $rupee_rate['SystemConfigValue'];
                $rupee_ratio = str_replace('{', '', $rupee_ratio);
                $rupee_ratio = str_replace('}', '', $rupee_ratio);

                $rupee_ratio_exp = explode(':', $rupee_ratio);

                $transaction_point = number_format(($rupee * $rupee_ratio_exp[1]), 2, '.', '');

                $TransactionComment = 'Converted rupee to point';

                $TransactionId = time().$UserProfileId.mt_rand().rand();

                $PaymentGatewayDetail = $this->Payment_Model->getPaymentGatewayDetailByName('Wallet');

                $insertData = array(
                                    'PaymentGatewayId'          => $PaymentGatewayDetail['PaymentGatewayId'],
                                    'IsWalletUse'               => 1,
                                    'TransactionId'             => $TransactionId,
                                    'PaymentBy'                 => $UserProfileId,
                                    'PaymentTo'                 => $UserProfileId,
                                    'TransactionDate'           => date('Y-m-d H:i:s'),
                                    'TransactionAmount'         => $rupee,
                                    'GatewayTransaction'        => 0.00,
                                    'WalletTransaction'         => $rupee,
                                    'TransactionShippingAmount' => 0.00,
                                    'DebitOrCredit'             => 0,
                                    'TransactionStatus'         => 1,
                                    'TransactionComment'        => $TransactionComment,
                                    'AddedOn'                   => date('Y-m-d H:i:s'),
                                );
                $PaymentTransactionLogId = $this->Payment_Model->savePaymentTransactionLog($insertData);

                $insertPointData = array(
                                        'PaymentGatewayId'      => $PaymentGatewayDetail['PaymentGatewayId'],
                                        'IsWalletUse'           => 1,
                                        'PointByName'           => 'RupeeToPoint',
                                        'PointById'             => 0,
                                        'TransactionId'         => $TransactionId,
                                        'PaymentBy'             => $UserProfileId,
                                        'PaymentTo'             => $UserProfileId,
                                        'TransactionDate'       => date('Y-m-d H:i:s'),
                                        'AddedOn'               => date('Y-m-d H:i:s'),
                                        'TransactionPoint'      => $transaction_point,
                                        'TransactionChargePoint' => 0,
                                        'DebitOrCredit'         => 1,
                                        'TransactionStatus'     => 1,
                                        'TransactionComment'    => $TransactionComment,
                                        );

                $this->db->insert('PointTransactionLog', $insertPointData);

                $wallet_log = $this->Payment_Model->getMyTotalWalletAmount($UserProfileId);

                $msg = "Rupee converted to point successfully";
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            $array = array(
                           "status"     => 'success',
                           "result"     => $wallet_log,
                           "message"    => $msg,
                           );
        }
        displayJsonEncode($array);
    }



    
}

