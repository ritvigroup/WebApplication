<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



/* ================= OUR CONSTANTS ================== */

define('WEBSITE_URL', 'http://www.ritvigroup.com/');


define('APP_FOLDER', 'ritvigroup');
define('API_FOLDER', 'api');
define('VERSON_FOLDER', 'V1');

define('LAST_24_HOUR', date("Y-m-d H:i:s", mktime(date("H"), date("i"), date("s"), date("m"), (date("d")-1), date("Y"))));

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

