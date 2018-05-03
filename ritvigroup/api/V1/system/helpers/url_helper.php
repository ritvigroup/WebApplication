<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('site_url'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function site_url($uri = '', $protocol = NULL)
	{
		return get_instance()->config->site_url($uri, $protocol);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('base_url'))
{
	/**
	 * Base URL
	 *
	 * Create a local URL based on your basepath.
	 * Segments can be passed in as a string or an array, same as site_url
	 * or a URL to a file can be passed in, e.g. to an image file.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function base_url($uri = '', $protocol = NULL)
	{
		return get_instance()->config->base_url($uri, $protocol);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('current_url'))
{
	/**
	 * Current URL
	 *
	 * Returns the full URL (including segments) of the page where this
	 * function is placed
	 *
	 * @return	string
	 */
	function current_url()
	{
		$CI =& get_instance();
		return $CI->config->site_url($CI->uri->uri_string());
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('uri_string'))
{
	/**
	 * URL String
	 *
	 * Returns the URI segments.
	 *
	 * @return	string
	 */
	function uri_string()
	{
		return get_instance()->uri->uri_string();
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('index_page'))
{
	/**
	 * Index page
	 *
	 * Returns the "index_page" from your config file
	 *
	 * @return	string
	 */
	function index_page()
	{
		return get_instance()->config->item('index_page');
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('anchor'))
{
	/**
	 * Anchor Link
	 *
	 * Creates an anchor based on the local URL.
	 *
	 * @param	string	the URL
	 * @param	string	the link title
	 * @param	mixed	any attributes
	 * @return	string
	 */
	function anchor($uri = '', $title = '', $attributes = '')
	{
		$title = (string) $title;

		$site_url = is_array($uri)
			? site_url($uri)
			: (preg_match('#^(\w+:)?//#i', $uri) ? $uri : site_url($uri));

		if ($title === '')
		{
			$title = $site_url;
		}

		if ($attributes !== '')
		{
			$attributes = _stringify_attributes($attributes);
		}

		return '<a href="'.$site_url.'"'.$attributes.'>'.$title.'</a>';
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('anchor_popup'))
{
	/**
	 * Anchor Link - Pop-up version
	 *
	 * Creates an anchor based on the local URL. The link
	 * opens a new window based on the attributes specified.
	 *
	 * @param	string	the URL
	 * @param	string	the link title
	 * @param	mixed	any attributes
	 * @return	string
	 */
	function anchor_popup($uri = '', $title = '', $attributes = FALSE)
	{
		$title = (string) $title;
		$site_url = preg_match('#^(\w+:)?//#i', $uri) ? $uri : site_url($uri);

		if ($title === '')
		{
			$title = $site_url;
		}

		if ($attributes === FALSE)
		{
			return '<a href="'.$site_url.'" onclick="window.open(\''.$site_url."', '_blank'); return false;\">".$title.'</a>';
		}

		if ( ! is_array($attributes))
		{
			$attributes = array($attributes);

			// Ref: http://www.w3schools.com/jsref/met_win_open.asp
			$window_name = '_blank';
		}
		elseif ( ! empty($attributes['window_name']))
		{
			$window_name = $attributes['window_name'];
			unset($attributes['window_name']);
		}
		else
		{
			$window_name = '_blank';
		}

		foreach (array('width' => '800', 'height' => '600', 'scrollbars' => 'yes', 'menubar' => 'no', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0') as $key => $val)
		{
			$atts[$key] = isset($attributes[$key]) ? $attributes[$key] : $val;
			unset($attributes[$key]);
		}

		$attributes = _stringify_attributes($attributes);

		return '<a href="'.$site_url
			.'" onclick="window.open(\''.$site_url."', '".$window_name."', '"._stringify_attributes($atts, TRUE)."'); return false;\""
			.$attributes.'>'.$title.'</a>';
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('mailto'))
{
	/**
	 * Mailto Link
	 *
	 * @param	string	the email address
	 * @param	string	the link title
	 * @param	mixed	any attributes
	 * @return	string
	 */
	function mailto($email, $title = '', $attributes = '')
	{
		$title = (string) $title;

		if ($title === '')
		{
			$title = $email;
		}

		return '<a href="mailto:'.$email.'"'._stringify_attributes($attributes).'>'.$title.'</a>';
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('safe_mailto'))
{
	/**
	 * Encoded Mailto Link
	 *
	 * Create a spam-protected mailto link written in Javascript
	 *
	 * @param	string	the email address
	 * @param	string	the link title
	 * @param	mixed	any attributes
	 * @return	string
	 */
	function safe_mailto($email, $title = '', $attributes = '')
	{
		$title = (string) $title;

		if ($title === '')
		{
			$title = $email;
		}

		$x = str_split('<a href="mailto:', 1);

		for ($i = 0, $l = strlen($email); $i < $l; $i++)
		{
			$x[] = '|'.ord($email[$i]);
		}

		$x[] = '"';

		if ($attributes !== '')
		{
			if (is_array($attributes))
			{
				foreach ($attributes as $key => $val)
				{
					$x[] = ' '.$key.'="';
					for ($i = 0, $l = strlen($val); $i < $l; $i++)
					{
						$x[] = '|'.ord($val[$i]);
					}
					$x[] = '"';
				}
			}
			else
			{
				for ($i = 0, $l = strlen($attributes); $i < $l; $i++)
				{
					$x[] = $attributes[$i];
				}
			}
		}

		$x[] = '>';

		$temp = array();
		for ($i = 0, $l = strlen($title); $i < $l; $i++)
		{
			$ordinal = ord($title[$i]);

			if ($ordinal < 128)
			{
				$x[] = '|'.$ordinal;
			}
			else
			{
				if (count($temp) === 0)
				{
					$count = ($ordinal < 224) ? 2 : 3;
				}

				$temp[] = $ordinal;
				if (count($temp) === $count)
				{
					$number = ($count === 3)
							? (($temp[0] % 16) * 4096) + (($temp[1] % 64) * 64) + ($temp[2] % 64)
							: (($temp[0] % 32) * 64) + ($temp[1] % 64);
					$x[] = '|'.$number;
					$count = 1;
					$temp = array();
				}
			}
		}

		$x[] = '<'; $x[] = '/'; $x[] = 'a'; $x[] = '>';

		$x = array_reverse($x);

		$output = "<script type=\"text/javascript\">\n"
			."\t//<![CDATA[\n"
			."\tvar l=new Array();\n";

		for ($i = 0, $c = count($x); $i < $c; $i++)
		{
			$output .= "\tl[".$i."] = '".$x[$i]."';\n";
		}

		$output .= "\n\tfor (var i = l.length-1; i >= 0; i=i-1) {\n"
			."\t\tif (l[i].substring(0, 1) === '|') document.write(\"&#\"+unescape(l[i].substring(1))+\";\");\n"
			."\t\telse document.write(unescape(l[i]));\n"
			."\t}\n"
			."\t//]]>\n"
			.'</script>';

		return $output;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('auto_link'))
{
	/**
	 * Auto-linker
	 *
	 * Automatically links URL and Email addresses.
	 * Note: There's a bit of extra code here to deal with
	 * URLs or emails that end in a period. We'll strip these
	 * off and add them after the link.
	 *
	 * @param	string	the string
	 * @param	string	the type: email, url, or both
	 * @param	bool	whether to create pop-up links
	 * @return	string
	 */
	function auto_link($str, $type = 'both', $popup = FALSE)
	{
		// Find and replace any URLs.
		if ($type !== 'email' && preg_match_all('#(\w*://|www\.)[a-z0-9]+(-+[a-z0-9]+)*(\.[a-z0-9]+(-+[a-z0-9]+)*)+(/([^\s()<>;]+\w)?/?)?#i', $str, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER))
		{
			// Set our target HTML if using popup links.
			$target = ($popup) ? ' target="_blank"' : '';

			// We process the links in reverse order (last -> first) so that
			// the returned string offsets from preg_match_all() are not
			// moved as we add more HTML.
			foreach (array_reverse($matches) as $match)
			{
				// $match[0] is the matched string/link
				// $match[1] is either a protocol prefix or 'www.'
				//
				// With PREG_OFFSET_CAPTURE, both of the above is an array,
				// where the actual value is held in [0] and its offset at the [1] index.
				$a = '<a href="'.(strpos($match[1][0], '/') ? '' : 'http://').$match[0][0].'"'.$target.'>'.$match[0][0].'</a>';
				$str = substr_replace($str, $a, $match[0][1], strlen($match[0][0]));
			}
		}

		// Find and replace any emails.
		if ($type !== 'url' && preg_match_all('#([\w\.\-\+]+@[a-z0-9\-]+\.[a-z0-9\-\.]+[^[:punct:]\s])#i', $str, $matches, PREG_OFFSET_CAPTURE))
		{
			foreach (array_reverse($matches[0]) as $match)
			{
				if (filter_var($match[0], FILTER_VALIDATE_EMAIL) !== FALSE)
				{
					$str = substr_replace($str, safe_mailto($match[0]), $match[1], strlen($match[0]));
				}
			}
		}

		return $str;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('prep_url'))
{
	/**
	 * Prep URL
	 *
	 * Simply adds the http:// part if no scheme is included
	 *
	 * @param	string	the URL
	 * @return	string
	 */
	function prep_url($str = '')
	{
		if ($str === 'http://' OR $str === '')
		{
			return '';
		}

		$url = parse_url($str);

		if ( ! $url OR ! isset($url['scheme']))
		{
			return 'http://'.$str;
		}

		return $str;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('url_title'))
{
	/**
	 * Create URL Title
	 *
	 * Takes a "title" string as input and creates a
	 * human-friendly URL string with a "separator" string
	 * as the word separator.
	 *
	 * @todo	Remove old 'dash' and 'underscore' usage in 3.1+.
	 * @param	string	$str		Input string
	 * @param	string	$separator	Word separator
	 *			(usually '-' or '_')
	 * @param	bool	$lowercase	Whether to transform the output string to lowercase
	 * @return	string
	 */
	function url_title($str, $separator = '-', $lowercase = FALSE)
	{
		if ($separator === 'dash')
		{
			$separator = '-';
		}
		elseif ($separator === 'underscore')
		{
			$separator = '_';
		}

		$q_separator = preg_quote($separator, '#');

		$trans = array(
			'&.+?;'			=> '',
			'[^\w\d _-]'		=> '',
			'\s+'			=> $separator,
			'('.$q_separator.')+'	=> $separator
		);

		$str = strip_tags($str);
		foreach ($trans as $key => $val)
		{
			$str = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $str);
		}

		if ($lowercase === TRUE)
		{
			$str = strtolower($str);
		}

		return trim(trim($str, $separator));
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('redirect'))
{
	/**
	 * Header Redirect
	 *
	 * Header redirect in two flavors
	 * For very fine grained control over headers, you could use the Output
	 * Library's set_header() function.
	 *
	 * @param	string	$uri	URL
	 * @param	string	$method	Redirect method
	 *			'auto', 'location' or 'refresh'
	 * @param	int	$code	HTTP Response status code
	 * @return	void
	 */
	function redirect($uri = '', $method = 'auto', $code = NULL)
	{
		if ( ! preg_match('#^(\w+:)?//#i', $uri))
		{
			$uri = site_url($uri);
		}

		// IIS environment likely? Use 'refresh' for better compatibility
		if ($method === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== FALSE)
		{
			$method = 'refresh';
		}
		elseif ($method !== 'refresh' && (empty($code) OR ! is_numeric($code)))
		{
			if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1')
			{
				$code = ($_SERVER['REQUEST_METHOD'] !== 'GET')
					? 303	// reference: http://en.wikipedia.org/wiki/Post/Redirect/Get
					: 307;
			}
			else
			{
				$code = 302;
			}
		}

		switch ($method)
		{
			case 'refresh':
				header('Refresh:0;url='.$uri);
				break;
			default:
				header('Location: '.$uri, TRUE, $code);
				break;
		}
		exit;
	}
}


// -DISPLAY CUSTOM JSON_ENCODE--

if ( ! function_exists('displayJsonEncode'))
{
	function displayJsonEncode($array = array())
	{
		header('Content-type: application/json');
		echo json_encode($array);
		exit;
	}
}


if ( ! function_exists('autoGenerateOtp'))
{
	function autoGenerateOtp($length = 6) {
		$digit_chars 	= "0123456789";

		/*if($DEVELOPMENT_MODE == 0) { 
			$chars = isset($digit_chars) ? $digit_chars : '';
		    $code = substr( str_shuffle( $chars ), 0, $length );
		} else {
	    	$code = "123456";
	    }*/
	    $code = "123456";
	    return $code;
	}
}

if ( ! function_exists('sendMessageToPhone'))
{
	function sendMessageToPhone($recerverNO, $message) {
		
		if(is_array($recerverNO)) {
			$recerverNO = str_replace('+', '', implode(',', $recerverNO));
		} else {
			$recerverNO = str_replace('+', '', $recerverNO);
		}


		$message = str_replace(' ', '%20', $message);

		$url =  "http://www.pertinaxsolution.com/api/mt/SendSMS?user=ritvigroup&password=del12345&senderid=KAJNTI&channel=Trans&DCS=0&flashsms=0&number=".$recerverNO."&text=".($message)."&route=5";


		//$file_get_contents = file_get_contents($url);

		$curlSession = curl_init();
	    curl_setopt($curlSession, CURLOPT_URL, $url);
	    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
	    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

	    $jsonData = json_decode(curl_exec($curlSession));
	    curl_close($curlSession);

		echo '<pre>';
		print_r($url);
		print_r($jsonData);
		echo '</pre>';


		/*if (!function_exists('curl_init')) {
			echo "Error : Curl library not installed";
			return FALSE;
		}
		if (strlen($message) > 140) {
			$message = substr($message, 0, 140);
		}

		$userID = "919911529958";
		$userPWD = "neelAm7112";

		$cookie_file_path = "./cookie.txt";
		$temp_file = "./temporary.txt";
		//unlink($temp_file);
		$user_agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36";

		// LOGIN TO WAY2SMS

		$url =  "http://site24.way2sms.com/content/Login1.action";
		$parameters = array("username"=>"$userID","password"=>"$userPWD","button"=>"Login");

		$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($parameters));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($ch, CURLOPT_HEADER, TRUE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt($ch, CURLOPT_NOBODY, FALSE);
			$result = curl_exec ($ch);
		curl_close ($ch);


		// SAVE LOGOUT URL

		file_put_contents($temp_file,$result);
		$result = "";
		$logout_url = "";
		$file = fopen($temp_file,"r");
		$line = "";
		$cond = TRUE;
		while ($cond == TRUE) {
			$line = fgets($file);
			if ($line === FALSE) { // EOF
				$cond = FALSE;
			} else {
				$pos = strpos( $line, '            window.location = "');
				if ($pos === FALSE ) {
					$line = "";
				} else { // URL FOUND
					$cond = FALSE;
					$logout_url = substr($line,-25);
					$logout_url = substr($logout_url,0,21);
				}
			}
		}
		fclose($file);

		// SAVE SESSION ID

		$file = fopen($cookie_file_path,"r");
		$line = "";
		$cond = TRUE;
		while ($cond == TRUE) {
			$line = fgets($file);
			if ($line === FALSE) { // EOF
				$cond = FALSE;
			} else {
				$pos = strpos( $line, "JSESSIONID");
				if ($pos === FALSE ) {
					$line = "";
				} else { // SESSION ID FOUND
					$cond = FALSE;
					$id = substr($line,$pos+15);
				}
			}
		}
		fclose($file);

				


		/*if (!isset($id)) {
			echo "Session Failed";
			unlink($cookie_file_path);
			unlink($temp_file);
			return FALSE;
		}
		if ($logout_url == "") {
			echo "Login Failed";
			unlink($cookie_file_path);
			unlink($temp_file);
			//return FALSE;
		}*/

		// SEND SMS

		/*$url = "http://site24.way2sms.com/smstoss.action?Token=" . $id; 
		$parameters = array("button"=>"Send SMS","mobile"=>"$recerverNO","message"=>"$message");

		$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($parameters));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($ch, CURLOPT_HEADER, TRUE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt($ch, CURLOPT_NOBODY, FALSE);
			$result = curl_exec ($ch);
		curl_close ($ch);


		file_put_contents($temp_file,$result);
		$result = "";
		$sms_status = "";
		$file = fopen($temp_file,"r");
		$line = "";
		$cond = TRUE;
		while ($cond == TRUE) {
			$line = fgets($file);
			if ($line === FALSE) { // EOF
				$cond = FALSE;
			} else {
				$pos = strpos( $line, '        <p class="mess"><i class="ssms consuki "><em class="ei"></em><strong><b>x</b></strong></i><span class="">');
				if ($pos === FALSE ) {
					$line = "";
				} else { // URL FOUND
					$cond = FALSE;
					$sms_status = substr($line,-53);
					$sms_status = substr($sms_status,0,40);
					if ($sms_status != "Message has been submitted successfully.") {
						echo "Failed to send SMS.";
						unlink($cookie_file_path);
						fclose($file);
						unlink($temp_file);
						return FALSE;
					}
				}
			}
		}
		fclose($file);

		$url = "site24.way2sms.com/" . $logout_url;

		$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, TRUE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt($ch, CURLOPT_NOBODY, FALSE);
			$result = curl_exec ($ch);
		curl_close ($ch);

		file_put_contents($temp_file,$result);
		$result = "";
		$logout_status = FALSE;
		$file = fopen($temp_file,"r");
		$line = "";
		$cond = TRUE;
		while ($cond == TRUE) {
			$line = fgets($file);
			if ($line === FALSE) { // EOF
				$cond = FALSE;
			} else {
				$pos = strpos( $line, '<div class="trap mess">');
				if ($pos === FALSE ) {
					$line = "";
				} else {
					$line = fgets($file);
					if ($line === FALSE) { // EOF
						$cond = FALSE;
					} else {
						$line = fgets($file);
						if ($line === FALSE) { // EOF
							$cond = FALSE;
						} else {
							$cond = FALSE;
							$logout_status_string = substr($line,24,39);
							if ($logout_status_string == "You have successfully <b>logged out</b>") {
								$logout_status = TRUE;
							}
						}
					}
				}
			}
		}
		fclose($file);

		// DELETE TEMP FILES

		unlink($cookie_file_path);
		unlink($temp_file);

		if ($logout_status) {
			echo "Success";
			return TRUE;
		} else {
			echo "Failure";
			return FALSE;
		}*/
	}

	/*function sendMessageToPhone1($phone, $message)
	{
		$uid = "919911529958";
		$pwd = "neelAm7112";
		$curl = curl_init();
		$timeout = 30;
		$result = array();
		$uid = urlencode($uid);
		$pwd = urlencode($pwd);
		// Go where the server takes you :P
		curl_setopt($curl, CURLOPT_URL, "http://way2sms.com");
		curl_setopt($curl, CURLOPT_HEADER, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$a = curl_exec($curl);
		if(preg_match('#Location: (.*)#', $a, $r))
		$way2sms = trim($r[1]);
		// Setup for login
		curl_setopt($curl, CURLOPT_URL, $way2sms."Login1.action");
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "username=".$uid."&password=".$pwd."&button=Login");
		curl_setopt($curl, CURLOPT_COOKIESESSION, 1);
		curl_setopt($curl, CURLOPT_COOKIEFILE, "cookie_way2sms");
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 20);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5");
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($curl, CURLOPT_REFERER, $way2sms);
		$text = curl_exec($curl);
		// Check if any error occured
		if (curl_errno($curl))
		return "access error : ". curl_error($curl);
		// Check for proper login
		$pos = stripos(curl_getinfo($curl, CURLINFO_EFFECTIVE_URL), "ebrdg.action");

		//if ($pos === "FALSE" || $pos == 0 || $pos == "")
		//return "invalid login";
		// Check the message
		if (trim($message) == "" || strlen($message) == 0)
		return "invalid message";
		// Take only the first 140 characters of the message
		$message = urlencode(substr($message, 0, 140));
		// Store the numbers from the string to an array
		$pharr = explode(",", $phone);
		// Set the home page from where we can send message
		$refurl = curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);
		$newurl = str_replace("ebrdg.action?id=", "main.action?section=s&Token=", $refurl);
		curl_setopt($curl, CURLOPT_URL, $newurl);

		// Extract the token from the URL
		$jstoken = substr($newurl, 50, -41);
		//Go to the homepage
		$text = curl_exec($curl);
		// Send SMS to each number
		foreach ($pharr as $p)
		{
			// Check the mobile number
			if (strlen($p) != 10 || !is_numeric($p) || strpos($p, ".") != false)
			{
			  $result[] = array('phone' => $p, 'msg' => urldecode($message), 'result' => "invalid number");
			  continue;
			}
			$p = urlencode($p);
			// Setup to send SMS
			curl_setopt($curl, CURLOPT_URL, $way2sms.'smstoss.action');
			curl_setopt($curl, CURLOPT_REFERER, curl_getinfo($curl, CURLINFO_EFFECTIVE_URL));
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, "ssaction=ss&Token=".$jstoken."&mobile=".$p."&message=".$message."&button=Login");
			$contents = curl_exec($curl);
			//Check Message Status
			$pos = strpos($contents, 'Message has been submitted successfully');
			$res = ($pos !== false) ? true : false;
			$result[] = array('phone' => $p, 'msg' => urldecode($message), 'result' => $res);
		}
		// Logout
		curl_setopt($curl, CURLOPT_URL, $way2sms."LogOut");
		curl_setopt($curl, CURLOPT_REFERER, $refurl);
		$text = curl_exec($curl);
		curl_close($curl);
		return $result;
	}*/
}


if ( ! function_exists('sendMessageToPhone2'))
{
	function sendMessageToPhone2($phone, $message)
	{
		/*$url = "http://www.proovl.com/api/send.php";

		$postfields = array(
			'user' => "c6wqfjw",
			'token' => "Qcxw8F62VGcdlgB2T6CtYt3Rkr7HP9WL",
			'route' => "1",
			'from' => "9911529958",
			'to' => $phone,
			'text' => "$message"
		);

		if (!$curld = curl_init()) {
			exit;
		}

		curl_setopt($curld, CURLOPT_POST, true);
		curl_setopt($curld, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($curld, CURLOPT_URL,$url);
		curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);

		$output = curl_exec($curld);

		curl_close ($output);

		return $output;*/
	}
}