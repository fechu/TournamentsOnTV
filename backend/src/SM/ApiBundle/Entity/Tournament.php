<?php

namespace SM\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use JMS\Serializer\Annotation as Serializer;
/**
 * Tournament
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SM\ApiBundle\Entity\Repository\TournamentRepository")
 */
class Tournament
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Game", mappedBy="tournament")
     * @Serializer\Exclude
     */
    private $games;
    
    public function __construct()
    {
    	$this->games = new ArrayCollection();
    }
    
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
     * @return Tournament
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
    
    public function getGames()
    {
    	return $this->games;
    }
    
    /**
     * @Serializer\VirtualProperty
     * @return array 	An array with all id's of the games.
     */
    public function gameIds() {
    	$ids = array();
    	
    	foreach ($this->games as $game) {
    		$ids[] = $game->getId();
    	}
    	
    	return $ids;
    	
    }
    
}
