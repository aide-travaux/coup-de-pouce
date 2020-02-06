<?php

namespace AideTravaux\CoupDePouce\Database;

abstract class Database
{
    /**
     * @property array
     */
    const DB = [
        \AideTravaux\CoupDePouce\Database\CH\CH01::class,
        \AideTravaux\CoupDePouce\Database\CH\CH02::class,
        \AideTravaux\CoupDePouce\Database\CH\CH03::class,
        \AideTravaux\CoupDePouce\Database\CH\CH04::class,
        \AideTravaux\CoupDePouce\Database\CH\CH05::class,
        \AideTravaux\CoupDePouce\Database\CH\CH06::class,
        \AideTravaux\CoupDePouce\Database\CH\CH07::class,
        \AideTravaux\CoupDePouce\Database\CH\CH08::class,
        \AideTravaux\CoupDePouce\Database\CH\CH09::class,
        \AideTravaux\CoupDePouce\Database\ISO\ISO01::class,
        \AideTravaux\CoupDePouce\Database\ISO\ISO02::class
    ];

}
