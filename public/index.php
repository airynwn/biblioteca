<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <title>Portal de la biblioteca</title>
</head>

<body>
<?php

    require '../src/auxiliar.php';

    $pdo = conectar();
    $sent = $pdo->query("SELECT titulo, nombre, fecha_publi, isbn, l.id
                        from autores a join libros l
                        on a.id = l.autor_id
                        group by a.id, l.id");
    // TODO FORMATEAR LA FECHA
?>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Libro
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Autor
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Fecha de publicación
                    </th>
                    <th scope="col" class="py-3 px-6">
                        ISBN
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sent as $fila): ?>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $fila['titulo'] ?>
                    </th>
                    <td class="py-4 px-6">
                        <?= $fila['nombre'] ?>
                    </td>
                    <td class="py-4 px-6">
                        <?= $fila['fecha_publi'] ?>
                    </td>
                    <td class="py-4 px-6">
                        <?= $fila['isbn'] ?>
                    </td>
                    <td class="py-4 px-6">
                        <a href="/add_to_cart.php?id=<?= $fila['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Comprar</a>
                    </td>
                </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="/js/flowbite/flowbite.js"></script>
</body>

</html>