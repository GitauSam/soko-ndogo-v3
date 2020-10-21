<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categories\Categories;

class OrderCategoryAndType extends Component
{
    public $categories;
    public $categoryTypes;
    public $defaultCategoryTypesDisplayed = 0;

    public function setDefaultCategoryTypesDisplayed($id) {
        dd("clicked");
        $this->defaultCategoryTypesDisplayed = $id;
    }

    public function render()
    {
        $sanitizedCategoryTypesDisplayed = 0;
        if ($this->defaultCategoryTypesDisplayed - 1 >= 0) {
            $sanitizedCategoryTypesDisplayed = $this->defaultCategoryTypesDisplayed - 1;
        }
        $this->categories = Categories::orderBy('id', 'asc')->get();
        $this->categoryTypes = $this->categories[$sanitizedCategoryTypesDisplayed]->categoryTypes;

        return view('livewire.order-category-and-type');
    }
}
