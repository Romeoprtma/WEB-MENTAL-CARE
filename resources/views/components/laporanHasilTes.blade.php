<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Table Header</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            th, td {
                font-size: 12px;
                padding: 8px;
            }
        }

        @media screen and (max-width: 480px) {
            th, td {
                font-size: 10px;
                padding: 6px;
            }

            th span {
                display: block;
                font-size: 10px;
                margin-top: 5px;
                font-weight: normal;
            }
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Nama</th>
                <th colspan="8">Hasil Tes</th>
            </tr>
            <tr>
                <th>Introvert</th>
                <th>Extrovert</th>
                <th>Sensing</th>
                <th>Intuition</th>
                <th>Thinking</th>
                <th>Feeling</th>
                <th>Judging</th>
                <th>Perceiving</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $users }}</td>
                <td>{{ $optionA1 }}</td>
                <td>{{ $optionB1 }}</td>
                <td>{{ $optionA2 }}</td>
                <td>{{ $optionB2 }}</td>
                <td>{{ $optionA3 }}</td>
                <td>{{ $optionB3 }}</td>
                <td>{{ $optionA4 }}</td>
                <td>{{ $optionB4 }}</td>
            </tr>


        </tbody>
    </table>

    <h1>Kepribadian Anda</h1>
    <table>
        <thead>
            <tr>
                <th>{{ $string1 }}</th>
                <th>{{ $string2 }}</th>
                <th>{{ $string3 }}</th>
                <th>{{ $string4 }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $choice1 }}</td>
                <td>{{ $choice2 }}</td>
                <td>{{ $choice3 }}</td>
                <td>{{ $choice4 }}</td>
            </tr>


        </tbody>
    </table>
</body>
</html>
