<?php

namespace AideTravaux\CoupDePouce\Data;

use AideTravaux\Core\Entries as BaseEntries;
use AideTravaux\CEE\Categorie\Data\Entries as CategorieEntries;

abstract class Entries extends BaseEntries
{
    /**
     * @property array
     */
    const CATEGORIES_CEE = CategorieEntries::CATEGORIES_CEE;
}
