<?php
include_once('../conf/conf.php');

// Obtener el valor de la bandera para determinar la acción a realizar
$opcion = isset($_POST['bandera']) ? $_POST['bandera'] : "";

// Obtener el ID de la categoría desde el POST
$idcategoria = isset($_POST['idcategoria']) ? intval($_POST['idcategoria']) : 0;

if ($opcion == 1) {
    // Registrar una nueva categoría
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";

    $consulta = "INSERT INTO categoria (nombre)
                 VALUES ('$nombre')";
    $ejecutar = mysqli_query($con, $consulta);
    if ($ejecutar) {
        header('Location: listaCategoria.php');
    } else {
        echo "Error en la consulta de registro: " . mysqli_error($con);
    }
} elseif ($opcion == 2) {
    // Modificar una categoría existente
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";

    $consulta = "UPDATE categoria SET
                    nombre = '$nombre'
                 WHERE idcategoria = $idcategoria";
    $ejecutar = mysqli_query($con, $consulta);
    if ($ejecutar) {
        header('Location: listaCategoria.php');
    } else {
        echo "Error en la consulta de modificación: " . mysqli_error($con);
    }
} elseif ($opcion == 3) {
    // Eliminar una categoría
    $consulta = "DELETE FROM categoria WHERE idcategoria = $idcategoria";
    $ejecutar = mysqli_query($con, $consulta);
    if ($ejecutar) {
        header('Location: listaCategoria.php');
    } else {
        echo "Error en la consulta de eliminación: " . mysqli_error($con);
    }
}

// Cerrar la conexión
$con->close();
?>



