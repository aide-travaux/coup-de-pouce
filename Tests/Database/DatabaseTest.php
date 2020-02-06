<?php

namespace AideTravaux\CoupDePouce\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CoupDePouce\Database\Database;
use AideTravaux\CoupDePouce\Database\DatabaseInterface;
use AideTravaux\CoupDePouce\Database\DatabaseTrait;

class DatabaseTest extends TestCase
{
    public function testType()
    {
        $this->assertTrue(\is_array(Database::DB));
    }

    /**
     * @dataProvider classProvider
     */
    public function testClass($class)
    {
        $this->assertTrue(\class_exists($class));
    }

    /**
     * @depend testClass
     * @dataProvider classProvider
     */
    public function testClassConstant($class)
    {
        $reflect = new \ReflectionClass($class);
        $constants = $reflect->getConstants();

        $this->assertNotFalse($reflect->getConstant('NOM'));
        $this->assertNotFalse($reflect->getConstant('CODE'));
        $this->assertNotFalse($reflect->getConstant('DENOMINATION'));
        $this->assertNotFalse($reflect->getConstant('CHARTE'));
        $this->assertNotFalse($reflect->getConstant('FICHE_CEE'));
    }

    /**
     * @depend testClassConstant
     * @dataProvider classProvider
     */
    public function testClassConstantType($class)
    {
        $this->assertTrue(\is_string($class::NOM));
        $this->assertTrue(\is_string($class::CODE));
        $this->assertTrue(\is_string($class::DENOMINATION));
        $this->assertTrue(\is_string($class::CHARTE));
        $this->assertTrue(\is_string($class::FICHE_CEE));
    }

    public function classProvider()
    {
        return array_map(function($row) {
            return [ $row ];
        }, Database::DB);
    }

}
