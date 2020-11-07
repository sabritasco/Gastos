<?php
class class_Fechas
{
    /**
     * Este metodo verifica si existen variables en el _GET y comprueba que sean correctas
     * @param array $data
     * @return retorna el true o false si la fecha que se armo es correcta
     */
    function iniciar(array $data)
    {
        global $trimmed_data, $result, $date;
        $trimmed_data = array_map('trim', $data);
        if (!empty($data) and filter_var(intval($trimmed_data['month']), FILTER_VALIDATE_INT,  array('options' => array('min_range' => 1, 'max_range' => 12))) and filter_var(intval($trimmed_data['year']), FILTER_VALIDATE_INT,  array('options' => array('min_range' => 2018, 'max_range' => 2050)))) {
            $result = true;
            $date = date("d-" . $trimmed_data['month'] . "-" . $trimmed_data['year'] . "");
        } else {
            $result = false;
            $date = date("d-m-Y");
        }
    }



    /**
     * Este metodo devuelve el mes (primero en texto y luego en numero) y año en numero counstruido de el GET
     * @return retorna un array con el mes en texto, el mes en numero y el año 4 digitos
     */
    public function current()
    {
        return array(strftime("%B", DateTime::createFromFormat('!m', date("m", strtotime($GLOBALS["date"])))->getTimestamp()), date("m", strtotime(date($GLOBALS["date"]))), date("Y", strtotime(date($GLOBALS["date"]))));
    }


    /**
     * Este metodo devuelve el mes y año en numero, siguientes al que se pasa
     * @return retorna una array con el mes en numero, así como el año en 4 digitos
     */
    public function next()
    {
        return array(date("m", strtotime(date($GLOBALS["date"]) . "+ 1 month")), date("Y", strtotime(date($GLOBALS["date"]) . "+ 1 month")));
    }

    /**
     * Este metodo devuelve el mes y año en numero, anteriores al que se pasa
     * @return retorna una array con el mes en numero, así como el año en 4 digitos
     */
    public function previous()
    {
        return array(date("m", strtotime(date($GLOBALS["date"]) . "- 1 month")), date("Y", strtotime(date($GLOBALS["date"]) . "- 1 month")));
    }
}
