<?php

namespace App\Controller;

use App\Service\StatsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index(EntityManagerInterface $manager, StatsService $statsService): Response
    {
        // $users = $statsService->getUserCount();
        // $ads = $statsService->getAdsCount();
        // $bookings = $statsService->getBookingsCount();
        // $comments = $statsService->getCommentsCount();

        $stats = $statsService->getStats();

        $bestAds = $statsService->getAdsStats('DESC');

        $worstAds = $statsService->getAdsStats('ASC');

        return $this->render('admin/dashboard/index.html.twig', [
            // 'stats' => compact('users', 'ads', 'bookings', 'comments'),
            'stats' => $stats,
            'bestAds' => $bestAds,
            'worstAds' => $worstAds,
        ]);
    }
}
