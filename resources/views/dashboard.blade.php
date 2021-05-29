<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DashBoard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
       
    </head>
    <body class="antialiased">
        <form method="get" action="{{route('dashboard.statics.search')}}" id="filterform">
            <label>Search with Dates : </label><input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
            <input type="submit" name="submit">
            <input type="hidden" value="{{ csrf_token() }}">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Website Id</th>
                    <th>Date</th>
                    <th>No.chats</th>
                    <th>missedChats</th>
                    
                </tr>
            </thead>
            <tbody>
                @if(!is_null($static))
                    @php $i=1;@endphp
                    @foreach($static as $key =>$value)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$value->websiteId}}</td>
                        <td>{{$value->date}}</td>
                        <td>{{$value->chats}}</td>
                        <td>{{$value->missedChats}}</td>
                    </tr> 
                     @php $i++;@endphp
                    @endforeach
                @else
                    <tr>Record not found</tr>
                @endif  
            </tbody>
           
        </table>
    </body>
    </form>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

<script>
    $(document).ready(function(){
         $('#example').DataTable();

         $(".applyBtn").click(function(){
            alert("21212");
            $("#filterform").submit();
            alert("submite");
         })
    })
</script>

<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker();
});

</script>