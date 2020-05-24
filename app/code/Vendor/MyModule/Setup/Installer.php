<?php
namespace Vendor\MyModule\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * @var \Vendor\MyModule\Model\Agreement
     */
    private $agreement;


    public function __construct(
        \Vendor\MyModule\Model\Agreement $agreement
    ) {
        $this->agreement = $agreement;
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        $this->agreement->install(['Vendor_MyModule::fixtures/catalog_product.csv']);
    }
}