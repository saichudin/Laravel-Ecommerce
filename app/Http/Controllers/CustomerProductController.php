<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Konekt\AppShell\Http\Controllers\BaseController;
use Vanilo\Category\Models\TaxonomyProxy;
use Vanilo\Product\Contracts\Product;
use Vanilo\Product\Models\ProductProxy;
use Vanilo\Product\Models\ProductStateProxy;
use Vanilo\Framework\Contracts\Requests\CreateProduct;
use Vanilo\Framework\Contracts\Requests\UpdateProduct;
use Vanilo\Properties\Models\PropertyProxy;
use Vanilo\Framework\Http\Controllers\ProductController;
use Auth;
use App\User;

class CustomerProductController extends Controller
{
    //
    public function index()
    {
        //$user->givePermissionTo('edit products');
        //$users = User::permission('edit products')->get();
        //dd($users);
        return view('customer.product', [
            'products' => ProductProxy::where('user_id',auth()->user()->id)->paginate(100)
        ]);
    }

    public function show(Product $product)
    {
        return view('customer.product.show', [
            'product'    => $product,
            'taxonomies' => TaxonomyProxy::all(),
            'properties' => PropertyProxy::all()
        ]);
    }

    public function create()
    {
        return view('customer.product.create', [
            'product' => app(Product::class),
            'states'  => ProductStateProxy::choices()
        ]);
    }

    public function store(CreateProduct $request)
    {
        try {
            $productArray = $request->except('images');
            $productArray['user_id'] = auth()->user()->id;
            $product = ProductProxy::create($productArray);
            flash()->success(__(':name has been created', ['name' => $product->name]));

            try {
                if (!empty($request->files->filter('images'))) {
                    $product->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection();
                    });
                }
            } catch (\Exception $e) { // Here we already have the product created
                flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

                return redirect()->route('vanilo.product.edit', ['product' => $product]);
            }
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('customer.product.index'));
    }

    public function edit(Product $product)
    {
        return view('customer.product.edit', [
            'product'    => $product,
            'states'     => ProductStateProxy::choices()
        ]);
    }

    public function update(Product $product, UpdateProduct $request)
    {
        try {
            $product->update($request->all());

            flash()->success(__(':name has been updated', ['name' => $product->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('customer.product.index'));
    }

    public function destroy(Product $product)
    {
        try {
            $name = $product->name;
            $product->delete();

            flash()->warning(__(':name has been deleted', ['name' => $name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back();
        }

        return redirect(route('customer.product.index'));
    }

}
