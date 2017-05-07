<?php
/**
 * Created by PhpStorm.
 * User: Kelly
 * Date: 5/6/2017
 * Time: 6:31 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\EntryType;
use AppBundle\Services\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EntityController extends Controller
{

    public function createEntityAction($entityType, Request $request) {
        // TODO: Add validation

        $em = $this->container->get('entity_manager');
        /** @var EntityManager $em */

        $data = json_decode($request->getContent());
        $entity = $em->createFromJson($data, $entityType);
        $result = $em->save($entity);

        return new JsonResponse($result);
    }

    public function updateEntityAction($entityId, $entityType, Request $request) {
        // TODO: Add validation

        $em = $this->container->get('entity_manager');
        /** @var EntityManager $em */

        $data = json_decode($request->getContent());

        $result = $em->updateFromJson($entityId, $data, $entityType);

        return new JsonResponse($result);
    }

    public function deleteEntityAction($entityId, $entityType, Request $request) {
        // TODO: Add validation

        $em = $this->container->get('entity_manager');
        /** @var EntityManager $em */

        $result = $em->delete($entityId, $entityType);

        return new JsonResponse($result);
    }


    public function loadEntityAction($entityId, $entityType, Request $request) {
        $em = $this->container->get('entity_manager');
        /** @var EntityManager $em */

        $result = $em->load($entityId, $entityType);

        return new JsonResponse($result);
    }
}