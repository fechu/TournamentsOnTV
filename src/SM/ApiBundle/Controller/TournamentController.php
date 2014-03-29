<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * @Rest\NamePrefix("sm_api_tournament_")
 */
class TournamentController extends FOSRestController
{
    /**
	 * @Rest\Get("/")
     */
    public function allAction()
    {
    	$manager = $this->getDoctrine()->getManager();
    	$repo = $manager->getRepository("SM\ApiBundle\Entity\Tournament");
		
    	$callback = $this->getRequest()->get('callback');
    	
    	$tournaments = $repo->findAll();
    	$data = array("tournaments" => $tournaments);
    	
    	if (isset($callback)) {
    		$response = new JsonResponse();
    		$response->setCallback($callback);
    		$serializer = $this->container->get('jms_serializer');
    		$serializedTournaments = $serializer->serialize($data, 'json');
    		$response->setContent($callback . "(" . $serializedTournaments . ")");
    		return $response;	
    	}
    	
    	return $data;
    }

}
