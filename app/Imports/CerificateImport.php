<?php

namespace App\Imports;

use App\Certificate;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;

class CerificateImport implements ToModel,
WithChunkReading,
WithValidation,
SkipsOnFailure
{
    use Importable ,SkipsFailures;
    public function model(array $row)
    {
        if ($row[1] == null || $row[2] == null ) {
            abort(422,'column not present');
        }
        if ($row[1] !== 'course_name' ) {

            return new Certificate([
                'course_name'=> $row[1],
                'course_code'=> $row[2],
                'student_name'=> $row[3],
                'student_age'=> $row[4],
                'skill'=> $row[5],
            ]);
        }

    }
    public function chunkSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [

            '3' => function($attribute, $value, $onFailure) {
                if ($value == null) {
                    $onFailure('student name is empty' );
                }
            },
            '4' => function($attribute, $value, $onFailure) {
                if ($value == null) {
                    $onFailure('student age is empty ' );
                }
            },
            '5' => function($attribute, $value, $onFailure) {
                if ($value == null) {
                    $onFailure('skill is empty ' );
                }
            }
        ];
    }


}
