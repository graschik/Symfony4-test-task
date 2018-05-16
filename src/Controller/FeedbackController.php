<?php

declare(strict_types=1);

namespace App\Controller;


use App\Entity\Feedback;
use App\Form\FeedbackType;
use App\Service\FeedbackFormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeedbackController extends Controller
{
    /**
     * @Route("/contacts", name="contacts")
     * @param Request $request
     * @param FeedbackFormHandler $feedbackFormHandler
     * @return Response
     */
    public function feedbackAction(
        Request $request,
        FeedbackFormHandler $feedbackFormHandler
    ): Response
    {
        $form = $this->createForm(FeedbackType::class, new Feedback());

        if ($feedbackFormHandler->handle($form, $request)) {
            return $this->redirect($request->getUri());
        }

        return $this->render('feedback/feedback.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}