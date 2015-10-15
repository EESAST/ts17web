<?php

/* @var $this yii\web\View */

$this->title = 'Eat At Tsinghua';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <br/>
    <div class="am-slider am-slider-default" style="height: 50%;width: 70%;margin: auto" data-am-flexslider id="demo-slider-0">
        <ul class="am-slides">
            <li><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg" /></li>
            <li><img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" /></li>
            <li><img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" /></li>
            <li><img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" /></li>
            <li><img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" /></li>
        </ul>
    </div>
    <script>
        $('.am-slider').flexslider();
        $(function() {
            var $slider = $('#demo-slider-0');
            var counter = 0;
            var getSlide = function() {
                counter++;
                return '<li><img src="http://s.amazeui.org/media/i/demos/bing-' +
                    (Math.floor(Math.random() * 4) + 1) + '.jpg" />' +
                    '<div class="am-slider-desc">动态插入的 slide ' + counter + '</div></li>';
            };

            $('.js-demo-slider-btn').on('click', function() {
                var action = this.getAttribute('data-action');
                if (action === 'add') {
                    $slider.flexslider('addSlide', getSlide());
                } else {
                    var count = $slider.flexslider('count');
                    count > 1 && $slider.flexslider('removeSlide', $slider.flexslider('count') - 1);
                }
            });


        });
    </script>
</div>
