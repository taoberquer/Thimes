<?php

require dirname(__DIR__)  . '/vendor/autoload.php';

require (dirname(__DIR__) . '/config.php');

try
{
    $bdd = new PDO ("mysql:host=$host;dbname=$dbname",$user,$password);
}
catch(Exception $e)
{
    die("bdd non trouvée");
}

$page = "accueil";

if(isset($_GET['url']))
{
    $page = $_GET['url'];

    if(!file_exists(__DIR__ . "/pages/" . $_GET['url'] . ".php"))
    {
        $page = "notFound";
    }
}

$content =  __DIR__ . '/pages/' . $page . '.php';

require "layout.php";