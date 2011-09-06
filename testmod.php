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
	<title>Test Module</title>
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
					<span class="titletext">Test Module</span>
					</div>
					<div class="bodytext" style="padding:12px;" align="justify">
					<?php
                                        session_start();
                                         if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
                                         {
                                             $submit=stripslashes($_POST['submit']);
                                             $tid=stripslashes($_POST['tid']);
                                             $tname=stripslashes($_POST['tname']);
                                             

                                             //Global Variables - include file.
                                            include_once './include/config.inc.php';
                                            global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

                                            //Database Connectivity
                                            include_once './include/db.connect.php';
                                            global $connect;
                                            
                                            $tid=mysql_real_escape_string($tid);
                                            
                                            $tidcheck=mysql_query("SELECT `testcode` FROM `onlinelist` WHERE testcode='$tid' ");
                                            $count=mysql_num_rows($tidcheck);

                                            if ($count!=0){
                                                die("The Test Code is already taken, please give a new Test ID for your test");
                                            }

                                            elseif ($submit){
                                                        if($tid && $tname){

                                                            //Inserting the Data of new test in the onlinelist table
                                                            $querytest=mysql_query("INSERT INTO `onlinelist` VALUES ('','$tid', '$tname')");
                                                            
                                                            //Inserting the Data of the new test in the key auth table. A random key is generated which is required for authentication of user with the test.
                                                            $activated='n'; //By default the Test is Deactivated.
                                                            $key=rand(23456789,98765432);
                                                            $key=$tid.'ST'.$key;
                                                            $queryauth=mysql_query("INSERT INTO `keyauth` VALUES ('$tid', '$key','$activated')");

                                                            $sql = "CREATE TABLE `$db`.`$tid` (
                                                            `qid` BIGINT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                                            `ques` TEXT NOT NULL,
                                                            `op1` VARCHAR(255) DEFAULT NULL,
                                                            `op2` VARCHAR(255) DEFAULT NULL,
                                                            `op3` VARCHAR(255) DEFAULT NULL,
                                                            `op4` VARCHAR(255) DEFAULT NULL,
                                                            `mcq` VARCHAR(1) NOT NULL
                                                            )ENGINE = MyISAM;";
                                                            mysql_query($sql,$connect);

                                                        // Adding a Test code to the Session variable.
                                                        $_SESSION['testcode']=$tid;
                                                        echo "Successfully added the following test:</br><b>Test Code:</b> $tid\n<b>Test Name:</b> $tname\n";
                                                        echo "</br>Proceed to <a href='addques.php'>adding questions to this test.</a>";
                                                         

                                                        }
                                                        else
                                                            echo "Please Complete all the details (Test ID, Test Name and Test Link)";
                                                    }
                                            else die("Form Submission Failed!");

                                         }


                                        ?>
				</div>
			</div>
			<div id="leftpanel">
				<div align="left" class="graypanel">
                                    <?php
                                    if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'))
                                                    {
                                                        $pname=$_SESSION['username'];
                                                        echo "Welcome $pname\n";
                                                        echo "<a href='logout.php'> Logout</a>";
                                                         echo"
                                                        </br></br>
                                                        <b>Links:</b></br>
                                                        <a href ='./addtest.php'>Add a Test</a></br>
                                                        <a href ='./addreviewer.php'>Add a Reviewer</a></br>
                                                        <a href= './onlinelist.php'>Available Tests</a></br>
                                                        <a href='./activatetest.php'>Activate Test</a></br>
                                                        ";

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