<?php
class class_Cards
{
    public function __construct()
    {
        $db = new class_ConnectDB();
        $this->_con = $db->con;
    }

    /**
     * Este metodo para capturar tarjetas
     * @param array $data
     * @return retorna falso o verdadero
     */
    public function insert(array $data)
    {
        if (!empty($data)) {

            // Trim a todos los datos entrantes:
            $trimmed_data = array_map('trim', $data);

            // Verificar ultimos 4 digitos de la tarjeta
            if (filter_var($trimmed_data['digits_cards'], FILTER_VALIDATE_INT)) {
                $digits_cards = mysqli_real_escape_string($this->_con, $trimmed_data['digits_cards']);
            } else {
                throw new Exception(CARDS_INVALID_DIGITS);
            }

            // Verificar identificador
            $identifier_cards = mysqli_real_escape_string($this->_con,  $trimmed_data['identifier_cards']);
            if ((!$identifier_cards)) {
                throw new Exception(FIELDS_MISSING);
            }

            // Verificar credito o debito
            if (in_array($trimmed_data['type'], array("Credito", "Debito"))) {
                $type = mysqli_real_escape_string($this->_con, $trimmed_data['type']);

                if ($type == "Credito") {

                    // Verificar limite de credito
                    if (filter_var($trimmed_data['limit'], FILTER_VALIDATE_INT)) {
                        $limit = mysqli_real_escape_string($this->_con, $trimmed_data['limit']);
                    } else {
                        throw new Exception(CARDS_INVALID_LIMIT);
                    }

                    // Verificar fecha de corte
                    if (filter_var($trimmed_data['cutoff'], FILTER_VALIDATE_INT,  array('options' => array('min_range' => 1, 'max_range' => 31)))) {
                        $cutoff = mysqli_real_escape_string($this->_con, $trimmed_data['cutoff']);
                    } else {
                        throw new Exception(CARDS_INVALID_CUTOFF);
                    }

                    $balance = NULL;
                } else {

                    // Verificar saldo
                    if (filter_var($trimmed_data['balance'], FILTER_VALIDATE_INT)) {
                        $balance = mysqli_real_escape_string($this->_con, $trimmed_data['balance']);
                    } else {
                        throw new Exception(CARDS_INVALID_BALANCE);
                    }

                    $limit = NULL;
                    $cutoff = NULL;
                }
            } else {
                throw new Exception(CARDS_INVALID_TYPE);
            }

            // Verificar fecha de vencimiento
            $expiration = mysqli_real_escape_string($this->_con,  $trimmed_data['expiration']);
            if ((!$expiration) or !preg_match('(((0[123456789]|10|11|12)/(([1][9][0-9][0-9])|([2][0-9][0-9][0-9]))))', $expiration)) {
                throw new Exception(CARDS_INVALID_EXPIRATION);
            }

            // Verificar y telefono de institucion
            $institution = mysqli_real_escape_string($this->_con,  $trimmed_data['institution']);
            $phone = mysqli_real_escape_string($this->_con,  $trimmed_data['phone']);
            if ((!$institution) || (!$phone)) {
                throw new Exception(FIELDS_MISSING);
            }


            // Insertar tarjeta
            $query = "INSERT INTO TARJETAS (TARJETA_ID, TERMINACION, IDENTIFICADOR, ID_USUARIO, TIPO, LIMITE_CREDITO, FECHA_CORTE, SALDO, VENCIMIENTO, INSTITUCION, TEL_INSTITUCION) VALUES (NULL, '$digits_cards', '$identifier_cards', '" . $_SESSION['USUARIO_ID'] . "', '$type', NULLIF('$limit',''), NULLIF('$cutoff',''), NULLIF('$balance',''), '$expiration', '$institution', '$phone');";
            if (mysqli_query($this->_con, $query)) {
                mysqli_close($this->_con);
                return true;
            } else {
                // Error DB
                //$this->_con->error;
                throw new Exception(ERROR_MYSQL);
            }

            
        } else {
            throw new Exception(CARDS_FIELDS_MISSING);
        }
    }
}
