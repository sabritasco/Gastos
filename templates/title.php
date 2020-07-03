<?php
$file = basename($_SERVER["SCRIPT_FILENAME"], '.php');
switch ($file) {
    case 'debtors_capture';
        $title = 'Capturar Deudor';
        break;
    case 'debtors_list';
        $title = 'Listado de deudores';
        break;
    case 'cards_capture';
        $title = 'Capturar Tarjeta';
        break;
    case 'template';
        $title = 'Capturar Tarjeta';
        break;
    default;
        $title = 'Administración de Gastos';
        break;
}
