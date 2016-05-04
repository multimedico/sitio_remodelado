<?php
    if (isset($_POST["submit"])) {
        $apellido = $_POST['apellido'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $empresa = $_POST['empresa'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Multimédico'; 
        $to = 'gerente@multimedico.com.co,jorgemontoyab@gmail.com'; 
        $subject = 'Contacto a través del website';
        
        $body ="From: $apellido . $nombre\n E-Mail: $email\n Empresa: $empresa\n Message:\n $message";

        // Check if name has been entered
        if (!$_POST['apellido']) {
            $errApellido = 'Por favor ingrese su apellido';
        }

        // Check if name has been entered
        if (!$_POST['nombre']) {
            $errNombre = 'Por favor ingrese su nombre';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Por favor ingrese una dirección de correo válida';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Por favor ingrese su mensaje';
        }
        //Check if simple anti-bot test is correct
        if ($human !== 5) {
            $errHuman = 'La respuesta es incorrecta';
        }

// If there are no errors, send the email
if (!$errApellido && !$errName && !$errEmail && !$errMessage && !$errHuman) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Gracias, nos pondremos en contacto con Ud. muy pronto</div>';
    } else {
        $result='<div class="alert alert-danger">Hubo un error enviando su mensaje. Inténtelo de nuevo más tarde.</div>';
    }
}
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multimédico - Inicio</title>
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="container-fluid" class="contenedor-1">
        <div id="navegacion" class="row">
            <div class="col-xs-8 col-md-4">
                <img src="img/logo_nuevo.png" id="logo" alt="Logo de Multimédico" class="img-responsive">
            </div>
            <!-- #logo -->
            <div id="menu-navegacion" class="col-xs-4 col-md-8">
                <nav class="navbar navbar-default" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Desplegar navegación</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="inicio.html">Inicio</a></li>
                            <li><a href="quienes.html">Somos</a></li>
                            <li><a class="enlace-sub" href="beneficios.html">Beneficios del CO<span class="subindice">2</span></a></li>
                            <li><a href="mitate.html">Mitate - CO<span class="subindice">2</span> Spa</a></li>
                            <li><a href="#">Otros productos</a></li>
                            <li class="active"><a href="#">Contacto</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <!-- #menu-navegacion -->
        </div>
        <!-- #navegacion -->
        <div id="banner" class="row">
            <img src="img/banner1.jpg" alt="Banner de la página" class="img-responsive">
        </div>
        <!-- #banner -->
    </div>
    <!-- #contenedor-1 -->
    <div class="container contenedor-2">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                <h1>¿Desea saber más?</h1>
                <p>
                    Por favor, póngase en contacto con nosotros a través de este formulario o mediante nuestro número telefónico
                    en la parte inferior de esta página. Estaremos gustosos de atender cualquier tipo de duda, inquietud o sugerencia
                    de su parte.   
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
                <form name="contactform" role="form" method="post" action="contacto.php">
                    <div class="form-group">
                        <label for="inputApellido">Apellido</label>
                        <input type="text" class="form-control" id="inputApellido" placeholder="Apellido" name="apellido" value="<?php echo htmlspecialchars($_POST['apellido']); ?>">
                        <?php echo "<p class='text-danger'>$errApellido</p>";?>
                    </div>
                    <div class="form-group">
                        <label for="inputNombre">Nombre</label>
                        <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" name="nombre" value="<?php echo htmlspecialchars($_POST['nombre']); ?>">
                        <?php echo "<p class='text-danger'>$errNombre</p>";?>
                    </div>
                    <div class="form-group">
                        <label for="inputCorreo">Correo electrónico</label>
                        <input type="text" class="form-control" id="inputCorreo" placeholder="ejemplo@dominio.com" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                        <?php echo "<p class='text-danger'>$errEmail</p>";?>
                    </div>
                    <div class="form-group">
                        <label for="inputEmpresa">Empresa</label>
                        <input type="text" class="form-control" id="inputEmpresa" placeholder="Ingrese el nombre de su empresa" name="empresa" value="<?php echo htmlspecialchars($_POST['empresa']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="TextArea">Descripción</label>
                        <textarea class="form-control" rows="6" id="inputTextArea" placeholder="¿En qué le podemos ayudar?" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                        <?php echo "<p class='text-danger'>$errMessage</p>";?>
                    </div>
                    <div class="form-group">
                        <label for="human">2 + 3 = ?</label>
                            <input type="text" class="form-control" id="human" name="human" placeholder="Su respuesta">
                            <?php echo "<p class='text-danger'>$errHuman</p>";?>
                        </div>    
                    <div class="form-group">
                       <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
                    </div>
                    <div class="form-group">
                        <?php echo $result; ?>  
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- .contenedor-2 -->
        <div class="container-fluid" id="contenedor-5">
        <div class="row footer">
            <footer>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <address>
                            Cra. 72 # Circular 4-11
                            <br> Telefax (57)(4) 416 98 67
                            <br> Whatsapp 310 823 35 83
                            <br> Medellín - Colombia
                            <br> info@multimedico.com.co
                        </address>
                    </div>
                    <div class="col-md-1 col-lg-1 col-md-offset-3 col-lg-offset-3 hidden-xs hidden-sm">
                        <a href="https://www.facebook.com/multimedico" target="_blank"><img src="img/facebook.png" alt="Enlace a Facebook" class="img-responsive"></a>
                    </div>
                    <div class="col-md-1 col-lg-1 hidden-xs hidden-sm">
                        <a href="https://www.linkedin.com/company/multimedico-s-a-s-" target="_blank"><img src="img/linkedin.png" alt="Enlace a Linkedin" class="img-responsive"></a>
                    </div>
                    <div class="col-md-1 col-lg-1 hidden-xs hidden-sm">
                        <a href="https://twitter.com/multimedico" target="_blank"><img src="img/twitter.png" alt="Enlace a Twitter" class="img-responsive"></a>
                    </div>
                    <div class="col-md-1 col-lg-1 hidden-xs hidden-sm">
                        <a href="https://www.youtube.com/channel/UCgRgZDEMBfNCY0cIOx2rG-A" target="_blank"><img src="img/youtube.png" alt="Enlace a Youtube" class="img-responsive"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-xs-offset-2 col-sm-offset-2 hidden-md hidden-lg">
                        <a href="https://www.facebook.com/multimedico"><img src="img/facebook.png" alt="Enlace a Facebook" class="imagen-dispositivo img-responsive"></a>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-xs-offset-1 col-sm-offset-1 hidden-md hidden-lg">
                        <a href="https://www.linkedin.com/company/multimedico-s-a-s-"><img src="img/linkedin.png" alt="Enlace a Linkedin" class="imagen-dispositivo img-responsive"></a>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-xs-offset-1 col-sm-offset-1 hidden-md hidden-lg">
                        <a href="https://twitter.com/multimedico"><img src="img/twitter.png" alt="Enlace a Twitter" class="imagen-dispositivo img-responsive"></a>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-xs-offset-1 col-sm-offset-1 hidden-md hidden-lg">
                        <a href="https://www.youtube.com/channel/UCgRgZDEMBfNCY0cIOx2rG-A"><img src="img/youtube.png" alt="Enlace a Youtube" class="imagen-dispositivo img-responsive"></a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- #contenedor-5 -->
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
