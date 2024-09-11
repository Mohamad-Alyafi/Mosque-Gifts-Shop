<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'name' => $row['name'],
            'group' => $row['group'],
            'total_points' => $row['total_points'] >= 200 ? $row['total_points'] : 200,
            'current_points' => $row['total_points'] >= 200 ? $row['total_points'] : 200,
            'added_points' => 0,
            'barcode' => $row['barcode'],
        ]);
    }
}
