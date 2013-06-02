<?php
/**
 * Module Bootstrap
 *
 * @package Controllers
 */
namespace Controllers;

use Controllers\Model\Controllers;
use Controllers\Model\ControllersTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * Module Bootstrap
 *
 * @package Controllers
 */
class Module
{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

        // Add this method:
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Controllers\Model\ControllersTable' =>  function($sm) {
                    $tableGateway = $sm->get('ControllersTableGateway');
                    $table = new ControllersTable($tableGateway);
                    return $table;
                },
                'ControllersTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Controllers());
                    return new TableGateway('controllers', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }

}