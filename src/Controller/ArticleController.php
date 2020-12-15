<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;


class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{id}" , name ="article_page")
     */
    public function show($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        $comments = $article->getComments();

        return $this->render('article/article.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $article,
            'comments' => $comments,

        ]);
    }
}