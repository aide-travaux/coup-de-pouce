<?php

namespace AideTravaux\Cdp\Utils;

use AideTravaux\Core\Data\Entries;
use AideTravaux\Core\Utils\Condition;
use AideTravaux\Cdp\Model\ProfileInterface;
use AideTravaux\Cdp\Model\ProjectInterface;
use AideTravaux\Cdp\Database\Repository;

abstract class Conditions
{
    public static function get()
    {
        return [
            new Condition(
                'Le logement ou l\'immeuble concerné est achevé depuis plus de deux ans à la date de 
                début des travaux et prestations',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return $profile->getBuildingExistence() > 2;
                }
            ),
            new Condition(
                'Les travaux sont éligibles',
                function(ProfileInterface $profile, ProjectInterface $project) {
                    return !empty(
                        Repository::getOneBy([
                            'code' => $project->getCeeWorkCode(),
                            'housing_types' => $profile->getHousingType()
                        ])
                    );
                }
            )
        ];
    }
}
