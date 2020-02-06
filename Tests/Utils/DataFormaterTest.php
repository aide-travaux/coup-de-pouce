<?php

namespace AideTravaux\CoupDePouce\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\CoupDePouce\Model\DataInterface;
use AideTravaux\CoupDePouce\Model\ConditionInterface;
use AideTravaux\CoupDePouce\Utils\DataFormater;

class DataFormaterTest extends TestCase
{
    public function testGetBase()
    {
        $this->assertTrue(\is_array(DataFormater::get()));
    }

    public function testGetData()
    {
        $stub = $this->createMock(DataInterface::class);
        $this->assertTrue(\is_array(DataFormater::get($stub)));
    }

    public function testGetCondition()
    {
        $stub = $this->createMock(ConditionInterface::class);
        $this->assertTrue(\is_array(DataFormater::get($stub)));
    }
}
