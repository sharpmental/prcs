<?php
$date1=date_create("2013-03-15");
$date2=date_create("2012-12-12");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");

echo PHP_OS;
echo php_uname();
echo (PHP_INT_SIZE * 8) . '-bit';

phpinfo();

// $serverName = "(local)";

// $uid = "sa"; //sqlserver user name

// $pwd = "123456789"; //sqlserver password

// $connectionInfo =  array("UID"=>$uid,"PWD"=>$pwd,"Database"=>"plato-master");

// $conn = sqlsrv_connect( $serverName,$connectionInfo);

// if( $conn == false)

// {

//    echo "connection failed!";

//    die( print_r( sqlsrv_errors(), true));

// }
// else
// 	echo "connect to the server!!!";

?>
