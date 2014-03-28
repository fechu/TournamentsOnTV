<?php

namespace SM\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SM\ApiBundle\Entity\Repository\GameRepository")
 */
class Game
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="team_left", type="string", length=255)
     */
    private $teamLeft;

    /**
     * @var string
     *
     * @ORM\Column(name="team_right", type="string", length=255)
     */
    private $teamRight;

    /**
     * @ORM\OneToOne(targetEntity="Game")
     * @var Game
     */
    protected $leftGame;
    
    /**
     * @ORM\OneToOne(targetEntity="Game")
     * @var Game
     */
    protected $rightGame;
    

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
     * Set teamLeft
     *
     * @param string $teamLeft
     * @return Game
     */
    public function setTeamLeft($teamLeft)
    {
        $this->teamLeft = $teamLeft;

        return $this;
    }

    /**
     * Get teamLeft
     *
     * @return string 
     */
    public function getTeamLeft()
    {
        return $this->teamLeft;
    }

    /**
     * Set teamRight
     *
     * @param string $teamRight
     * @return Game
     */
    public function setTeamRight($teamRight)
    {
        $this->teamRight = $teamRight;

        return $this;
    }

    /**
     * Get teamRight
     *
     * @return string 
     */
    public function getTeamRight()
    {
        return $this->teamRight;
    }
}
