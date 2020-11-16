<?php

namespace App\Imports;

use App\Newsletters2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class NewsLettersImport implements ToModel,WithHeadingrow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow() : int
    {
        return 1;
    }
    public function model(array $row)
    {
        return new Newsletters2([
            //
            'id'=>$row['id'],
            'email'=>$row['email'],
            'create_at'=>$row['created_at']

        ]);
    }
}
