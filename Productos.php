
<!DOCTYPE HTML>
<html>

<head>

    <title>Productos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="landing">

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
  </div>

</div>

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
                                <li><a href="./Agregar_Producto.php">Agregar</a>
                                </li>
                                <li><a href="./Modificar.html">Modificar</a>
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
                <h1>Productos</h1>
            </center>
                <table >
                    <thead>
                        <tr>
                            <td>Imagen</td>
                            <td>Producto</td>
                            <td>Descripcion</td>
                            <td>Talla</td>
                            <td>Precio</td>
                            <td>Editar</td>
                            <td>Eliminar</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    include ("/php/conexion.php");
                    $link = Conectarse();
                    $sql = "SELECT * FROM productos" ;
                    $result = mysqli_query($link,$sql);
                    while ($row = mysqli_fetch_array($result)) {  
                    $img = $row[4];
                    echo"<tr>
                        <td><img src='fotos/".$img."' width='42' height='42'/></td>
                        <td>".$row[1]."</td>
                        <td>".$row[2]."</td>
                        <td>".$row[3]."</td>
                        <td>".$row[5]."</td>
                        <td><button type='button' class='open-Modal btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal' data-id='".$row[1]."' data-precio='".$row[4]."' data-detalles='".$row[1]."'  ><i class='fa fa-pencil'></i>      Editar   </button></td>

                        "
                        ;
                    }
                    ?>
                    </tbody>
                </table>
        </div>

        <!-- Footer -->
        <div style="text-align: center;">
                <h2>CONTACTO</h2>
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
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/bootstrap/bootstrap.js"></script>

</body>
</html>

<script type="text/javascript">

//Paso de parametros a la ventana modal editar
$(document).on("click", ".open-Modal", function () {
    var myproducto = $(this).data('id');
    var myprecio = $(this).data('precio');
    var mydetalles = $(this).data('detalles');
    $(".modal-body #producto").val( myproducto );
    $(".modal-body #productos_m").val( myproducto );
    $(".modal-body #precio_m").val( myprecio );
    $(".modal-body #detalles_m").val( mydetalles );
});


//Paso de parametros a la ventana modal borrar
$(document).on("click", ".open-Modal_delete", function () {
    var myproducto = $(this).data('id');
    $(".modal-content #producto").val( myproducto );
});
</script>
