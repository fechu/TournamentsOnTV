<?php

namespace SM\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseRestController extends FOSRestController
{
	/**
	 * Creates a response based. 
	 * If the "callback" query parameter is set, the response will be added in this callback.
	 * @param array $data An array containing the data which should be serialized.
	 */
	protected function createResponse($data) 
	{
		// Get the callback
		$callback = $this->getRequest()->get('callback');
		 
		if (isset($callback)) {
			$response = new JsonResponse();
			$serializer = $this->container->get('jms_serializer');
			$serializedData = $serializer->serialize($data, 'json');
			$response->setContent($callback . "(" . $serializedData . ")");
			return $response;
		}
		else {
			return $data;
		}
	}
}
