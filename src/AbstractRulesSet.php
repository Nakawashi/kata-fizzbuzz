<?php

namespace FizzBuzz;

use Doctrine\Common\Collections\ArrayCollection;

use FizzBuzz\Exceptions\IrrelevantGameRule;

/**
 * Abstract Rules Set
 *
 * @method AbstractGameRule[] toArray()
 */
abstract class AbstractRulesSet extends ArrayCollection
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->loadRules();
    }

    /**
     * Loads the rules into the collection
     */
    abstract protected function loadRules();

    /**
     * @param int $step
     *
     * @return null|string
     * @throws \DomainException
     */
    public function generateValidAnswer($step)
    {
        foreach ($this->toArray() as $gameRule) {
            try {
                return $gameRule->generateValidAnswer($step);
            } catch (IrrelevantGameRule $exception) {
                continue;
            }
        }

        throw new \DomainException('The round cannot generate a valid answer based on the given game rules.');
    }
}
