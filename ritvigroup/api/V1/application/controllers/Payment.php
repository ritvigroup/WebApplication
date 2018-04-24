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

    
    public function savePaymentTransactionLog() {
        $error_occured = false;

        $UserProfileId              = $this->input->post('user_profile_id');
        $PaymentGatewayId           = $this->input->post('payment_gateway_id');
        $TransactionId              = $this->input->post('transaction_id');
        $PaymentTo                  = $this->input->post('payment_to_user_profile_id');
        $TransactionDate            = date('Y-m-d H:i:s', strtotime($this->input->post('transaction_date')));
        $TransactionAmount          = $this->input->post('transaction_amount');
        $TransactionShippingAmount  = $this->input->post('transaction_shipping_amount');
        $TransactionStatus          = $this->input->post('transaction_status'); // 0 = Unsuccessful, 1 = Successful
        $DebitOrCredit              = $this->input->post('debit_or_credit'); // 0 = Debit, 1 = Credit
        $TransactionComment         = $this->input->post('comments');
        
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
                                'TransactionId'             => $TransactionId,
                                'PaymentBy'                 => $UserProfileId,
                                'PaymentTo'                 => $PaymentTo,
                                'TransactionDate'           => $TransactionDate,
                                'TransactionAmount'         => $TransactionAmount,
                                'TransactionShippingAmount' => $TransactionShippingAmount,
                                'DebitOrCredit'             => $DebitOrCredit,
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

    
}

