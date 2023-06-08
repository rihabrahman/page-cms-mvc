<?php

    if($_SERVER['SERVER_NAME'] == 'localhost') {

        /** localhost database config **/ 
        define('DBNAME', 'page_cms'); 
        define('DBHOST', 'localhost'); 
        define('DBUSER', 'root'); 
        define('DBPASS', ''); 
        define('DBDRIVER', '');

        define('ROOT', 'http://localhost/myc/public'); 
    } else {

        /** production database config **/ 
        define('DBNAME', 'my_db'); 
        define('DBHOST', 'localhost'); 
        define('DBUSER', 'root'); 
        define('DBPASS', '1234'); 
        define('DBDRIVER', '');
        
        define('ROOT', 'https://www.website.com');
    } 

?>