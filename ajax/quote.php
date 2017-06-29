<html>
<head>
<title>Quote System</title>
<script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
<script>
    window.onload = function () {

        $.ajax({
        url: "https://cari.mba/line_items",
            success: function(data){
                console.log(data);
                if(data.success) {
                    for(vari=0;i<data[0].length;i++) {
                        $('#out').append(data[0][i]);
                    }
                }
            }
        });
    }


</script>
</head>
<body>
    <div id="out"></div>
</body>
</html>
