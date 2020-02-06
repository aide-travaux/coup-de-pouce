<?php

namespace AideTravaux\CoupDePouce\Tests;

use PHPUnit\Framework\TestCase;
use AideTravaux\CoupDePouce\CoupDePouce;
use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Model\ConditionInterface;
use AideTravaux\CoupDePouce\Model\DataInterface;

class CoupDePouceTest extends TestCase
{
    public function testGet()
    {
        $stub = $this->createMock(DataInterface::class);
        $this->assertNull(CoupDePouce::get($stub));

        $stub = $this->createMock(DataInterface::class);
        $stub->method('getCoupDePouceCodeTravaux')->willReturn('CDP-ISO-01');
        $this->assertTrue(\is_float(CoupDePouce::get($stub)));
    }

    public function testGetBareme()
    {
        $stub = $this->createMock(DataInterface::class);
        $this->assertNull(CoupDePouce::get($stub));

        $stub = $this->createMock(DataInterface::class);
        $stub->method('getCoupDePouceCodeTravaux')->willReturn('CDP-ISO-01');
        $this->assertTrue(\is_array(CoupDePouce::getBareme($stub)));
    }

    public function testResolveConditions()
    {
        $stub = $this->createMock(ConditionInterface::class);
        $this->assertTrue(\is_array(CoupDePouce::resolveConditions($stub)));
    }

    public function testIsEligible()
    {
        $stub = $this->createMock(ConditionInterface::class);
        $this->assertTrue(\is_bool(CoupDePouce::isEligible($stub)));
    }

}
