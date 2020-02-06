<?php

namespace AideTravaux\CoupDePouce\Database;

use AideTravaux\CoupDePouce\Model\DataInterface;

trait DatabaseTrait
{
    /**
     * @inheritdoc
     */
    public static function toArray(DataInterface $model): array
    {
        return [
            'nom' => self::NOM,
            'code' => self::CODE,
            'denomination' => self::DENOMINATION,
            'charte' => self::CHARTE,
            'fiche_cee' => self::FICHE_CEE,
            'montant' => self::getMontant($model),
            'montant_forfaitaire' => self::getMontantForfaitaire($model)
        ];
    }

}
