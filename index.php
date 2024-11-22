<?php
include("conection.php");

$conection = conect();
$traer_tarea = "select * from tarea";
$consulta = mysqli_query($conection, $traer_tarea);
$result = mysqli_fetch_all($consulta);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            color-scheme: light dark;
        }
    </style>
</head>

<body class="w-full">
    <div class="flex flex-col w-full mt-10">
        <form class="w-[250px] mx-auto" action="registrar.php" method="post">
            <div class="mb-5">
                <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo de la tarea</label>
                <input id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tarea 1" required name="titulo" />
            </div>
            <div class="mb-5">
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion de la tarea</label>
                <textarea id="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="descripcion" placeholder="Descripcion de la tarea"></textarea>
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="stado" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" name="stado" />
                </div>
                <label for="stado" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tarea terminada</label>
            </div>
            <button type="submit" id="submit" name="accion" value="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
    <div class="grid grid-cols-3 gap-4 max-w-4xl mx-auto my-10">
        <?php foreach ($result as $res): ?>
            <a href="detail.php/<?= $res[0] ?>" id="tarea-<?= $res[0] ?>" class="block max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $res[1] ?></h5>
                <p class="font-normal text-gray-700 dark:text-gray-400"><?= $res[2] ?></p>
                <div class="flex items-center mb-4 mt-2">
                    <label for="default-checkbox" class="ms-2 text-sm font-medium <?= $res[3] ? "text-green-900 dark:text-green-300" : "text-red-900 dark:text-red-300" ?>"><?= $res[3] ? "Tarea hecha" : "Tarea no hecha" ?></label>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</body>

</html>