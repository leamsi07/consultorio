<?php
    include('encabezado.php');
    if($_POST){

      $con = mysqli_connect($_POST['servidor'],$_POST['usuario'],$_POST['clave'],$_POST['nombrebase']) or die(
        "<script>
            alert('Conexion invalida favor verificar');
            window.location = 'install.php';
        </script>"
      );

      mysqli_query($con, "drop DATABASE `{$_POST['nombrebase']}`");
      mysqli_query($con, "CREATE DATABASE `{$_POST['nombrebase']}`");
      mysqli_query($con, "USE `{$_POST['nombrebase']}`");
      mysqli_query($con, "CREATE TABLE IF NOT EXISTS `cita` (
      `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(6) NOT NULL,
  `duracion` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_consulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");

      mysqli_query($con, "
      ALTER TABLE `cita`
      ADD PRIMARY KEY (`id`);");

      mysqli_query($con, "
      ALTER TABLE `cita`
      MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

      $archivo = <<<Archivo
      <?php
        define('DB_HOST',"{$_POST['servidor']}");
        define('DB_USER',"{$_POST['usuario']}");
        define('DB_PASS',"{$_POST['clave']}");
        define('DB_NAME',"{$_POST['nombrebase']}");
Archivo;
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `medicamentos` (
`id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `dosis` int(2) NOT NULL,
  `precio` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");

  mysqli_query($con, "
  ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);");

  mysqli_query($con, "
  ALTER TABLE `medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

  $archivo = <<<Archivo
  <?php
    define('DB_HOST',"{$_POST['servidor']}");
    define('DB_USER',"{$_POST['usuario']}");
    define('DB_PASS',"{$_POST['clave']}");
    define('DB_NAME',"{$_POST['nombrebase']}");
Archivo;

mysqli_query($con, "CREATE TABLE IF NOT EXISTS `paciente` (
`id` int(11) NOT NULL,
  `cedula` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Fecha_na` date NOT NULL,
  `sangre` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `sexo` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
");

  mysqli_query($con, "
  ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);");

  mysqli_query($con, "
  ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

  $archivo = <<<Archivo
  <?php
    define('DB_HOST',"{$_POST['servidor']}");
    define('DB_USER',"{$_POST['usuario']}");
    define('DB_PASS',"{$_POST['clave']}");
    define('DB_NAME',"{$_POST['nombrebase']}");
Archivo;

mysqli_query($con, "CREATE TABLE IF NOT EXISTS `precioconsulta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `monto` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  ");
  
    mysqli_query($con, "
    ALTER TABLE `precioconsultae`
    ADD PRIMARY KEY (`id`);");
  
    mysqli_query($con, "
    ALTER TABLE `precioconsulta`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");
  
    $archivo = <<<Archivo
    <?php
      define('DB_HOST',"{$_POST['servidor']}");
      define('DB_USER',"{$_POST['usuario']}");
      define('DB_PASS',"{$_POST['clave']}");
      define('DB_NAME',"{$_POST['nombrebase']}");
  Archivo;

  mysqli_query($con, "CREATE TABLE IF NOT EXISTS `roles` (
 `idRol` int(11) NOT NULL,
  `Rol` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ");
    
      mysqli_query($con, "
      ALTER TABLE `roles`
      ADD PRIMARY KEY (`id`);");
    
      mysqli_query($con, "
      ALTER TABLE `roles`
      MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");
    
      $archivo = <<<Archivo
      <?php
        define('DB_HOST',"{$_POST['servidor']}");
        define('DB_USER',"{$_POST['usuario']}");
        define('DB_PASS',"{$_POST['clave']}");
        define('DB_NAME',"{$_POST['nombrebase']}");
    Archivo;


    
  mysqli_query($con, "CREATE TABLE IF NOT EXISTS `usuarios` (
     `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Tipo_user` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
       ");
       
         mysqli_query($con, "
         ALTER TABLE `usuarios`
         ADD PRIMARY KEY (`id`);");
       
         mysqli_query($con, "
         ALTER TABLE `usuarios`
         MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");
       
         $archivo = <<<Archivo
         <?php
           define('DB_HOST',"{$_POST['servidor']}");
           define('DB_USER',"{$_POST['usuario']}");
           define('DB_PASS',"{$_POST['clave']}");
           define('DB_NAME',"{$_POST['nombrebase']}");
       Archivo;


          
  mysqli_query($con, "CREATE TABLE IF NOT EXISTS `visitas` (
`id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `comentario` text COLLATE utf8mb4_general_ci NOT NULL,
  `receta` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_p` date NOT NULL,
  `idpaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
      ");
      
        mysqli_query($con, "
        ALTER TABLE `visitas`
        ADD PRIMARY KEY (`id`);");
      
        mysqli_query($con, "
        ALTER TABLE `visitas`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");
      
        $archivo = <<<Archivo
        <?php
          define('DB_HOST',"{$_POST['servidor']}");
          define('DB_USER',"{$_POST['usuario']}");
          define('DB_PASS',"{$_POST['clave']}");
          define('DB_NAME',"{$_POST['nombrebase']}");
      Archivo;

              file_put_contents('libs/config.php', $archivo);
        echo "<script>
                window.location = 'index.php';
        </script>";
    }
?>
<h3>Instalador Magico</h3>
<p>Aqui llenaras lo datos para que la aplicacion funcione. Recuerde, primero debe crear la bases de datos y luego el programa se encargara de crear las tablas correspondientes para que funcione la aplicacion.</p>
<form method="POST">
  <div class="form-group">
    <label for="servidor">Servidor</label>
    <input type="text" class="form-control" id="servidor" name="servidor" placeholder="Ingrese el nombre del su servidor">
  </div>
  <div class="form-group">
    <label for="usuario">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese el nombre de usuario">
  </div>
  <div class="form-group">
    <label for="clave">Clave</label>
    <input type="text" class="form-control" id="clave" name="clave" placeholder="Ingrese la clave">
  </div>
  <div class="form-group">
    <label for="nombrebase">Nombre de la base de datos</label>
    <input type="text" class="form-control" id="nombrebase" name="nombrebase" placeholder="Ingrese el nombre de la base de datos">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Instalar</button>
  </div>
</form>
<?php
    include('pie.php');
?>