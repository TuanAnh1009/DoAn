<?php


namespace App\Repositories\Product;


use App\Repositories\RepositoriesInterface;

interface ProductRepositoryInterface extends RepositoriesInterface
{
    public function getRelateProducts($product,$limit = 10);
    public function getNewProducts($limit = 10);
    public function getFeaturedProducts($limit = 10);
    public function getBrandProducts($limit = 10);
    public function getProductOnIndex($request);
}
