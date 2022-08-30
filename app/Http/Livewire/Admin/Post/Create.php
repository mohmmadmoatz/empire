<?php

namespace App\Http\Livewire\Admin\Post;
use App\Models\Categories;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

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
    protected $listeners = [
        'getLatitudeForInput'
   ];
    public function getLatitudeForInput($value)
    {
        if(($value))
            $this->lalatlng = $value;
    }
    public function updated($input)
    {
    }

    public function create()
    {

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Post') ])]);
        //save multiple imges
        if($this->images) {
          
            $images = array();
            foreach ($this->images as $item) {
                    $images[] = $item->store("images","public");
                    
            }
          
           
           
          
        }

        Post::create([
            'description' => $this->description,
            'latlng' => $this->lalatlng,
            'images' => $images,
            'address' => $this->address,
            'distance' => $this->distance,
            'bedroom' => $this->bedroom,
            'bathroom' => $this->bathroom,
            'catid' => $this->category_id,
            'ishome' => $this->ishome,
        ]);

        $this->reset();
    }

    public function render()
    {
      
        return view('livewire.admin.post.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Post') ])]);
    }
}
