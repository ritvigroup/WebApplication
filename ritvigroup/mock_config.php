<?php
@set_time_limit(0);
@error_reporting(E_ALL & ~E_NOTICE);
@ini_set("display_errors", 0);
@date_default_timezone_set('Asia/Kolkata');

if(!@session_start())
{
	@session_start();
}


/*ini_set('upload_max_filesize', '500M');
ini_set('post_max_size', '256M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);*/

define('DEVELOPMENT_MODE', 1); // 1 = Development, 0 = Production

define('APP_FOLDER', 'ritvigroup');
define('API_FOLDER', 'api');
define('VERSON_FOLDER', 'V1');


define('LAST_24_HOUR', date("Y-m-d H:i:s", mktime(date("H"), date("i"), date("s"), date("m"), (date("d")-1), date("Y"))));


if(DEVELOPMENT_MODE == 1) {
    
    // Development
    define('WEBSITE_URL', 'http://ritvigroup.com/ritvigroup.com');

    $server_name    = "localhost";
    $server_user    = "ritvis32_kuser";
    $server_pass    = "8f3l,gT70HBt";
    $server_db      = "ritvis32_kaajneeti_new";

    
} else if(DEVELOPMENT_MODE == 0) { 
    
    // Production
    define('WEBSITE_URL', 'http://ritvigroup.com/ritvigroup.com');

    $server_name    = "localhost";
    $server_user    = "ritvis32_kuser";
    $server_pass    = "8f3l,gT70HBt";
    $server_db      = "ritvis32_kaajneeti";

} else {

    // Local
    $server_name    = "localhost";
    $server_user    = "root";
    $server_pass    = "";
    $server_db      = "kaajneeti";

    define('WEBSITE_URL', 'http://localhost:81/ritvigroup.com');
    
}
define('SITE_URL', WEBSITE_URL.DIRECTORY_SEPARATOR.APP_FOLDER.DIRECTORY_SEPARATOR.API_FOLDER.DIRECTORY_SEPARATOR.VERSON_FOLDER);
define('SITE_PATH', WEBSITE_URL.DIRECTORY_SEPARATOR);

define('UPLOAD_DIR', 'uploads');

define('CHAT_IMAGE_DIR', UPLOAD_DIR.'/image/chat/');
define('CHAT_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/image/chat/');

define('PROFILE_IMAGE_DIR', UPLOAD_DIR.'/image/profile/');
define('PROFILE_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/image/profile/');

define('VIDEO_IMAGE_DIR', UPLOAD_DIR.'/video/image/');
define('VIDEO_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/video/image/');

define('VIDEO_VIDEO_DIR', UPLOAD_DIR.'/video/');
define('VIDEO_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/video/');

define('PHOTO_IMAGE_DIR', UPLOAD_DIR.'/photo/');
define('PHOTO_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/photo/');

// Messages
define('ACCEPTED_MSG_FILE', array('audio', 'document', 'image', 'video'));

define('MSG_AUDIO_DIR', UPLOAD_DIR.'/message/audio/');
define('MSG_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/message/audio/');

define('MSG_DOC_DIR', UPLOAD_DIR.'/message/document/');
define('MSG_DOC_URL', SITE_PATH.UPLOAD_DIR.'/message/document/');

define('MSG_IMAGE_DIR', UPLOAD_DIR.'/message/image/');
define('MSG_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/message/image/');

define('MSG_VIDEO_DIR', UPLOAD_DIR.'/message/video/');
define('MSG_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/message/video/');

define('MSG_THUMB_DIR', UPLOAD_DIR.'/message/thumbnail/');
define('MSG_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/message/thumbnail/');

define('LIKE_IMAGE_DIR', UPLOAD_DIR.'/emotions/');
define('LIKE_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/emotions/');


$database_type = "mysqli";

define('DATABASE_TYPE', $database_type);

switch($database_type)
{
    case 'mysql':

        $con = @mysql_connect($server_name, $server_user, $server_pass);
        if($con)
        {
            @mysql_set_charset('utf8', $con);
            $dbcon = @mysql_select_db($server_db, $con);
            if($dbcon)
            {
            }
            else
            {
                echo "Database not connected";
            }
        }
        else
        {
            echo "Server not connected";
        }
    break;

    case 'mysqli':
        $con = mysqli_connect($server_name, $server_user, $server_pass, $server_db);
        @mysqli_set_charset($con, 'utf8');
        if(mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

    break;

}


function execute_query($query) 
{
    global $con;
    if(DATABASE_TYPE == 'mysql') {
        return mysql_query($query);
    } else if(DATABASE_TYPE == 'mysqli') {
        return mysqli_query($con, $query);
    }
}

function num_rows($exe_query)
{
    global $con;
    if(DATABASE_TYPE == 'mysql') {
        return mysql_num_rows($exe_query);
    } else if(DATABASE_TYPE == 'mysqli') {
        return mysqli_num_rows($exe_query);
    }
}

function fetch_row($exe_query)
{
    global $con;
    if(DATABASE_TYPE == 'mysql') {
        return mysql_fetch_row($exe_query);
    } else if(DATABASE_TYPE == 'mysqli') {
        return mysqli_fetch_row($exe_query);
    }
}

function fetch_array($exe_query)
{
    global $con;
    if(DATABASE_TYPE == 'mysql') {
        return mysql_fetch_array($exe_query);
    } else if(DATABASE_TYPE == 'mysqli') {
        return mysqli_fetch_array($exe_query);
    }
}

function fetch_assoc($exe_query)
{
    global $con;
    if(DATABASE_TYPE == 'mysql') {
        return mysql_fetch_assoc($exe_query);
    } else if(DATABASE_TYPE == 'mysqli') {
        return mysqli_fetch_assoc($exe_query);
    }
}

function insert_id() {
    global $con;
    if(DATABASE_TYPE == 'mysql') {
        return mysql_insert_id();
    } else if(DATABASE_TYPE == 'mysqli') {
        return mysqli_insert_id($con);
    }
}

function real_escape_string($string) {
    global $con;
    $string = trim($string);
    if(DATABASE_TYPE == 'mysql') {
        return mysql_real_escape_string($string);
    } else if(DATABASE_TYPE == 'mysqli') {
        return mysqli_real_escape_string($con, $string);
    }
}

function begin_transaction()
{
    execute_query("BEGIN");
}

function commit_transaction()
{
    execute_query("COMMIT");
}

function rollback_transaction()
{
    execute_query("ROLLBACK");
}

define("END_LIMIT", "20");
define("WEBSITE_NAME", "Momyt");
define("SUCCESS_INFO_IMG", '<div class="messages success"><img src="./images/i_msg-success.gif" border="0" />');
define("ERROR_INFO_IMG", '<div class="messages error"><img src="./images/i_msg-error.gif" border="0" />');
define("WARNING_INFO_IMG", '<div class="messages warning"><img src="./images/i_msg-note.gif" border="0" />');

define("LIMIT_APPLY", true);

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
?>
