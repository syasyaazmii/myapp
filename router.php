<?php
// load the router

use \App\Lib\Utils;
$router = new \Bramus\Router\Router();

// $router->get('/', function(){
//     echo "<h1>This is Home<h1>";
//     echo "<a href = '/'>Home</a>";
//     echo " | <a href ='/about'>About</a>";
// });

// $router->get('/about', function(){
//     echo "<h1>This is About<h1>";
//     echo "<a href = '/'>Home</a>";
//     echo " | <a href ='/about'>About</a>";
// });


// routing rules
$router->get('/', 'App\Controllers\Home@index');
$router->get('/about', 'App\Controllers\Home@about');

// login page
$router->get('/login', 'App\Controllers\Auth@login');
$router->post('/login', 'App\Controllers\Auth@do_login');

//logout session
$router->get('/logout', 'App\Controllers\Auth@logout');

// to process registration data
$router->get('/register', 'App\Controllers\Auth@register');
$router->post('/register', 'App\Controllers\Auth@do_register');

$router->get('/user/(\d+)', 'App\Controllers\Users@user_details');
$router->get('/user', 'App\Controllers\Users@user_list');

$router->post('/user/(\d+)', 'App\Controllers\Users@store');

//member's only page
$router->get('/member', 'App\Controllers\Member@index');

// 404 page
$router->set404('\App\Controllers\Home@not_found');

//protected with middleware
$router->before('GET|POST', '/member.*', function() {
    // header("Cache-Control: no-cache, no-store, must-revalidate");
    // header("Pragma: no-cache");
    // header("Expires: 0");

    //panggil dari folder app/lib/utils.php :- no_cache_headers() function
    \App\Lib\Utils::no_cache_headers();

    if (!isset($_SESSION['user'])) {
        header('location: /login');
        exit();
    }
});

$router->before('GET|POST', '/user.*', function() {
    // header("Cache-Control: no-cache, no-store, must-revalidate");
    // header("Pragma: no-cache");
    // header("Expires: 0");
    Utils::no_cache_headers();
    Utils::check_login_redirect();
    

    // if (isset($_SESSION['user']['role']) ||
    //     ($_SESSION['user']['role'] != 'admin')) 
    //     {
    //         $templates = new \League\Plates\Engine('../app/Views/home');
    //         $templates->addFolder('layout', '../app/Views/layout');

    //         echo $templates->render('invalid');
    //         exit;
    //     }

    if(Utils::is_role('admin') == false ){
        $templates = new \League\Plates\Engine('../app/Views/home');
        $templates->addFolder('layout', '../app/Views/layout');
    
        echo $templates->render('invalid');
        exit;        
    }
});


// // dd :)

// $router->get('/user/(\d+)', function($id) {
//     $user_model = new \App\Models\User();
//     $user = $user_model->get_by_id($id);

//     $templates = new \League\Plates\Engine('../app/Views/home');
//     $templates->addFolder('layout', '../app/Views/layout');
//     echo $templates->render('user', ['user' => $user[0]]);
   
// });


// $router->get('/user', function() {
//     $user_model = new \App\Models\User();
//     $users = $user_model->get_all();

//     $templates = new \League\Plates\Engine('../app/Views/home');
//     $templates->addFolder('layout', '../app/Views/layout');
//     echo $templates->render('user-list', ['users' => $users]);
   
// });


// $router->get('/test/(\d+)', function($id) {
//     $user_model = new \App\Models\User();
//     $user = $user_model->get_by_id($id);

//     var_dump($user);
//     // echo json_encode($user);
// });


// run router
$router->run();

