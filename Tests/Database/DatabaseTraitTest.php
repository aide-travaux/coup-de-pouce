<?php

namespace AideTravaux\CoupDePouce\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CoupDePouce\Database\Database;
use AideTravaux\CoupDePouce\Database\DatabaseTrait;
use AideTravaux\CoupDePouce\Model\DataInterface;

class DatabaseTraitTest extends TestCase
{
    /**
     * @dataProvider classProvider
     */
    public function testClassInterface($class)
    {
        $this->assertTrue(\in_array(DatabaseTrait::class, \class_uses($class)));
    }

    /**
     * @depends testClassInterface
     * @dataProvider classProvider
     */
    public function testMethod($class)
    {
        $stub = $this->createMock(DataInterface::class);

        $this->assertArrayHasKey('nom', $class::toArray($stub));
        $this->assertArrayHasKey('code', $class::toArray($stub));
        $this->assertArrayHasKey('denomination', $class::toArray($stub));
        $this->assertArrayHasKey('charte', $class::toArray($stub));
        $this->assertArrayHasKey('fiche_cee', $class::toArray($stub));
        $this->assertArrayHasKey('montant', $class::toArray($stub));
        $this->assertArrayHasKey('montant_forfaitaire', $class::toArray($stub));
    }

    public function classProvider()
    {
        return array_map(function($row) {
            return [ $row ];
        }, Database::DB);
    }

}