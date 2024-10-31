<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Share Post</title>
    <link rel="icon" href="{{ asset('assets/logo/logo.png') }}" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>

    <div class="h-screen flex items-center justify-center ">
        {{-- <div class="flex items-center justify-center gap-x-5 "> 0--}}
            <div class="bg-white w-full h-auto py-8 flex items-center justify-center gap-2 flex-wrap">          
            @foreach($shareLinks as $platform => $link)
           
             <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" aria-label="Share on {{ ucfirst($platform) }}"  class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100">
                {!! $sociallogos[ucfirst($platform)] ?? ucfirst($platform) !!}
                Share on {{ ucfirst($platform) }}
            </a>
            @endforeach
        </div>
    </div>
</body>

</html>
