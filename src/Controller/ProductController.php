<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 28/10/2019
 * Time: 10:39
 */

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/products", name="product.index")h
     * @return Response
     */
    public function index(): Response
    {
        $products = $this->repository->findAll();
        dump($products);
        return $this->render('product/index.html.twig', [
            "current_menu" => "products"
        ]);
    }

    /**
     * @Route("/products/{slug}-{id}", name="product.show", requirements={"slug":"[a-z0-9\-]*"})
     * @param Product $product
     * @return Response
     */
    public function show(Product $product, string $slug): Response
    {
        if ($product->getSlug() !== $slug) {
            return $this->redirectToRoute('product.show', [
                'id' => $product->getId(),
                'slug' => $product->getSlug()
            ], 301);
        }
        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);
    }
}
