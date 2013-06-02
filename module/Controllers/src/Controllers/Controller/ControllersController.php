<?php
/**
 *
 * @package Controllers
 *
 */
namespace Controllers\Controller;

use Controllers\Model;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 *
 * @package Controllers
 */
class ControllersController extends AbstractActionController
{
    /**
     * Index - Controllers
     *
     * @return Zend\View\Model\ViewModel Zend View Model
     */

    protected $controllersTable;

    public function indexAction()
    {
    	return new ViewModel(array(
            'stats' => $this->getControllersTable()->fetchAll(),
        ));
    }

    public function getControllersTable()
    {
        if (!$this->controllersTable) {
            $sm = $this->getServiceLocator();
            $this->controllersTable = $sm->get('Controllers\Model\ControllersTable');
        }
        return $this->controllersTable;
  	}
}