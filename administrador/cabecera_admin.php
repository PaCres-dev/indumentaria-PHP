<header class="row" id="cabecera">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="marca">
                <h1><a href="../index.php"><img src="../img/logo.png"></a></h1>
            </div>
            <nav class="col-lg-12 col-md-12 col-sm-12 col-xs-12 navbar" id="navbar-fluid">
                <div class="container" id="botonera">
                    <label for="toggle">&#9776;</label>
                    <input type="checkbox" id="toggle" />
                    <ul class="nav nav-tabs nav-justified">
                        <li role="presentation"><a href="../index.php" target="new">Ir al Sitio</a></li>
                        <li role="presentation"><a href="index.php">Inicio</a></li>
                        <li role="presentation"><a href="nosotros.php">Información</a></li>
                        <li role="presentation"><a href="productos.php">Productos</a></li>
                        <?php
                        if(isset($_SESSION['admin']))
                        {
                            ?>
                            <li role="presentation"><a href="salir_admin.php">Salir</a></li>
                            <?php
                        } 
                        ?>
                    </ul>
                </div>
            </nav>
        </header>