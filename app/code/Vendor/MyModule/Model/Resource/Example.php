<?php
namespace Vendor\MyModule\Model\Resource;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Example extends AbstractDb {
    protected function _construct() {
        $this->_init('vendor', 'vendor_id');
    }
}
?>
