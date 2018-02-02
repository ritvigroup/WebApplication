<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Admin extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        //$this->load->model('user');
    }

    function activation_code()
    {
        return mt_rand().md5(date("dmYhis").time());
    }

    public function login_with_mpin() {

        $mobile     = trim($this->input->post('mobile'));
        $mpin       = trim($this->input->post('mpin'));
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else if($mpin == "") {
            $msg = "Please enter your mpin";
            $error_occured = true;
        } else {

            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('phone', $mobile);
            $this->db->andwhere('mpin', $mpin);
            $query = $this->db->get();
            $res_u = $query->row_array();

            if($res_u['status'] == '1') {
                $user_id = $res_u['id'];

                $updateData = array(
                    'login_status' => 1,
                );
                
                $this->db->where('id', $user_id);
                $this->db->update('admin', $updateData);
                
                $user_detail['user_profile'] = $this->get_user_detail($user_id);
            } else {
                $msg = "You are not a valid user";
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
                           "status"             => 'success',
                           "user_detail"        => $user_detail,
                           "message"            => $msg,
                           );
        }
        echo json_encode($array);
    }

    public function login_mobile() {
        $mobile         = trim($this->input->post('mobile'));
        if($mobile == "") {
            $msg = "Please enter your mobile number";
            $error_occured = true;
        } else {

            $otp = $this->auto_generate_otp();

            $login_otp_valid_till = date('Y-m-d H:i:s', time() + 90);

            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('phone', $mobile);
            $query = $this->db->get();
            $res_u = $query->row_array();

            if($res_u['id'] > 0) {

                $user_id = $res_u['id'];

                $updateData = array(
                    'login_status' => 1,
                    'login_otp' => $otp,
                    'device_token' => $device_token,
                    'login_otp_valid_till' => $login_otp_valid_till,
                );
                
                $this->db->where('phone', $mobile);
                $this->db->update('admin', $updateData);

                $msg = "OTP sent to your mobile number";

            } else {
            
                $msg = "This mobile number is not registered with us. Please register first.";
                $error_occured = true;
            }
        }

        if($error_occured == true) {
            $array = array(
                            "status"        => 'failed',
                            "message"       => $msg,
                        );
        } else {

            // otp code
            $otp_message = "Your one time verification code for Ritvi Group is ".$otp;
            $result = $this->sendmsg($mobile, $otp_message);

            $array = array(
                           "status"         => 'success',
                           "message"        => $msg,
                           );
        }
        echo json_encode($array);
    }

    public function regenerate_mobile_otp() {
        $this->login_mobile();
    }

    public function sendmsg($phone, $message)
    {
        $new_phone = $phone;

        $paramsms = array(
            'credentials' => array(
                'key' => 'AKIAJMI2QQQCH7XUEE6A',
                'secret' => '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',
            ),
            'region' => 'us-east-1', 
            'version' => 'latest'
        );
        $sns = new \Aws\Sns\SnsClient($paramsms);

        $argsms = array(
                        "SenderID"      => "Ritvi Group",
                        "SMSType"       => "Transactional",
                        "Message"       => $message,
                        "PhoneNumber"   => $new_phone
                        ); 

        $result = $sns->publish($argsms);
    }

    public function get_user_detail($user_id) {
        if($user_id > 0) {
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            $res_u = $query->row_array();

            $user_detail = return_user_detail($res_u);
        } else {
            $user_detail = array();
        }
        return $user_detail;
    }


    public function return_user_detail($res_u) {
        $user_id            = $res_u['id'];
        $user_profile_id    = $res_u['profile_id'];
        $user_full_name     = $res_u['fullname'];
        $user_image         = (($res_u['image'] != NULL) ? PROFILE_IMAGE_URL.$res_u['image'] : "");
        $user_email         = (($res_u['email'] != NULL) ? $res_u['email'] : "");
        $user_mobile        = $res_u['phone'];
        $user_status        = $res_u['status'];
        $user_login_status  = $res_u['login_status'];
        $user_name          = (($res_u['username'] != NULL) ? $res_u['username'] : "");
        $user_phonecountry  = (($res_u['phonecountry'] != NULL) ? $res_u['phonecountry'] : "");
        $user_createdon     = return_time_ago($res_u['created_on']);
        $user_address       = (($res_u['address'] != NULL) ? $res_u['address'] : "");
        $user_city          = (($res_u['city'] != NULL) ? $res_u['city'] : "");
        $user_state         = (($res_u['state'] != NULL && $res_u['state'] != '0') ? $res_u['state'] : "");
        $user_device_token  = (($res_u['device_token'] != NULL && $res_u['device_token'] != '') ? $res_u['device_token'] : "");
        $user_date_of_birth = (($res_u['date_of_birth'] != NULL && $res_u['date_of_birth'] != '') ? $res_u['date_of_birth'] : "");
        $user_gender        = (($res_u['gender'] != NULL && $res_u['gender'] != '') ? $res_u['gender'] : "");

        $user_data_array = array(
                                "user_id"               => $user_id,
                                "user_profile_id"       => $user_profile_id,
                                "user_name"             => $user_name,
                                "user_full_name"        => $user_full_name,
                                "user_image"            => $user_image,
                                "user_email"            => $user_email,
                                "user_phonecountry"     => $user_phonecountry,
                                "user_mobile"           => $user_mobile,
                                "user_createdon"        => $user_createdon,
                                "user_address"          => $user_address,
                                "user_city"             => $user_city,
                                "user_state"            => $user_state,
                                "user_state"            => $user_state,
                                "user_device_token"     => $user_device_token,
                                "user_date_of_birth"    => $user_date_of_birth,
                                "user_gender"           => $user_gender,
                                "user_login_status"     => $user_login_status,
                                );
        return $user_data_array;
    }

    
}
