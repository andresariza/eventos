<?php 
defined('_EXEC') or die;
?>
<div class="panel">
    <!--Block Styled Form -->
    <!--===================================================-->
    <form id="adminForm" name="adminForm" action="<?php echo HTTP_SITE;?>/index.php">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="nombremenuopcion">Nombre </label>
                        <input class="form-control" type="text" id="nombremenuopcion" name="nombremenuopcion" value="" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="linkAbsoluto">Url absoluta </label>
                        <input class="form-control" type="text" id="linkAbsoluto" name="linkAbsoluto" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="idpadremenuopcion">Padre</label>
                        <select class="form-control chosen-select" id="idpadremenuopcion" name="idpadremenuopcion">
                            <option value="0" >Inicio</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="codigoestadomenuopcion">Estatus</label>
                        <select class="form-control chosen-select" id="codigoestadomenuopcion" name="codigoestadomenuopcion">
                            <option value="01" >Publicado</option>
                            <option value="02" >Despublicado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="codigogerarquiarol">Gerarquia Rol</label>
                        <select class="form-control chosen-select" id="codigogerarquiarol" name="codigogerarquiarol">
                        </select>
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
<!--jQuery [ REQUIRED ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/components/eventos/assets/js/createEdit.js");?>