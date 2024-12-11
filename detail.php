<?php
include("conection.php");

$url = $_SERVER['REQUEST_URI'];
$tarea = (int)explode(("/ejemplo/detail.php/"), $url)[1];

$conection = conect();

$traer_tarea = "select * from tarea where id=$tarea";
$consulta = mysqli_query($conection, $traer_tarea);
$result = mysqli_fetch_array($consulta);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            color-scheme: light dark;
        }
    </style>
</head>

<body class="h-screen flex items-center">
    <form class="w-[250px] mx-auto" action="/ejemplo/registrar.php" method="post">
        <div class="mb-5">
            <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo de la tarea</label>
            <input id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tarea 1" value="<?= $result["titulo"] ?>" required name="titulo" />
        </div>
        <div class="mb-5">
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion de la tarea</label>
            <textarea id="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="descripcion" placeholder="Descripcion de la tarea"><?= $result["descripcion"] ?></textarea>
        </div>
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input id="stado" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" name="stado" <?= $result["stado"] ? "checked" : "" ?> />
            </div>
            <label for="stado" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tarea terminada</label>
        </div>
        <input class="hidden" id="id" name="id" value="<?= $tarea ?>">
        <button type="submit" name="accion" value="update" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        <button type="submit" name="accion" value="delete" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
    </form>
</body>

</html>