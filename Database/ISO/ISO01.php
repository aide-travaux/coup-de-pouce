<?php

namespace AideTravaux\CoupDePouce\Database\ISO;

use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\DatabaseInterface;
use AideTravaux\CoupDePouce\Database\DatabaseTrait;
use AideTravaux\CoupDePouce\Model\DataInterface;

abstract class ISO01 implements DatabaseInterface
{
    use DatabaseTrait;

    /**
     * @property string
     */
    const NOM = 'Isolation des combles et toiture';

    /**
     * @property string
     */
    const CODE = 'CDP-ISO-01';

    /**
     * @property string
     */
    const DENOMINATION = '';

    /**
     * @property string
     */
    const CHARTE = 'Coup de pouce Isolation';

    /**
     * @property string
     */
    const FICHE_CEE = 'BAR-EN-101';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model) * $model->getSurfaceIsolant();
    }

    /**
     * @inheritdoc
     */
    public static function getMontantForfaitaire(DataInterface $model): int
    {
        switch ($model->getCategorieCee()) {
            case Entries::CATEGORIES_CEE['categorie_cee_1']:
                return 10;
            case Entries::CATEGORIES_CEE['categorie_cee_2']:
                return 20;
            case Entries::CATEGORIES_CEE['categorie_cee_3']:
                return 20;
            default:
                return 0;
        }
    }

}
