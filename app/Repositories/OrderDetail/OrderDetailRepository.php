<?php


namespace App\Repositories\OrderDetail;


use App\Models\OrderDetail;
use App\Repositories\BaseRepositories;
use App\Repositories\RepositoriesInterface;

class OrderDetailRepository extends BaseRepositories implements OrderDetailRepositoryInterface
{

    public function getModel()
    {
        return OrderDetail::class;
    }
}
