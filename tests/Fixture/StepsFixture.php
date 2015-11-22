<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StepsFixture
 *
 */
class StepsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'turn_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'steptype_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'startdatetime' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'enddatetime' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'turn_id' => ['type' => 'index', 'columns' => ['turn_id'], 'length' => []],
            'steptype_id' => ['type' => 'index', 'columns' => ['steptype_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'steps_ibfk_2' => ['type' => 'foreign', 'columns' => ['steptype_id'], 'references' => ['steptypes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'steps_ibfk_1' => ['type' => 'foreign', 'columns' => ['turn_id'], 'references' => ['turns', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'turn_id' => 1,
            'steptype_id' => 1,
            'startdatetime' => '2015-11-22 19:45:23',
            'enddatetime' => '2015-11-22 19:45:23',
            'created' => '2015-11-22 19:45:23',
            'modified' => '2015-11-22 19:45:23'
        ],
    ];
}
