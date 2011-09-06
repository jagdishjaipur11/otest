<!--

## Note : Removing the copyright notice is violation of the GNU Licenses ##
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+
// | Developed by Ankit Bahuguna                                          |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GNU - GPL license, |
// | that is bundled with this package in the folder LICENSE, and is      |
// | available through the world-wide-web at                              |
// |	    http://www.gnu.org/licenses/gpl-2.0.html                      |
// | This program is free software; you can redistribute it and/or modify |
// | it under the terms of the GNU General Public License as published by |
// | the Free Software Foundation; either version 2 of the License, or	  |
// | (at your option) any later version.			          |
// |                                                                      |
// | This program is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the         |
// | GNU General Public License for more details.                         |
// |                                                                      |
// | You should have received a copy of the GNU General Public License    |
// | along with this program; if not, write to the Free Software          |
// | Foundation, Inc., 59 Temple Place, Suite 330, Boston,                |
// | MA 02111-1307 USA.                 				  |
// +----------------------------------------------------------------------+
// | Author: Ankit Bahuguna <mailankitbahuguna@gmail.com>     		  |
// | Copyright © 2011             					  |
// +----------------------------------------------------------------------+
// +----------------------------------------------------------------------+

-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="Spoken Tutorial (www.spoken-tutorial.org)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="images/style.css" type="text/css" />
	<title>Spoken Tutorials - Online Test Center</title>
</head>
<body>
	<div id="page" align="center">
		<div id="content" style="width:800px">
			<div id="logo">
			</div>
			<div id="topheader">
				<div align="center">
					<br />
                                        <h1><b>Spoken Tutorials</b></h1><br />
                                </div>
				<div id="toplinks" class="smallgraytext">

				</div>
			</div>
			<div id="menu">
				<div align="right" class="smallwhitetext" style="padding:9px;">

				</div>
			</div>
		<!--
                    <div id="submenu">
				<div align="right" class="smallgraytext" style="padding:9px;">
					<a href="#">Submenu 1</a> | <a href="#">Submenu 2</a> | <a href="#">Submenu 3</a> | <a href="#">Submenu 4</a> | <a href="#">Submenu 5</a> | <a href="#">Submenu 6</a>
				</div>
			</div>
                 -->
	<div id="contenttext">
				<div style="padding:10px">
					<span class="titletext">List of Available Tests</span>
					</div>
					<div class="bodytext" style="padding:12px;" align="justify">
				<?php
                                        //error_reporting(0);
                                        //echo "Hello";

                                        //$submit=$_POST['submit'];

                                        //strip_tags() and mysql_real_escape_string()
                                        //md5()
                                        $collid=stripslashes(($_POST['collegeid']));
                                        $username=stripslashes($_POST['uname']);
                                        $password=stripslashes($_POST['password']);
                                        $repeatpassword=stripslashes($_POST['reppassword']);
                                        $fname=stripslashes($_POST['fname']);
                                        $email=stripslashes($_POST['email']);
                                        $cellum=stripslashes($_POST['cellnum']);
                                        
                                        //echo "$collid, $username, $password, $repeatpassword, $fname,$email,$cellnum";

                                        //Global Variables - include file.
                                        include_once './include/config.inc.php';
                                        global $db, $db_host, $db_user, $db_password,$mailsite,$directory;
                                                                            
                                        //Database Connectivity
                                        include_once './include/db.connect.php';    
                                        
                                        $username = mysql_real_escape_string($username);
                                        $namecheck=mysql_query("SELECT `username` FROM `users` WHERE username='$username' ");
                                        $count=mysql_num_rows($namecheck);

                                        //A value of count equals to 0 means the username is unique and doesn't exist in the database.
                                        //echo $count;
                                        if($count!=0)
                                        {
                                            echo("Username already taken. Go back to the <a href='register.php'>Registration Page</a> to register your Account.");
                                        }

                                        $email = mysql_real_escape_string($email);
                                        $emailcheck=mysql_query("SELECT `email` FROM `users` WHERE email='$email' ");
                                        $counte=mysql_num_rows($emailcheck);

                                        //A value of counte equals to 0 means the email is unique and doesn't exist in the database.
                                        //echo $count;
                                        if($counte!=0)
                                        {
                                            echo("Email already taken. Go back to the <a href='register.php'>Registration Page</a> to register your Account.");
                                        }

                                       //check for existence
                                        elseif($fname && $username && $password && $repeatpassword && $count=='0' && $counte=='0')
                                        {
                                            if($password==$repeatpassword)
                                                 {
                                                                    //Register the User.
                                                                    //encrypt password
                                                                    $password=md5($password);
                                                                    //$repeatpassword=md5($repeatpassword);

                                                                    //Generate Random Number for Activation Processes
                                                                    $random=rand(234567890,987654320);
                                          
                                                                    //Inserting values of the form into the database
                                                                    
                                                                    $queryreg=mysql_query("INSERT INTO users VALUES ('','$collid','$username','$password','$fname','$email','$cellum', '$random','s')");
                                            
                                                                    printf("\nYou've been Registered. <a href='index.php'>Click Here</a> to go to the Login Page.");

                                                  }

                                            else
                                            {
                                                echo "You're Passwords do not Match.";
                                            }
                                        }

                                ?>

				</div>
			</div>
			<div id="leftpanel">
				<div align="left" class="graypanel">
                                   
                                    </div>
			</div>
			<div id="footer" class="smallgraytext">
				&copy; 2011 | <a href="http://www.spoken-tutorial.org" target="_blank">Spoken Tutorial</a>
			</div>
		</div>
	</div>
</body>
</html>
