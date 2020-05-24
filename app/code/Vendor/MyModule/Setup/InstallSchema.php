<?php
namespace Vendor\MyModule\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $tableName = $installer->getTable('vendor');
        if ($installer->getConnection()->isTableExists($tableName) != true) {
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn('vendor_id', Table::TYPE_INTEGER, null, [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ], 'ID')
                ->addColumn('name', Table::TYPE_TEXT, null, [
                    'length' => 255,
                    'nullable' => false
                ], 'TEXT')
                ->setComment('Example Table');
            $installer->getConnection()->createTable($table);


            $tableName = $installer->getTable('vendor2product');
            if ($installer->getConnection()->isTableExists($tableName) != true) {
                $table = $installer->getConnection()
                    ->newTable($tableName)
                    ->addColumn('vendor_id', Table::TYPE_INTEGER, null, [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'foriegn' => true
                    ], 'ID')
                    ->addColumn('product_id', Table::TYPE_TEXT, null, [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ], 'TEXT')
                    ->addForeignKey(
                        $installer->getFkName(
                            'vendor2product',
                            'vendor_id',
                            'vendor',
                            'vendor_id')
                    )
                    ->addForeignKey(
                        $installer->getFkName(
                            'vendor2product',
                            'product_id',
                            'product',
                            'product_id')
                    )
                    ->setComment('Example Table');
                $installer->getConnection()->createTable($table);

                $tableName = $installer->getTable('product');
                if ($installer->getConnection()->isTableExists($tableName) != true) {
                    $table = $installer->getConnection()
                        ->newTable($tableName)
                        ->addColumn('vendor_id', Table::TYPE_INTEGER, null, [
                            'identity' => true,
                            'unsigned' => true,
                            'nullable' => false,
                            'primary' => true
                        ], 'ID')
                        ->addColumn('name', Table::TYPE_TEXT, null, [
                            'length' => 255,
                            'nullable' => false
                        ], 'TEXT')
                        ->setComment('Example Table');
                    $installer->getConnection()->createTable($table);
                }

                $installer->endSetup();
            }

        }
    }
}
?>
