<?php

// Created By Rajesh
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Email Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Rajesh Vishwakarma
 */

// ------------------------------------------------------------------------


if( ! function_exists('return_user_detail')) {
	function return_user_detail($res_u) {
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