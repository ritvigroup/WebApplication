<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connect extends CI_Controller {

    public $CI = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->CI = & get_instance();
        
        $this->device_token     = gethostname();
        $this->location_lant    = $this->input->post('location_lant');
        $this->location_long    = $this->input->post('location_long');
        $this->device_name      = $this->input->post('device_name');
        $this->device_os        = $this->input->post('device_os');
       
        if(($this->session->userdata('UserId')) > 0) {
            
        } else {
            redirect('leader/login');
        }
    }


    public function sendUserProfileFriendRequest() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/sendUserProfileFriendRequest', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }


    public function undoUserProfileFriendRequest() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/undoUserProfileFriendRequest', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }


    public function cancelUserProfileFriendRequest() {
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $_POST['friend_user_profile_id'] = $this->input->post('id');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/cancelUserProfileFriendRequest', $this->input->post(), $this->curl);

        header('Content-type: application/json');

        echo $json_encode;
        die;
    }
    

    public function myfriends() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllFriends', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('connect/myfriends',$data);
    }


    public function invitation() {
        $data = array();
        
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');
        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllFriendRequest', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('connect/invitation',$data);
    }


    public function requestsent() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

        $json_encode = post_curl(API_CALL_PATH.'userconnect/getMyAllRequestToFriends', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data = $json_decode;
        }
        
        $this->load->view('connect/requestsent',$data);
    }


    public function search() {
        $data = array();
      
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

        $json_encode = post_curl(API_CALL_PATH.'userprofile/getAllPoliticalParty', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['PoliticalParty'] = $json_decode->result;
        }

        $json_encode = post_curl(API_CALL_PATH.'userprofile/getAllGender', $this->input->post(), $this->curl);

        $json_decode = json_decode($json_encode);
        if(count($json_decode->result) > 0) {
            $data['Gender'] = $json_decode->result;
        }

        $this->load->view('connect/search',$data);
    }


    public function search_result() {
        $data = array();
      
        $error = false;
        $_POST['user_id'] = $this->session->userdata('UserId');
        $_POST['user_profile_id'] = $this->session->userdata('LeaderProfileId');

        $search_text = $this->input->post('search_text');
        $gender = $this->input->post('gender');
        $political_party = $this->input->post('political_party');
        if($search_text != '' && $gender != '' && $political_party != '') {
            $_POST['search'] = array(
                                    'search_text'       => $search_text,
                                    'gender'            => $gender,
                                    'political_party'   => $political_party,
                                    );
        } else if($search_text != '' && $gender != '') {
            $_POST['search'] = array(
                                    'search_text'       => $search_text,
                                    'gender'            => $gender,
                                    );
        } else if($search_text != '' && $political_party != '') {
            $_POST['search'] = array(
                                    'search_text'       => $search_text,
                                    'political_party'   => $political_party,
                                    );
        } else if($gender != '' && $political_party != '') {
            $_POST['search'] = array(
                                    'gender'            => $gender,
                                    'political_party'   => $political_party,
                                    );
        } else if($search_text != '') {
            $_POST['search'] = array(
                                    'search_text'       => $search_text,
                                    );
        } else if($gender != '') {
            $_POST['search'] = array(
                                    'gender'            => $gender,
                                    );
        } else if($political_party != '') {
            $_POST['search'] = array(
                                    'political_party'   => $political_party,
                                    );
        } else {
            $error = true;
        }

        if($error == false) {
            $json_encode = post_curl(API_CALL_PATH.'userprofile/searchLeaderProfiles', $this->input->post(), $this->curl);

            // echo '<pre>';
            // print_r($json_encode);
            // echo '</pre>';

            $json_decode = json_decode($json_encode);
            if(count($json_decode->result) > 0) {
                $data = $json_decode->result;
            }
            $this->load->view('connect/search_result',$data);
        } else {
            echo '';
        }
    }


    public function showUser($user) {
        $ProfilePhotoPath = ($user->user_profile_detail->user_info->ProfilePhotoPath != '') ? $user->user_profile_detail->user_info->ProfilePhotoPath : base_url().'assets/images/default-user.png';


        
        $Gender = ($user->user_profile_detail->user_info->Gender == 1) ? 'Male' : (($user->user_profile_detail->user_info->Gender == 2) ? 'Female' : 'Other');

        $UserProfileHrefLink = base_url().'profile/profile/'.$user->user_profile_detail->user_info->UserUniqueId;

        ?>
        <div class="note note-info" style="float: left;" id="request_id_<?php echo $user->user_profile_detail->profile->UserProfileId; ?>">
            <div style="float: left;">
                <span class="img-shadow"><img src="<?php echo $ProfilePhotoPath; ?>" style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 80px; height: 80px; margin-right: 15px;" class="img-circle"/></span>
            </div>
            <div style="float: left;">
                <h4 class="block"><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $user->user_profile_detail->profile->FirstName.' '.$user->user_profile_detail->profile->LastName?></a></h4>
                <p><?php echo $user->user_profile_detail->profile->Email; ?></p>
                <p><?php echo $Gender; ?>, <span class="label label-warning"><?php echo $leader_profile->UserProfileLeader->PoliticalPartyName; ?></span>, <?php echo date('d-M-Y h:i A', strtotime($user->RequestSentOn)); ?></p>
            </div>
            <div style="float: right;">
                <button type="button" class="btn btn-danger" onClick="return cancelRequest(<?php echo $user->user_profile_detail->profile->UserProfileId; ?>);"><i class="fa fa-trash-o"></i>&nbsp; Delete</button>

                <?php if($leader_profile->UserProfileLeader->MyFriend == 0) { ?>
                <button type="button" class="btn btn-success btn-xs" onClick="return sendRequest(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                        class="fa fa-plus-o"></i>&nbsp;
                    Add Friend
                </button>
                <?php } else if($leader_profile->UserProfileLeader->MyFriend == 1) { ?>
                <button type="button" class="btn btn-danger btn-xs" onClick="return cancelRequest(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                        class="fa fa-trash-o"></i>&nbsp;
                    Cancel Request
                </button>
                <?php } else if($leader_profile->UserProfileLeader->MyFriend == 2) { ?>
                <button type="button" class="btn btn-success btn-xs" onClick="return acceptRequest(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                        class="fa fa-plus-o"></i>&nbsp;
                    Accept Request
                </button>
                <button type="button" class="btn btn-danger btn-xs" onClick="return deleteRequest(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                        class="fa fa-trash-o"></i>&nbsp;
                    Delete Request
                </button>
                <?php } else if($leader_profile->UserProfileLeader->MyFriend == 3) { ?>
                <button type="button" class="btn btn-danger btn-xs" onClick="return unFriend(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                        class="fa fa-trash-o"></i>&nbsp;
                    Unfriend
                </button>
                <?php } else if($leader_profile->UserProfileLeader->MyFriend == 4) { ?>

                <?php } else { ?>
                <?php } ?>

                
            </div>
        </div>
        <?php
    }

}
