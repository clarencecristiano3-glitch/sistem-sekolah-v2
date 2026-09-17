<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusBadge extends Component
{
    public string $label;

    public string $classes;

    public function __construct(public string $status)
    {
        $normalizedStatus = strtolower(trim($status));

        [$this->label, $this->classes] = match ($normalizedStatus) {
            'aktif', 'active' => ['Aktif', 'bg-green-100 text-green-800'],
            'tidak aktif', 'inactive', 'nonaktif' => ['Tidak Aktif', 'bg-red-100 text-red-800'],
            default => [filled($status) ? ucwords($status) : 'Tidak diketahui', 'bg-slate-100 text-slate-700'],
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.status-badge');
    }
}
