<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Rest\NamePrefix("sm_api_tournament_")
 */
class TournamentController extends BaseRestController
{
    /**
     * Get all Tournaments
     * 
	 * @Rest\Get("/")
	 * @ApiDoc(
	 *  section="Tournament",
	 * 	output="SM\ApiBundle\Entity\Tournament"
	 * )
     */
    public function allAction()
    {
    	$manager = $this->getDoctrine()->getManager();
    	$repo = $manager->getRepository("SM\ApiBundle\Entity\Tournament");
		
    	$callback = $this->getRequest()->get('callback');
    	
    	$tournaments = $repo->findAll();
    	$data = array("tournaments" => $tournaments);
    	
    	return $this->createResponse($data);
    }
    
    /**
     * @ApiDoc(
     * 	section="Tournament",
     *  output="SM\ApiBundle\Entity\Tournament"
     * )
     * @Rest\Get("/{tournament_id}/games/")
     */
    public function gamesAction($tournament_id) 
    {
    	$manager = $this->getDoctrine()->getManager();
    	$repo = $manager->getRepository("SM\ApiBundle\Entity\Tournament");
		$tournament = $repo->find($tournament_id);
		
		if ($tournament == NULL) {
			$response = new Response();
			$response->setStatusCode(Response::HTTP_NOT_FOUND);
			return $response;
		}
		
		// Prepare the data
    	$data = array("games" => $tournament->getGames());
    	
    	return $this->createResponse($data);
    }

}
