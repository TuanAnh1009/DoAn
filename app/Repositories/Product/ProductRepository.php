<?php


namespace App\Repositories\Product;


use App\Models\Product;
use App\Repositories\BaseRepositories;
use App\Repositories\RepositoriesInterface;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepositories implements ProductRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }

    public function getRelateProducts($product,$limit = 10)
    {
        return $this->model->where('tag', $product->tag)
            ->limit($limit)
            ->get();
    }

    public function getNewProducts($limit = 10)
    {
        return $this->model->latest('id')
            ->limit($limit)
            ->get();
    }

    public function getFeaturedProducts($limit = 10)
    {
        return $this->model->where('featured', 1)
            ->limit($limit)
            ->get();
    }

    public function getBrandProducts($limit = 10)
    {
        return $this->model->where('brand_id', 3)
            ->limit($limit)
            ->get();
    }

    public function getProductOnIndex($request)
    {
        $sortBy = $request->sort_by ?? 'latest';
        $search = $request->search ?? '';
        $color = $request->color;
        $size = $request->size;

        $products =$this->model->where('name', 'like', '%' . $search . '%');

        $products= $color != null ? $products->whereHas('productDetails', function ($q) use ($color){
            return $q->where('color', $color);
        }) : $products;

        $products= $size != null ? $products->whereHas('productDetails', function ($q) use ($size){
            return $q->where('size', $size);
        }) : $products;

        switch ($sortBy) {
            case 'latest':
                $products = $products->orderByDesc('id');
                break;
            case 'oldest':
                $products = $products->orderBy('id');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            default:
                $products = $products->orderBy('id');
        }

// Lấy tất cả Products
//        $products = $products->get();

        $products = $this->filter($products, $request);

        $products = $products->paginate(12);

        return $products;
    }

    private function filter($products, Request $request)
    {
        //Brand:
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);
        $products = $brand_ids != null ? $products->whereIn('brand_id', $brand_ids) : $products;

        //Color:
//        $color = $request->color;
//        $products->whereHas('productDetails', function ($q) use ($color){
//            return $q->where('color', $color);
//        });
//
//        dd($products);

        return $products;
    }
}
