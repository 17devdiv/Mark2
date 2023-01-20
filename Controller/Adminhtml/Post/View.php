<?php
namespace Dotsquares\Productsinquiry\Controller\Adminhtml\Post;
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By: Dotsquares Pvt. Ltd.
 */
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;

class View extends Action
{
   protected $resultRawFactory;
   protected $layoutFactory;

   public function __construct(
       Context $context,
       \Magento\Framework\Controller\Result\RawFactory $resultRawFactory,
       \Magento\Framework\View\LayoutFactory $layoutFactory
   ) {
       $this->resultRawFactory = $resultRawFactory;
       $this->layoutFactory = $layoutFactory;
       parent::__construct($context);
   }

   public function execute()
   {
       $content = $this->layoutFactory->create()
           ->createBlock(
               \Dotsquares\Productsinquiry\Block\Adminhtml\Post\View::class
           );

       /** @var \Magento\Framework\Controller\Result\Raw $resultRaw */
       $resultRaw = $this->resultRawFactory->create();
       return $resultRaw->setContents($content->toHtml());
   }
}