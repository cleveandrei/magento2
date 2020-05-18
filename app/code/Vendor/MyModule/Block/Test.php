<?php
namespace Vendor\Module\Block;
use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Vendor\MyModule\Helper\Data;
use \Vendor\MyModule\Model\Example;
class Test extends Template {
    public $helper;
    public $model;
    public function __construct(
        Context $context,
        Data $helper,
        Example $model,
        array $data = []
    ){
        $this->helper = $helper;
        $this->model = $model;
        parent::__construct($context, $data);
    }
}
?>
