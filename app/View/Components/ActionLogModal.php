<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionLogModal extends Component
{
    public $log;

    /**
     * Create a new component instance.
     *
     * @param mixed $log
     */
    public function __construct($log)
    {
        $this->log = $log;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('backend.pages.actionlog.actionlog-modal');
    }
}
