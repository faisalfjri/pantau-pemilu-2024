<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Pantau Pemilu 2024</title>
    <style>
        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .intro {
            max-width: 1280px;
            margin: 1em auto;
        }

        .table-scroll {
            position: relative;
            width: 100%;
            z-index: 1;
            margin: auto;
            overflow: auto;
            height: 100vh;
        }

        .table-scroll table {
            width: 100%;
            min-width: 1280px;
            margin: auto;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-wrap {
            position: relative;
        }

        .table-scroll th,
        .table-scroll td {
            padding: 5px 10px;
            border: 1px solid #000;
            background: #fff;
            vertical-align: top;
        }

        .table-scroll thead th {
            background: #333;
            color: #fff;
            position: -webkit-sticky;
            position: sticky;
            top: 0;
        }

        /* safari and ios need the tfoot itself to be position:sticky also */
        .table-scroll tfoot,
        .table-scroll tfoot th,
        .table-scroll tfoot td {
            position: -webkit-sticky;
            position: sticky;
            bottom: 0;
            background: #666;
            color: #fff;
            z-index: 4;
        }

        a:focus {
            background: red;
        }

        /* testing links*/

        th:first-child {
            position: -webkit-sticky;
            position: sticky;
            left: 0;
            z-index: 2;
            background: #ccc;
        }

        thead th:first-child,
        tfoot th:first-child {
            z-index: 5;
        }
    </style>
</head>

<body>
    <div id="table-scroll" class="table-scroll">
        <table id="main-table" class="main-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">provinsi_kode</th>
                    <th scope="col">kabupaten_kota_kode</th>
                    <th scope="col">kecamatan_kode</th>
                    <th scope="col">kelurahan_desa_kode</th>
                    <th scope="col">tps</th>
                    <th scope="col">suara_paslon_1</th>
                    <th scope="col">suara_paslon_2</th>
                    <th scope="col">suara_paslon_3</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>
                    <td>{{ $data->provinsi_nama }}</td>
                    <td>{{ $data->kabupaten_kota_nama }}</td>
                    <td>{{ $data->kecamatan_nama }}</td>
                    <td>{{ $data->kelurahan_desa_nama }}</td>
                    <td>{{ $data->tps }}</td>
                    <td>{{ $data->suara_paslon_1 }}</td>
                    <td>{{ $data->suara_paslon_2 }}</td>
                    <td>{{ $data->suara_paslon_3 }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Footer</th>
                    <td>Footer</td>
                    <td>Footer</td>
                    <td>Footer</td>
                    <td>Footer</td>
                    <td>TPS</td>
                    <td>Footer</td>
                    <td>Footer</td>
                    <td>Footer</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>