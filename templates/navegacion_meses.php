<?php

$fechas_obj = new class_Fechas();
$fechas_obj->iniciar($_GET);
list($month_current_t, $month_current, $year_current) = $fechas_obj->current();
list($month_previous, $year_previous) = $fechas_obj->previous();
list($month_next, $year_next) = $fechas_obj->next();

?>
<div class="row mb-4">
    <div class="col-6 text-left">
        <a href="<?= basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);  ?>?month=<?= $month_previous ?>&year=<?= $year_previous ?>"> <i class="fas fa-hand-point-left"></i> Mes anterior</a>
    </div>
    <div class="col-6 mb-4 text-right">
        <a href="<?=basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>?month=<?= $month_next ?>&year=<?= $year_next ?>">Mes siguiente <i class="fas fa-hand-point-right"></i></a>
    </div>
    <div class="col-12 text-left">
        <a class="font-weight-bolder" href="<?= basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>">Mes actual</a>
    </div>
</div>