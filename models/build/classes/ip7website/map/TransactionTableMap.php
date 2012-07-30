<?php



/**
 * This class defines the structure of the 'transactions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.ip7website.map
 */
class TransactionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ip7website.map.TransactionTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('transactions');
        $this->setPhpName('Transaction');
        $this->setClassname('Transaction');
        $this->setPackage('ip7website');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', true, 255, null);
        $this->addColumn('AMOUNT', 'Amount', 'DOUBLE', true, null, 0);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'users', 'ID', false, null, null);
        $this->addColumn('VALIDATED', 'Validated', 'BOOLEAN', false, 1, '0');
        // validators
        $this->addValidator('DESCRIPTION', 'minLength', 'propel.validator.MinLengthValidator', '1', 'Description must be at least 1 characters.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'SET NULL', 'CASCADE');
    } // buildRelations()

} // TransactionTableMap
