<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * @Rest\NamePrefix("sm_api_game_")
 */
class GameController extends BaseRestController
{
	/**
	 * @Rest\Get("/{id}/")
	 */
    public function getAction($id)
    {
    	// Load the game
    	$manager = $this->getDoctrine()->getManager();
    	$repo = $manager->getRepository("SM\ApiBundle\Entity\Game");
    	$game = $repo->find($id);

    	if (!$game) {
    		return $this->createNotFoundException("Game with id " . $id . " does not exist");
    	}
    	
    	return $this->createResponse($game);
    }

}
