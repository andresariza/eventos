<?php 
defined('_EXEC') or die;
?>

<div class="row">

    <!--Large Tile - (Visit Today)-->
    <!--===================================================-->
    <div class="col-md-6 col-lg-3">
        <div class="panel panel-primary panel-colorful">
            <a href="http://localhost/eventos/?option=eventos" data-id="2" class="menuItemTrigger" title="">
                <div class="panel-body text-center">
                    <p class="text-uppercase mar-btm text-sm"></p>
                    <i class="fa fa-calendar-check-o fa-5x"></i>
                    <hr>
                    <p class="h2 text-thin">Eventos</p> 
                </div>
            </a>
        </div>
    </div>
    <!--===================================================-->
    <!--End Large Tile - (Visit Today)-->

    <!--Large Tile - (Comments)-->
    <!--===================================================-->
    <div class="col-md-6 col-lg-3">
        <div class="panel panel-info panel-colorful">
            <a href="http://localhost/eventos/?option=operador" data-id="3" class="menuItemTrigger" title="">
                <div class="panel-body text-center">
                    <p class="text-uppercase mar-btm text-sm"></p>
                    <i class="fa fa-user-circle-o fa-5x"></i>
                    <hr>
                    <p class="h2 text-thin">Operadores</p> 
                </div>
            </a>
        </div>
    </div>
    <!--===================================================-->
    <!--End Large Tile - (Comments)-->

    <!--Large Tile - (New Orders)-->
    <!--===================================================-->
    <div class="col-md-6 col-lg-3">
        <div class="panel panel-mint panel-colorful">
            <a href="http://localhost/eventos/?option=telemercadeo" data-id="4" class="menuItemTrigger" title="">
                <div class="panel-body text-center">
                    <p class="text-uppercase mar-btm text-sm"></p>
                    <i class="fa fa-volume-control-phone fa-5x"></i>
                    <hr>
                    <p class="h2 text-thin">Telemercadeo</p> 
                </div>
            </a>
        </div>
    </div>
    <!--===================================================-->
    <!--Large Tile - (New Orders)-->

    <!--Large Tile - (Earning)-->
    <!--===================================================-->
    <div class="col-md-6 col-lg-3">
        <div class="panel panel-success panel-colorful">
            <a href="http://localhost/eventos/?option=eventos" data-id="5" class="menuItemTrigger" title="">
                <div class="panel-body text-center">
                    <p class="text-uppercase mar-btm text-sm"></p>
                    <i class="fa fa-pie-chart fa-5x"></i>
                    <hr>
                    <p class="h2 text-thin">Reportes</p> 
                </div>
            </a>
        </div>
    </div>
    <!--===================================================-->
    <!--End Large Tile - (Earning)-->


</div>
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/components/dashBoard/assets/js/dashBoard.js"); ?>