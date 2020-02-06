<?php

namespace AideTravaux\CoupDePouce\Tests\Database\CH;

use PHPUnit\Framework\TestCase;
use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\CH\CH08;
use AideTravaux\CoupDePouce\Model\DataInterface;

class CH08Test extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function getMontant($model, $expect)
    {
        $stub = $this->buildMock($model);
        $this->assertEquals(CH08::getMontant($stub), $expect * 2);
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetMontantForfaitaire($model, $expect)
    {
        $stub = $this->buildMock($model);
        $this->assertEquals(CH08::getMontantForfaitaire($stub), $expect);
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
                    'getNombreRadiateurs' => 2
                ], 50
            ], [
                'model' => [
                    'getCategorieCee' => Entries::CATEGORIES_CEE['categorie_cee_2'],
                    'getNombreRadiateurs' => 2
                ], 100
            ], [
                'model' => [
                    'getCategorieCee' => Entries::CATEGORIES_CEE['categorie_cee_3'],
                    'getNombreRadiateurs' => 2
                ], 100
            ], [
                'model' => [
                    'getCategorieCee' => '',
                    'getNombreRadiateurs' => 2
                ], 0
            ]
        ];
    }

}
