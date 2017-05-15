
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
      <h2>Editar Producto</h2>
    </div>
    <div class="modal-body">
    <form action="php/CRUD_Productos/modificarproducto.php" method="POST" enctype="multipart/form-data">
    <div style="color:black;">
        ID Producto
            <input type="text" name="id" id="id" readonly>
        Producto
            <input type="text" name="producto" id="producto">
        Precio
            <input type="number" step="any" name="precio" id="precio">
        Descripción
            <input type="text" name="descripcion" id="descripcion">  
        Talla
            <select name="talla" id="talla">
                <option value="Chica">Chica</option>
                <option value="Mediana">Mediana</option>
                <option value="Grande">Grande</option>
                <option value="Unitalla">Unitalla</option>
            </select>
        <br>
        <input type="Submit" name="submit" value="Enviar" style="color:black;">
    </div>
    </form>
    </div>
  </div>
</div>



<!-- The Modal -->
<div id="myModal-Del" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Eliminar Producto</h2>
    </div>
    <div class="modal-body">
    <form action="php/CRUD_Productos/eliminarproducto.php" method="POST" enctype="multipart/form-data">
    <div style="color:black;">
        ID Producto
            <input type="text" name="id" id="id"  readonly>
        Producto
            <input type="text" name="producto" id="producto">
        <br>
        <input type="Submit" name="submit" value="Eliminar" style="color:black;">
    </div>
    </form>
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
                        <td><button type='button' class='open-Modal btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal' data-id='".$row[1]."' data-precio='".$row[5]."' data-detalles='".$row[2]."' data-talla='".$row[3]."' data-idp='".$row[0]."'><i class='fa fa-pencil'></i>      Editar   </button></td>
                        <td><button type='button' class='open-Modal btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal-Del' data-id='".$row[1]."'  data-idp='".$row[0]."'><i class='fa fa-pencil'></i>      Eliminar   </button></td>

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
    var mytalla= $(this).data('talla');
    var myid = $(this).data('idp');
    $(".modal-body #producto").val( myproducto );
    $(".modal-body #id").val( myid );
    $(".modal-body #precio").val( myprecio );
    $(".modal-body #descripcion").val( mydetalles );
    $(".modal-body #talla").val(mytalla);
});


//Paso de parametros a la ventana modal borrar
$(document).on("click", ".open-Modal-Del", function () {
    var myproducto = $(this).data('id');
    var myid = $(this).data('idp');
    $(".modal-content #producto").val( myproducto );
    $(".modal-content #id").val(myid);
});
</script>
