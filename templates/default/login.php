<?php defined('_EXEC') or die; ?>
<?php
$auth = Factory::getSessionVar('auth');
if($auth===true){
    header("Location: ".HTTP_SITE);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"> 
    <title>Ingreso al Sistema de gestión académica en línea - SALA.</title>
    
    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <?php echo Factory::printImportJsCss("css",HTTP_SITE."/assets/css/bootstrap.min.css"); ?>

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <?php echo Factory::printImportJsCss("css",HTTP_SITE."/assets/css/nifty.min.css"); ?>
    
    <!--Font Awesome [ OPTIONAL ]-->
    <?php echo Factory::printImportJsCss("css",HTTP_SITE."/assets/plugins/font-awesome/css/font-awesome.css"); ?>

    <!--Demo [ DEMONSTRATION ]-->
    <?php echo Factory::printImportJsCss("css",HTTP_SITE."/assets/css/btlogin.css"); ?>
    
    <!--SCRIPT-->
    <!--=================================================-->
    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <?php echo Factory::printImportJsCss("css",HTTP_SITE."/assets/plugins/pace/pace.min.css"); ?>
    <?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/pace/pace.min.js"); ?>

    <!--jQuery [ REQUIRED ]-->
    <?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/js/jquery-2.1.1.min.js"); ?>
    
    <script type="text/javascript">
    var HTTP_SITE = "<?php echo HTTP_SITE;?>";
    var HTTP_ROOT = "<?php echo HTTP_ROOT;?>";
    </script>
		
    <!--JAVASCRIPT-->
    <!--=================================================-->
    <!--BootstrapJS [ RECOMMENDED ]-->
    <?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/js/bootstrap.min.js"); ?>

    <!--Fast Click [ OPTIONAL ]-->
    <?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/fast-click/fastclick.min.js"); ?>
    
    <!--Nifty Admin [ RECOMMENDED ]-->
    <?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/js/nifty.min.js"); ?>
    
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    
    <div id="container" class="cls-container">
        <?php echo $component; ?>
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->

</body>
</html>
