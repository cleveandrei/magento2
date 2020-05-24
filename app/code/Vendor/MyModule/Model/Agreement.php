<?php
namespace Vendor\MyModule\Model;

use Magento\Framework\Setup\SampleData\Context as SampleDataContext;

class Agreement
{
    /**
     * @var \Magento\Framework\Setup\SampleData\FixtureManager
     */
    private $fixtureManager;

    /**
     * @var \Magento\Framework\File\Csv
     */
    protected $csvReader;

    /**
     * @var \Vendor\MyModule\Model\Agreement
     */
    protected $agreementFactory;

    /**
     * Agreement constructor.
     * @param SampleDataContext $sampleDataContext
     * @param \Vendor\MyModule\Model\Agreement $agreementFactory
     */
    public function __construct(
        SampleDataContext $sampleDataContext,
        \Vendor\MyModule\Model\Agreement $agreementFactory
    ) {
        $this->fixtureManager = $sampleDataContext->getFixtureManager();
        $this->csvReader = $sampleDataContext->getCsvReader();
        $this->agreementFactory = $agreementFactory;
    }

    /**
     * @param array $fixtures
     * @throws \Exception
     */
    public function install(array $fixtures)
    {
        foreach ($fixtures as $fileName) {
            $fileName = $this->fixtureManager->getFixture($fileName);
            if (!file_exists($fileName)) {
                continue;
            }

            $rows = $this->csvReader->getData($fileName);
            $header = array_shift($rows);

            foreach ($rows as $row) {
                $data = [];
                foreach ($row as $key => $value) {
                    $data[$header[$key]] = $value;
                }
                $row = $data;

                $this->agreementFactory->create()
                    //->load($row['identifier'], 'identifier')
                    ->addData($row)
                    ->setStores([
                        \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                        \Magento\Store\Model\Store::DISTRO_STORE_ID
                    ])
                    ->save();
            }
        }
    }
}