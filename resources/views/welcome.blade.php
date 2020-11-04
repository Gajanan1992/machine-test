<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    </head>
    <body>
        <div class="container">
            @if (session('success'))
            <div class="alert alert-danger">{{ session('success') }}</div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session()->has('failures'))
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Skipped rows</h5>
                        <table class="table table-warning">
                            <thead>
                                <tr>
                                    <th>Row</th>
                                    <th>Error Message</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session()->get('failures') as $item)
                                <tr>
                                    <td>Row no {{ $item->row() }} skipped</td>
                                    <td>
                                        <ul>
                                            @foreach ($item->errors() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $item->values() [$item->attribute()] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <ul>

                        </ul>
                    </div>
                </div>
            @endif
            <div class="card mt-5">
                <div class="card-header">
                    <h5 class="card-title">Import Cerificates</h5>
                </div>
                <div class="card-body">
                    <form action="/import" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Import File</label>
                            <input id="file" class="form-control" type="file" name="csv_file">
                            @error('csv_file')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
