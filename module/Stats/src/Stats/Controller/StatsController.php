<?php
/**
 * 
 * @package Stats
 * 
 */
namespace Stats\Controller;

use Stats\Model\Stats;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 *
 * @package Stats
 */
class StatsController extends AbstractActionController
{
    /**
     * Index - Stats
     * 
     * @return Zend\View\Model\ViewModel Zend View Model
     */

    protected $statsTable;


    public function indexAction()
    {
      return new ViewModel(array(
            'stats' => $this->getStatsTable()->fetchAll(),
        )); 
    }

    public function getStatsTable()
    {

    	if (!$this->statsTable) {
    		$sm = $this->getServiceLocator();
    		$this->statsTable = $sm->get('Stats\Model\StatsTable');
    	}
    	return $this->statsTable;
    }

}