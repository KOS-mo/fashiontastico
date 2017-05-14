<!DOCTYPE HTML>
<html>
	<head>
		<title>fASHIONTASTICO - CARRITO DE COMPRAS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<body class="landing">
			<div id="page-wrapper">
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
			<div id="main">
				<section id="content" class="main">
				<center><h1>Agregar un Nuevo Producto</h1></center>
				<form action="php/CRUD_Productos/altaproducto.php" method = "post" enctype="multipart/form-data">
					<fieldset>
						Producto<br>
						<input type="text" name="producto" id="producto" required>
					</fieldset>
					<fieldset>
						Descripción<br>
						<input type="text" name="descripcion" id="descripcion" required>
					</fieldset>
					<fieldset>
						Talla<br>
						<select name="talla" id="talla">
							<option value="Chica">Chica</option>
							<option value="Mediana">Mediana</option>
							<option value="Grande">Grande</option>
							<option value="Unitalla">Unitalla</option>
						</select>
					</fieldset>
					<fieldset>
						Imagen<br>
						<div class="image-upload">
						    <label for="file-input">
						        <img src="imagenes/upload.png" width="64" height="64"  />
						    </label>
						    <input id="file-input" type="file" name="file-input"/>
						</div>
					</fieldset>
					<fieldset>
						Precio<br>
						<input type="number" id="precio" name="precio" required>
					</fieldset>
					<br>
					<input type="submit" name="accion" value="Enviar" class="aceptar" required>
				</form>	
				</section>
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