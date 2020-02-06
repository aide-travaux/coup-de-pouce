<?php

namespace AideTravaux\CoupDePouce\Model;

interface ConditionInterface
{
    /**
     * Retourne le code travaux Coup de pouce économies d'énergie
     * @return string
     */
    public function getCoupDePouceCodeTravaux(): string;

    /**
     * Retourne le type de logement
     * @return string
     */
    public function getTypeLogement(): string;

    /**
     * Retourne l'âge du logement
     * @return int
     */
    public function getAgeLogement(): int;

}
