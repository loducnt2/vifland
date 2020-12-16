<?php

namespace App\Imports;

use App\Newsletters2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\OnEachRow;

class NewsLettersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $exists = Newsletters2::where('email',$row['email'])->first();
                if ($exists) {
                    // dd("Dữ liệu đã tồn tại");
                   $result =  Newsletters2::updateOrCreate(['email'=>$row['email']],
                    ['id'=>$row['id'],
                    'email'=>$row['email'],

                    'IP_Location'=>$row["location"],
                    'ID_City'=>$row["cityid"]]);
                    // dd($result);
                }
                else{
                    // dd("Dữ liệu đéo có tồn tại");
                    return new Newsletters2([

                        // nếu record có tồn tại

                        'id'=>$row['id'],
                        'email'=>$row['email'],
                        // 'created_at'=>$row[2],
                        // 'updated_at'=>$row[3],
                        'IP_Location'=>$row["location"],
                        'ID_City'=>$row["cityid"],
                    ]);
                }

    }
}
