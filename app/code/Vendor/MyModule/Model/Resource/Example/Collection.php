<?php
namespace Vendor\MyModule\Model\Resource\Example;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {
    protected function _construct() {
        $this->_init(
            'Vendor\MyModule\Model\Example',
            'Vendor\MyModule\Model\Resource\Example'
        );
    }
}
?>
