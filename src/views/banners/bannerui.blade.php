{{HTML::style('packages/solvercircle/scbanner/css/themes/default/default.css');}}
{{HTML::style('packages/solvercircle/scbanner/css/themes/light/light.css');}}
{{HTML::style('packages/solvercircle/scbanner/css/themes/dark/dark.css');}}
{{HTML::style('packages/solvercircle/scbanner/css/themes/bar/bar.css');}}
{{HTML::style('packages/solvercircle/scbanner/css/nivo-slider.css');}}

{{HTML::script('packages/solvercircle/scbanner/js/jquery.nivo.slider.js');}}

<script type="text/javascript">
    $(document).ready(function() {        
		$('#solvercircle_scbanner_slider').nivoSlider({pauseTime: {{ Solvercircle\Scbanner\SCBSSettings::get_setting(Config::get('Scbanner::config.key_interval'))*1000; }} });
    });
</script>


<div class="slider-wrapper theme-default">
    <div id="solvercircle_scbanner_slider" class="nivoSlider">            	
        @foreach($banners as $key => $value)
            <img src="{{ URL::route('image.view', array('width' => Solvercircle\Scbanner\SCBSSettings::get_setting(Config::get('Scbanner::config.key_banner_width')), 'filename' => $value->image_file_name)) }}" alt="{{ $value->name }}" />
        @endforeach
    </div>            
</div>
