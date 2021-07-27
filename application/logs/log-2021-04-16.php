<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-16 22:58:15 --> Severity: Compile Error --> Constant expression contains invalid operations E:\www\joywayid\application\core\MY_Controller.php 7
ERROR - 2021-04-16 22:59:14 --> Query error: Unknown column 'n.firman' in 'field list' - Invalid query: select n.id, n.firman, n.waktu_post, n.released , t.tema, tw.tema_warna from nats n left join tema t on n.id_tema = t.id  left join tema_berwarna tw on n.id_tema_berwarna = tw.id 
ERROR - 2021-04-16 22:59:14 --> Severity: error --> Exception: Call to a member function result() on bool E:\www\joywayid\application\modules\mnats\models\M_modul.php 35
ERROR - 2021-04-16 22:59:14 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of Error given, called in E:\www\joywayid\system\core\Common.php on line 658 and defined in E:\www\joywayid\system\core\Exceptions.php:190
Stack trace:
#0 E:\www\joywayid\system\core\Common.php(658): CI_Exceptions->show_exception(Object(Error))
#1 [internal function]: _exception_handler(Object(Error))
#2 {main}
  thrown E:\www\joywayid\system\core\Exceptions.php 190
ERROR - 2021-04-16 23:00:08 --> Query error: Unknown column 'n.firman' in 'field list' - Invalid query: select n.id, n.firman, n.waktu_post, n.released , t.tema, tw.tema_warna from nats n left join tema t on n.id_tema = t.id  left join tema_berwarna tw on n.id_tema_berwarna = tw.id 
ERROR - 2021-04-16 23:00:08 --> Severity: error --> Exception: Call to a member function result() on bool E:\www\joywayid\application\modules\mnats\models\M_modul.php 35
ERROR - 2021-04-16 23:00:08 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of Error given, called in E:\www\joywayid\system\core\Common.php on line 658 and defined in E:\www\joywayid\system\core\Exceptions.php:190
Stack trace:
#0 E:\www\joywayid\system\core\Common.php(658): CI_Exceptions->show_exception(Object(Error))
#1 [internal function]: _exception_handler(Object(Error))
#2 {main}
  thrown E:\www\joywayid\system\core\Exceptions.php 190
ERROR - 2021-04-16 23:08:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from nats n left join tema t on n.id_tema = t.id  left join tema_berwarna tw on ' at line 1 - Invalid query: select n.id, CONCAT(kitab,' ',pasal,':',ayat_awal,if(ayat_akhir is null, '', concat('-',ayat_akhir)) AS firman, n.waktu_post, n.released , t.tema, tw.tema_warna from nats n left join tema t on n.id_tema = t.id  left join tema_berwarna tw on n.id_tema_berwarna = tw.id 
ERROR - 2021-04-16 23:08:38 --> Severity: error --> Exception: Call to a member function result() on bool E:\www\joywayid\application\modules\mnats\models\M_modul.php 36
ERROR - 2021-04-16 23:08:38 --> Severity: Error --> Uncaught TypeError: Argument 1 passed to CI_Exceptions::show_exception() must be an instance of Exception, instance of Error given, called in E:\www\joywayid\system\core\Common.php on line 658 and defined in E:\www\joywayid\system\core\Exceptions.php:190
Stack trace:
#0 E:\www\joywayid\system\core\Common.php(658): CI_Exceptions->show_exception(Object(Error))
#1 [internal function]: _exception_handler(Object(Error))
#2 {main}
  thrown E:\www\joywayid\system\core\Exceptions.php 190
