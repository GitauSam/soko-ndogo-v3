<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categories\Categories;

class OrderCategoryAndTypeEdit extends Component
{
    public $categories;
    public $categoryTypes;
    public $order;
    public $categoryTypesIndex;
    public $categoryTypesIndexBuffer;

    public function mount($order) {
        $this->order = $order;
    }

    public function render()
    {

        if ($this->categoryTypesIndexBuffer == null) {
            if($this->order->categoryType != null) {
                $this->categoryTypesIndex = $this->order->categoryType->category_id;
            } else {
                $this->categoryTypesIndex = 0;
            }
        } else {
            $this->categoryTypesIndex = $this->categoryTypesIndexBuffer;
        }

        if ($this->categoryTypesIndex - 1 > 0) {
            $this->categoryTypesIndex -= 1;
        }

        $this->categories = Categories::orderBy('id', 'asc')->get();
        $this->categoryTypes = $this->categories[$this->categoryTypesIndex]->categoryTypes;

        return view('livewire.order-category-and-type-edit');
    }
}
