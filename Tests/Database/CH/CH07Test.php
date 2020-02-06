<?php

namespace AideTravaux\CoupDePouce\Tests\Database\CH;

use PHPUnit\Framework\TestCase;
use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\CH\CH07;
use AideTravaux\CoupDePouce\Model\DataInterface;

class CH07Test extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function getMontant($model, $expect)
    {
        $stub = $this->buildMock($model);
        $this->assertEquals(CH07::getMontant($stub), $expect);
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetMontantForfaitaire($model, $expect)
    {
        $stub = $this->buildMock($model);
        $this->assertEquals(CH07::getMontantForfaitaire($stub), $expect);
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
                    'getCategorieCee' => Entries::CATEGORIES_CEE['categorie_cee_1']
                ], 500
            ], [
                'model' => [
                    'getCategorieCee' => Entries::CATEGORIES_CEE['categorie_cee_2']
                ], 800
            ], [
                'model' => [
                    'getCategorieCee' => Entries::CATEGORIES_CEE['categorie_cee_3']
                ], 800
            ], [
                'model' => [
                    'getCategorieCee' => ''
                ], 0
            ]
        ];
    }

}
