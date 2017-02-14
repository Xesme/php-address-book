<?php
date_default_timezone_set('America/Los_Angeles');
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/address_book.php";

session_start();
if (empty($_SESSION['list_of_contacts'])) {
    $_SESSION['list_of_contacts']= array();
}

$app = new Silex\Application();
   $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' =>__DIR__.'/../views'));

$app->get('/', function() use($app) {
    return $app['twig']->render('/contact.html.twig', array('list_of_contacts'=> Contact::getAll()));
});

$app->get('/delete_contact', function() use($app) {
    Contact::deleteAll();
    return $app['twig']->render('delete_contact.html.twig');
});

$app->post("/contacts", function() use($app){
    $new_contact = new Contact($_POST['first_name'], $_POST['last_name'],$_POST['email'], $_POST['number']);
    $new_contact->save();
    return $app['twig']->render('contacts.html.twig', array('new_contact'=>$new_contact));
});

return $app;
?>
