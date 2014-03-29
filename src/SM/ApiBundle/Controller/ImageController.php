<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * @Rest\NamePrefix("sm_api_image_")
 */
class ImageController extends BaseRestController
{
	/**
	 * @Rest\Get("/")
	 */
	public function allAction()
	{
    	$manager = $this->getDoctrine()->getManager();
    	$repo = $manager->getRepository("SM\ApiBundle\Entity\Image");
    	$data = array("images" => $repo->findAll());
		return $this->createResponse($data);
	}
}
