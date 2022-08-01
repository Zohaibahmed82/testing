
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <style>
        #mar {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <form action="/insert" method="POST">
        @csrf
        <table border="4" width="50%">
            <tr>
                <td>Product Name</td>
                <td>Product Date</td>
                <td>Product type</td>
                <td>Product insert</td>
            </tr>
            <tr>
                <td><input type="text" name="name" placeholder="Enter a product name"></td>
                <td><input type="date" name="date"></td>
                <td><input type="text" name="type" placeholder="Enter a product type"></td>
                <td><input type="submit" value="insert"></td>
            </tr>
        </table>
        <table border="6" width='100%' id="mar">
            <tr>
                <td>id</td>
                <td>
                    Product Name</td>
                <td>Product Date</td>
                <td>Product type</td>
                <td>Product Delete</td>
                <td>Edit</td>

            </tr>

            @foreach($product as $key=>$product)

            <tr>
                <td>{{$product->id}}</td>
                <td><input type="text" id="name{{$product->id}}" readonly="true" name="name[]"
                        value="{{$product->p_name}}"></td>
                <td><input type="text" id="date{{$product->id}}" readonly="true" name="date[]"
                        value="{{$product->date}}"></td>
                <td><input type="text" id="type{{$product->id}}" readonly="true" name="type[]"
                        value="{{$product->type}}"></td>
                <td><a href="delete/{{$product->id}}">Delete</a></td>

                <td>
                    <a onclick="editName({{$product->id}});"> edit</a>

                    <input type="button" onClick="return update_data({{$product->id}})"
                        style="border: 1px solid; padding:5px display:none" value="Update">
                </td>
            </tr>
            @endforeach

        </table>
    </form>





    <script>
        function editName(id){
var inputname="name"+id;
alert(inputname);
var test=document.getElementById(inputname).readOnly=false;
var inputdate="date"+id;
alert(inputdate);
var test=document.getElementById(inputdate).readOnly=false;
var inputtype="type"+id;
alert(inputtype);
var test=document.getElementById(inputtype).readOnly=false;
        }
        function update_data(id){
            var name = $('#name'+id).val();
            var type = $('#type'+id).val();
            var date = $('#date'+id).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    'name':name,
                    'type':type,
                    'date':date,
                },
                url: "{{ url('update') }}"+'/'+id,
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    console.log(data)
                  alert("Saved");

                },
                error: function (data) {
                    console.log('Error:', data);
                    alert("error");
                }
            });
        }
    </script>
</body>

</html>
