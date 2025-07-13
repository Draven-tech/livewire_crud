<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Product $product;
    public $code;
    public $name;
    public $quantity;
    public $price;
    public $description;
    public $newImage;


    protected function rules()
    {
        return [
            'code' => 'required|string|max:50|unique:products,code,'.$this->product->id,
            'name' => 'required|string|max:250',
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'newImage' => 'nullable|image|max:2048'
        ];
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->description = $product->description;
    }

    public function update()
    {
        $validated = $this->validate();

        if ($this->newImage) {
            // Delete old image if exists
            if ($this->product->image) {
                Storage::disk('public')->delete($this->product->image);
            }
            $validated['image'] = $this->newImage->store('products', 'public');
        }

        $this->product->update($validated);

        session()->flash('message', 'Product updated successfully.');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.products.edit');
    }
}