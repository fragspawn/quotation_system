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
        <script src="quote.js" defer></script>
        <!-- line item template -->
        <script type="text/html" id="lineItemTemplate">
    <div id="rootelem">
        <div class="row" v-for="ajaxrow in ajaxdata">
            <div class="slider_item" v-bind:id="'slider_item_' + ajaxrow.system_name">
                <div class="slider_images">
                    <img class="img_sm" v-bind:id="'img_sm_' + ajaxrow.system_name" v-bind:src="'img/' + ajaxrow.image_small">
                    <img class="img_me" v-bind:id="'img_me_' + ajaxrow.system_name" v-bind:src="'img/' + ajaxrow.image_medium">
                    <img class="img_lg" v-bind:id="'img_lg_' + ajaxrow.system_name" v-bind:src="'img/' + ajaxrow.image_large">
                </div>
                <div class="slider_control">
                    <label>{{ ajaxrow.system_name }}</label>
                    <input v-on:change="calcSlider(ajaxrow.system_name)" type="range" class="range_slider" v-bind:name="ajaxrow.system_name" v-bind:id="ajaxrow.system_name" v-bind:value="ajaxrow.units_min" v-bind:min="ajaxrow.units_min" v-bind:max="ajaxrow.units_max" v-bind:step="ajaxrow.unit_increment">
                    <output class="slider_output" v-bind:id="'slider_output_' + ajaxrow.system_name"></output>{{'slider_output_' + ajaxrow.system_name }}<span>{{ ajaxrow.units }}</span>
                </div>
                <input type="hidden" v-bind:name="'slider_unit_cost_' + ajaxrow.system_name" v-bind:id="'slider_unit_cost_' + ajaxrow.system_name" v-bind:value="ajaxrow.unit_cost">
                <input type="hidden" v-bind:name="'slider_unit_sm_' + ajaxrow.system_name" v-bind:id="'slider_unit_sm_' + ajaxrow.system_name" v-bind:value="ajaxrow.units_small">
                <input type="hidden" v-bind:name="'slider_unit_me_' + ajaxrow.system_name" v-bind:id="'slider_unit_me_' + ajaxrow.system_name" v-bind:value="ajaxrow.units_medium">
                <input type="hidden" v-bind:name="'slider_unit_lg_' + ajaxrow.system_name" v-bind:id="'slider_unit_lg_' + ajaxrow.system_name" v-bind:value="ajaxrow.units_large">
            </div>
        </div>
    </div>
        </script>
    </head>
    <body>
        <div class="container">
            <div class="col s12">Multimedia Configuraator</div>
            <section id="vue_out">
                <line_item>
                </line_item>
                {{ grand_total }}
            </section>
        </div>
    </body>
</html>
