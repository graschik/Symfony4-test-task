<?php

declare(strict_types=1);

namespace App\Service;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class FeedbackFormHandler
{
    private $feedbackService;

    /**
     * FeedbackFormHandler constructor.
     * @param FeedbackService $feedbackService
     */
    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService=$feedbackService;
    }

    /**
     * @param FormInterface $form
     * @param Request $request
     * @return bool
     */
    public function handle(
        FormInterface $form,
        Request $request
    ): bool
    {
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $feedback=$form->getData();
            $this->feedbackService->save($feedback);

            return true;
        }

        return false;
    }
}