<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('users_info')){
	function users_info($field)
	{
		$CI =& get_instance();
		$user = $CI->ion_auth->user()->row();

		switch ($field) {
			case 'email':
				$result = $user->email;
				break;

			case 'full_name':
				$result = ucwords($user->first_name).' '.ucwords($user->last_name);
				break;

			case 'first_name':
				$result = ucwords($user->first_name);
				break;

			case 'last_name':
				$result = ucwords($user->last_name);
				break;

			case 'created_on':
				$result = date('d-m-Y', $user->created_on);
				break;

			case 'phone':
				$result = $user->phone;
				break;

			case 'foto':
				$result = $user->foto;
				break;

			default:
				$result = '';
				break;
		}

		return $result;
  }
}
