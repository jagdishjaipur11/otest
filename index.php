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
                 <!--       <a href="#">Home</a> | <a href="#">Sitemap</a> | <a href="#">Contact Us</a> -->
                    </div>
                </div>
                <div id="menu">
                    <div align="right" class="smallwhitetext" style="padding:9px;">
                        <a href="#">Home</a> | <a href="#">About Us</a> |  <a href="#">Contact Us</a>
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
                        <span class="titletext">Online Test Centre!</span>
                    </div>
                    <div class="bodytext" style="padding:12px;" align="justify">
                        <strong>Read the following Instructions carefully! </strong><br />
                        <br />
                        This is the Online Test Center for Spoken tutorials. Here you can test your knowledge on FOSS
                        using a predefined test which tests your analytical and logical abilities along with your
                        knowledge attained in the given subject.
                        </br></br>
                        The test is reviewed by an instructor wherever necessary result will be made available on the user profile page.
                        </br></br>
                        To begin the test you need to be logged. If you haven't registered yet then you can register using the Button given below.</br></br>
                        <a href="./register.php"><img src="./images/registernow.gif"height ="40" width="100"></img></a>
                    </div>
                </div>
                <div id="leftpanel" class="bodytext">
                    <div align="left" class="graypanel">
                        <form action="./func.login.php" method='POST'>
                            <table>
                                <tr>
                                    <td>Username
                                        <input type="text" name ="username" size="17"></input></td>

                                </tr>
                                <tr>
                                    <td>Password
                                        <input type="password" name="password"size="17"></input></td>

                                </tr>
                                <tr>
                                    <td>Login User-type
                                        <select name="uselect[]">
                                            <option value="s" > Student </option>
                                            <option value="r"> Reviewer </option>
                                            <option value="a"> Admin </option>
                                        </select>
                                    </td>

                                </tr>
                                <td>
                                    <input type="submit" name="submit" value="Submit"></input></br>
                                    <a href='#'>Forgot Password</a>
                                </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <div id="footer" class="smallgraytext">
                    &copy; 2011 | <a href="http://www.spoken-tutorial.org" target="_blank">Spoken Tutorials</a>
                </div>
            </div>
        </div>
    </body>
</html>
