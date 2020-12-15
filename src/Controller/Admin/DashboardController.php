<?php

namespace App\Controller\Admin;


use App\Entity\Article;
use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(ArticleCrudController::class)->generateUrl());

    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Important');
        yield MenuItem::linkToCrud('Articles','fa fa-file-pdf', Article::class);
        yield MenuItem::linkToCrud('Categories', 'fa fa-list', Category::class);
    }
}
