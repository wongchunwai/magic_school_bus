<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
<head>
	<link rel="stylesheet" href="{{{ asset('/incube8/css/common.css') }}}" type="text/css"> 
    <title>Magic School Bus App</title>
    <meta name="viewport" content="initial-scale=1">
</head>

<body>
    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>
    
    <script type="text/javascript" src="{{{ asset('/incube8/js/jquery.min.js') }}}"></script>
	<script type="text/javascript" src="{{{ asset('/incube8/js/common.js') }}}"></script>
</body>
</html>
