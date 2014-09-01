<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


$config['facebook']['api_id'] = '286661588201598';
$config['facebook']['app_secret'] = 'cc67840f99a79d716589f841c36d7a91';
$config['facebook']['redirect_url'] = 'http://chefeditor.eu5.org/index.php/loginController/fblogin';
$config['facebook']['permissions'] = array(
    'email',
    'user_location',
    'user_birthday'
);

?>
