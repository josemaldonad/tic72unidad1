<?php
require('header.php');


require('bd.php');
    require('Usuario.php');

    $usuario = new Usuario();


//$usuario->createUsuario("julio","mal","san",1);
//$usuario->readUsuarioG();
//$usuario->readUsuarioS(1);
//$usuario->updateUsuario(1,"jams","jams","jams","8");
//$usuario->deleteUsuario();


if (isset($_POST['submit'])){
    switch ($_POST['submit']){
        case "Alta":
            echo"<div class=\"alert alert-danger\" role=alert>";
            echo "<br>Bot&oacute;n:" . $_POST['submit'];
            echo"</div>";
        $usuario->CreateUsuario("$_POST[Nombre]","$_POST[ApellidoPaterno]","$_POST[ApellidoMaterno]", $_POST['Nivel']);
        break;
        case "Borrar":
            echo"<div class=\"alert alert-info\" role=alert>";
            echo "<br>Bot&oacute;n:" . $_POST['submit'];
        echo"</div>";
        $usuario->deleteUsuario($_POST['id']);
        break;

        case "Modificar":
            echo"<div class=\"alert alert-success\" role=alert>";
        echo "<br>Bot&oacute;n:" . $_POST['submit'];
        echo"</div>";
 $usuario->updateUsuario($_POST['idm'],"$_POST[Nombre]","$_POST[ApellidoPaterno]","$_POST[ApellidoMaterno]", $_POST['Nivel']);

            break;

        case "Buscar":
            echo"<div calss=\"alert alert-warning\" role=alert>";
            echo "<br>Bot&oacute;n:" . $_POST['submit'];
        echo"</div>";

        $usuario->readUsuarioS($_POST['idbuscar']);
        break;

    }

}

?>
<html>
<form action="TestUsuario.php" method="POST">

       <table>
               <tr><td colspan="2" align="center"><label>GENERAR ALTA</label></td></tr>
               <tr><td> NOMBRE:</td>
       <td><input type='text' name="Nombre" size='30'></td></tr>

        <tr><td>APELLIDO PATERNO:</td>
        <td><input type='text'  name="ApellidoPaterno" size='30'></td></tr>

        <tr><td> APELLIDO MATERNO: </td>
        <td><input type='text'  name="ApellidoMaterno" size='30'></td></tr>

       <tr><td>NIVEL</td><td> <select name="Nivel">
            <option value="1">ADMINISTRADOR</option>
            <option value="2">MAESTRO</option>
            <option value="3">ALUMNO</option>
        </select></td></tr><tr>
          <td colspan="4" align="center"><input  type='submit' name="submit" value='Alta'></td></tr>
    </table>


    <td><label>ID:</label></td><td> <input type='text' name="idm" size='30'></td></tr>
            <tr><td colspan="4" align="center"><input  type='submit' name="submit" value='Modificar'></td></tr><br>


              <td><label>ID:</label></td>
   <tr><td><input type='text' size='30' name="id"></td></tr>
    <tr><td colspan="2" align="center"> <input  type='submit' name="submit" value='Borrar'></td></tr><br>





         <td><label>ID:</label></td>
                <tr><td><input type='text' size='30' name="idbuscar"></td></tr>
            <tr><td colspan="2" align="center"> <input  type='submit' name="submit" value='Buscar'></td></tr></table></center>

</form>

</html>
<?php
$usuario->readUsuarioG();
require('footer.php');

?>
