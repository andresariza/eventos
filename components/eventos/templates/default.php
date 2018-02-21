<?php
defined('_EXEC') or die;
?>
<!--Bootstrap Table [ OPTIONAL ]-->
<?php
echo Factory::printImportJsCss("css",HTTP_SITE."/assets/plugins/bootstrap-table/bootstrap-table.min.css");
?>
<!--Basic Columns-->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">
            Listado de eventos
        </h3>
    </div>
    <div class="panel-body">
        <button id="crearEvento" class="btn btn-warning btn-labeled fa fa-university" >Crear evento</button>
        <table id="datos" data-toggle="table"
                data-toolbar="#crearEvento"
                data-page-size="20"
                data-search="true"
                data-show-pagination-switch="false"
                data-pagination="true"   >
            <thead>
                <tr>
                    <th data-field="idnumber" class="hidden-xs">#</th>
                    <th data-field="codePeriod" data-switchable="false">Codigo periodo</th>
                    <th data-field="period" data-sortable="false">Periodo</th> 
                    <th data-field="state" data-sortable="false" class="hidden-xs">Estado</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach($Eventos as $m){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td>
                            <a href="#" class="seleccionarPeriodo" data-id="<?php echo $m->getId();?>">
                                <?php echo $m->getId();?>
                            </a>
                        </td>
                        <td>
                            <a href="#" class="seleccionarPeriodo" data-id="<?php echo $m->getId();?>">
                                <?php echo $m->getName();?>
                            </a>
                        </td> 
                        <td>
                            <a href="#" class="seleccionarPeriodo" data-id="<?php echo $m->getId();?>">
                                <?php echo $m->getStatus();?>
                            </a>
                        </td> 
                    </tr>
                    <?php
                    $i++;
                }/**/
                ?>
            </tbody>
        </table>
    </div>
</div>
<!--===================================================-->


<!--Bootstrap Table [ OPTIONAL ]-->
<?php 
echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/bootstrap-table/bootstrap-table.min.js");
//echo Factory::printImportJsCss("js",HTTP_SITE."/components/cambioPeriodo/assets/js/cambioPeriodo.js");
?>

