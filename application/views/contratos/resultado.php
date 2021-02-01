<div class="pull-left">
    <div>
        <p> </p>
    </div>
    <div>
        <a href="<?php echo site_url('comporacion/index'); ?>" class="btn btn-success col-sm-offset-6">Nueva Comparacion</a>
    </div>
</div>
<br>
<br>
<div class="container">
    <div>
        <h3><kbd><?php echo 'De ' . $fecha['fecha1'] . ' a ' . $fecha['fecha2']; ?></kbd></h3>
    </div>
    <table class="table table-dark table-striped">
        <tr>
            <th>Cliente</th>
            <th># de Contratos</th>
            <th>Monto</th>
        </tr>
        <?php $total = 0; ?>
        <?php if (count($contratos) != 0) { ?>
            <?php foreach ($contratos as $con) { ?>
                <tr>
                    <td><?php echo $con['idCliente']; ?> </td>
                    <td><?php echo $con['Contrato']; ?></td>
                    <td><?php echo '$ ' . $con['Monto']; ?></td>
                    <?php $total = $total + $con['Monto']; ?>
                </tr>
            <?php } ?>

            <tr>
                <td></td>
                <th>Total</th>
                <td><?php echo '$ ' . $total; ?></td>
            </tr>
        <?php } else { ?>
            <tr>
                <td>No</td>
                <td>Existen</td>
                <td>Contratos</td>
            </tr>
        <?php } ?>
    </table>
</div>
<br>
<div class="col-sm-offset-6 col-sm-4 centered">
    <a href="<?php echo site_url('comporacion/index'); ?>" class="btn btn-primary">Imprimir</a>
</div>