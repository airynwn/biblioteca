<?php

function conectar()
{
    return new PDO('pgsql:host=localhost;dbname=biblioteca', 'biblioteca', 'biblioteca');
}

function hh($x)
{
    return htmlspecialchars($x ?? '', ENT_QUOTES | ENT_SUBSTITUTE);
}

function volver()
{
    header("Location: /index.php");
}