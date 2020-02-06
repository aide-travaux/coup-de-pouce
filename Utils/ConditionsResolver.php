<?php

namespace AideTravaux\CoupDePouce\Utils;

use AideTravaux\CoupDePouce\CoupDePouce;
use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Model\ConditionInterface;
use AideTravaux\CoupDePouce\Repository\Repository;

abstract class ConditionsResolver
{
    /**
     * Retourne les conditions d'accès satisfaites ou non
     * @param ConditionInterface
     * @return array
     */
    public static function resolveConditions(ConditionInterface $model): array
    {
        $conditions = self::getConditions($model);

        return [
            [
                'condition' => CoupDePouce::CONDITIONS[0],
                'value' => $model->getAgeLogement() > 2
            ], [
                'condition' => CoupDePouce::CONDITIONS[1],
                'value' => !empty( $base )
            ], [
                'condition' => CoupDePouce::CONDITIONS[2],
                'value' => null
            ], [
                'condition' => CoupDePouce::CONDITIONS[3],
                'value' => null
            ]
        ];
    }

    /**
     * Retourne l'éligibilité à l'aide financière
     * @param ConditionInterface
     * @return bool
     */
    public static function isEligible(ConditionInterface $model): bool
    {
        foreach (self::resolveConditions($model) as $condition) {
            if ($condition['value'] === false)  {
                return false;
            }
        }
        return true;
    }

    /**
     * Retourne les conditions sur la base des travaux transmis
     * @param ConditionInterface
     * @return array
     */
    private static function getConditions(ConditionInterface $model): array
    {
        $conditions = [];

        if ($base = Repository::getOneOrNull($model->getCoupDePouceCodeTravaux())) {
            switch ($base::CODE) {
                case 'CDP-CH-01':
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est une chaudière individuelle autre 
                                        qu\'à condensation',
                        'value' => null
                    ];
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est au charbon, au fioul ou au gaz',
                        'value' => null
                    ];
                    $conditions[] = [
                        'condition' => 'Le logement est une maison individuelle',
                        'value' => $model->getTypeLogement() === Entries::TYPES_LOGEMENT['type_logement_1']
                    ];
                case 'CDP-CH-02':
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est une chaudière individuelle autre 
                                        qu\'à condensation',
                        'value' => null
                    ];
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est au charbon, au fioul ou au gaz',
                        'value' => null
                    ];
                case 'CDP-CH-03':
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est une chaudière individuelle autre 
                                        qu\'à condensation',
                        'value' => null
                    ];
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est au charbon, au fioul ou au gaz',
                        'value' => null
                    ];
                    $conditions[] = [
                        'condition' => 'Le logement est situé en France métropolitaine',
                        'value' => null
                    ];
                case 'CDP-CH-04':
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est une chaudière individuelle autre 
                                        qu\'à condensation',
                        'value' => null
                    ];
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est au charbon, au fioul ou au gaz',
                        'value' => null
                    ];
                case 'CDP-CH-05':
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est une chaudière autre qu\'à condensation',
                        'value' => null
                    ];
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est au charbon, au fioul ou au gaz',
                        'value' => null
                    ];
                case 'CDP-CH-06':
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est une chaudière individuelle autre 
                                        qu\'à condensation',
                        'value' => null
                    ];
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est au charbon, au fioul ou au gaz',
                        'value' => null
                    ];
                case 'CDP-CH-07':
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est un appareil indépendant de chauffage au charbon',
                        'value' => null
                    ];
                    $conditions[] = [
                        'condition' => 'Le logement est une maison individuelle',
                        'value' => $model->getTypeLogement() === Entries::TYPES_LOGEMENT['type_logement_1']
                    ];
                case 'CDP-CH-08':
                    $conditions[] = [
                        'condition' => 'L\'équipement de chauffage actuel est un convecteur électrique fixe',
                        'value' => null
                    ];
                case 'CDP-CH-09':
                    $conditions[] = [
                        'condition' => 'Le logement est un bâtiment résidentiel collectif',
                        'value' => $model->getTypeLogement() === Entries::TYPES_LOGEMENT['type_logement_3']
                    ];
            }
        }
        return $conditions;
    }
}
