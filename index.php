<?php
/*
 * Kasyn Tang
 * January 2024
 * http://ktang.greenriverdev.com/328/diner/
 * This is my Controller for the Diner app
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Instantiate Fat-Free Framework (F3)
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function () {
//    echo "My Diner";

    // display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define a breakfast route
$f3->route('GET /breakfast', function () {
    echo "Breakfast";

    // display a view page
    $view = new Template();
    echo $view->render('views/breakfast-menu.html');
});

// Define a order route
$f3->route('GET|POST /order1', function ($f3) {
//    echo "order Form part 1";

    //If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Validate the data
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        //put the data in the session array
        $f3->set('SESSION.food', $food);
        $f3->set('SESSION.meal', $meal);

        //redirect to order2 route
        $f3->reroute('order2');
    }

    // add data to the F3 "hive"
    $f3->set('meals', array('breakfast', 'lunch', 'dinner'));

    // display a view page
    $view = new Template();
    echo $view->render('views/order-form-1.html');
});

// Define a order route
$f3->route('GET|POST /order2', function ($f3) {
//    echo "order Form part 2";

//    //If the form has been posted
//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//        //Validate the data
//        $food = $_POST['food'];
//        $meal = $_POST['meal'];
//
//        //put the data in the session array
//        $f3->set('SESSION.food', $food);
//        $f3->set('SESSION.meal', $meal);
//
//        //redirect to order2 route
//        $f3->reroute('summary');
//
//    }
//
    // display a view page
    $view = new Template();
    echo $view->render('views/order-form-2.html');
});

// Define a summary route
$f3->route('GET /summary', function () {
//    echo "Breakfast";

    // display a view page
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();




//echo "My Diner";