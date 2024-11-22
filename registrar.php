<?php
include("conection.php");

$conection = conect();
$query;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $estado = isset($_POST["stado"]) ? 1 : 0;
    $id = (int)$_POST["id"];

    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case 'submit':
                // Código para guardar la tarea
                $insertar = "insert into tarea (titulo,descripcion,stado) values ('$titulo','$descripcion','$estado')";
                $query = mysqli_query($conection, $insertar);
                break;

            case 'update':
                // Código para enviar la tarea
                $actualizar = "update tarea set titulo='$titulo', descripcion='$descripcion', stado=$estado where id=$id";
                $query = mysqli_query($conection, $actualizar);
                break;

            case 'delete':
                // Código para enviar la tarea
                $eliminar = "delete from tarea where id=$id";
                $query = mysqli_query($conection, $eliminar);
                break;

            default:
                echo "Acción no reconocida.";
        }
    } else {
        echo "No se ha seleccionado ninguna acción.";
    }
}

if ($query) {
    header("location: index.php");
    exit();
}
