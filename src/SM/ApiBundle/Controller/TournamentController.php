<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
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
		return array("tournaments" => $repo->findAll());
    }

}
