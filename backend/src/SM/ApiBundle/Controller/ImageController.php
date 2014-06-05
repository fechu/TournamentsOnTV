<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * @Rest\NamePrefix("sm_api_image_")
 */
class ImageController extends BaseRestController
{
	/**
	 * Get all uploaded images
	 * 
	 * @Rest\Get("/")
	 * @ApiDoc(
	 *  section="Image",
	 * 	output="SM\ApiBundle\Entity\Image"
	 * );
	 */
	public function allAction()
	{
    	$manager = $this->getDoctrine()->getManager();
    	$repo = $manager->getRepository("SM\ApiBundle\Entity\Image");
    	$data = array("images" => $repo->findAll());
		return $this->createResponse($data);
	}
}
