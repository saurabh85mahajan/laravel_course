<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $message)
    {
        //
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
