<?php

define('FIELDS_MISSING', 'Debe llenar todos los campos.');
define('LOGIN_FIELDS_MISSING', 'Correo electrónico y contraseña faltan.');
define('LOGIN_FAIL', 'Correo electrónico y/o Contraseña no coinciden.');
define('LOGIN_CLOSE', 'Se cerro la sesión correctamente.');

//Class Debtors
define('DEBTORS_FIELDS_MISSING', 'Debe ingresar los datos del deudor.');
define('DEBTORS_INVALID_EMAIL', 'Debe introducir una dirección de correo electrónico válida!.');
define('IDEBTORS_NVALID_MOBILE', 'Debe introducir una teléfono valido!.');
define('ERROR_MYSQL', 'Consulte al administrador del sistema ha ocurrido un error en la BD.');
define('DEBTORS_INSERT_SUCCESS', 'Se ha registrado al deudor correctamente.');

//Class Cards
define('CARDS_FIELDS_MISSING', 'Debe ingresar todos los datos de la tarjeta a registrar.');
define('CARDS_INVALID_DIGITS', 'Debe ingresar los últimos 4 dígitos de su tarjeta.');
define('CARDS_INVALID_PHONE', 'Debe ingresar un teléfono valido de la institución bancaria.');
define('CARDS_INVALID_TYPE', 'Debe seleccionar el tipo de tarjeta de crédito.');
define('CARDS_INVALID_LIMIT', 'Debe ingresar solo números en el limite de crédito.');
define('CARDS_INVALID_CUTOFF', 'Debe ingresar un día de corte valido');
define('CARDS_INVALID_BALANCE', 'Debe ingresar el balance de la tarjeta');
define('CARDS_INVALID_MONTH', 'Debe seleccionar el mes de vencimiento');
define('CARDS_INVALID_YEAR', 'Debe seleccionar el año de vencimiento');
define('CARDS_INSERT_SUCCESS', 'Se ha registrado la tarjeta correctamente.');

//Class Expense 
define('EXPENSE_FIELDS_MISSING', 'Debe ingresar todos los datos del gasto.');
define('EXPENSE_INVALID_ID_DEBTOR', 'Debe seleccionar la persona a quien se le cargara el gasto.');
define('EXPENSE_INVALID_ID_CARD', 'Debe seleccionar la tarjeta o efectivo de donde se pago el gasto.');
define('EXPENSE_INVALID_TAG', 'Debe ingresar que fue lo que se compro.');
define('EXPENSE_INVALID_DATE', 'Debe seleccionar una fecha de compra válida.');
define('EXPENSE_INVALID_AMOUNT', 'Debe ingresar un valor de compra válido.');
define('EXPENSE_INSERT_SUCCESS', 'Se ha registrado el gasto correctamente.');

//Class Debts 
define('DEBTS_FIELDS_MISSING', 'Debe ingresar todos los datos de la deuda.');
define('DEBTS_INVALID_ID_DEBTOR', 'Debe seleccionar la persona a quien se le cargara la deuda.');
define('DEBTS_INVALID_ID_CARD', 'Debe seleccionar la tarjeta o efectivo de donde se pagara la deuda.');
define('DEBTS_INVALID_TAG', 'Debe ingresar que fue lo que se compro.');
define('DEBTS_INVALID_DATE', 'Debe seleccionar una fecha de compra válida.');
define('DEBTS_INVALID_AMOUNT', 'Debe ingresar un valor de compra válido.');
define('DEBTS_INVALID_PAYMENTS', 'Debe seleccionar el numero de pagos de la deuda.');
define('DEBTS_INSERT_SUCCESS', 'Se ha registrado la deuda correctamente.');





