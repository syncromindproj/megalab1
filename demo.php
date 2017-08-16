<?php
	
if (defined('PDO::ATTR_DRIVER_NAME')) {
    print_r(PDO::getAvailableDrivers());
} else {
    echo 'PDO unavailable';
}


	phpinfo();
?>