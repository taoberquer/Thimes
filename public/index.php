<?php

require dirname(__DIR__)  . '/vendor/autoload.php';

require (dirname(__DIR__) . '/config.php');

try
{
    $dbh = new PDO ("mysql:host=$host;dbname=$dbname",$user,$password);
}
catch(Exception $e)
{
    die("bdd non trouvée");
}

$page = "home";

if(!empty($_GET['url']))
{
    $page = $_GET['url'];

    if(!file_exists(__DIR__ . "/pages/" . $_GET['url'] . ".php"))
    {
        $page = "notFound";
    }
}

if ($page == 'update')
{
    require __DIR__ . '/update.php';
}

$content =  __DIR__ . '/pages/' . $page . '.php';

require "layout.php";