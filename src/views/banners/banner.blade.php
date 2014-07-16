@section('head')
    @parent

   
    
    
@stop

@section('content')
<div style="width:{{ Solvercircle\Scbanner\SCBSSettings::get_setting(Config::get('Scbanner::config.key_banner_width')) }}px">
{{ Solvercircle\Scbanner\BannerUI::display(); }}
</div>
@stop