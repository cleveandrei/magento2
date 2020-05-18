<?php
namespace Vendor\MyModule\Model;
use Magento\Framework\Model\AbstractModel;
class Example extends AbstractModel {
    protected function _construct() {
        $this->_init('Vendor\Module\Model\Resource\Example');
    }
}
?>
