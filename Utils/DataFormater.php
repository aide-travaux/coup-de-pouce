<?php

namespace AideTravaux\CoupDePouce\Utils;

use AideTravaux\CoupDePouce\CoupDePouce;
use AideTravaux\CoupDePouce\Model\DataInterface;
use AideTravaux\CoupDePouce\Model\ConditionInterface;

abstract class DataFormater
{
    /**
     * @param mixed|null
     * @return array
     */
    public static function get($model = null): array
    {
        $array = CoupDePouce::toArray();

        if ($model instanceof DataInterface) {
            $array = \array_merge($array, [
                'montant' => CoupDePouce::get($model),
                'bareme' => CoupDePouce::getBareme($model)
            ]);
        }

        if ($model instanceof ConditionInterface) {
            $array = \array_merge($array, [
                'conditions' => CoupDePouce::resolveConditions($model),
                'isEligible' => CoupDePouce::isEligible($model)
            ]);
        }

        return $array;
    }
}
