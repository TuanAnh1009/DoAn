<?php


namespace App\Service\Product;


use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\RepositoriesInterface;
use App\Service\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    public $repository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function getRelateProducts($product,$limit = 10) {
        return $this->repository->getRelateProducts($product,$limit);
    }

    public function getNewProducts($limit = 10) {
        return $this->repository->getNewProducts($limit);
    }

    public function getFeaturedProducts($limit = 10) {
        return $this->repository->getFeaturedProducts($limit);
    }

    public function getBrandProducts($limit = 10) {
        return $this->repository->getBrandProducts($limit);
    }

    public function getProductOnIndex($request) {
        return $this->repository->getProductOnIndex($request);
    }
}
