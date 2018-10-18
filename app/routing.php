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
    'Home' => [
        ['homeAction', '/', 'GET'],
    ],
    'Product' => [
        ['show', '/ourproducts','GET'],
    ],
];
