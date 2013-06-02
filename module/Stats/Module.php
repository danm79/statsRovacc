<?php
/**
 * Module Bootstrap
 *
 * @package Stats
 */
namespace Stats;

use Stats\Model\Stats;
use Stats\Model\StatsTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * Module Bootstrap
 *
 * @package Stats
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

        
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Stats\Model\StatsTable' =>  function($sm) {
                    $tableGateway = $sm->get('StatsTableGateway');
                    $table = new StatsTable($tableGateway);
                    return $table;
                },
                'StatsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Stats());
                    return new TableGateway('stats', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}