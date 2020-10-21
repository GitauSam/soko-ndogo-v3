<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categories\Categories;

class OrderCategoryAndTypeEdit extends Component
{
    public $categories;
    public $categoryTypes;
    public $defaultCategoryTypesDisplayed = 0;

    public $order;

    public function mount($order) {
        $this->order = $order;
    }

    public function render()
    {
        $sanitizedCategoryTypesDisplayed = 0;
        if ($this->defaultCategoryTypesDisplayed - 1 >= 0) {
            $sanitizedCategoryTypesDisplayed = $this->defaultCategoryTypesDisplayed - 1;
        }
        $this->categories = Categories::orderBy('id', 'asc')->get();
        $this->categoryTypes = $this->categories[$sanitizedCategoryTypesDisplayed]->categoryTypes;

        return view('livewire.order-category-and-type-edit');
    }
}
