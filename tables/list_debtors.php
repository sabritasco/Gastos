<?php
session_start();
require_once '../class/ParametersDB_01.php';
$db = new class_ConnectDB();
if (!isset($_SESSION['logged_in'])) {
  header('Location: index.php');
}
$query = " SELECT * FROM DEUDORES WHERE ID_USUARIO = '" . $_SESSION['USUARIO_ID'] . "'";
$result = mysqli_query($db->con, $query);
$data = array();
while ($rows = mysqli_fetch_assoc($result)) {
  $acciones = $rows['CELULAR'];
  $data[] = array('Acciones' => $acciones, 'Nombre' => $rows['NOMBRE'], 'Celular' => $rows['CELULAR'],  'Correo' => $rows['CORREO']);
}
$results = array(
  "data" => $data
);
echo json_encode($results);
