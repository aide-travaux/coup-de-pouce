<?php

namespace AideTravaux\CoupDePouce\Tests\Database\ISO;

use PHPUnit\Framework\TestCase;
use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\ISO\ISO01;
use AideTravaux\CoupDePouce\Model\DataInterface;

class ISO01Test extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function getMontant($model, $expect)
    {
        $stub = $this->buildMock($model);
        $this->assertEquals(ISO01::getMontant($stub), $expect * 100);
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetMontantForfaitaire($model, $expect)
    {
        $stub = $this->buildMock($model);
        $this->assertEquals(ISO01::getMontantForfaitaire($stub), $expect);
    }

    public function buildMock(array $model)
    {
        $stub = $this->createMock(DataInterface::class);

        foreach ($model as $method => $value) {
            $stub->method($method)->willReturn($value);
        }

        return $stub;
    }

    public function modelProvider()
    {
        return [
            [
                'model' => [
                    'getCategorieCee' => Entries::CATEGORIES_CEE['categorie_cee_1'],
                    'getSurfaceIsolant' => (float) 100
                ], 10
            ], [
                'model' => [
                    'getCategorieCee' => Entries::CATEGORIES_CEE['categorie_cee_2'],
                    'getSurfaceIsolant' => (float) 100
                ], 20
            ], [
                'model' => [
                    'getCategorieCee' => Entries::CATEGORIES_CEE['categorie_cee_3'],
                    'getSurfaceIsolant' => (float) 100
                ], 20
            ], [
                'model' => [
                    'getCategorieCee' => '',
                    'getSurfaceIsolant' => (float) 100
                ], 0
            ]
        ];
    }

}
