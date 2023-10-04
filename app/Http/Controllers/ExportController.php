<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TableExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportTable()
    {
        return Excel::download(new TableExport, 'table.xlsx');
    }

}
