<html>
    <head>
    <title>Quote System</title>
    <script
      src="https://code.jquery.com/jquery-3.1.1.js"
      integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
      crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js"></script>
    <script>
        window.onload = function () {
            $.ajax({
                url: "https://learning-space-johnperry.c9users.io/quotation_system/ws/lineitems.php",
                method: 'get',
                datatype: 'json',
                success: function(data){
                    console.log(data);
                    if(data.success) {
                        for(var i=0;i<data[0].length;i++) {
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