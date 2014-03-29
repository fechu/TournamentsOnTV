<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

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

}
