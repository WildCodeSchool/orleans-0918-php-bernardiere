<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    'Home' => [ // Controller
        ['showHome', '/', 'GET'], // action, url, method
    ],
    'Admin' => [ // Controller
        ['adminIndex', '/admin', 'GET'], // action, url, method
        ['add', '/admin/add', ['GET', 'POST']], // action, url, method
        ['list', '/admin/list', 'GET'], //action, url, method
        ['delete', '/admin/list','POST'], //action, url, method
    ],
    'Product' => [
        ['show', '/ourproducts','GET'], // action, url, method
    ],
    'Concept' => [ // Controller
        ['showConcept', '/concept', 'GET'], // action, url, method
    ],
  
    'Calendar' => [ // Controller
        ['show', '/calendar', 'GET'], // action, url, method
    ],

    'Contact' => [ //Controller
        ['formcheck', '/contact', ['GET', 'POST']],
    ],

];
