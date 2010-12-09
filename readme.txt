PROJECT INFORMATION
-------------------
Title: SCMS
[Full Title: Simplified CMS]
Version: 0.1-alpha1-r11
Author: Dimitris P.
Release Date: 4-12-2010
Update Date: 3-12-2010
Licensing Scheme: GPLv3 (or later)
Email address: dimp@dimp.tk
Web Site: http://scms.dimp.tk/

INFORMATION
-----------
Right now, SCMS is doing it's first steps on the internet world. The project
is being constantly updated. I'm gonna create a small system for the version
checking and update function which will come in the near future. I think I'll
be using Google's AppSpot infrastructure for this, as it has nearly 0% outage
and it will be very good for this project.

Anyway, if you want to help, please read this page:
http://scms.googlecode.com/

REQUIREMENTS
------------
3mb space
MySQL database with PHPMyAdmin or any other db manager
Apache 2 with:
- .htaccess
- mod_rewrite

INSTALLATION NOTES
------------------
Version 0.1-alpha1 is considered highly unstable and some very basic functions
are still missing. You should wait until a stable version is ready for every-day
use.
In a few words: do not use it yet, unless you want to help!

If you still insist:
1. Open file inc/dbcon.php and edit these variables as provided by your host:
  $host = "localhost"; // MySQL host, usually localhost
  $dbname = "scms"; // MySQL Database name
  $username = "root"; // MySQL username
  $password = ""; // MySQL password

2. Open admin/config.php and change $adname and $adpass to something you like
3. Upload all files to your webhost
4. Import db.sql to your MySQL database (most hosts offer PHPMyAdmin to do this)
5. Visit your website.

Fancy links are disabled. If you want to use them:
1. Open PHPMyAdmin, or any other tool you use for MySQL db administration
2. Locate scms' database and enter table settings
3. Change id "fancylinks" value to 1
4. Open .htaccess
5. Change RewriteBase to state scms public folder. For example
   if you access http://my.domain/scms to enter your scms copy
   you must change RewriteBase to /scms/
TO DO
-----
High Priority:
- Basic Cache System
- Basic Installer
- Multiuser System
- Commenting

Medium Priority:
- New templating engine
- Template editor on admin panel
- Easy integration with ScStats
- Sidebar editor
- RSS Feeds
- XML-RPC integration

Low Priority:
- Plugin engine
- Masked link URLs for stats tracking


LICENSE INFORMATION
-------------------
SCMS is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

SCMS is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

Your copy of the GNU General Public License can be found on the file
COPYING.  If not, see <http://www.gnu.org/licenses/gpl.txt>.

The preinstalled template (substantial) is licensed under Creative Commons Attribution 3.0
for more information see the file tpl/substantial/license.txt
Website: http://www.freecsstemplates.org/preview/substantial/

The preinstalled WYSIWYG editor is licensed under LGPL v2.1
for more information see the file admin/tiny_mce/license.txt
Website: http://tinymce.moxiecode.com/

VERSIONING SCHEME
-----------------
A.B-DE-rF

After SCMS hits a stable version, the versioning scheme will change to:
Unstable Releases:
A.B-DE-rF

Stable Releases:
A.B.C (rF)

A: Major version (rewrites & big changes)
B: Minor version (small additions)
C: Sub-minor version (bugfixes)
D: Alpha/Beta/RC
E: Used only on alpha/beta for subversioning
F: Release number (will be used for updating etc)
r: stands for "release"


CHANGELOG
---------
0.1-alpha1-r11
$ Adding/Editing/Removing links on admin area.
$ Corrected static page listing on homepage.
/ Admin area redesigned
# calltinymce() needs a total rewrite.
# changed versioning scheme section
+ Limit posts per page, by default 15 posts.
$ Post navigation, "Newer posts & Previous posts" links on page navigation.
* Fixed Error 404 page which wasn't showing. But it won't show up if a post/page doesn't exist.
# Added changelog on the about page.

Symbols: [+]:Additions [-]:Removals [*]:Bugfixes [/]:OtherFixes&Updates
         [$]:Experimental [^]:UpdatedToStable [#]:Information

0.1-alpha1-r10
# Version skipped

0.1-alpha1-r9
+ Static pages
+ Custom error 404 pages (not yet themed)
+ About section on admin panel
/ Updated database structure
* Closed possible SQL Injection hole while viewing news with fancylinks on
/ Updated ".htaccess" rules for url rewriting
/ Updated tinymce editor functions to save space
$ Post/page/site link detection and navigation experimental updates
# Not yet fully configurable via admin panel
# Public release skipped

0.1-alpha1-r8
/ Changed database structure, no update script, you should add the "links" table. Look at "db.sql"
^ Homepage url function
/ Post links & site navigation fixes
+ Sidebar links
* Fixed possible SQL Injection hole while adding/editing news
/ Updated mod_rewrite rules on ".htaccess" file

0.1-alpha1-r7
/ Default Mod_Rewrite apache rules
/ Changed admin panel files structure
$ Function to get the url of homepage
$ Editable permalink structure

0.1-alpha1-r6
$ Default Mod_Rewrite apache rules
$ Show author's posts
$ Show post on it's own page (for future commenting use)

0.1-alpha1-r5
# First public release
+ Add/Edit/Delete posts from admin panel
+ Listing all posts on admin panel
+ Listing all posts on home
+ Resizable WYSIWYG Editor using TinyMCE
+ Customisable footer message
