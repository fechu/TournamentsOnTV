<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SM\ApiBundle\Entity\Image;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
	/**
	 * @Route("/")
	 * @Method({"POST"})
	 * @return multitype:\Symfony\Component\Form\FormView
	 */
	public function uploadImageAction(Request $request)
	{
		$file = $request->files->get('file', null);
		if ($file == NULL) {
			return new Response(null, Response::HTTP_BAD_REQUEST);
		}
		
		$image = new Image();
		$image->setFile($file);
		$image->upload();
		
		$manager = $this->getDoctrine()->getManager();
		$manager->persist($image);
		$manager->flush();

		return new Response(null, Response::HTTP_OK);
	}
}
