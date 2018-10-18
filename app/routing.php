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
        ['homeAction', '/', 'GET'], // action, url, method
    ],
    'Concept' => [ // Controller
        ['showConcept', '/concept', 'GET'], // action, url, method
    ],
];
