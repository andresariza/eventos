<?php defined('_EXEC') or die; //d($_SESSION); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php echo $tituloSeccion; ?></title>
    
    <?php include_once (PATH_SITE."/includes/includeJs.php");?>
    <?php include_once (PATH_SITE."/includes/includeCss.php");?>
    <script type="text/javascript">
    var HTTP_SITE = "<?php echo HTTP_SITE; ?>";
    var HTTP_ROOT = "<?php echo HTTP_ROOT; ?>";
    var alowNavigate = true; //esta variable permite o no navegar las opciones del menu dependiendo de las condiciones para estudiantes u otros usuarios
    </script>
    
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="width: 100%;" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div id="container" class="effect mainnav-lg <?php if(!empty($asideContainer)){?>aside-in aside-left aside-bright<?php } ?>">
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar" class="">
            <div id="navbar-container" class="boxed">
                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="<?php echo HTTP_SITE; ?>" class="navbar-brand">
                        <img src="<?php echo HTTP_SITE; ?>/assets/images/logo.png" alt="Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">AUDITORIO</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->
                
                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">
                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="fa fa-navicon fa-lg"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->
                    </ul>
                    <?php echo $userMenu;?>
                </div>
                
                <!--================================-->
                <!--End Navbar Dropdown-->
            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->
        
        <div class="boxed">
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div class="loaderContent">
                    <div class="contenedorInterior">
                        <i class="fa fa-spinner fa-pulse fa-5x"></i>
                        <span class="sr-only">Cargando...</span>
                        <div id="mensajeLoader"></div>
                    </div>
                </div>
                <div id="page-alert"></div>
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow"><?php echo $tituloSeccion; ?></h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-breadCrumb">
                    <?php echo $breadCrumb; ?>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <?php echo $component;?>
                </div>
                <!--===================================================-->
                <!--End page content-->
            
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">
                    <!--Menu-->
                    <?php echo $mainMenu; ?>
                    <!--End menu-->
                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->
            <?php 
            if(!empty($asideContainer)){
            ?>
            <!--ASIDE-->
            <!--===================================================-->
            <aside id="aside-container">
                <?php echo $asideContainer;?>
            </aside>
            <!--===================================================-->
            <!--END ASIDE-->
            <?php
            }
            ?>
        </div>
        
        <!-- FOOTER -->
        <footer id="footer">
            <div class="hide-fixed pull-right pad-rgt"><i class="fa fa-linux fa-php"></i> AUDITORIO V1.0</div>
            <p class="pad-lft">&copy; <?php echo date('Y'); ?> BRANDING ACTIVE</p>
        </footer>
        <!-- END FOOTER -->


        <!-- SCROLL TOP BUTTON -->
        <!--===================================================-->
        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
        <!--===================================================-->



        <div id="floating-top-right" class="floating-container"></div>
    
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER --> 
    
    <?php include_once (PATH_SITE."/includes/includeJsFooter.php");?>
</body>
</html>

