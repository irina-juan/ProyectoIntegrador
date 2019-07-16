<?php

$dsn = 'mysql:host=127.0.0.1;dbname=prueba_usuarios;port=3306';
$db_user = 'root';
$db_pass = '';

try {
$db = new PDO($dsn, $db_user,$db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
echo $e->getMessage();
}
echo "conexion establecida";
?>
<?php
echo "<br>" ?>
<?php
//abrimos la conexion a la base de datos.
$dsn = 'mysql:host=127.0.0.1;dbname=prueba_usuarios;port=3306';
$db_user = 'root';
$db_pass = '';
try {
$db = new PDO($dsn, $db_user,$db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
echo $e->getMessage();
}
// definimos nuestra consulta. e invocamos el prepare.
$sql = 'SELECT usuario, nombre, genero, nivel FROM usuarios';
$sth = $db->prepare($sql);

//Luego ejecutamos la consulta con la funcion execute.

$sth->execute();

//Nos traemos los datos con fetchall

$usuarios = $sth->fetch(PDO::FETCH_ASSOC);
while ($usuarios !=NULL) {

  echo $usuarios["nombre"]. '<br>';
  $usuarios = $sth->fetch(PDO::FETCH_ASSOC);
  // code...
}

/*Para el caso de que la consulta sea de muchos registros podemos mejorar los
tiempos de respuesta usando fetch Recordamos cómo era?*/

//pARA EVITAR QUE TE HAGAN SQL INJECTION A TU SITIO impide que le agreguen datos para romper porque se rompe con datos planos o con una variable
// 1 PREPRARO LA SENTENCIA SQUL MysqlndUhPreparedStatement BINDVALUE se debe transformar en variable //

$sql = 'INSERT INTO usuarios VALUES( default,:usuario, :nombre,:genero, :nivel, :email, :telefono , :marca, :compania, :saldo, :activo)';
   $sthInsert = $db->prepare($sql);
   $sthInsert -> bindValue(":usuario","JOS2356");
   $sthInsert -> bindValue(":nombre","perez honguito.");
   $sthInsert -> bindValue(":genero","M");
   $sthInsert -> bindValue(":nivel","1");
   $sthInsert -> bindValue(":email", "josem34@gmail.com");
   $sthInsert -> bindValue(":telefono", "26153568963");
   $sthInsert -> bindValue(":marca", "SAMSUNG");
   $sthInsert -> bindValue(":compania", "TELCEL");
   $sthInsert -> bindValue(":activo", "1");
   $sthInsert -> bindValue("saldo", "2356");
   $sthInsert->execute();
