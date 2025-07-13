<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; // Keep only this

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('message', 'Product deleted successfully.');
    }

    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::query()
                ->select(['id', 'code', 'name', 'quantity', 'price', 'image'])
                ->latest()
                ->paginate(5)
        ]);
    }
}