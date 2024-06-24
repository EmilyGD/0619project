<?php

namespace App\Livewire\Backend\Share;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Header extends Component
{

    public $menu = [
        [
            "title" => "個人資料",
            "routeName" => "profile.show",
            "params" => null,
            "showMenu" => true,
        ],
        [
            "title" => "Home",
            "routeName" => "dashboard",
            "params" => null,
            "showMenu" => true,
        ],
    ];

    public $title = '';
    public $currentRouteName;


    public function mount()
    {
        $this->currentRouteName = Route::currentRouteName();

        foreach ($this->menu as $item) {
            if ($item['routeName'] == Route::currentRouteName()) {
                $this->title = $item['title'];
            }
        }
    }

    public function render()
    {
        return view('livewire.backend.share.header');
    }
}
