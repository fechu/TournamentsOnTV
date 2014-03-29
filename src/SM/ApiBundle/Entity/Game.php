<?php

namespace SM\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;


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
     * @Serializer\Exclude
     * @var Game
     */
    protected $leftGame;
    
    /**
     * @ORM\OneToOne(targetEntity="Game")
     * @Serializer\Exclude
     * @var Game
     */
    protected $rightGame;
    
    /**
     * @ORM\ManyToOne(targetEntity="Tournament", inversedBy="games")
     * @Serializer\Exclude
     */
    protected $tournament;
    

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
    
    /**
     * @Serializer\VirtualProperty
     */
    public function leftGameId()
    {
    	if ($this->leftGame) {
            return $this->leftGame->getId();
    	}
    	else {
    		return -1;
    	}
    }
    
    /**
     * @Serializer\VirtualProperty
     */
    public function rightGameId()
    {
    	if ($this->rightGame) {
			return $this->rightGame->getId();
    	}
    	else {
    		return -1;
    	}
    }

}
