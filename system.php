<?php
function encode_this($string){
    UTF8_encode($string);
    $control='jose';
    $string=$control.$string.$control;
    $string=base64_encode($string);
    return($string);
}
?>
<?php
$user=$_POST['usr'];
$psw=$_POST['psw'];

if ($user=="" or $psw=="")
{
    $msg="Los campos deben ir llenos";
    print "<meta http-equiv='refresh' content='0;
	url=sys.php?msg=$msg'>";
    exit;
}

include('bd.php');
$sql="select * from usuario where Usuario='$user' and Contrasena='$psw'";
$consulta=mysql_query ($sql) or die (mysql_error());
$cuantos=mysql_num_rows($consulta);
if ($cuantos==0)
{
    $msg="El usuario o password no son correctos";
    print "<meta http-equiv='refresh' content='0;
		url=login.php?mensaje=no'>";
    exit;
}
else
{
    $id=mysql_result($consulta, 0, 'Id');
    $activo=mysql_result($consulta, 0, 'Estatus');
    if($activo=='si'){
        $sql1="Select * from usuario where Id=$id";
        $consulta1=mysql_query($sql1) or die (mysql_error());
        $nombre=mysql_result($consulta1, 0, 'Nombre');
        $usuario=mysql_result($consulta1,0,'Usuario');

    }

    else
    {
        $idu=encode_this($id);
        print "<meta http-equiv='refresh' content='0;
		url=accesos.php?$idu'>";
    }
}
?>