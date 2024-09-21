<?php

namespace App\View\Components\navigations;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title = '', public array $links = [])
    {
        $this->title = 'Main Navigation';
        $this->links =  [
            ['name' => 'Jiris', 'url' => '/jiris'],
            ['name' => 'Contacts', 'url' => '/contacts'],
            ['name' => 'Projects', 'url' => '/projects'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigations.main');
    }
}
