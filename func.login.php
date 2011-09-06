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
	<meta name="author" content="Spoken Tutorials (www.spoken-tutorials.org)" />
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
		
                    <div id="submenu">
				<div align="right" class="smallgraytext" style="padding:9px;">
				

				</div>
			</div>
                
	<div id="contenttext">
				<div style="padding:10px">
					<span class="titletext">Login Central</span>
                                        </div>
					<div class="bodytext" style="padding:12px;" align="justify">
					<?php

                                        session_start(); //Starts a PHP Session

                                        $submit=$_POST['submit'];
                                        $username = stripslashes($_POST['username']);
                                        $password = stripslashes($_POST['password']);
                                        $uselect=$_POST['uselect'];
                                        $uselect=$uselect[0];
                                        //echo "This is $uselect[0]";
                                        $password=md5($password);

                                        if ($submit){
                                            if($username&&$password&&$uselect){
                                                //Global Variables - include file
                                                include_once './include/config.inc.php';
                                                global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

                                                //Database Connectivity
                                                include_once './include/db.connect.php';

                                                $username=mysql_real_escape_string($username);
                                                $query = mysql_query(" SELECT * FROM users WHERE username='$username' AND flag='$uselect' ");
                                                $numrows=mysql_num_rows($query);
                                                //echo $numrows;
                                                if($numrows!=0)
                                                {
                                                    //Code to Login
                                                    while($row=mysql_fetch_assoc($query))
                                                    {
                                                            $uid=$row['uid'];
                                                            $collid=$row['collid'];
                                                            $dbusername=$row['username'];
                                                            $dbpassword=$row['password'];
                                                            $flag=$row['flag'];
                                                            
                                                    }
                                                    //check to see if they match.
                                                    if($username == $dbusername && $password==$dbpassword && $uselect=$flag)
                                                    {
                                                            if($flag=='s')
                                                            {
                                                                echo "Hello $username, You are now successfully logged in. <a href='onlinelist.php'>Click</a> here to enter the Page containing the list of tests.";
                                                                $_SESSION['uid']=$uid;
                                                                $_SESSION['collid']=$collid;
                                                                $_SESSION['username']= $username;
                                                                $_SESSION['flag']=$flag;

                                                            }
                                                            elseif($flag=='a')
                                                            {
                                                                echo "Welcome Administrator! Please <a href='./admincc.php'>Click</a> here to go to the Admin Control Center.";
                                                                $_SESSION['uid']=$uid;
                                                                $_SESSION['collid']=$collid;
                                                                $_SESSION['username']= $username;
                                                                $_SESSION['flag']=$flag;


                                                            }
                                                            elseif($flag=='r')
                                                            {
                                                                echo "Welcome Reviewer! Please <a href='./review.php'>Click</a> here to go to the Review Center.";
                                                                $_SESSION['uid']=$uid;
                                                                $_SESSION['collid']=$collid;
                                                                $_SESSION['username']= $username;
                                                                $_SESSION['flag']=$flag;


                                                            }
                                                            else
                                                                echo "The User Doesn't Exist! Login Again!";

                                                    }
                                                    else
                                                        echo "The username and Passwords do not match.";
                                                }
                                                else
                                                    echo "The User Doesn't Exist. Please re-login from the homepage.";

                                            }
                                        }
                                        ?>
                                        </div>
			</div>
			<div id="leftpanel">
				<div align="left" class="graypanel">
                                <?php
                                if(isset ($_SESSION['username']))
                                {
                                    $pname=$_SESSION['username'];
                                    echo "Welcome $pname\n";
                                    echo "<a href='logout.php'> Logout</a>";
                                }
                                else
                                {
                                    echo "<a href='index.php'> Login</a>";

                                }
                                ?>
                                    </div>
			</div>
			<div id="footer" class="smallgraytext">
				&copy; 2011 | <a href="http://www.spoken-tutorial.org" target="_blank">Spoken Tutorial</a>
			</div>
		</div>
	</div>
</body>
</html>