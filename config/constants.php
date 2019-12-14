<?php

	defined('USER_ROLE_ADMIN') OR define('USER_ROLE_ADMIN', 1);
	defined('USER_ROLE_USER') OR define('USER_ROLE_USER', 2);

	defined('USER_OFFLINE') OR define('USER_OFFLINE', 0);
	defined('USER_ONLINE') OR define('USER_ONLINE', 1);
	defined('USER_OFFLINE_VIA_SETTING') OR define('USER_OFFLINE_VIA_SETTING', 2);

	defined('USER_STATUS_INACTIVE') OR define('USER_STATUS_INACTIVE', 0);
	defined('USER_STATUS_ACTIVE') OR define('USER_STATUS_ACTIVE', 1);
	defined('USER_STATUS_REJECTED') OR define('USER_STATUS_REJECTED', 4);

	defined('ADMIN_STATUS_INACTIVE') OR define('ADMIN_STATUS_INACTIVE', 0);
	defined('ADMIN_STATUS_ACTIVE') OR define('ADMIN_STATUS_ACTIVE', 1);

	defined('API_ACCESS_KEY') OR define('API_ACCESS_KEY', 'AIzaSyDZf-TUy5Xl9EFPDroA2tYmfQd3uW-nkZo');

	defined('ADMIN_EMAIL') OR define('ADMIN_EMAIL', 'pranav.slinfy@gmail.com');

	defined('CURRENT_DATE_TIME') OR define('CURRENT_DATE_TIME', date('Y-m-d H:i:s'));
	defined('FAILURE_TRY_AGAIN_MESSAGE') OR define('FAILURE_TRY_AGAIN_MESSAGE', 'Something Went Wrong.Please Try Again.');

	defined('FILE_TYPE_DOC') OR define('FILE_TYPE_DOC', 1);
	defined('FILE_TYPE_PDF') OR define('FILE_TYPE_PDF', 2);
	defined('FILE_TYPE_ZIP') OR define('FILE_TYPE_ZIP', 3);

	defined('GENDER_MALE') OR define('GENDER_MALE', 'male');
	defined('GENDER_FEMALE') OR define('GENDER_FEMALE', 'female');
	defined('GENDER_OTHERS') OR define('GENDER_OTHERS', 'others');

	defined('ADMIN_EMAIL') OR define('ADMIN_EMAIL', 'no-reply@gmail.com');
?>