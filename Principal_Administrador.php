
<!DOCTYPE HTML>
<html>

<head>
    <title>fASHIONTASTICO - CARRITO DE COMPRAS</title>
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
                                <li><a href="./Productos.php">Productos</a>
                                </li>
                                <li><a href="./index.php">Salir</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <header>
            <img src="images/fashiontastico.png" width="200px">
        </header>
        <!-- Content -->
        <div>
            <center>
                <h1>Últimas Compras</h1>
            </center>
                <table >
                    <thead>
                        <tr>
                            <td>Imagen</td>
                            <td>N° de Venta</td>
                            <td>Usuario</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    include ("/php/conexion.php");
                    $link = Conectarse();
                    $sql = "SELECT * FROM compras" ;
                    $result = mysqli_query($link,$sql);
                    while ($row = mysqli_fetch_array($result)) {  
                    $img = $row[2];
                    echo"<tr>
                        <td><img src='../productos/".$img."' width='42' height='42'/></td>
                        <td>".$row[0]."</td>
                        <td>".$row[1]."</td>
                        <td>".$row[3]."</td>
                        </tr>"
                        ;
                    }
                    ?>
                    </tbody>
                </table>
        </div>
        <div style="text-align: center;">
                <h2>Contacto</h2>
                <dl class="alt">
                    <dt>Telefono</dt>
                    <dd>(+52) 1 222 564 5392</dd>
                    <dd>(+52) 1 222 563 5687</dd>
                    <dt>Correo</dt>
                    <dd><a href="#">contacto@fashiontastico.com.mx</a>
                    </dd>
                </dl>
                <ul class="icons">
                    <li><a href="www.facebook.com/fashiontastico" class="icon fa-facebook"><span class="label">Facebook</span></a>
                    </li>
                    <li><a href="www.instagram.com/fashiontasticooficial/" class="icon fa-instagram"><span class="label">Instagram</span></a>
                    </li>

                </ul>
            <p class="copyright">&copy;Diseñado: <a href="">Skytec Enterprises</a>.</p>
        </div>
        <br>
        <br>
        <br>
        <br>

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