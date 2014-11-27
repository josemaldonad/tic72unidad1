<?php
function decode_get($string)
{
    $cad=explode("?",$string);
    $string=$cad[1];

    $string=base64_decode($string);
    $control="jose";
    $string=str_replace($control,"","$string");
    return ($string);
}
?>
<?php
$id=decode_get($_SERVER["REQUEST_URI"]);
if ($id=="")
{
    $msg="";
    print "<meta http-equiv='refresh' content='0;
	url=login.php?msg=$msg'>";
}
else
{
    SetCookie ('id', $id);
    SetCookie ('acceso', 1);
    session_start();
    $_SESSION['id']=$id;
    $_SESSION['acceso']=1;

    print "<meta http-equiv='refresh' content='0;
	url=sistema/index.php'>";
    exit;
}
?>