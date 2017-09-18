// BUILD THE DOM
Vue.component('line_item', {
    template: '#lineItemTemplate',
    data: function() {
        return { ajaxdata : [] }
    },
    mounted: function() {
        this.fetchajax();
    },
    methods: {
        fetchajax: function() {
            $.ajax({
                url: "../ws/lineitems.php",
                method: 'get',
                datatype: 'json',
                success: function(res) {
                    this.ajaxdata = res;
                }.bind(this),
                error: function(err) {
                    console.log(err);
                }
            });
        },
        calcSlider: function(itemName) {
            console.log(itemName);
        }
    }
});

// MONITOR THE DOM
new Vue({
    el: '#vue_out',
    data: {
        grand_total: 0
    },
    methods: {
        doGrandTotal: function() {
            var total = 0;
            var sliders = document.getElementsByClassName('range_slider');
            for(loop=0;loop<sliders.length;loop++) {
                total += (sliders[loop].value * 
                    document.getElementById('slider_unit_cost_' + sliders[loop].id).value); 
            }
            this.grand_total = total;
        },
    }
});
