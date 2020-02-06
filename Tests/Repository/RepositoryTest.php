<?php

namespace AideTravaux\CoupDePouce\Tests\Repository;

use PHPUnit\Framework\TestCase;
use AideTravaux\CoupDePouce\Repository\Repository;

class RepositoryTest extends TestCase
{
    public function testGetOneOrNull()
    {
        $this->assertTrue(\is_string(Repository::getOneOrNull('CDP-ISO-01')));
        $this->assertNull(Repository::getOneOrNull(''));
    }
}
