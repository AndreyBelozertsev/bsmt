<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->validated());

        return response()->streamDownload(
            function () use($product) {
                echo QrCode::size(300)
                    ->generate(route('product.show',['id' => $product->id,'activated']));
            },
            "{$product->id}.svg",
            [
                'Content-Type' => 'image/svg+xml',
            ]
        );
    }

    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $activated = false;

        if($request->has('activated') && !$product->activated_at) {
            $warranty = (isset($product->model->warranty) && $product->model->warranty) ? $product->model->warranty : 24;
            $product->activated_at = Carbon::now();
            $product->expaire_at = Carbon::now()->addMonths($warranty);
            session()->flash('toast', [
                'type' => 'success',
                'message' => 'Изделие успешно активировано',
            ]);

            $product->save();
            $activated = true;
        }

        return view('pages.product.show', ['product'=> $product, 'activated'=> $activated]);
    }

}
