<?php

namespace App\Controller\Api;

use App\Entity\Payment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AclController extends AbstractController
{
    /**
     * @Route("/api/permissions/{action}/{subject}/{itemId}", name="check_permissions")
     */
    public function checkPermissions(Request $request): Response
    {
        // for now limit subject just to payment
        $subject = $request->get('subject');
        if ($subject != 'payment') {
            return new JsonResponse(null, 409);
        }

        $payment = $this->getDoctrine()->getManager()->find(Payment::class, $request->get('itemId'));

        if (is_null($payment)) {
            return new JsonResponse(null, 404);
        }

        $isGranted = $this->isGranted(
            $request->get('action'),
            $payment
        );

        return new JsonResponse(
            [
                'data' => [
                    'type' => 'permissions',
                    'attributes' => [
                        'action' => $request->get('action'),
                        'subject' => $subject,
                        'id' => $request->get('itemId'),
                        'is_granted' => $isGranted,
                    ]
                ]
            ]
        );
    }
}
