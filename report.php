<?php
$getdata = $_GET['id'];
//mkdir("/var/www/html/cuckoo/uploadtocuckoogetresult/".$getdata,0700);
$output = shell_exec('cd '.$getdata.' && wget http://148.72.214.65:1339/tasks/report/'.$getdata.'/html'); 
echo "<pre>$output</pre>";
echo "<br/>If the results do not appear, refresh and wait about 2 minutes or more for result.<br/>";
echo "<br/><br/>Code by Riyan Hidayat Samosir, S. Kom - Indonesia - www.hanyajasa.com";
echo file_get_contents($getdata."/html");
?>
