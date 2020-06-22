<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Media library pro test app</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    @stack('scripts')

    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
    <livewire:styles />
</head>

<body>

<script>
    window.oldValues = @json(Session::getOldInput());
    window.errors = {!! $errors->isEmpty() ? '{}' : $errors !!};
    window.tempEndpoint = '/temp-upload';
    window.csrfToken = '{{ csrf_token() }}';
</script>

<div class="p-4">
    <div>
        @if(flash()->message)
            <div class="{{ flash()->class }}">
                {{ flash()->message }}
            </div>
        @endif
        @if($errors->any())
{{ dump($errors) }}
            {!! implode('', $errors->all('<li>:message</li>')) !!}
        @endif
        <div id="app">
            @yield('content')
        </div>
    </div>
</div>
</body>
<livewire:scripts />

<script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>
<style>.gu-mirror{position:fixed!important;margin:0!important;z-index:9999!important;opacity:.8;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";filter:alpha(opacity=80)}.gu-hide{display:none!important}.gu-unselectable{-webkit-user-select:none!important;-moz-user-select:none!important;-ms-user-select:none!important;user-select:none!important}.gu-transit{opacity:.2;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";filter:alpha(opacity=20)}</style>

<script>
    dragula(querySelectorAllArray('.dragula-container'), {
        moves (el, source, handle) {
            if (!handle) {
                    return false;
                }

            return Boolean(handle.closest('.dragula-handle'));
        }
    });


    function querySelectorAllArray(selector){
        return Array.prototype.slice.call(
            document.querySelectorAll(selector), 0
        );
    }
</script>
</html>
