<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Stats\Controller\Stats' => 'Stats\Controller\StatsController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'stats' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/stats[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Stats\Controller\Stats',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'stats' => __DIR__ . '/../view',
        ),
    ),
);