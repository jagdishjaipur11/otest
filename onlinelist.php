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
	<meta name="author" content="Spoken Tutorials (www.spoken-tutorial.org)" />
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
				<strong>Currently the following tests are available: </strong><br /><br/>
				<?php
                                session_start();
                                if(isset ($_SESSION['username']))
                                {
                                include_once './include/config.inc.php';
                                global $db, $db_host, $db_user, $db_password,$mailsite,$directory;
                                include_once './include/db.connect.php';
                                
                                $result=  mysql_query("SELECT * FROM `onlinelist` ORDER BY `tid` asc");
                                $count=mysql_num_rows($result);	
                                //echo $count;
                                echo "<table border='1' cellpadding='5'>";
                                echo "
                                
                                <tr>
                                <th>S. No.</th>
                                <th>TEST CODE</th>
                                <th>TEST NAME</th>
                                <th>LINK</th>
                                </tr>";
                                $count=1;
                                while($info= mysql_fetch_assoc($result))
                                {
                                $tid=$info['tid'];
                                $testcode=$info['testcode'];
                                $tname=$info['tname'];
                                echo "
                                <tr>
                                <td>$count</td>
                                <td>$testcode</td>
                                <td>$tname</td>
                                <td><a href='./testauth.php'>$tname Test Link</a></td>
                                </tr>";
                                $count++;

                                }
                                echo"</table>";

                                }
                                else
                                    echo "Please log in to access this feature.";
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