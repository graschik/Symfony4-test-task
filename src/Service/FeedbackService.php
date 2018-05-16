<?php

declare(strict_types=1);

namespace App\Service;


use App\Entity\Feedback;
use Doctrine\ORM\EntityManagerInterface;

class FeedbackService
{
    private $entityManager;

    /**
     * FeedbackService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }

    /**
     * @param Feedback $feedback
     */
    public function save(Feedback $feedback): void
    {
        $this->entityManager->persist($feedback);
        $this->entityManager->flush();
    }
}