<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('post_curl'))
{

        function post_curl($api_call_path, $params, $this_curl) {


        	$this_curl->create($api_call_path);
                $this_curl->option('buffersize', 10);

                $this_curl->option('returntransfer', 1);
                $this_curl->option('followlocation', 1);
                $this_curl->option('HEADER', false);
                $this_curl->option('connecttimeout', 600);

                $this_curl->option('postfields', $params);
                $data = $this_curl->execute();
                return $data;
        }
}

