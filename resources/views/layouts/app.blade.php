<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@section('head')
    @include('layouts.head')
@show

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">

    @include('layouts.header')
    @include('layouts.sidebar')   
     
    <div class="content-wrapper">
        @yield('content')
    </div>       
       
    @include('layouts.footer')
    @include('layouts.sidebarL')
  

  @section('script')
      @include('layouts.script')
  @show
  </div>
</body>
</html>
