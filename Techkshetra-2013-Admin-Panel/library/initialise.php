<?php

include_once('db_common.php');


$con = connect();


if (!$con)
             {     die(' 1 . Could not connect: ' . mysql_error().'<br/>');        }
else 

             {     print " 1 . connection succesful....!!!! <br/>";        }



mysql_select_db( db , $con);


//createing temporary profile table before email verification

          $sql = "CREATE TABLE temp_profile
                                           (
                                             id smallint NOT NULL AUTO_INCREMENT,
                                             primary key (id),
                                             username varchar(20) NOT NULL UNIQUE,
                                             password varchar(15) NOT NULL,
                                             name varchar(50),
                                             email tinytext NOT NULL,
                                             verify tinytext
                                           )";


if(mysql_query($sql,$con))

    {         print " 0 . temp_profile table created .";              }

else
    
     {        print " 0 . temp_profile table could not be created ."; }

print '<br/>' ;





//creating first table profiles

          $sql = "CREATE TABLE profiles
                                           (
                                             id smallint NOT NULL AUTO_INCREMENT,
                                             primary key (id),
                                             a3k_id bigint,
                                             username varchar(20) NOT NULL UNIQUE,
                                             password varchar(15) NOT NULL,
                                             name varchar(50),
                                             college varchar(100),
                                             college_id varchar(25),
                                             year varchar(10),
                                             course varchar(50),
                                             gender varchar(6) NOT NULL,
                                             email tinytext NOT NULL,
                                             mobile bigint,
                                             events tinytext,
                                             cash int,
                                             cookie_key varchar(10),
                                             jdate datetime
                                           )";


if(mysql_query($sql,$con))

    {         print " 2 . profiles table created .";              }

else
    
     {        print " 2 . profiles table could not be created ."; }

print '<br/>' ;


//creating second table events


//EH stands for Event Head

          $sql = "CREATE TABLE events 
                                           (
                                             id smallint NOT NULL AUTO_INCREMENT,
                                             primary key (id),
                                             name varchar(60),
                                             description text,
                                             EH_1 varchar(50),
                                             EH_2 varchar(50),
                                             EH_1_email tinytext,
                                             EH_2_email tinytext,
                                             EH_1_phone varchar(14),
                                             EH_2_phone varchar(14),
                                             username varchar(15),
                                             password varchar(15), 
                                             venue tinytext,
                                             edate datetime,
                                             fp bigint,        
                                             sp bigint,
                                             tp bigint,
                                             reg_counter bigint,
                                             reg_status smallint,                                              
                                             ldate datetime,
                                             type tinytext
                                           )";


if(mysql_query($sql,$con))

    {         print " 3 . events table created .";              }

else
    
     {        print " 3 . events table could not be created ."; }

print '<br/>' ;




//creating third table winners



          $sql = "CREATE TABLE winners 
                                           (

                                             id smallint NOT NULL AUTO_INCREMENT,
                                             primary key (id),
                                             event_id int,
                                             event tinytext,
                                             first_name text,
                                             first_id tinytext,
                                             first_certificate int,
                                             second_name text,
                                             second_id tinytext,
                                             second_certificate int,
                                             third_name text,
                                             third_id tinytext,
                                             third_certificate int
                                           )";


if(mysql_query($sql,$con))

    {         print " 4 . winners table created .";              }

else
    
     {        print " 4 . winners table could not be created ."; }

print '<br/>' ;



//creating fourth table counter



          $sql = "CREATE TABLE counter 
                                           (

                                             id smallint NOT NULL AUTO_INCREMENT,
                                             primary key (id),
                                             total_workshop_reg bigint,
                                             total_cash bigint,
                                             total_reg_online bigint,
                                             total_reg_offline bigint,
                                             last_a3k12_id bigint
                                           )";


if(mysql_query($sql,$con))

    {         print " 5 . counter table created .";              }

else
    
     {        print " 5 . counter table could not be created ."; }

print '<br/>' ;


//creating fifth table suggestions

$sql = "CREATE TABLE suggestions
(
id smallint NOT NULL AUTO_INCREMENT,
primary key (id),
name tinytext NOT NULL,
email tinytext NOT NULL,
content text,
sdate datetime
)";


if(mysql_query($sql,$con))
    {         print  " 6 . suggestions table created.";         }
else
     {    print " 6 . suggestions table could not be created."; }






print '<br/>' ;





$result = mysql_query('insert into counter (home_page , total_cash, total_reg_online, total_reg_offline, last_a3k12_id ) values ( 0,0,0,0,12000)');

if( $result)
         { print ' 7 . counter table initialised .' ; }
else 
         { print ' 7 . counter table could not be initialised . ';}      


//creating sixth table single_event_registration


          $sql = "CREATE TABLE single_event_reg 
                                           (
                                             id smallint NOT NULL AUTO_INCREMENT,
                                             primary key (id),
                                             event_id int,
                                             event text,
                                             username tinytext,
                                             a3k_id int,
                                             certificate int
                                           )";


if(mysql_query($sql,$con))

    {         print " 8 . single_event_registration table created .";              }

else
    
     {        print " 8 . single_event_registration table could not be created ."; }

print '<br/>' ;


//creating sixth table group_event_registration


          $sql = "CREATE TABLE grp_event_reg 
                                           (
                                             id smallint NOT NULL AUTO_INCREMENT,
                                             primary key (id),
                                             event_id int,
                                             event text,
                                             username tinytext,
                                             a3k_1 int,
                                             a3k_2 bigint,
                                             a3k_3 bigint,
                                             a3k_4 bigint,
                                             a3k_5 bigint,
                                             certificate int
                                           )";


if(mysql_query($sql,$con))

    {         print " 8 . grp event_registration table created .";              }

else
    
     {        print " 8 . grp event_registration table could not be created ."; }

print '<br/>' ;

//creating sixth table workshop_registration


          $sql = "CREATE TABLE workshop_reg 
                                           (
                                             id smallint NOT NULL AUTO_INCREMENT,
                                             primary key (id),
                                             event_id int,
                                             event text,
                                             name tinytext,
                                             a3k_id int,
                                             dd tinytext,
                                             certificate int
                                           )";


if(mysql_query($sql,$con))

    {         print " 8 . workshop_reg table created .";              }

else
    
     {        print " 8 . workshop_reg table could not be created ."; }

print '<br/>' ;

mysql_close($con);

?>