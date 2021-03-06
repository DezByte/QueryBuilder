<?php

namespace KoineTests;

use PHPUnit_Framework_TestCase;
use Koine\QueryBuilder;

class QueryBuilderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var QueryBuilder
     */
    protected $o;

    /**
     * @test
     */
    public function canFactorySelect()
    {
        $query = QueryBuilder::factorySelect(array('a', 'b'));
        $this->assertInstanceOf('Koine\QueryBuilder\Statements\Select', $query);
        $this->assertEquals('SELECT a, b', $query->toSql());
    }

    /**
     * @test
     */
    public function canFactoryUpdate()
    {
        $query = QueryBuilder::update('table')->addSet('foo', 'bar');
        $this->assertInstanceOf('Koine\QueryBuilder\Statements\Update', $query);
        $this->assertEquals("UPDATE table SET foo = 'bar'", $query->toSql());
    }

    /**
     * @test
     */
    public function canFactoryInsert()
    {
        $query = QueryBuilder::insert('table')->values(array('foo' => 'bar'));
        $this->assertInstanceOf('Koine\QueryBuilder\Statements\Insert', $query);
        $this->assertEquals("INSERT INTO table (foo) VALUES ('bar')", $query->toSql());
    }
}
