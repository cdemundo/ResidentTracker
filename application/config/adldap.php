<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['account_suffix']		= '@howost.strykercorp.com';
$config['base_dn']				= 'DC=STRYKERCORP,DC=COM';
$config['domain_controllers']	= array ("howost.strykercorp.com");
$config['ad_username']			= 'ADM_Nos1';
$config['ad_password']			= 'Stryker1';
$config['real_primarygroup']	= true;
$config['use_ssl']				= false;
$config['use_tls'] 				= false;
$config['recursive_groups']		= true;


/* End of file adldap.php */
/* Location: ./system/application/config/adldap.php */