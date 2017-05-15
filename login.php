<!DOCTYPE HTML>
<html>

<head>
    <title>Inicio de Sesión</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />

</head>

<body class="landing">

    <!-- Page Wrapper -->
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <h1><a href="index.html">FASHIONTASTICO</a></h1>
            <nav id="nav">
                <ul>
                    <li class="special">
                        <a href="#menu" class="menuToggle"><span>Menu</span></a>
                        <div id="menu">
                            <ul>
                                <li><a href="./index.php">Pagina principal</a>
                                </li>
                                <li><a href="./dhl.php">Revisa donde esta tu pedido con DHL</a>
                                </li>
                                <li><a href="./compras.php">Compra alguno de nuestros diseños</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>


        <header>
            <img src="images/fashiontastico.png" width="200px" style="margin-left: 2%">
        </header>
        <!-- Main -->
        <div id="main">

            <!-- Content -->
            <section  class="main">
                <form id="formulario" method="post" action="./php/verificar.php">
                    <?php if(isset($_GET[ 'error'])){ echo '<center>Datos No Validos</center>'; } ?>
                    Correo
                    <br>
                    <br>
                    <input type="email" id="email" name="email" placeholder="Usuario" required>
                    <br>
                    Contraseña
                    <br>
                    <br>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                    <br>
                    <input type="submit" name="aceptar" value="Iniciar Sesión" class="aceptar">
                    <br>
                </form>
            </section>
        </div>
        <br>
        <br>
        <div style="text-align: center;">
                <h2>Contacto</h2>
                    <dt>Telefono</dt>
                    <dd>(+52) 1 222 564 5392</dd>
                    <dd>(+52) 1 222 563 5687</dd>
                    <dt>Correo</dt>
                    <dd><a href="#">contacto@fashiontastico.com.mx</a>
                    </dd>
                <ul class="icons">
                    <li><a href="www.facebook.com/fashiontastico" class="icon fa-facebook"><span class="label">Facebook</span></a>
                    </li>
                    <li><a href="www.instagram.com/fashiontasticooficial/" class="icon fa-instagram"><span class="label">Instagram</span></a>
                    </li>
                </ul>
            <p class="copyright">&copy;Diseñado: <a href="">Skytec Enterprises</a>.</p>
            <br>
            <br>
            </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>