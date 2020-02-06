<?php

namespace AideTravaux\CoupDePouce\Database;

use AideTravaux\CoupDePouce\Model\DataInterface;

/**
 * @see https://www.ecologique-solidaire.gouv.fr/coup-pouce-economies-denergie-2019-2020
 */
interface DatabaseInterface
{
    /**
     * Retourne le montant de l'aide financière
     * @param DataInterface
     * @return float
     */
    public static function getMontant(DataInterface $model): float;

    /**
     * Retourne le montant forfaitaire de l'aide financière
     * @param DataInterface
     * @return int
     */
    public static function getMontantForfaitaire(DataInterface $model): int;

    /**
     * @param DataInterface
     * @return array
     */
    public static function toArray(DataInterface $model): array;

}
