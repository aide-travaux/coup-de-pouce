<?php

namespace AideTravaux\CoupDePouce\Database\CH;

use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\DatabaseInterface;
use AideTravaux\CoupDePouce\Database\DatabaseTrait;
use AideTravaux\CoupDePouce\Model\DataInterface;

abstract class CH07 implements DatabaseInterface
{
    use DatabaseTrait;

    /**
     * @property string
     */
    const NOM = 'Appareil de chauffage au bois très performant';

    /**
     * @property string
     */
    const CODE = 'CDP-CH-07';

    /**
     * @property string
     */
    const DENOMINATION = 'Remplacement d\'un équipement indépendant de chauffage au charbon par un appareil 
                         de chauffage au bois très performant';

    /**
     * @property string
     */
    const CHARTE = 'Coup de pouce Chauffage';

    /**
     * @property string
     */
    const FICHE_CEE = 'BAR-TH-112';

    /**
     * @inheritdoc
     */
    public static function getMontant(DataInterface $model): float
    {
        return (float) self::getMontantForfaitaire($model);
    }

    /**
     * @inheritdoc
     */
    public static function getMontantForfaitaire(DataInterface $model): int
    {
        switch ($model->getCategorieCee()) {
            case Entries::CATEGORIES_CEE['categorie_cee_1']:
                return 500;
            case Entries::CATEGORIES_CEE['categorie_cee_2']:
                return 800;
            case Entries::CATEGORIES_CEE['categorie_cee_3']:
                return 800;
            default:
                return 0;
        }
    }

}
