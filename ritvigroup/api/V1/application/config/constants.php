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
if(ENVIRONMENT == 'development') {
	defined('WEBSITE_URL')        OR define('WEBSITE_URL', 'http://localhost:81/ritvigroup.com/ritvigroup');
} else {
	defined('WEBSITE_URL')        OR define('WEBSITE_URL', 'http://www.ritvigroup.com/ritvigroup.com/ritvigroup');
}

defined('FIREBASE_API_KEY')        OR define('FIREBASE_API_KEY', 'AAAAwGGjlNU:APA91bG0o5DrxKoCguYHXlDyqv2T9fZaH9XeoE2laBBcE8l2HsmBr36tbNgqspuPH3c7D_HMZbpQBSbSkOaxz4wOdbw9Z6_H4VDcf3TuKam5TCVkC0_ebJpW61Ai_pcWxgxLSFeweFvN');

defined('APP_FOLDER')        OR define('APP_FOLDER', 'ritvigroup');
defined('API_FOLDER')        OR define('API_FOLDER', 'api');
defined('VERSON_FOLDER')        OR define('VERSON_FOLDER', 'V1');

defined('LAST_24_HOUR')        OR define('LAST_24_HOUR', date("Y-m-d H:i:s", mktime(date("H"), date("i"), date("s"), date("m"), (date("d")-1), date("Y"))));

defined('SITE_URL')        OR define('SITE_URL', WEBSITE_URL.DIRECTORY_SEPARATOR.APP_FOLDER.DIRECTORY_SEPARATOR.API_FOLDER.DIRECTORY_SEPARATOR.VERSON_FOLDER);
defined('SITE_PATH')        OR define('SITE_PATH', WEBSITE_URL.DIRECTORY_SEPARATOR);

defined('UPLOAD_DIR')        OR define('UPLOAD_DIR', 'uploads');

defined('CHAT_IMAGE_DIR')        OR define('CHAT_IMAGE_DIR', UPLOAD_DIR.'/image/chat/');
defined('CHAT_IMAGE_URL')        OR define('CHAT_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/image/chat/');

defined('PROFILE_IMAGE_DIR')        OR define('PROFILE_IMAGE_DIR', UPLOAD_DIR.'/image/profile/');
defined('PROFILE_IMAGE_URL')        OR define('PROFILE_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/image/profile/');

defined('VIDEO_IMAGE_DIR')        OR define('VIDEO_IMAGE_DIR', UPLOAD_DIR.'/video/image/');
defined('VIDEO_IMAGE_URL')        OR define('VIDEO_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/video/image/');

defined('VIDEO_VIDEO_DIR')        OR define('VIDEO_VIDEO_DIR', UPLOAD_DIR.'/video/');
defined('VIDEO_VIDEO_URL')        OR define('VIDEO_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/video/');

defined('PHOTO_IMAGE_DIR')        OR define('PHOTO_IMAGE_DIR', UPLOAD_DIR.'/photo/');
defined('PHOTO_IMAGE_URL')        OR define('PHOTO_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/photo/');

// Messages
defined('MSG_AUDIO_DIR')        OR define('MSG_AUDIO_DIR', UPLOAD_DIR.'/message/audio/');
defined('MSG_AUDIO_URL')        OR define('MSG_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/message/audio/');

defined('MSG_DOC_DIR')        OR define('MSG_DOC_DIR', UPLOAD_DIR.'/message/document/');
defined('MSG_DOC_URL')        OR define('MSG_DOC_URL', SITE_PATH.UPLOAD_DIR.'/message/document/');

defined('MSG_IMAGE_DIR')        OR define('MSG_IMAGE_DIR', UPLOAD_DIR.'/message/image/');
defined('MSG_IMAGE_URL')        OR define('MSG_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/message/image/');

defined('MSG_VIDEO_DIR')        OR define('MSG_VIDEO_DIR', UPLOAD_DIR.'/message/video/');
defined('MSG_VIDEO_URL')        OR define('MSG_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/message/video/');

defined('MSG_THUMB_DIR')        OR define('MSG_THUMB_DIR', UPLOAD_DIR.'/message/thumbnail/');
defined('MSG_THUMB_URL')        OR define('MSG_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/message/thumbnail/');

defined('LIKE_IMAGE_DIR')        OR define('LIKE_IMAGE_DIR', UPLOAD_DIR.'/emotions/');
defined('LIKE_IMAGE_URL')        OR define('LIKE_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/emotions/');


// Poll
defined('POLL_AUDIO_DIR')        OR define('POLL_AUDIO_DIR', UPLOAD_DIR.'/poll/audio/');
defined('POLL_AUDIO_URL')        OR define('POLL_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/poll/audio/');

defined('POLL_DOC_DIR')        	OR define('POLL_DOC_DIR', UPLOAD_DIR.'/poll/document/');
defined('POLL_DOC_URL')        	OR define('POLL_DOC_URL', SITE_PATH.UPLOAD_DIR.'/poll/document/');

defined('POLL_IMAGE_DIR')        OR define('POLL_IMAGE_DIR', UPLOAD_DIR.'/poll/image/');
defined('POLL_IMAGE_URL')        OR define('POLL_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/poll/image/');

defined('POLL_VIDEO_DIR')        OR define('POLL_VIDEO_DIR', UPLOAD_DIR.'/poll/video/');
defined('POLL_VIDEO_URL')        OR define('POLL_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/poll/video/');

defined('POLL_THUMB_DIR')        OR define('POLL_THUMB_DIR', UPLOAD_DIR.'/poll/thumbnail/');
defined('POLL_THUMB_URL')        OR define('POLL_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/poll/thumbnail/');



// Posts
defined('POST_AUDIO_DIR')        OR define('POST_AUDIO_DIR', UPLOAD_DIR.'/post/audio/');
defined('POST_AUDIO_URL')        OR define('POST_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/post/audio/');

defined('POST_DOC_DIR')        	OR define('POST_DOC_DIR', UPLOAD_DIR.'/post/document/');
defined('POST_DOC_URL')        	OR define('POST_DOC_URL', SITE_PATH.UPLOAD_DIR.'/post/document/');

defined('POST_IMAGE_DIR')        OR define('POST_IMAGE_DIR', UPLOAD_DIR.'/post/image/');
defined('POST_IMAGE_URL')        OR define('POST_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/post/image/');

defined('POST_VIDEO_DIR')        OR define('POST_VIDEO_DIR', UPLOAD_DIR.'/post/video/');
defined('POST_VIDEO_URL')        OR define('POST_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/post/video/');

defined('POST_THUMB_DIR')        OR define('POST_THUMB_DIR', UPLOAD_DIR.'/post/thumbnail/');
defined('POST_THUMB_URL')        OR define('POST_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/post/thumbnail/');


// Complaint
defined('COMPLAINT_AUDIO_DIR')        OR define('COMPLAINT_AUDIO_DIR', UPLOAD_DIR.'/complaint/audio/');
defined('COMPLAINT_AUDIO_URL')        OR define('COMPLAINT_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/complaint/audio/');

defined('COMPLAINT_DOC_DIR')        	OR define('COMPLAINT_DOC_DIR', UPLOAD_DIR.'/complaint/document/');
defined('COMPLAINT_DOC_URL')        	OR define('COMPLAINT_DOC_URL', SITE_PATH.UPLOAD_DIR.'/complaint/document/');

defined('COMPLAINT_IMAGE_DIR')        OR define('COMPLAINT_IMAGE_DIR', UPLOAD_DIR.'/complaint/image/');
defined('COMPLAINT_IMAGE_URL')        OR define('COMPLAINT_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/complaint/image/');

defined('COMPLAINT_VIDEO_DIR')        OR define('COMPLAINT_VIDEO_DIR', UPLOAD_DIR.'/complaint/video/');
defined('COMPLAINT_VIDEO_URL')        OR define('COMPLAINT_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/complaint/video/');

defined('COMPLAINT_THUMB_DIR')        OR define('COMPLAINT_THUMB_DIR', UPLOAD_DIR.'/complaint/thumbnail/');
defined('COMPLAINT_THUMB_URL')        OR define('COMPLAINT_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/complaint/thumbnail/');


// Event
defined('EVENT_AUDIO_DIR')        OR define('EVENT_AUDIO_DIR', UPLOAD_DIR.'/event/audio/');
defined('EVENT_AUDIO_URL')        OR define('EVENT_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/event/audio/');

defined('EVENT_DOC_DIR')          OR define('EVENT_DOC_DIR', UPLOAD_DIR.'/event/document/');
defined('EVENT_DOC_URL')          OR define('EVENT_DOC_URL', SITE_PATH.UPLOAD_DIR.'/event/document/');

defined('EVENT_IMAGE_DIR')        OR define('EVENT_IMAGE_DIR', UPLOAD_DIR.'/event/image/');
defined('EVENT_IMAGE_URL')        OR define('EVENT_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/event/image/');

defined('EVENT_VIDEO_DIR')        OR define('EVENT_VIDEO_DIR', UPLOAD_DIR.'/event/video/');
defined('EVENT_VIDEO_URL')        OR define('EVENT_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/event/video/');

defined('EVENT_THUMB_DIR')        OR define('EVENT_THUMB_DIR', UPLOAD_DIR.'/event/thumbnail/');
defined('EVENT_THUMB_URL')        OR define('EVENT_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/event/thumbnail/');


// Information
defined('INFORMATION_AUDIO_DIR')        OR define('INFORMATION_AUDIO_DIR', UPLOAD_DIR.'/information/audio/');
defined('INFORMATION_AUDIO_URL')        OR define('INFORMATION_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/information/audio/');

defined('INFORMATION_DOC_DIR')        	OR define('INFORMATION_DOC_DIR', UPLOAD_DIR.'/information/document/');
defined('INFORMATION_DOC_URL')        	OR define('INFORMATION_DOC_URL', SITE_PATH.UPLOAD_DIR.'/information/document/');

defined('INFORMATION_IMAGE_DIR')        OR define('INFORMATION_IMAGE_DIR', UPLOAD_DIR.'/information/image/');
defined('INFORMATION_IMAGE_URL')        OR define('INFORMATION_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/information/image/');

defined('INFORMATION_VIDEO_DIR')        OR define('INFORMATION_VIDEO_DIR', UPLOAD_DIR.'/information/video/');
defined('INFORMATION_VIDEO_URL')        OR define('INFORMATION_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/information/video/');

defined('INFORMATION_THUMB_DIR')        OR define('INFORMATION_THUMB_DIR', UPLOAD_DIR.'/information/thumbnail/');
defined('INFORMATION_THUMB_URL')        OR define('INFORMATION_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/information/thumbnail/');



// Suggestion
defined('SUGGESTION_AUDIO_DIR')        OR define('SUGGESTION_AUDIO_DIR', UPLOAD_DIR.'/suggestion/audio/');
defined('SUGGESTION_AUDIO_URL')        OR define('SUGGESTION_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/suggestion/audio/');

defined('SUGGESTION_DOC_DIR')          OR define('SUGGESTION_DOC_DIR', UPLOAD_DIR.'/suggestion/document/');
defined('SUGGESTION_DOC_URL')          OR define('SUGGESTION_DOC_URL', SITE_PATH.UPLOAD_DIR.'/suggestion/document/');

defined('SUGGESTION_IMAGE_DIR')        OR define('SUGGESTION_IMAGE_DIR', UPLOAD_DIR.'/suggestion/image/');
defined('SUGGESTION_IMAGE_URL')        OR define('SUGGESTION_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/suggestion/image/');

defined('SUGGESTION_VIDEO_DIR')        OR define('SUGGESTION_VIDEO_DIR', UPLOAD_DIR.'/suggestion/video/');
defined('SUGGESTION_VIDEO_URL')        OR define('SUGGESTION_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/suggestion/video/');

defined('SUGGESTION_THUMB_DIR')        OR define('SUGGESTION_THUMB_DIR', UPLOAD_DIR.'/suggestion/thumbnail/');
defined('SUGGESTION_THUMB_URL')        OR define('SUGGESTION_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/suggestion/thumbnail/');


// Email
defined('EMAIL_AUDIO_DIR')        OR define('EMAIL_AUDIO_DIR', UPLOAD_DIR.'/email/audio/');
defined('EMAIL_AUDIO_URL')        OR define('EMAIL_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/email/audio/');

defined('EMAIL_DOC_DIR')        	OR define('EMAIL_DOC_DIR', UPLOAD_DIR.'/email/document/');
defined('EMAIL_DOC_URL')        	OR define('EMAIL_DOC_URL', SITE_PATH.UPLOAD_DIR.'/email/document/');

defined('EMAIL_IMAGE_DIR')        OR define('EMAIL_IMAGE_DIR', UPLOAD_DIR.'/email/image/');
defined('EMAIL_IMAGE_URL')        OR define('EMAIL_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/email/image/');

defined('EMAIL_VIDEO_DIR')        OR define('EMAIL_VIDEO_DIR', UPLOAD_DIR.'/email/video/');
defined('EMAIL_VIDEO_URL')        OR define('EMAIL_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/email/video/');

defined('EMAIL_THUMB_DIR')        OR define('EMAIL_THUMB_DIR', UPLOAD_DIR.'/email/thumbnail/');
defined('EMAIL_THUMB_URL')        OR define('EMAIL_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/email/thumbnail/');


// Social
defined('SOCIAL_AUDIO_DIR')        OR define('SOCIAL_AUDIO_DIR', UPLOAD_DIR.'/social/audio/');
defined('SOCIAL_AUDIO_URL')        OR define('SOCIAL_AUDIO_URL', SITE_PATH.UPLOAD_DIR.'/social/audio/');

defined('SOCIAL_DOC_DIR')        	OR define('SOCIAL_DOC_DIR', UPLOAD_DIR.'/social/document/');
defined('SOCIAL_DOC_URL')        	OR define('SOCIAL_DOC_URL', SITE_PATH.UPLOAD_DIR.'/social/document/');

defined('SOCIAL_IMAGE_DIR')        OR define('SOCIAL_IMAGE_DIR', UPLOAD_DIR.'/social/image/');
defined('SOCIAL_IMAGE_URL')        OR define('SOCIAL_IMAGE_URL', SITE_PATH.UPLOAD_DIR.'/social/image/');

defined('SOCIAL_VIDEO_DIR')        OR define('SOCIAL_VIDEO_DIR', UPLOAD_DIR.'/social/video/');
defined('SOCIAL_VIDEO_URL')        OR define('SOCIAL_VIDEO_URL', SITE_PATH.UPLOAD_DIR.'/social/video/');

defined('SOCIAL_THUMB_DIR')        OR define('SOCIAL_THUMB_DIR', UPLOAD_DIR.'/social/thumbnail/');
defined('SOCIAL_THUMB_URL')        OR define('SOCIAL_THUMB_URL', SITE_PATH.UPLOAD_DIR.'/social/thumbnail/');


// Document
defined('DOC_DIR') OR define('DOC_DIR', UPLOAD_DIR.'/doc/document/');
defined('DOC_URL') OR define('DOC_URL', SITE_PATH.UPLOAD_DIR.'/doc/document/');

