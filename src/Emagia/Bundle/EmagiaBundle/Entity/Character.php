<?php

namespace Emagia\Bundle\EmagiaBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Character
 */
class Character
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\NotEqualTo(0)
     */
    private $health;

    /**
     * @var int
     */
    private $strength;

    /**
     * @var int
     */
    private $defence;

    /**
     * @var int
     */
    private $speed;

    /**
     * @var int
     */
    private $luck;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Character
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set health
     *
     * @param integer $health
     * @return Character
     */
    public function setHealth($health)
    {
        $this->health = $health;

        return $this;
    }

    /**
     * Get health
     *
     * @return integer 
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     * @return Character
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return integer 
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set defence
     *
     * @param integer $defence
     * @return Character
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;

        return $this;
    }

    /**
     * Get defence
     *
     * @return integer 
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * Set speed
     *
     * @param integer $speed
     * @return Character
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get speed
     *
     * @return integer 
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set luck
     *
     * @param integer $luck
     * @return Character
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;

        return $this;
    }

    /**
     * Get luck
     *
     * @return integer 
     */
    public function getLuck()
    {
        return $this->luck;
    }
}
