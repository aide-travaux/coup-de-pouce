<?php

namespace AideTravaux\CoupDePouce\Database\CH;

use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\DatabaseInterface;
use AideTravaux\CoupDePouce\Database\DatabaseTrait;
use AideTravaux\CoupDePouce\Model\DataInterface;

abstract class CH08 implements DatabaseInterface
{
    use DatabaseTrait;

    /**
     * @property string
     */
    const NOM = 'Appareil électrique très performant';

    /**
     * @property string
     */
    const CODE = 'CDP-CH-08';

    /**
     * @property string
     */
    const DENOMINATION = 'Remplacement d\'un convecteur électrique fixe par un appareil électrique très performant';

    /**
     * @property string
     */
    const CHARTE = 'Coup de pouce Chauffage';

    /**
     * @property string
     */
    const FICHE_CEE = 'BAR-TH-158';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model) * $model->getNombreRadiateurs();
    }

    /**
     * @inheritdoc
     */
    public static function getMontantForfaitaire(DataInterface $model): int
    {
        switch ($model->getCategorieCee()) {
            case Entries::CATEGORIES_CEE['categorie_cee_1']:
                return 50;
            case Entries::CATEGORIES_CEE['categorie_cee_2']:
                return 100;
            case Entries::CATEGORIES_CEE['categorie_cee_3']:
                return 100;
            default:
                return 0;
        }
    }

}
