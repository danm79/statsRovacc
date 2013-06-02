<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Controllers\Controller\Controllers' => 'Controllers\Controller\ControllersController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'controllers' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/controllers[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Controllers\Controller\Controllers',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'controllers' => __DIR__ . '/../view',
        ),
    ),
);