<?php


namespace Dotsquares\Productsinquiry\Block;

use Dotsquares\Productsinquiry\Helper\Data;

class Enquiry extends \Magento\Framework\View\Element\Template
{
 protected $helper;
 
 protected $session;
 protected $_registry;
    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Registry $registry,
        \Magento\Customer\Model\Session $session,
        Data $helper,
        \Magento\Framework\View\Element\Template\Context $context
        
        
    ) {
        
        $this->session = $session;
        $this->helper =$helper;
        $this->_registry=$registry;
        parent::__construct($context);
    }

    // getPathUrl() is a function that get base url. i.e. localhost or Domain Name

    public function getPathUrl() {
        //$this keyword use to refer the current object in the class
        return $this->getBaseUrl().'dotsquares/enquiry/save/';
    }
    public function isEnquiryEnabled() {
        //$this keyword use to refer the enquiry module enable or disable
        return $this->helper->isEnabled();
    }
    public function getFormType() {
        //$this keyword use to refer the enquiry form popup or tab
        return $this->helper->getFormType();
    }
    public function isreCptchaEnable() {
        //$this keyword use to refer the recptcha enable or disable in enquiry form 
        return $this->helper->isreCptchaEnable();
    }
    public function getreCptchaPublicKey() {
        //$this keyword use to refer the recptcha public key
        return $this->helper->getreCptchaPublicKey();
    }
    
    public function getButtonLavel() {
        //$this keyword use to refer the enquiry form button lable
        return $this->helper->getButtonLavel();
    }
   
    public function getCustomer() {
        //$this keyword use to refer the Customer data
        return $this->session->getCustomer();
    }
    public function getProduct()
    {
        //$this keyword use to refer the get cuurent product
        return $this->_registry->registry('current_product');
    }
    

}