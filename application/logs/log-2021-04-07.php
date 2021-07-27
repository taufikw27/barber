<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-07 23:05:02 --> Severity: error --> Exception: Call to undefined function mysqli_init() E:\www\joywayid\system\database\drivers\mysqli\mysqli_driver.php 126
ERROR - 2021-04-07 23:05:02 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of Error given, called in E:\www\joywayid\system\core\Common.php on line 658 and defined in E:\www\joywayid\system\core\Exceptions.php:190
Stack trace:
#0 E:\www\joywayid\system\core\Common.php(658): CI_Exceptions->show_exception(Object(Error))
#1 [internal function]: _exception_handler(Object(Error))
#2 {main}
  thrown E:\www\joywayid\system\core\Exceptions.php 190
ERROR - 2021-04-07 23:20:52 --> 404 Page Not Found: /index
