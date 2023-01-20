<?php
namespace Dotsquares\Productsinquiry\Setup\Patch\Data;
 
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
 
class Enquiryattribute implements DataPatchInterface,PatchRevertableInterface,PatchVersionInterface
{
   private $_moduleDataSetup;
 
   private $_eavSetupFactory;
   
   
 
   public function __construct(
       ModuleDataSetupInterface $moduleDataSetup,
       EavSetupFactory $eavSetupFactory
   ) {
       $this->_moduleDataSetup = $moduleDataSetup;
       $this->_eavSetupFactory = $eavSetupFactory;
   }
 
   public function apply()
   {
       /** @var EavSetup $eavSetup */
       $eavSetup = $this->_eavSetupFactory->create(['setup' => $this->_moduleDataSetup]);
       $statusOptions = 'Magento\Catalog\Model\Product\Attribute\Source\Boolean';
       $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'inquiry', [
           'type' => 'int',
           'backend' => '',
           'frontend' => '',
           'label' => 'Inquiry Enable',
           'input' => 'boolean',
           'class' => 'custom_datapatch_class',
           'source' => '',
           'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
           'visible' => true,
           'required' => true,
           'user_defined' => false,
           'default' => '0',
           'searchable' => false,
           'filterable' => false,
           'comparable' => false,
           'visible_on_front' => false,
           'used_in_product_listing' => true,
           'unique' => false,
       ]);
       $this->moduleDataSetup->endSetup();
   }
   public function revert()
{
$this->moduleDataSetup->getConnection()->startSetup();
/** @var CustomerSetup $customerSetup */ 
$eavSetup = $this->eavSetupFactory->create(['setup'=> $this->moduleDataSetup]);
$eavSetup->removeAttribute('catalog_product', 'inquiry');
$this->moduleDataSetup->getConnection()->endSetup();
}
 
   public static function getDependencies()
   {
       return [];
   }
 
   public function getAliases()
   {
       return [];
   }
 
   public static function getVersion()
   {
      return '1.0.0';
   }
}