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
                    <th data-field="edit" data-sortable="false" class="hidden-xs">Editar</th>
                    <th data-field="dataBase" data-sortable="false" class="hidden-xs">Cargar DB</th>
                    <?php /*/ ?>
                    <th data-field="certificado" data-sortable="false" class="hidden-xs">Certificado</th>
                    <?php /**/ ?>
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
                            <?php echo $m->getId();?>
                        </td>
                        <td>
                            <?php echo $m->getName();?>
                        </td>
                        <td>
                            <?php 
                            echo ControlEventos::printInconEstado($m->getStatus(), $m->getId());
                            ?>
                        </td>
                        <td>
                            <?php 
                            echo ControlEventos::printInconEditar($m->getId());
                            ?>
                        </td>
                        <td>
                            <?php 
                            echo ControlEventos::printInconDB($m->getId());
                            ?>
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
echo Factory::printImportJsCss("js",HTTP_SITE."/components/eventos/assets/js/eventos.js");
?>

