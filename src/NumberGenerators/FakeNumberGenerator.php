<?php

namespace FizzBuzz\NumberGenerators;

use FizzBuzz\NumberGeneratorInterface;

/**
 * Fake Number Generator
 */
final class FakeNumberGenerator implements NumberGeneratorInterface
{
    /** @var int */
    protected $number;

    /**
     * @param int $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * {@inheritDoc}
     */
    public function generate($min = null, $max = null)
    {
        return $this->number;
    }
}
