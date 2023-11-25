<?php

namespace App\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        $categories = ModelsCategory::all();
        return view('livewire.category', compact('categories'));
    }
}
