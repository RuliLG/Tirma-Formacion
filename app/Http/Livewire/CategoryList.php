<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{
    public string $query = '';

    public function render()
    {
        $categories = Category::query()
            ->when(!empty($this->query), function ($query) {
                $query->where('name', 'LIKE', '%' . $this->query . '%');
            })
            ->get();
        return view('livewire.category-list', [
            'categories' => $categories,
        ]);
    }
}
