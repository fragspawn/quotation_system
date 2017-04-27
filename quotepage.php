<html>
    <head>
    <link rel="stylesheet" href="quotepage.css">
    <script>
        window.onload = function() {
            calculate_total();
        }

        function slideMe(slider) {
            hide_all_images(slider);
            document.getElementById('slider_output_' + slider.id).innerHTML = slider.value;

            if(Number(slider.value) <= Number(document.getElementById('slider_unit_sm_' + slider.id).value)) {
                document.getElementById('img_sm_' + slider.id).style.display = 'block';
            }
            if(Number(slider.value) > Number(document.getElementById('slider_unit_sm_' + slider.id).value) &&
               Number(slider.value) < Number(document.getElementById('slider_unit_me_' + slider.id).value)) {
                document.getElementById('img_me_' + slider.id).style.display = 'block';
            }
            if(Number(slider.value) >= Number(document.getElementById('slider_unit_me_' + slider.id).value) &&
               Number(slider.value) < Number(document.getElementById('slider_unit_lg_' + slider.id).value)) {
                document.getElementById('img_lg_' + slider.id).style.display = 'block';
            }
            if(Number(slider.value) >= Number(document.getElementById('slider_unit_lg_' + slider.id).value) &&
               Number(slider.value) < Number(document.getElementById('slider_unit_hu_' + slider.id).value)) {
                document.getElementById('img_lg_' + slider.id).style.display = 'block';
            }            
            if(Number(slider.value) >= Number(document.getElementById('slider_unit_hu_' + slider.id).value)) {
                document.getElementById('img_hu_' + slider.id).style.display = 'block';
            }
            calculate_total();
        }

        function calculate_total() {
            var totalVal = 0; 
            var subTot = 0;
            var class_of_sliders = document.getElementsByClassName('item_range_element');
            for(i=0;i<class_of_sliders.length;i++) {
                subTot = class_of_sliders[i].value * document.getElementById('slider_unit_cost_' + class_of_sliders[i].id).value; 
                totalVal += subTot;
            } 
            document.getElementById('quote_total').innerHTML = 'TOTAL = $' + totalVal.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
        }

        function hide_all_images(slider) {
            document.getElementById('img_sm_' + slider.id).style.display = 'none';
            document.getElementById('img_me_' + slider.id).style.display = 'none';
            document.getElementById('img_lg_' + slider.id).style.display = 'none';
            document.getElementById('img_hu_' + slider.id).style.display = 'none';
        }
    </script>
    </head>
    <body>
      <form action="submit.php" method="POST">
<?php
    $db = new PDO("mysql:host=localhost;dbname=quotesys;charset=utf8","root","");
    $sql = "SELECT * FROM line_item";
    $sth = $db->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();
    foreach($result as $row) {
?>
    <div class="slider_item" id="slider_item_<?php echo $row['system_name']; ?>">
        <div class="slider_images">
            <img class="img_sm" id="img_sm_<?php echo $row['system_name']; ?>" src="<?php echo $row['image_small']; ?>"/>
            <img class="img_me" id="img_me_<?php echo $row['system_name']; ?>" src="<?php echo $row['image_medium']; ?>"/>
            <img class="img_lg" id="img_lg_<?php echo $row['system_name']; ?>" src="<?php echo $row['image_large']; ?>"/>
            <img class="img_hu" id="img_hu_<?php echo $row['system_name']; ?>" src="<?php echo $row['image_massive']; ?>"/>
        </div>
        <div class="slider_control">
            <label><?php echo $row['system_name']; ?></label>
            <input type="range" class="range_slider" name="<?php echo $row['system_name']; ?>" id="<?php echo $row['system_name']; ?>" value="<?php echo $row['units_min']; ?>"
                min="<?php echo $row['units_min']; ?>" max="<?php echo $row['units_max']; ?>" step="<?php echo $row['unit_increment']; ?>"
                onChange="slideMe(this)">
            <output class="slider_output" id="slider_output_<?php echo $row['system_name']; ?>"><?php echo $row['units_min']; ?></output><span><?php echo $row['units']; ?></span>
        </div>
        <input type="hidden" name="slider_unit_cost_<?php echo $row['system_name']; ?>" id="slider_unit_cost_<?php echo $row['system_name']; ?>" value="<?php echo $row['unit_cost']; ?>">
        <input type="hidden" name="slider_unit_sm_<?php echo $row['system_name']; ?>" id="slider_unit_sm_<?php echo $row['system_name']; ?>" value="<?php echo $row['units_small']; ?>">
        <input type="hidden" name="slider_unit_me_<?php echo $row['system_name']; ?>" id="slider_unit_me_<?php echo $row['system_name']; ?>" value="<?php echo $row['units_medium']; ?>">
        <input type="hidden" name="slider_unit_lg_<?php echo $row['system_name']; ?>" id="slider_unit_lg_<?php echo $row['system_name']; ?>" value="<?php echo $row['units_large']; ?>">
        <input type="hidden" name="slider_unit_hu_<?php echo $row['system_name']; ?>" id="slider_unit_hu_<?php echo $row['system_name']; ?>" value="<?php echo $row['units_massive']; ?>">
    </div>
</label>
<?php
} //endfor
?>
  <input type="submit" value="submit">
</form>
<div id="quote_total"></div>
</body>
</html>
