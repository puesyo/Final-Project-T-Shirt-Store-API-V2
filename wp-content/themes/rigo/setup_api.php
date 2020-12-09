<?php

/**
 * To create new API calls, you have to instanciate the API controller and start adding endpoints
*/
$api = new \WPAS\Controller\WPASAPIController([ 
    'version' => '1', 
    'application_name' => 'sample_api', 
    'namespace' => 'Rigo\\Controller\\' 
]);


/**
 * Then you can start adding each endpoint one by one
*/
// $api->get([ 'path' => '/course', 'controller' => 'SampleController:getCourses' ]); 
// $api->get([ 'path' => '/course/(?P<id>[\d]+)', 'controller' => 'SampleController:getSingleCourse' ]); 
// $api->delete([ 'path' => '/course/(?P<id>[\d]+)', 'controller' => 'SampleController:deleteCourse' ]); 
// $api->post([ 'path' => '/course', 'controller' => 'SampleController:createCourse' ]); 
// $api->get([ 'path' => '/course', 'controller' => 'SampleController:getCoursesWithCustomFields' ]); 

// $api->get([ 'path' => '/phone/(?P<id>[\d]+)', 'controller' => 'PhoneController:getSinglePhone' ]);
// $api->get([ 'path' => '/phone', 'controller' => 'PhoneController:getAllPhones' ]);
// $api->post([ 'path' => '/phone', 'controller' => 'PhoneController:createPhone' ]); 
// $api->delete([ 'path' => '/phone/(?P<id>[\d]+)', 'controller' => 'PhoneController:deletePhone' ]);

// $api->get([ 'path' => '/event/(?P<id>[\d]+)', 'controller' => 'EventController:getSingleEvent' ]);
// $api->get([ 'path' => '/event', 'controller' => 'EventController:getAllEvents' ]);
// $api->post([ 'path' => '/event', 'controller' => 'EventController:createEvent' ]); 
// $api->delete([ 'path' => '/event/(?P<id>[\d]+)', 'controller' => 'EventController:deleteEvent' ]);

$api->get([ 'path' => '/userLogIn/(?P<id>[\d]+)', 'controller' => 'UserLogInController:getSingleUser' ]);
$api->get([ 'path' => '/userLogIn', 'controller' => 'UserLogInController:getUserWithCustomFields' ]);
$api->post([ 'path' => '/userLogIn', 'controller' => 'UserLogInController:createUser' ]); 
$api->delete([ 'path' => '/userLogIn/(?P<id>[\d]+)', 'controller' => 'UserLogInController:deleteUser' ]);

$api->get([ 'path' => '/product/(?P<id>[\d]+)', 'controller' => 'ProductController:getSingleProduct' ]);
$api->get([ 'path' => '/product', 'controller' => 'ProductController:getProductWithCustomFields' ]);
$api->post([ 'path' => '/product', 'controller' => 'ProductController:createProduct' ]); 
$api->delete([ 'path' => '/product/(?P<id>[\d]+)', 'controller' => 'ProductController:deleteProduct' ]);