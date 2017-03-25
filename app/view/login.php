<!DOCTYPE html>
<html class="ls-theme-gray">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Login - ManOS</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href="<?= CSS ?>locastyle.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="public/img/favicon.ico" type="image/x-icon"/>
        
    </head>
    <body class="documentacao documentacao_exemplos documentacao_exemplos_login-screen documentacao_exemplos_login-screen_index">
        <div class="ls-login-parent" style= 'background: url("<?= IMG ?>capa2.jpg") no-repeat scroll 0% 0% / cover  transparent; '>
            <!--
            Na escola:  http://localhost/webos2/public/img/capa2.jpg 
            Em casa: http://localhost/Webos2/webos/public/img/capa2.jpg
            -->
            <div class="ls-login-inner" style ='background: rgba(30, 51, 25, 0.92)' >

                <div class="ls-login-container">
                    <div class="ls-login-box" >
                        <h1 class="ls-login-logo">
                            ManOS
                        </h1>
                        <form role="form" class="ls-form ls-login-form" action="<?php echo ROOT ?>login" method="POST">
                            <fieldset>

                                <label class="ls-label">
                                    <b class="ls-label-text ls-hidden-accessible">Matricula</b>
                                    <input name="matricula" class="ls-login-bg-user ls-field-lg" type="text" placeholder="Matrícula" required autofocus>
                                </label>

                                <label class="ls-label">
                                    <b class="ls-label-text ls-hidden-accessible">Senha</b>
                                    <input name="senha" id="password_field" class="ls-login-bg-password ls-field-lg" type="password" placeholder="Senha" required>
                                </label>

                                <!-- <p><a class="ls-login-forgot" href="forgot-password">Esqueci minha senha</a></p> -->

                                <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg">

                                <?php Util::msg() ?>                 

                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script src="<?php echo JS ?>jquery.js"></script>
        <script src="<?php echo JS ?>locastyle.js"></script>

    </body>
</html>
