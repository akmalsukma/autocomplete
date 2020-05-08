<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocomplete</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
    #siswaList{
        position : absolute;
        width: 94%;
        max-width: 100%;
        cursor: pointer;
        overflow-y: auto;
        max-height: 400px;
        box-sizing: border-box;
        z-index: 1001;
    }
    .link-class:hover{
        cursor:pointer;
    }
    
    </style>
</head>
<body class="bg-light">
<div class="container">
      <h3 align="center" class="mt-3 mb-5">Autocomplete</h3>
        <div class="col-sm-6 offset-sm-3">
          <input type="text"  id="namasiswa" class="form-control" placeholder="Nama Siswa" />
          <div>
            <ul class="list-group" id="siswaList"></ul>
          </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#namasiswa').keyup(function () { 
                let namasiswa  = $('#namasiswa').val();
                    $.ajax({
                        type: "POST",
                        url: "autocomplete.php",
                        data: {namasiswa:namasiswa},
                        success: function (data) {
                            
                            $.each(JSON.parse(data), function(key, value){ 
                                 $('#siswaList').append(
                                     `<li class="list-group-item link-class">
                                      <img src="icons8-administrator-male-40.png" height="40px" width="40px">
                                      <span class="nama">`+value.namasiswa+`</span>
                                      <span class="text-muted" style="float: right;">`+value.alamat+`</span>
                                      </li>`
                                 );
                            });
                        }
                    });
                    
                    });    
            
            });
            $('#siswaList').on('click', 'li', function () {
                let namasiswa = $(this).children('.nama').text();

                $('#namasiswa').val(namasiswa);
                $('#siswaList').html('');
            });

    </script>
    

</body>
</html>