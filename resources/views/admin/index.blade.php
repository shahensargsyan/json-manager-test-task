<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        body {
            margin: 0;
            padding: 0;
            width: 80%;
            margin: 50px auto 100px;
        }
        #json-input {
            display: block;
            width: 100%;
            height: 200px;
        }
        #translate {
            display: block;
            height: 28px;
            margin: 20px 0;
            border-radius: 3px;
            border: 2px solid;
            cursor: pointer;
        }
        #json-display {
            border: 1px solid #000;
            margin: 0;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="{{ asset('js/jquery.json-editor.min.js') }}"></script>

<h2>Records Table</h2>

<table>
    <tr>
        <th>id</th>
        <th>Json</th>
        <th>Actions</th>
    </tr>
    @foreach($records as $key=>$record)
        <tr>
            <td>{{ $key }}</td>
            <td><pre id="json-display-{{ $key }}"></pre></td>
            <td>
                <a href="{{ route('delete-json', $key) }}">delete</a>
                <a href="{{ route('edit-json', $key) }}">edit</a>
            </td>
        </tr>
    @endforeach
</table>

<script type="text/javascript">
    let records = ('<?php echo json_encode($records); ?>');
    let editor = [];
    @foreach($records as $key=>$record)
        editor[<?php echo $key?>] = new JsonEditor('#json-display-<?php echo $key?>',  (<?php echo $record?>));
    @endforeach

    $('#translate').on('click', function () {
        editor.load(getJson());
    });
</script>
</body>
</html>
{{--https://www.jqueryscript.net/other/Beautiful-JSON-Viewer-Editor.html--}}
