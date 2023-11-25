<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;

use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    
    public $search;
    public $radioStatus;

    public function updatingSearch(){//este metodo recetea la paginacion y la busqueda se haga en todo
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
                        -> where('name', 'LIKE', '%' . $this->search . '%')
                        ->when($this->radioStatus, function ($query) {
                            return $query->where('status', $this->radioStatus);
                        })
                        -> latest('id')
                        ->paginate();
       
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
