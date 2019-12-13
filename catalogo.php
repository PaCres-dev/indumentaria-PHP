<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEDILAB || INDUMENTARIA</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/miestilo.css" rel="stylesheet">
    <link href="img/favicon.ico" rel="shortcut icon">
    <link href="css/lightbox.min.css" rel="stylesheet">
  </head>
  <body>
    <section class="container-fluid" id="contenedor">
    	<?php
        include('cabecera.php');
      ?>
      <section class="container" id="contenedor-estatico">
        <section class="row" id="contenido">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Catálogo</h2>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php
              switch ($_GET['id']) 
              {
                case 'medilab':
                  $titulo='Medilab';
                  $productos='Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años';
                break;
                  
                case 'termolab':
                  $titulo='Termolab';
                  $productos='Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí".';
                break;

                case 'moncar':
                  $titulo='Moncar';
                  $productos='Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto.';
                break;

                default:
                  # code...
                break;
              }
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="marcaCatalogo">
              <h3><?php echo $titulo; ?></h3>
              <p><?php echo $productos; ?></p>
            </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="filter">
                <form method="GET" action="catalogo.php" class="form-inline pull-right">
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                  <select id="orden" class="form-control" name="orden">
                    <option value="0" <?php if (isset($_GET['orden'])){if ($_GET['orden']=='0') {echo "selected";}} ?>>ORDENAR POR:</option>
                    <option value="relevancia" <?php if (isset($_GET['orden'])){if ($_GET['orden']=='relevancia') {echo "selected";}} ?>>Relevancia</option>
                    <option value="precio1" <?php if (isset($_GET['orden'])){if ($_GET['orden']=='precio1') {echo "selected";}} ?>>Precio Mayor-Menor</option>
                    <option value="precio" <?php if (isset($_GET['orden'])){if ($_GET['orden']=='precio') {echo "selected";}} ?>>Precio Menor-Mayor</option>
                  </select>
                  <?php
                  if (isset($_GET['page'])) 
                  {
                    ?>
                    <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                    <?php
                  }
                  ?>
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span>Filtrar</button>
                </form>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cajaProductos" id="productos">
              <?php
                $categoria=$_GET['id'];
                include("conexion.php");

                //PAGINAS || RESULTADO POR PAGINA
                $resultado_por_pagina=8;

                //CANTIDAD DE RESULTADOS SQL
                $consulta=mysqli_query($datos_conexion, "SELECT * FROM productos WHERE categoria='$categoria' ORDER BY nombre");
                $cantidad_de_resultados=mysqli_num_rows($consulta);

                //DETERMINAR TOTAL POSIBLE POR PAGINA
                $cantidad_de_paginas=ceil($cantidad_de_resultados/$resultado_por_pagina);

                //DETERMINAR EN QUE PAGINA SE ENCUENTRA
                if (!isset($_GET['page'])) 
                {
                  $page=1;
                }
                else
                {
                  $page=$_GET['page'];
                }

                //DETERMIANR LIMIT PARA SQL
                $esta_pagina_resultados=($page-1)*$resultado_por_pagina;

                //TRAER RESULTADOS SELECCIONADOS Y MOSTRARLOS

                if (isset($_GET['orden']))
                {
                  $orden=$_GET['orden'];

                  if ($orden=='0')
                  {
                    $consultar_produc=mysqli_query($datos_conexion, "SELECT * FROM productos WHERE categoria='$categoria' ORDER BY nombre LIMIT ".$esta_pagina_resultados.",".$resultado_por_pagina."");
                  }
                  else if ($orden=='relevancia') 
                  {
                    $consultar_produc=mysqli_query($datos_conexion, "SELECT * FROM productos WHERE categoria='$categoria' ORDER BY $orden, precio DESC LIMIT ".$esta_pagina_resultados.",".$resultado_por_pagina."");
                  }
                  else if ($orden=='precio1') 
                  {
                    $orden='precio';
                    $consultar_produc=mysqli_query($datos_conexion, "SELECT * FROM productos WHERE categoria='$categoria' ORDER BY $orden DESC LIMIT ".$esta_pagina_resultados.",".$resultado_por_pagina."");
                  }
                  else
                  {
                    $consultar_produc=mysqli_query($datos_conexion, "SELECT * FROM productos WHERE categoria='$categoria' ORDER BY $orden LIMIT ".$esta_pagina_resultados.",".$resultado_por_pagina."");
                  }
                }
                else
                {
                  $consultar_produc=mysqli_query($datos_conexion, "SELECT * FROM productos WHERE categoria='$categoria' ORDER BY nombre LIMIT ".$esta_pagina_resultados.",".$resultado_por_pagina."");
                }

                while ($mostrar_produc=mysqli_fetch_array($consultar_produc)) 
                {
                  ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="thumbnail">
                        <?php
                        if ($mostrar_produc['imagen1']=="") 
                        {
                          ?>
                          	<img src="img/fotosProductos/download.svg" class="img-responsive" alt="Producto sin imagen">
                          <?php
                        }
                        else
                        {
                          ?>
                          <div class="cajaFicha">
                            <img src="mostrarImagenesProductos/imagen_producto1.php?id=<?php echo $mostrar_produc['id']; ?>" class="img-responsive" alt="<?php echo $mostrar_produc['nombre']; ?>">
                          </div>
                          <?php
                        }
                        ?>
                        <div class="caption">
                          <h3 class="name"><?php echo $mostrar_produc['nombre']; ?></h3>
                          <p class="desc"><?php echo $mostrar_produc['breve_desc']; ?></p>
                          <p>$<?php echo $mostrar_produc['precio']; ?></p>
                          <p><a href="producto.php?id=<?php echo $mostrar_produc['id']; ?>" class="btn btn-primary" role="button">Ver Mas</a>
                        </div>
                      </div>
                    </div>
                  <?php
                }

                //LINKS DE LAS PAGINAS
                ?>
                <nav aria-label="Page navigation" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="pagination">
                  <ul class="pagination pull-right">
                    <li>
                      <a href="catalogo.php?id=<?php echo $_GET['id']; if(isset($_GET['orden'])){echo '&orden='.$_GET['orden'];} echo '&page=1'; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                <?php
                for ($pages=1; $pages <= $cantidad_de_paginas; $pages++) 
                { 
                  ?>
                    <li <?php if (isset($_GET['page'])){if ($_GET['page']==$pages) {echo 'class="active"';}} ?>>
                      <a href="catalogo.php?id=<?php echo $_GET['id']; if(isset($_GET['orden'])){echo '&orden='.$_GET['orden'];} echo '&page='.$pages; ?>"><?php echo $pages ;?></a>
                    </li>
                  <?php
                }
                ?>
                    <li>
                      <a href="catalogo.php?id=<?php echo $_GET['id']; if(isset($_GET['orden'])){echo '&orden='.$_GET['orden'];} echo '&page='.$cantidad_de_paginas; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <?php

                mysqli_close($datos_conexion);
              ?>
              </div>
          </div>
        </section>
      <?php
      include('pie.php');
      ?>
      </section>
    </section>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

