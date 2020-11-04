<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Imports\CerificateImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CertificateController extends Controller
{
    public function importCertificate(Request $request){
        $this->validate($request,[
            'csv_file'=> 'required',
        ]);
        try {
            $file = $request->csv_file;
            $import = new CerificateImport();
            $import->import($file);
            $failures = $import->failures();
            if (count($failures) > 0) {
                return back()->withFailures($failures);
            }
            return back()->withSuccess('Certificates imported successfully');

        } catch (\Exception $e) {
            return back()->withError('Course name or Course code is empty');
            // dd('errors',$e);
        }

    }

}
