@section('head')
    @parent

    <!--
    <link rel="stylesheet" href="css/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    -->
    
    {{HTML::style('packages/solvercircle/scbanner/css/themes/default/default.css');}}
    {{HTML::style('packages/solvercircle/scbanner/css/themes/light/light.css');}}
    {{HTML::style('packages/solvercircle/scbanner/css/themes/dark/dark.css');}}
    {{HTML::style('packages/solvercircle/scbanner/css/themes/bar/bar.css');}}
    {{HTML::style('packages/solvercircle/scbanner/css/nivo-slider.css');}}
    
    

   <!-- 
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    -->
    
   {{HTML::script('packages/solvercircle/scbanner/js/jquery.nivo.slider.js');}}
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('#slider').nivoSlider({width:200});
    });
    </script>
@stop

@section('content')
<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">            	
        @foreach($banners as $key => $value)
            <img src="{{ URL::route('image.view', array('width' => Solvercircle\Scbanner\SCBSSettings::get_setting(Config::get('Scbanner::config.key_banner_width')), 'filename' => $value->image_file_name)) }}" alt="{{ $value->name }}" />
        @endforeach
    </div>            
</div>
@stop