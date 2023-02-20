<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

</style>
</head>
<body>

<h2>My Students</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for id.." title="Type in a id">
<input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for names.." title="Type in a name">
<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for email.." title="Type in a email">

<table id="myTable">
  <tr class="header">
  <th style="width:20%;">id</th>
    <th style="width:30%;">Name</th>
    <th style="width:40%;">Email</th>
    <th style="width:20%;">level</th>
    <th style="width:40%;">action</th>
  </tr>
  @foreach($students as $student)
  <tr id="{{$student->id}}">
  <td>{{$student->id}}</td>
    <td>{{$student->FullName}}</td>
    <td>{{$student->Email}}</td>
    <td>{{$student->Level}}</td>
    <td><button  class="remove button button4" data-product="{{$student->id}}" type="button" id="remove">remove</button></td>
    <form action="edit/{{$student->id}}" method="get">
      <td><button class="button button4" type="submit" id="edit">edit</button></td>
    </form>
  </tr>
  @endforeach
  
</table>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$(document).ready(function(){
        $('.remove').click(function (event) {
          
          var productId =$(this).data('product');
          $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            async:'false',
            type:'Post',
            url:"{{ route('remove') }}",
            data:{ productId:productId,"_token": "{{ csrf_token() }}"},
            success:function(data){
              console.log(productId);
              document.getElementById(productId).remove();
              
            }
          });
        });
      });

</script>

</body>
</html>
