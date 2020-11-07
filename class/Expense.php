<?php
class class_Expense
{
    public function __construct()
    {
        $db = new class_ConnectDB();
        $this->_con = $db->con;
    }

    /**
     * Este metodo para capturar gastos o cargos
     * @param array $data
     * @return retorna falso o verdadero
     */
    public function insert(array $data)
    {
        if (!empty($data)) {

            // Trim a todos los datos entrantes:
            $trimmed_data = array_map('trim', $data);



            if (!isset($trimmed_data['debtor']) || !isset($trimmed_data['destination']) || !isset($trimmed_data['tag']) || !isset($trimmed_data['expense_date']) || !isset($trimmed_data['amount'])) {
                throw new Exception(EXPENSE_FIELDS_MISSING);
            }



            // Verificar id del deudor
            if (filter_var($trimmed_data['debtor'], FILTER_VALIDATE_INT)) {
                $id_debtor = mysqli_real_escape_string($this->_con, $trimmed_data['debtor']);
            } else {
                throw new Exception(EXPENSE_INVALID_ID_DEBTOR);
            }



            // Verificar id de la tarjeta destino
            if (filter_var($trimmed_data['destination'], FILTER_VALIDATE_INT)) {
                $id_card = mysqli_real_escape_string($this->_con, $trimmed_data['destination']);
            } elseif ($trimmed_data['destination'] == "Efectivo") {
                $id_card = 0;
            } else {
                throw new Exception(EXPENSE_INVALID_ID_CARD);
            }



            // Verificar tag del gasto
            $tag = mysqli_real_escape_string($this->_con,  $trimmed_data['tag']);
            if ((!$tag)) {
                throw new Exception(EXPENSE_INVALID_TAG);
            }



            // Verificar tfecha de compra
            if (count($fecha = explode("/", $trimmed_data['expense_date'])) == 3 and checkdate($fecha[1], $fecha[2], $fecha[0])) {
                $date = mysqli_real_escape_string($this->_con, $trimmed_data['expense_date']);
            } else {
                throw new Exception(EXPENSE_INVALID_DATE);
            }



            // Verificar monto de la compra
            if (filter_var($trimmed_data['amount'], FILTER_VALIDATE_FLOAT)) {
                $amount = mysqli_real_escape_string($this->_con, $trimmed_data['amount']);
            } else {
                throw new Exception(EXPENSE_INVALID_AMOUNT);
            }



            // Insertar gasto
            $query = "INSERT INTO GASTOS (ID_USUARIO, ID_DEUDOR, ID_TARJETA, TITULO_CARGO, FECHA_CARGO, VALOR_CARGO) VALUES ('" . $_SESSION['ID_USUARIO'] . "', '$id_debtor', '$id_card', '$tag', '$date', '$amount');";
            if (mysqli_query($this->_con, $query)) {
                mysqli_close($this->_con);
                return true;
            } else {
                // Error DB
                //$this->_con->error;
                throw new Exception(ERROR_MYSQL);
            }
        } else {
            throw new Exception(EXPENSE_FIELDS_MISSING);
        }
    }
}
