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
	<title>Online Test</title>
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
					<span class="titletext">Online Test Centre!</span>
					</div>
					<div class="bodytext" style="padding:12px;" align="justify">
                                            <?php
                                            session_start();

                                            //Sets the Entire Session time to 1 Hour, so that the session variable does not expire before the duration of the test.
                                            ini_set('session.gc_maxlifetime', 60*60);


                                            if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'||$_SESSION['flag']=='s'))
                                            {
                                            $authkey=stripslashes($_POST['authkey']);
                                            //echo $authkey;

                                            include_once './include/config.inc.php';
                                            global $db, $db_host, $db_user, $db_password,$mailsite,$directory;

                                            //Database Connectivity
                                            include_once './include/db.connect.php';
                                            global $connect;
                                            
                                            //SQL Injection Prevention.
                                            $authkey=mysql_real_escape_string($authkey);
                                            //echo $authkey;

                                            //Selecting the TestID from the keyauth database whose key matches the entered key by the user.
                                            $queryauth= mysql_query("SELECT * FROM keyauth WHERE authkey='$authkey' ");
                                            
                                            $count=mysql_num_rows($queryauth);
                                            //echo $count;
                                            while($info= mysql_fetch_assoc($queryauth)){
                                                $tid=$info['tid'];
                                                $active=$info['activated'];
                                            }
                                            
                                            //Saving the Test ID Information in the Session Value.
                                            $_SESSION['tid']=$tid;
                                            // echo "</br>".$tid."</br>"; //We Receive the testid of our test. Now we can start our test.

                                            if ($active=='y') //check whether the test is activated or not.
                                            {
                                                $query="SELECT * FROM `$tid`";

                                                //echo $query;
                                                $queryq=mysql_query($query);
                                                $countq=mysql_num_rows($queryq);
                                                //echo $countq;

                                                //TEST LOGIC -- Ranndom Questions -- and saving the details of the student in a database.
                                                //WE create a single database before hand to do this.
                                                $count=1;
                                                echo "<b>Test Code: $tid</b>";
                                                echo "<form action='studsubmit.php' method='post'>";
                                                while($myques=mysql_fetch_assoc($queryq))
                                                {
                                                $tqid=$myques['qid'];
                                                $tques=$myques['ques'];
                                                $top1=htmlspecialchars($myques['op1']);
                                                $top2=htmlspecialchars($myques['op2']);
                                                $top3=htmlspecialchars($myques['op3']);
                                                $top4=htmlspecialchars($myques['op4']);
                                                $tmcq=$myques['mcq'];
                                           
                                                if ($tmcq=='n'){
                                                    echo "
                                                     Question.$count.</br>
                                                     <b><textarea rows='8' cols='80' name='question$count' wrap='physical' disabled='disabled'  style='color: darkblue; background-color: lightyellow' >$tques</textarea></b></br>
                                                     Answer:</br>
                                                     <textarea rows='6' cols='80' name='answer$count' wrap='physical'></textarea></br></br>
                                                     ";
                                                    $count++;
                                                }

                                                elseif ($tmcq=='y'){
                                                    echo "
                                                    Question. $count. $tques</br>
                                                    <input type='radio' name='answer$count' value='$top1' /> $top1<br />
                                                    <input type='radio' name='answer$count' value='$top2' /> $top2<br />
                                                    <input type='radio' name='answer$count' value='$top3' /> $top3<br />
                                                    <input type='radio' name='answer$count' value='$top4' /> $top4<br />
                                                    </br>
                                                    ";
                                                    $count++;
                                                }
                                                    } //End of While Loop
                                                echo "
                                                      <input type='submit' value='Submit' name='submit'></br>
                                                      </form>";
                                            }
                                            else
                                                echo "</br>Please Provide a Valid Authentication Key";
                                            
                                            }
                                            else{
                                                    echo "You are <b>not authorised</b> to access this page.";
                                                }

                                            ?>
                                        </div>
			</div>
			<div id="leftpanel">
				<div align="left" class="graypanel">
                                   <?php
                                    if(isset ($_SESSION['username']) && ($_SESSION['flag']=='a'||$_SESSION['flag']=='r'||$_SESSION['flag']=='s'))
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