<?php


namespace App\Service\Product;


use App\Service\ServiceInterface;

interface ProductServiceInterface extends ServiceInterface
{
    public function getRelateProducts($product,$limit = 10);
    public function getNewProducts($limit = 10);
    public function getFeaturedProducts($limit = 10);
    public function getBrandProducts($limit = 10);
    public function getProductOnIndex($request);
}
