<?php

namespace AideTravaux\CoupDePouce\Database\CH;

use AideTravaux\CoupDePouce\Data\Entries;
use AideTravaux\CoupDePouce\Database\DatabaseInterface;
use AideTravaux\CoupDePouce\Database\DatabaseTrait;
use AideTravaux\CoupDePouce\Model\DataInterface;

abstract class CH09 implements DatabaseInterface
{
    use DatabaseTrait;

    /**
     * @property string
     */
    const NOM = 'Remplacement d\'un conduit d\'évacuation des produits de combustion incompatible avec des 
                chaudières individuelles au gaz à condensation';

    /**
     * @property string
     */
    const CODE = 'CDP-CH-09';

    /**
     * @property string
     */
    const DENOMINATION = 'Pour le remplacement, dans un bâtiment collectif, d\'un conduit d\'évacuation des 
                         produits de combustion incompatible avec des chaudières individuelles au gaz à condensation';

    /**
     * @property string
     */
    const CHARTE = 'Coup de pouce Chauffage';

    /**
     * @property string
     */
    const FICHE_CEE = 'BAR-TH-163';

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
