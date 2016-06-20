<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('encode_param'))
{
	function encode_param($param) {
		$CI =& get_instance();
		return strtr($CI->encryption->encrypt($param), array('+' => '.', '=' => '-', '/' => '~'));
	}
}

if (! function_exists('decode_param'))
{
	function decode_param($encparam) {
		$CI =& get_instance();
		return $CI->encryption->decrypt(strtr($encparam, array('.' => '+', '-' => '=', '~' => '/')));
	}
}
