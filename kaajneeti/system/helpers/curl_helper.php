<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('post_curl'))
{

        function post_curl($api_call_path, $params, $this_curl) {

        	$this_curl->create($api_call_path);
                $this_curl->option('buffersize', 10);

                $this_curl->option('returntransfer', 1);
                $this_curl->option('followlocation', 1);
                //$this_curl->option('HTTPHEADER', array("Content-type: multipart/form-data"));
                $this_curl->option('HEADER', false);
                $this_curl->option('connecttimeout', 60000);

                $this_curl->option('postfields', http_build_query($params));

                $data = $this_curl->execute();
                return $data;
        }
}


if ( ! function_exists('post_curl_with_files'))
{

        function post_curl_with_files($api_call_path, $params, $this_curl) {

            $this_curl->create($api_call_path);
                $this_curl->option('buffersize', 10);

                $this_curl->option('returntransfer', 1);
                $this_curl->option('followlocation', 1);
                //$this_curl->option('HTTPHEADER', array("Content-type: multipart/form-data"));
                $this_curl->option('HEADER', false);
                $this_curl->option('connecttimeout', 60000);

                $this_curl->option('postfields', ($params));
                $data = $this_curl->execute();
                return $data;
        }
}


if ( ! function_exists('getCurlValue'))
{
        function getCurlValue($filename, $contentType, $postname)
        {
            // PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax
            // See: https://wiki.php.net/rfc/curl-file-upload
            if (function_exists('curl_file_create')) {
                //return curl_file_create($filename, $contentType, $postname);
            }
         
            // Use the old style if using an older version of PHP
            $value = "@{$filename};filename=" . $postname;
            if ($contentType) {
                $value .= ';type=' . $contentType;
            }
         
            return $value;
        }
}