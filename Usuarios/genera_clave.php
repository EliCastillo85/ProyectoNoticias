<HTML>
<HEAD>
   <TITLE>Inserción de usuario</TITLE>
</HEAD>

<BODY>

<?PHP
// Escribir aqu� el nombre y la clave del usuario que se desea crear
   $usuario="guillermo";
   $clave="guillermo";
   
   $conexion = mysqli_connect ("127.0.0.1:3307", "root", "adminadmin")
      or die ("No se puede conectar con el servidor");
   mysqli_select_db ($conexion,"proyecto")
      or die ("No se puede seleccionar la base de datos");
   $salt = substr ($usuario, 0, 2);
   $clave_crypt = crypt ($clave, $salt);
   $instruccion = "insert into usuarios (usuario, clave) values ('$usuario', '$clave_crypt')";
   $consulta = mysqli_query ($conexion,$instruccion)
      or die ("Fallo en la inserci�n");
   mysqli_close ($conexion);
   print ("Usuario $usuario insertado con �xito\n");
?>

</BODY>
</HTML>