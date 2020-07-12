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
  $acciones =
    '
    <a href="index.php" class="btn btn-icon" role="button">
    <i class="fas fa-ellipsis-v"></i>
    </a>

    <a href="index.php" class="btn btn-icon" role="button">
    <i class="far fa-info-circle"></i>
    </a>

    <a href="index.php" class="btn btn-icon" role="button">
    <i class="far fa-trash-alt"></i>
    </a>';
  $data[] = array('Acciones' => $acciones, 'Nombre' => $rows['NOMBRE'], 'Celular' => $rows['CELULAR'],  'Correo' => $rows['CORREO']);
}
$results = array(
  "data" => $data
);
echo json_encode($results);
