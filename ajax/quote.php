<html>
    <head>
        <title>Quote System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- JQuery -->
        <script
          src="https://code.jquery.com/jquery-3.1.1.js"
          integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
          crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!-- Knockout -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js"></script>

        <!-- Materialize -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>

        <!-- Snap SVG -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js"></script>

        <style>
            :root {
                font-family: 'Roboto', sans-serif;
            }   
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
                                $('#out').append('<div class="row"><div class="col s6 push-s12 pull-s10">' + data[i]['line_item_id'] + ':' + data[i]['units'] + '</div></div>');
                            } else {
                                $('#out').append('<div class="row"><div class="col s6 push-s12 pull-s10 moo">' + data[i]['line_item_id'] + ':' + data[i]['units'] + '</div></div>');
                            }
                        }
                    }
                });
                // datepicker;
                $( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
            };
        </script>
    </head>
    <body>
        <div class="container">
            <div class="col s12">Multimedia Configuraator</div>
            <section id="out">
            </section>
            <input type="text" id="datepicker">
            <input type="submit" id="rights">
        </div>
    </body>
</html>