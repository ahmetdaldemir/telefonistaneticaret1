<?php

namespace App\Filters;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter
{
    protected $builder;
    protected $filters;

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function apply(Builder $builder, $perPage = 15)
    {
        $this->builder = $builder;

        foreach ($this->filters as $filter => $value) {
            // Eğer filter metodu mevcutsa, bu metodu uygula
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        return $this->builder->orderBy('id', 'desc')->paginate($perPage);

    }


    // Kategoriye göre filtreleme
    public function barcode($value)
    {
        return $this->builder->whereHas('product', function ($query) use ($value) {
            $query->where('barcode', $value);
        });
    }

    // Kategoriye göre filtreleme
    public function categories($categoryId)
    {
        return $this->builder->whereHas('product', function ($query) use ($categoryId) {
            $query->where('category', $categoryId);
        });
    }

    // Markaya göre filtreleme (minimum)
    public function brand($brandId)
    {
        return $this->builder->whereHas('product', function ($query) use ($brandId) {
            $query->where('brand', $brandId);
        });
    }

    // Model Koduna göre filtreleme (modelcode)
    public function modelcode($value)
    {
        return $this->builder->whereHas('product', function ($query) use ($value) {
            $query->where('modelcode', $value);
        });
    }

    // Ürün adına göre filtreleme
    public function name($name)
    {
        return $this->builder->whereHas('product', function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        });
    }

    // Stok durumuna göre filtreleme
    public function stockcode($value)
    {
        return $this->builder->where('stockcode', $value);
    }


    // Stok durumuna göre filtreleme
    public function bestSeller()
    {
        $popularProductIds = OrderProduct::select('product_id')
            ->groupBy('product_id')
            ->havingRaw('SUM(quantity) > ?', [5])
            ->pluck('product_id');
        return $this->builder->whereHas('product', function ($query) use ($popularProductIds) {
            $query->whereIn('id', $popularProductIds);
        });
    }


}
