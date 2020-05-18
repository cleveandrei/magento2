<?php
namespace Vendor\MyModule\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;
class Data extends AbstractHelper {
    public function getModel($modelName){
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $model = $objectManager->create('\Vendor\Module\Model\\'.ucfirst($modelName));
        return $model;
    }
}
?>
