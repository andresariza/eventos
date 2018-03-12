<?php 
defined('_EXEC') or die;
$id = $Evento->getId();
$name = $Evento->getName();
$fechaEvento = $Evento->getFechaEvento();
$gionEvento = $Evento->getGionEvento();
$status = $Evento->getStatus();
?>
<!--Bootstrap Timepicker [ OPTIONAL ]-->
<?php echo Factory::printImportJsCss("css",HTTP_SITE."/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css");?>
<!--Bootstrap Datepicker [ OPTIONAL ]-->
<?php echo Factory::printImportJsCss("css",HTTP_SITE."/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css");?>
<script type="text/javascript">
    var startDate = "<?php echo (!empty($fechaEvento))?(($fechaEvento<date("Y-m-d")?$fechaEvento:date("Y-m-d"))):date("Y-m-d");?>";
</script>
<div class="panel">
    <!--Block Styled Form -->
    <!--===================================================-->
    <form id="adminForm" name="adminForm" action="<?php echo HTTP_SITE;?>/index.php" method="multipart/form">
        <input type="hidden" name="option" value="eventos" />
        <input type="hidden" name="action" value="createEdit" />
        <input type="hidden" name="status" value="<?php echo (!empty($status))?$status:'1';?>" />
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="name">Nombre </label>
                        <input class="form-control" type="text" id="name" name="name" value="<?php echo $name;?>" />
                    </div>
                </div>
                <?php /*/ ?><div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="image">Imagen certificado </label>
                        <input class="form-control" type="file" id="image" name="image" value="" />
                    </div>
                </div><?php /**/ ?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="fechaEvento">Fecha </label>
                        <input class="form-control" type="date" id="fechaEvento" name="fechaEvento" value="<?php echo $fechaEvento;?>" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label" for="gionEvento">Guión </label>
                        <textarea class="form-control" rows="5" id="gionEvento" name="gionEvento"><?php echo $gionEvento;?></textarea>
                    </div>
                </div>
            </div> 
        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-success btn-labeled fa fa-floppy-o" id="save" type="submit" disabled="disabled">Guardar</button>
        </div>
    </form>
    <!--===================================================-->
    <!--End Block Styled Form -->

</div>

<!--Bootstrap Validator [ OPTIONAL ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/bootstrap-validator/bootstrapValidator.min.js");?>
<!--Bootstrap Timepicker [ OPTIONAL ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js");?>
<!--Bootstrap Datepicker [ OPTIONAL ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js");?>
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.js");?>
<!--jQuery [ REQUIRED ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/components/eventos/assets/js/createEdit.js");?>