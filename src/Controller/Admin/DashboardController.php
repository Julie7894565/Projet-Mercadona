<?php

namespace App\Controller\Admin;

use App\Entity\Adress;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\Promotion;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(UserCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mercadona');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Adress', 'fas fa-map-marker-alt', Adress::class);
        yield MenuItem::section('Commandes');
        yield MenuItem::linkToCrud('Category', 'fas fa-tags', Category::class);
        yield MenuItem::linkToCrud('Order', 'fas fa-shop', Order::class);
        yield MenuItem::linkToCrud('Product', 'fas fa-map-marker-alt', Product::class);
        yield MenuItem::linkToCrud('Promotion', 'fas fa-percent', Promotion::class);
    }
}


// Changer les noms des titres
// Ajouter les relations sur les composants
// Desactiver certaines options ( DELETE order, delete user ...)