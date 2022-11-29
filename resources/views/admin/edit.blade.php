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
{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="{{ asset('js/jquery.json-editor.min.js') }}"></script>

<h2>Edit Json</h2>


<pre id="json-display"></pre>
<hr>
<button id="save">Save</button>
<a href="{{ route('admin') }}">Back</a>
<script type="text/javascript">
     editor = new JsonEditor('#json-display',  (<?php echo $record->json_data ?>));
     $("#save").click(function () {
         try {
             let json = editor.get()
             console.log(json)
             $.ajax({
                 url: '/save-json/{{ $record->id }}',
                 type: 'POSt',
                 headers: {
                     'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'
                 },
                 beforeSend: function (xhr) {
                     xhr.setRequestHeader('Authorization', 'Bearer t-7614f875-8423-4f20-a674-d7cf3096290e');
                 },
                 data: {
                     'json_data' : JSON.stringify(json)
                 },
                 success: function (data) {
                     console.log(data)
                     alert(data.message)
                 },
                 error: function () {
                     console.log(data)
                     alert(data.message)
                 },
             });
         }
         catch(err) {
             console.log(err)
             alert("invalid json")
         }
     });
</script>
</body>
</html>
