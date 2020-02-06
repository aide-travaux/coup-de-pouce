<?php

namespace AideTravaux\CoupDePouce\Model;

interface ConditionInterface
{
    public function getCoupDePouceCodeTravaux(): string;

    public function getTypeLogement(): string;
    
    public function getAgeLogement(): int;

}
