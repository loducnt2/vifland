<?php

namespace App\Exports;

use App\Newsletters2;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class NewslettersExport implements FromCollection,WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Newsletters2::all();
    }
    public function headings() :array {
    	return ["id", "email","created_at"];
    }
}
