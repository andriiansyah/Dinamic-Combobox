<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamic Combobox</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

    <?php
        include 'koneksi.php';
    
        $query = "SELECT * FROM siswa";
        $siswa = $con->prepare($query);
        $siswa->execute();
        $res1 = $siswa->get_result();
        
    ?>


    <label for="">Pilih siswa</label>
    <select name="siswa" id="siswa">
        <option value="">Pilih siswa</option>
    </select>
    <div id="dinamic">
        <input type="text" name="nama_siswa" id="nama_siswa" readonly>
    </div>
    

    <script type="text/javascript">
    $(document).ready(function(){
      	$.ajax({
            type: 'POST',
          	url: "get_siswa.php",
          	cache: false,
          	success: function(msg){
              console.log('succes');
              $("#siswa").html(msg);
            }
        });

        $("#siswa").change(function(){
      	var siswa = $("#siswa").val();
          	$.ajax({
          		type: 'POST',
              	url: "get_siswa2.php",
              	data: {siswa: siswa},
              	cache: false,
              	success: function(msg){
                    const hasil = document.getElementById("dinamic");
                    hasil.innerHTML = msg;
                  console.log(msg);
                }
            });
        });
    });
    </script>
</body>
</html>