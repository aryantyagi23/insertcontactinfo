<?php
$name=$_POST['name'];
$message=$_POST['message'];
$email=$_POST['email'];
$filenmame=$_FILES['file'];

 include("contactinclude.php");
$targetDir = "demo1/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array("application/msword", "application/vnd.ms-excel"," application/vnd.ms-powerpoint","text/plain", "application/pdf",);
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
       
			$sql ="INSERT INTO contact_info (name,email,message,file)VALUES ('$name','$email','$message','$fileName')";	
			                                                            
			 if(mysqli_query($conn,$sql)){
	             echo"Message Sent";}
   
		}
	}
}

else{
echo"error";
}
?>
