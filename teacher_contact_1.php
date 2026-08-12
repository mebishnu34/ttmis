
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <!--<script type="text/javascript" src="script/search_script.js"></script>-->
   <script type="text/javascript" src="script/teachercontact.js"></script>
   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<!-- Search input -->
<div class="input-group float-end">
    <input type="text" class="search form-control" placeholder="What are you looking for?">
</div>

<!-- HTML table data -->
<table class="table table-striped" id="userTbl">
<thead>
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john.doe@example.com</td>
        <td>123-456-7890</td>
    </tr>
    <tr>
        <td>Demo</td>
        <td>User</td>
        <td>user@demo.com</td>
        <td>333-333-3333</td>
    </tr>
    <tr>
        <td>Text</td>
        <td>User</td>
        <td>test@demo.com</td>
        <td>999-999-9999</td>
    </tr>
</tbody>
</table>
<script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>