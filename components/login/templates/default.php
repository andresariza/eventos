<?php defined('_EXEC') or die; ?>
<!--jQuery [ REQUIRED ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/components/login/assets/js/login.js"); ?>
<!--Bootstrap Validator [ OPTIONAL ]-->
<?php echo Factory::printImportJsCss("js",HTTP_SITE."/assets/plugins/bootstrap-validator/bootstrapValidator.min.js"); ?>

<!-- BACKGROUND IMAGE -->
<!--===================================================-->
<div id="bg-overlay" class="bg-img img-acceso"></div>

<div id="page-alert"></div>
<!-- HEADER -->
<!--===================================================-->
<div class="cls-header cls-header-lg">
    <div class="cls-brand">
        <a class="box-inline" href="<?php echo HTTP_SITE; ?>">
            <img src="<?php echo HTTP_SITE;?>/assets/images/Logotipo_Login.png" class="img-responsive" />
            <?php /*/ ?>Eventos <span class="text-thin">Login</span></span><?php /**/ ?>
        </a>
    </div>
</div>
<!--===================================================-->

<!-- LOGIN FORM -->
<!--===================================================-->
<div class="cls-content">
    <div class="cls-content-sm panel">
        <div class="panel-body">
            <?php /*/ ?><p class="pad-btm">Sign In to your account</p><?php /**/ ?>
            <form action="index.php" id="login-form" method="post" novalidate="novalidate">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input type="text" name="login" id="login" class="form-control" placeholder="Nombre de usuario" value="" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" autocomplete="off" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 text-left">
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group text-right">
                            <button class="btn btn-warning btn-labeled fa fa-sign-in btn-login" type="submit" id="login_btn" disabled="disabled">Entrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--===================================================-->