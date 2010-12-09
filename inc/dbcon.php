<?php
/*  This file is part of SCMS.

    SCMS is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    SCMS is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with SCMS.  If not, see <http://www.gnu.org/licenses/>.
*/

  $host = "localhost";
  $dbname = "scms";
  $username = "root";
  $password = "";
  $dbh=mysql_connect($host,$username,$password) or trigger_error('There was an error while trying to connect to MySQL database. Please send an email to the owner of this site ($sitename) and include everything this page states...<br><br><br> ' . mysql_error(), E_USER_ERROR);
  mysql_select_db($dbname);
?>
