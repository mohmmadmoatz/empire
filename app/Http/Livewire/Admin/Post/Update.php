<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $post;

    public $description;
    public $lalatlng;
    public $images;
    public $address;
    public $distance;
    public $bedroom;
    public $bathroom;
    public $ishome;
    public $category_id;
    
    protected $rules = [
        
    ];

    public function mount(Post $post){
        $this->post = $post;
        $this->description = $this->post->description;
        $this->latlng = $this->post->latlng;
        // address distance bedroom ishome category_id
        $this->address = $this->post->address;
        $this->distance = $this->post->distance;
        $this->bedroom = $this->post->bedroom;
        $this->bathroom = $this->post->bathroom;
        $this->ishome = $this->post->ishome;
        $this->category_id = $this->post->category_id;
        $this->images = $this->post->images;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Post') ]) ]);
        
        if($this->getPropertyValue('images') and is_object($this->images)) {
            $this->images = $this->getPropertyValue('images')->store('images');
        }

        $this->post->update([
            'description' => $this->description,
            'latlng' => $this->latlng,
            'images' => $this->images,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.post.update', [
            'post' => $this->post
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Post') ])]);
    }
}
