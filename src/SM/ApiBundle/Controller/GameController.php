<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;

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

    	if ($game == NULL) {
    		$response = new Response();
			$response->setStatusCode(Response::HTTP_NOT_FOUND);
			return $response;
    	}
    	
    	return $this->createResponse($game);
    }

}
