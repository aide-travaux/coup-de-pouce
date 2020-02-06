<?php

namespace AideTravaux\CoupDePouce\Model;

interface DataInterface
{
    /**
     * Retourne le code travaux Coup de pouce économies d'énergie
     * @return string
     */
    public function getCoupDePouceCodeTravaux(): string;

    /**
     * Retourne la catégorie de ressources selon le dispositif certificats d'économies d'énergie
     * @return string
     */
    public function getCategorieCee(): string;

    /**
     * Retourne la surface d'isolant posé
     * @return float
     */
    public function getSurfaceIsolant(): float;

    /**
     * Retourne le nombre de radiateurs installés
     * @return int
     */
    public function getNombreRadiateurs(): int;

}
