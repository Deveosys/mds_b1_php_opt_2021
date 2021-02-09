<?php

/**
 * Represent a playable Character
 */
class Character
{
    /**
     * HP amount of the character
     * When life is 0, character is dead
     * A character starts with 100 HP
     *
     * @var int
     */
    public $life = 100;

    /**
     * Power of the character
     *
     * @var int
     */
    public $power;

    /**
     * Life represents HP
     * A character starts with 100 mana points
     *
     * @var int
     */
    public $mana = 100;


    /**
     * Shout uses 30 mana and gives 20 hp back
     *
     * @return void
     */
    public function shout(): void
    {
        if ($this->useMana(30)) {
            $this->life = $this->life + 20;
            echo "BAAAAAH !!!";
        } else {
            echo "No mana ! Need regen.";
        }
    }

    public function attack(): void
    {
    }

    /**
     * Uses 40 mana points to throw a fire ball
     *
     * @return void
     */
    public function throwFireBall(): void
    {
        if ($this->useMana(40)) {
            if (rand(0, 9) === 1) {
                $this->looseHp(10);
            }
        }
    }

    /**
     * Regenerate 50 mana points
     *
     * @return void
     */
    public function regen(): void
    {
        $this->mana += 50;
    }

    /**
     * If enough mana, use it.
     *
     * @param integer $neededMana
     * @return boolean
     */
    public function useMana(int $neededMana): bool
    {
        if ($this->mana >= $neededMana) {
            $this->mana -= $neededMana;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Removes the number of HP passed as parameter
     * If HPs reach 0, character dies
     *
     * @param integer $lostHp
     * @return void
     */
    public function looseHp(int $lostHp): void
    {
        $this->life -= $lostHp;
        if ($this->life <= 0) {
            echo "You dead";
            die();
        }
    }
}

