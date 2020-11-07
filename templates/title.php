<?php
$file = basename($_SERVER["SCRIPT_FILENAME"], '.php');
switch ($file) {
    case 'debtors_list';
        $title = 'Listado de Deudores';
        break;
    case 'cards_list';
        $title = 'Listado de Tarjetas';
        break;
    case 'debts_list';
        $title = 'Listado de Deudas';
        break;
    case 'expense_list';
        $title = 'Listado de Gastos';
        break;
    case 'debts_capture';
        $title = 'Capturar Deuda';
        break;
    case 'cards_capture';
        $title = 'Capturar Tarjeta';
        break;
    case 'debtors_capture';
        $title = 'Capturar Deudor';
        break;
    case 'expense_capture';
        $title = 'Capturar Gasto';
        break;
    case 'template';
        $title = 'Template';
        break;
    default;
        $title = 'Administración';
        break;
}
