<?php
if(isset($_POST['submit'])){
    $file=$_FILES['file'];
    //print_r($file);
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];
    
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
//    $allowed=array('jpg','jpeg','png','exe','pdf');
    //if(in_array($fileActualExt,$allowed))
    //{
    if($fileError===0)
    {
        if($fileSize<1888888)
        {
            $fileNameNew=uniqid('',true).".".$fileActualExt;
            $fileDestination='uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            //header("Location: index.php?uploadsuccess");        
            $output = shell_exec('curl -H "Authorization: Bearer S4MPL3" -F file=@/var/www/html/cuckoo/uploadtocuckoogetresult/uploads/'.$fileNameNew.' http://148.72.214.65:1339/tasks/create/file'); 
            echo "<br/>Click here: <a href='https://reportcuckoo.hanyajasa.com/report.php?id=".substr($output,15,strlen($output)-18)."'>https://reportcuckoo.hanyajasa.com/report.php?id=".substr($output,15,strlen($output)-18)."</a>";
            mkdir("/var/www/html/cuckoo/uploadtocuckoogetresult/".substr($output,15,strlen($output)-18),0700);
			echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/>Code by Riyan Hidayat Samosir, S. Kom - Indonesia - www.hanyajasa.com";
        }            
        else
        {
            echo"File size exceed";
        }
    }
    else
    {
        echo"Error in the file uploading";
    }
    //}
//    else
//    {
//        echo"FIle type Not Allowed ";
//    }
}
