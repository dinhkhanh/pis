<?php
$to = "dinhkhanh_dk@yahoo.com"; 
$subject_prefix = "";
if(!isset($_GET['action']))
{
die("You must not access this page directly!"); //Just to stop people from visiting contact.php normally
}
$name = trim($_GET['name']); 
$email = trim($_GET['email']);
$headers = 'From: ' .$name. '<'.$email.'>' . "\r\n";
$subject = "Góp ý/Cảm nhận từ khimoc.com";
$message = trim($_GET['msg']);

mail($to,$subject,$message,$headers); //a very simple send

echo 'contactarea|<span style="padding-left: 5px; display: inline-block">Cám ơn bạn, '.$name.', mình sẽ sớm reply email cho bạn. Chúc bạn một ngày tốt lành!</span>';
?>
