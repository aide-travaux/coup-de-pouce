<?php

namespace AideTravaux\CoupDePouce\Model;

interface DataInterface
{
    public function getCoupDePouceCodeTravaux(): string;

    public function getCategorieCee(): string;

    public function getSurfaceIsolant(): float;

    public function getNombreRadiateurs(): int;

}
