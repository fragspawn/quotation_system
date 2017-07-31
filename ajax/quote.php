<html>
    <head>
    <title>Quote System</title>
    <script
      src="https://code.jquery.com/jquery-3.1.1.js"
      integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
      crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        .moo {
            background: lightblue;
        }
    </style>
    <script>
        window.onload = function () {
            $.ajax({
                url: "../ws/lineitems.php",
                method: 'get',
                datatype: 'json',
                success: function(data){
                    console.log(data);
                    for(var i=0;i<data.length;i++) {
                        if(i % 2 > 0) {
                            $('#out').append('<p>' + data[i]['line_item_id'] + ':' + data[i]['units'] + '</p>');
                        } else {
                            $('#out').append('<p class="moo">' + data[i]['line_item_id'] + ':' + data[i]['units'] + '</p>');
                        }
                        console.log(i % 2);
                    }
                }
            });
            // datepicker;
            $( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
        }
    </script>
    </head>
    <body>
        <div id="out"></div>
        <input type="text" id="datepicker">
    </div>
    </body>
</html>
