<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/articles")
 */
class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles_by_limit", name="articles_by_limit", methods={"GET"})
     */
    public function getByLimit(ArticlesRepository $articlesRepository, int $limit = 100): JsonResponse
    {
        $article = $articlesRepository->findByLimit($limit);
        $data =  $this->container->get('serializer')->serialize($article, 'jsonld');

        $response = new JsonResponse($data, 201, [], true);
       
        return $response;
    }
}
