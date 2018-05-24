<?php

namespace Unit1\UseEvents\Observer;

use Magento\Framework\Event\ObserverInterface;

class RedirrectToProductView implements ObserverInterface
{
    /**
     * @var \Magento\Framework\App\Response\RedirectInterface
     */
    protected $redirect;
    /**
     * @var \Magento\Framework\App\ActionFlag
     */
    protected $_actionFlag;
    /**
     * @param \Magento\Framework\App\Response\RedirectInterface $redirect
     */

    protected $_logger;

    public function __construct(
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\ActionFlag $actionFlag,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->redirect = $redirect;
        $this->_actionFlag = $actionFlag;
        $this->_logger = $logger;
    }
    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     *
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $request = $observer->getEvent()->getData('request');

        if ($request->getFullActionName() == 'cms_index_index') {
            return $this;
        }

        if ($request->getModuleName() != 'catalog' || $request->getControllerName() != 'product') {
            $controller = $observer->getControllerAction();
            $this->_actionFlag->set('', \Magento\Framework\App\Action\Action::FLAG_NO_DISPATCH, true);
            $this->redirect->redirect($controller->getResponse(), 'catalog/product/view/id/1');
            $this->_logger->notice('Redirected to catalog/product');
        }
    }
}
