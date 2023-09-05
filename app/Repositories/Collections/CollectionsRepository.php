<?php


namespace App\Repositories\Collections;


use App\Models\ProductCategory;
use App\Repositories\BaseRepositories;
use App\Repositories\RepositoriesInterface;

class CollectionsRepository extends BaseRepositories implements CollectionsRepositoryInterface
{

    public function getModel()
    {
        return ProductCategory::class;
    }

    public function getCollections()
    {
        return $this->model
            ->limit(3)
            ->get();
    }
}
