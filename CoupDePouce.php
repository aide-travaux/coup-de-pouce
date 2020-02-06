<?php

namespace AideTravaux\CoupDePouce;

use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Model\DataInterface;
use AideTravaux\CoupDePouce\Model\ConditionInterface;
use AideTravaux\CoupDePouce\Repository\Repository;
use AideTravaux\CoupDePouce\Utils\ConditionsResolver;

abstract class CoupDePouce
{
    /**
     * @property string
     */
    const NOM = 'Coup de pouce économies d\'énergie';

    /**
     * @property string
     */
    const DESCRIPTION = 'Coup de pouce économies d\'énergie est une suprime versée dans le cadre du dispositif des 
                        Certificats d\'économies d\'énergie';
    
    /**
     * @property string
     */
    const DELAI = 'Sur présentation des factures';
    
    /**
     * @property string
     */
    const DISTRIBUTEUR = 'Entreprises partenaires de l\'opération';
    
    /**
     * @property array
     */
    const REFERENCES = [
        'https://www.ecologique-solidaire.gouv.fr/coup-pouce-economies-denergie-2019-2020',
        'https://www.ecologique-solidaire.gouv.fr/dispositif-des-certificats-deconomies-denergie'
    ];

    /**
     * @property array
     */
    const CONDITIONS = [
        'Le logement ou l\'immeuble concerné est achevé depuis plus de deux ans à la date de 
        début des travaux et prestations',
        'Les travaux sont éligibles',
        'Les travaux n\'ont pas encore commencé',
        'Les travaux sont réalisés par une entreprise qualifiée RGE'
    ];

    /**
     * Retourne le montant de l'aide financière
     * @param DataInterface
     * @return float|null
     */
    public static function get(DataInterface $model): ?float
    {
        $base = Repository::getOneOrNull( $model->getCoupDePouceCodeTravaux() );

        return ($base) ? (float) $base::getMontant($model): null;
    }

    /**
     * Retourne le barême de l'aide financière
     * @param DataInterface
     * @return array|null
     */
    public static function getBareme(DataInterface $model): ?array
    {
        $base = Repository::getOneOrNull( $model->getCoupDePouceCodeTravaux() );

        return ($base) ? $base::toArray($model) : null;
    }

    /**
     * @see ConditionsResolver
     */
    public static function resolveConditions(ConditionInterface $model): array
    {
        return ConditionsResolver::resolveConditions($model);
    }

    /**
     * @see ConditionsResolver
     */
    public static function isEligible(ConditionInterface $model): bool
    {
        return ConditionsResolver::isEligible($model);
    }

    /**
     * @return array
     */
    public static function toArray(): array
    {
        return [
            'nom' => self::NOM,
            'description' => self::DESCRIPTION,
            'delai' => self::DELAI,
            'distributeur' => self::DISTRIBUTEUR,
            'references' => self::REFERENCES,
            'conditions' => self::CONDITIONS
        ];
    }
}
