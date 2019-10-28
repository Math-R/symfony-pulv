<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 28/10/2019
 * Time: 15:38
 */

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminProductController extends AbstractController
{
    /*
     * @var ProductRepository
     */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.product.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $products = $this->repository->findAll();
        return $this->render('admin/product/index.html.twig', compact('products'));
    }

    /**
     * @Route("/admin/{id}", name="admin.product.edit")
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Product $product)
    {
        return $this->render('admin/product/edit.html.twig', compact('products'));
    }
}
