<?php 
defined('_EXEC') or die;
?>
<div class="panel">
    <!--Block Styled Form -->
    <!--===================================================-->
    <form id="adminForm" name="adminForm" action="<?php echo HTTP_SITE;?>/index.php" method="multipart/form">
        <input type="hidden" name="option" value="eventos" />
        <input type="hidden" name="action" value="createEdit" />
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="name">Nombre </label>
                        <input class="form-control" type="text" id="name" name="name" value="" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="image">Imagen certificado </label>
                        <input class="form-control" type="file" id="image" name="image" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="fechaEvento">Fecha </label>
                        <input class="form-control" type="date"  placeholder="yyyy-mm-dd" min="2000-01-02" id="fechaEvento" name="fechaEvento" value="" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="gionEvento">Gión </label>
                        <textarea class="form-control" rows="5" id="gionEvento"></textarea>
                    </div>
                </div>
            </div> 
        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-success btn-labeled fa fa-floppy-o" id="save" type="submit">Guardar</button>
        </div>
    </form>
    <!--===================================================-->
    <!--End Block Styled Form -->

</div>

<!--Bootstrap Validator [ OPTIONAL ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/bootstrap-validator/bootstrapValidator.min.js");?>
<!--Masked Input [ OPTIONAL ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/masked-input/jquery.maskedinput.min.js");?>
<!--jQuery [ REQUIRED ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/components/eventos/assets/js/createEdit.js");?>