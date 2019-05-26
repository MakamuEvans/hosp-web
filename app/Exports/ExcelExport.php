<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExcelExport implements FromView, ShouldAutoSize
{
    use Exportable;
    private $key;
    private $data;
    private $view;

    public function __construct($view, $key, $data)
    {
        $this->key = $key;
        $this->data = $data;
        $this->view = $view;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        // TODO: Implement view() method.
        return \view($this->view, [$this->key=>$this->data]);
    }
}
