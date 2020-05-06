<?php

namespace AideTravaux\CoupDePouce\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\CoupDePouce\CoupDePouce;
use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Model\ConditionInterface;
use AideTravaux\CoupDePouce\Utils\ConditionsResolver;

class ConditionsResolverTest extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function testResolveConditions($model)
    {
        $stub = $this->buildMock($model);

        $this->assertTrue(\is_array(ConditionsResolver::resolveConditions($stub)));
        $this->assertEquals(
            \count(ConditionsResolver::resolveConditions($stub)),
            \count(CoupDePouce::CONDITIONS) + \count(ConditionsResolver::getConditions($stub))
        );
    }

    /**
     * @depends testResolveConditions
     * @dataProvider modelProvider
     */
    public function testResolveConditionsStructure($model)
    {
        $stub = $this->buildMock($model);

        foreach (ConditionsResolver::resolveConditions($stub) as $condition) {
            $this->assertArrayHasKey('condition', $condition);
            $this->assertArrayHasKey('value', $condition);
        }
    }

    /**
     * @depends testResolveConditionsStructure
     * @dataProvider modelProvider
     */
    public function testResolveConditionsType($model)
    {
        $stub = $this->buildMock($model);

        foreach (ConditionsResolver::resolveConditions($stub) as $condition) {
            $this->assertTrue(\is_string($condition['condition']));
            $this->assertTrue(\is_null($condition['value']) || \is_bool($condition['value']));
        }
    }

    /**
     * @depends testResolveConditionsStructure
     * @dataProvider modelProvider
     */
    public function testIsEligible($model)
    {
        $stub = $this->buildMock($model);
        $this->assertTrue(\is_bool(ConditionsResolver::isEligible($stub)));
    }

    public function buildMock(array $model)
    {
        $stub = $this->createMock(ConditionInterface::class);

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
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-01',
                    'getTypeLogement' => Entries::TYPES_LOGEMENT['type_logement_1']
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-01',
                    'getTypeLogement' => ''
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-02'
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-03'
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-04'
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-05'
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-06'
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-07'
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-08'
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-CH-09'
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-ISO-07'
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => 'CDP-ISO-02'
                ]
            ], [
                'model' => [
                    'getAgeLogement' => 1
                ]
            ], [
                'model' => [
                    'getAgeLogement' => 3
                ]
            ], [
                'model' => [
                    'getCoupDePouceCodeTravaux' => ''
                ]
            ], [
                'model' => []
            ]
        ];
    }
}
