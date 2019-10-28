<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 28/10/2019
 * Time: 10:05
 */

namespace App\Controller;


use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param ProductRepository $repository
     * @return Response
     */
    public function index(ProductRepository $repository): Response
    {
        $products = $repository->findLatest();
        dump($products);
        return $this->render('pages/home.html.twig', [
            'products' => $products
        ]);
    }
}
