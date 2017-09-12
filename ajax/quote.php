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
<!-- Knockout 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js"></script>
-->
<!-- Vue --> 
        <script src="https://unpkg.com/vue@2.4.2/dist/vue.js"></script>
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
            
            Vue.component('line_items', {
                template: '#lineItemTemplate'
            });
            
        </script>
        <!-- line item template -->
        <script type="text/html" id="lineItemTemplate">
            <div class="slider_item" v-bind:id="'slider_item_' + system_name">
                <div class="slider_images">
                    <img class="img_sm" v-bind:id="'img_sm_' + system_name" v-bind:src="'img/' + image_small">
                    <img class="img_me" v-bind:id="'img_me_' + system_name" v-bind:src="'img/' + image_medium">
                    <img class="img_lg" v-bind:id="'img_lg_' + system_name" v-bind:src="'img/' + image_large">
                </div>
                <div class="slider_control">
                    <label>{{system_name}}</label>
                    <input type="range" class="range_slider" v-bind:name="system_name" v-bind:id="system_name" v-bind:value="units_min" v-bind:min="units_min" v-bind:max="units_max" v-bind:step="unit_increment" onchange="slideMe(this)">
                    <output class="slider_output" v-bind:id="'slider_output_' + system_name">{{calculated_value}}</output><span>{{units}}</span>
                </div>
                <input type="hidden" v-bind:name="'slider_unit_cost_' + system_name" v-bind:id="'slider_unit_cost_' + system_name" v-bind:value="unit_cost">
                <input type="hidden" v-bind:name="'slider_unit_sm_' + system_name" v-bind:id="'slider_unit_sm_' + system_name" v-bind:value="units_small">
                <input type="hidden" v-bind:name="'slider_unit_me_' + system_name" v-bind:id="'slider_unit_me_' + system_name" v-bind:value="units_medium">
                <input type="hidden" v-bind:name="'slider_unit_lg_' + system_name" v-bind:id="'slider_unit_lg_' + system_name" v-bind:value="units_large">
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
