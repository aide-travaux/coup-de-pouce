<?php

namespace AideTravaux\CoupDePouce\Database\CH;

use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\DatabaseInterface;
use AideTravaux\CoupDePouce\Database\DatabaseTrait;
use AideTravaux\CoupDePouce\Model\DataInterface;

abstract class CH02 implements DatabaseInterface
{
    use DatabaseTrait;

    /**
     * @property string
     */
    const NOM = 'Pompe à chaleur air/eau ou eau/eau';

    /**
     * @property string
     */
    const DENOMINATION = 'Remplacement d\'une chaudière individuelle au charbon, au fioul ou au gaz, autres 
                         qu\'à condensation, par une pompe à chaleur air/eau ou eau/eau';

    /**
     * @property string
     */
    const CODE = 'CDP-CH-02';

    /**
     * @property string
     */
    const CHARTE = 'Coup de pouce Chauffage';

    /**
     * @property string
     */
    const FICHE_CEE = 'BAR-TH-104';

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
                return 2500;
            case Entries::CATEGORIES_CEE['categorie_cee_2']:
                return 4000;
            case Entries::CATEGORIES_CEE['categorie_cee_3']:
                return 4000;
            default:
                return 0;
        }
    }

}
