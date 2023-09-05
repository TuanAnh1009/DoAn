<?php


namespace App\Repositories\Brand;


use App\Models\Brand;
use App\Repositories\BaseRepositories;
use App\Repositories\RepositoriesInterface;

class BrandRepository extends BaseRepositories implements BrandRepositoryInterface
{

    public function getModel()
    {
        return Brand::class;
    }
}
