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
            #out div:nth-child(even) {
                background: lightblue;
            }
            #out div:nth-child(odd) {
                background: bisque;
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
                            $('#out').append('<div class="col s6 push-s12 pull-s10">' + data[i]['line_item_id'] + ':' + data[i]['units'] + '</div>');
                        }
                    }
                });
                // datepicker;
                $( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
            };
        </script>
        <!-- line item template -->
        <script type="text/html" id="lineItemTemplate">
            <div class="slider_item" id="slider_item_cpu_cores">
                <div class="slider_images">
                    <img class="img_sm" id="img_sm_cpu_cores" src="http://placehold.it/150x150" style="display: none;">
                    <img class="img_me" id="img_me_cpu_cores" src="http://placehold.it/200x200" style="display: none;">
                    <img class="img_lg" id="img_lg_cpu_cores" src="http://placehold.it/300x300" style="display: block;">
                    <img class="img_hu" id="img_hu_cpu_cores" src="&lt;br /&gt;&#10;&lt;b&gt;Notice&lt;/b&gt;:  Undefined index: image_massive in &lt;b&gt;/home/developer/public_html/quotation_system/quotepage.php&lt;/b&gt; on line &lt;b&gt;68&lt;/b&gt;&lt;br /&gt;&#10;" style="display: none;">
                </div>
                <div class="slider_control">
                    <label>cpu_cores</label>
                    <input type="range" class="range_slider" name="cpu_cores" id="cpu_cores" value="2" min="2" max="16" step="2" onchange="slideMe(this)">
                    <output class="slider_output" id="slider_output_cpu_cores">6</output><span>cores</span>
                </div>
                <input type="hidden" name="slider_unit_cost_cpu_cores" id="slider_unit_cost_cpu_cores" value="100">
                <input type="hidden" name="slider_unit_sm_cpu_cores" id="slider_unit_sm_cpu_cores" value="2">
                <input type="hidden" name="slider_unit_me_cpu_cores" id="slider_unit_me_cpu_cores" value="4">
                <input type="hidden" name="slider_unit_lg_cpu_cores" id="slider_unit_lg_cpu_cores" value="8">
                <input type="hidden" name="slider_unit_hu_cpu_cores" id="slider_unit_hu_cpu_cores" value="<br />
            </div>
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
