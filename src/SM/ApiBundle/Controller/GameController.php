<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * @Rest\NamePrefix("sm_api_game_")
 */
class GameController extends BaseRestController
{
	/**
	 * Get a game with a given id.
	 * 
	 * @ApiDoc(
	 * 		section="Game",
	 * 		output="SM\ApiBundle\Entity\Game"
	 * )
	 * @Rest\Get("/{id}/", requirements={"id" = "\d+"} )
	 * 
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
