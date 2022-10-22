<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OmsetExport implements FromView
{
    protected $omsets;

    function __construct($omsets)
    {
        $this->omsets = $omsets;
    }

    public function view(): View
    {
        return view('exports.excel', [
            'omsets' => $this->omsets
        ]);
    }
}
