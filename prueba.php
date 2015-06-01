<?php 

if(empty($_POST)){
	echo 'error';
	exit();
}

if(isset($_POST['my-checkbox']))
{
    echo "on";
}else{
    echo "off";
}

// echo $_POST["clientName"];
// echo $_POST["clientSurname"];
// echo $_POST["clientMail"];
// echo $_POST["clientPhone"];
// echo $_POST["clientAddress"];
// echo $_POST["my-checkbox"];


?>