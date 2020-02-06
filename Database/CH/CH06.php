<?php

namespace AideTravaux\CoupDePouce\Database\CH;

use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\DatabaseInterface;
use AideTravaux\CoupDePouce\Database\DatabaseTrait;
use AideTravaux\CoupDePouce\Model\DataInterface;

abstract class CH06 implements DatabaseInterface
{
    use DatabaseTrait;

    /**
     * @property string
     */
    const NOM = 'Chaudière au gaz à très haute performance énergétique';

    /**
     * @property string
     */
    const CODE = 'CDP-CH-06';

    /**
     * @property string
     */
    const DENOMINATION = 'Remplacement d\'une chaudière individuelle au charbon, au fioul ou au gaz, autres 
                         qu\'à condensation, par une chaudière au gaz à très haute performance énergétique';

    /**
     * @property string
     */
    const CHARTE = 'Coup de pouce Chauffage';

    /**
     * @property string
     */
    const FICHE_CEE = 'BAR-TH-106';

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
                return 600;
            case Entries::CATEGORIES_CEE['categorie_cee_2']:
                return 1200;
            case Entries::CATEGORIES_CEE['categorie_cee_3']:
                return 1200;
            default:
                return 0;
        }
    }

}
