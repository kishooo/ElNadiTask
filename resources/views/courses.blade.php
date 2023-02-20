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

<h2>My Courses</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for id.." title="Type in a id">
<input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
  <th style="width:20%;">code</th>
    <th style="width:30%;">Name</th>
    <th style="width:40%;">Description</th>
    <th style="width:40%;">action</th>
  </tr>
  @foreach($courses as $course)
  <tr id="{{$course->id}}">
  <td>{{$course->id}}</td>
    <td>{{$course->Name}}</td>
    <td>{{$course->Description}}</td>
    <td><button  class="remove button button4" data-product="{{$course->id}}" type="button" id="remove">remove</button></td>
    <form action="edit/{{$course->id}}" method="get">
      <td><button class="button button4" type="submit" id="edit">edit</button></td>
    </form>
    <form action="show/{{$course->id}}" method="get">
      <td><button class="button button4" type="submit" id="edit">show students</button></td>
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
            url:"{{ route('removeCourse') }}",
            data:{ productId:productId,"_token": "{{ csrf_token() }}"},
            success:function(data){
              console.log(data);
              document.getElementById(productId).remove();
              
            }
          });
        });
      });

</script>

</body>
</html>
