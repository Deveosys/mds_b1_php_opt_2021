<?php

/**
 * Represent a playable Character
 */
class Character
{
    /**
     * Character's id
     *
     * @var int
     */
    private $_id;

    /**
     * Character's name
     *
     * @var string
     */
    private $_name;

    /**
     * HP amount of the character
     * When life is 0, character is dead
     * A character starts with 100 HP
     *
     * @var int
     */
    private $_life = 100;

    // /**
    //  * Power of the character
    //  *
    //  * @var int
    //  */
    // public $power;

    /**
     * Life represents HP
     * A character starts with 100 mana points
     *
     * @var int
     */
    private $_mana = 100;

    public function __construct(int $id, string $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        $this->_id = $id;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName(string $name)
    {
        $this->_name = $name;
    }

    public function getLife(): int
    {
        return $this->_life;
    }

    public function setLife(string $life)
    {
        $this->__life = $life;
    }

    public function getMana(): int
    {
        return $this->_mana;
    }

    public function setMana(string $mana)
    {
        $this->_mana = $mana;
    }


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
