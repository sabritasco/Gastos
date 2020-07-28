<?php
$file = basename($_SERVER["SCRIPT_FILENAME"], '.php');
switch ($file) {
    case 'debtors_capture';
        $title = 'Capturar Deudor';
        break;
    case 'debtors_list';
        $title = 'Listado de deudores';
        break;
    case 'debts_capture';
        $title = 'Capturar deuda';
        break;
    case 'cards_capture';
        $title = 'Capturar Tarjeta';
        break;
    case 'cards_list';
        $title = 'Listado de tarjetas';
        break;
    case 'template';
        $title = 'Template';
        break;
    default;
        $title = 'Administración';
        break;
}
