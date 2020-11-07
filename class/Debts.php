<?php
class class_Debts
{
    public function __construct()
    {
        $db = new class_ConnectDB();
        $this->_con = $db->con;
    }

    /**
     * Este metodo para capturar deudas mensuales o cargos recurrentes
     * @param array $data
     * @return retorna falso o verdadero
     */
    public function insert(array $data)
    {
        if (!empty($data)) {

            // Trim a todos los datos entrantes:
            $trimmed_data = array_map('trim', $data);



            if (!isset($trimmed_data['debtor']) || !isset($trimmed_data['destination']) || !isset($trimmed_data['tag']) || !isset($trimmed_data['debt_date']) || !isset($trimmed_data['amount_partial']) || !isset($trimmed_data['number_payments'])) {
                throw new Exception(DEBTS_FIELDS_MISSING);
            }



            // Verificar id del deudor
            if (filter_var($trimmed_data['debtor'], FILTER_VALIDATE_INT)) {
                $id_debtor = mysqli_real_escape_string($this->_con, $trimmed_data['debtor']);
            } else {
                throw new Exception(DEBTS_INVALID_ID_DEBTOR);
            }



            // Verificar id de la tarjeta destino
            if (filter_var($trimmed_data['destination'], FILTER_VALIDATE_INT)) {
                $id_card = mysqli_real_escape_string($this->_con, $trimmed_data['destination']);
            } elseif ($trimmed_data['destination'] == "Efectivo") {
                $id_card = 0;
            } else {
                throw new Exception(DEBTS_INVALID_ID_CARD);
            }



            // Verificar tag del gasto
            $tag = mysqli_real_escape_string($this->_con,  $trimmed_data['tag']);
            if ((!$tag)) {
                throw new Exception(DEBTS_INVALID_TAG);
            }



            // Verificar tfecha de compra
            if (count($fecha = explode("/", $trimmed_data['debt_date'])) == 3 and checkdate($fecha[1], $fecha[2], $fecha[0])) {
                $date = mysqli_real_escape_string($this->_con, $trimmed_data['debt_date']);
            } else {
                throw new Exception(DEBTS_INVALID_DATE);
            }



            // Verificar monto de la compra
            if (filter_var($trimmed_data['amount_partial'], FILTER_VALIDATE_FLOAT)) {
                $amount = mysqli_real_escape_string($this->_con, $trimmed_data['amount_partial']);
            } else {
                throw new Exception(DEBTS_INVALID_AMOUNT);
            }

            // Verificar numero de pagos
            if (filter_var($trimmed_data['number_payments'], FILTER_VALIDATE_INT)) {
                $number_payments = mysqli_real_escape_string($this->_con, $trimmed_data['number_payments']);
                $total = $amount*$number_payments;
            } elseif ($trimmed_data['number_payments'] == "Recurrente") {
                $number_payments = 0;
                $total = '';
            } else {
                throw new Exception(DEBTS_INVALID_PAYMENTS);
            }



            // Insertar gasto
            $query = "INSERT INTO DEUDAS (ID_USUARIO, ID_DEUDOR, ID_TARJETA, FECHA_DEUDA, MONTO_MENSUALIDAD, TOTAL_DEUDA, TITULO_DEUDA, NUMERO_PAGOS) VALUES ('" . $_SESSION['ID_USUARIO'] . "', '$id_debtor', '$id_card', '$date', '$amount', NULLIF('$total',''), '$tag', '$number_payments');";
            if (mysqli_query($this->_con, $query)) {
                mysqli_close($this->_con);
                return true;
            } else {
                // Error DB
                //$this->_con->error;
                throw new Exception($this->_con->error);
            }
        } else {
            throw new Exception(DEBTS_FIELDS_MISSING);
        }
    }
}
