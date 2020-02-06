<?php

namespace AideTravaux\CoupDePouce\Database\CH;

use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\DatabaseInterface;
use AideTravaux\CoupDePouce\Database\DatabaseTrait;
use AideTravaux\CoupDePouce\Model\DataInterface;

abstract class CH05 implements DatabaseInterface
{
    use DatabaseTrait;

    /**
     * @property string
     */
    const NOM = 'Raccordement à un réseau de chaleur EnR&R';

    /**
     * @property string
     */
    const CODE = 'CDP-CH-05';

    /**
     * @property string
     */
    const DENOMINATION = 'Remplacement d\'une chaudière individuelle ou collective au charbon, au fioul ou au gaz, 
                         autres qu\'à condensation, par un raccordement à un réseau de chaleur EnR&R';

    /**
     * @property string
     */
    const CHARTE = 'Coup de pouce Chauffage';

    /**
     * @property string
     */
    const FICHE_CEE = 'BAR-TH-137';

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
                return 450;
            case Entries::CATEGORIES_CEE['categorie_cee_2']:
                return 700;
            case Entries::CATEGORIES_CEE['categorie_cee_3']:
                return 700;
            default:
                return 0;
        }
    }

}
