{{-- <div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->

    <nav>
        <ul>
            @foreach($menuItems as $menu)
                <li>
                    {{ $menu['name'] }}
                    @if($menu['hasSubmenu'])
                        <ul>
                            @foreach($menu['submenus'] as $submenu)
                                <li>
                                    {{ $submenu['title'] }}
                                    @if($submenu['hasSecondSubmenu'])
                                        <ul>
                                            @foreach($submenu['secondsubmenus'] as $secondsubmenu)
                                                <li>{{ $secondsubmenu['title'] ?? 'No Title' }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</div> --}}


<!DOCTYPE html>
<html>
<head>
    <title>Logos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
<body class="bg-gray-100 p-6">
    {{-- <div class="container mx-auto">
        <i class="fab fa-font-awesome"></i>
        <h1 class="text-2xl font-bold mb-4">{{ $data['name'] }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($data['social'] as $social)
                <div class="bg-white p-4 rounded shadow-md">
                    <h2 class="text-xl font-semibold mb-2">{{ $social['sociallink'] }}</h2>
                 
                    @if ($social['use_url'] && $social['url'])
<div> {{ $social['linkaddress']  }}</div>
                    <a href="{{ $social['linkaddress'] }}" target="_blank">    <img src="{{ $social['url'] }}" alt="{{ $social['sociallink'] }} logo" class="w-24 h-24 mx-auto rounded-full object-cover"></a>
                    @elseif($social['uploaded_image'] && $social['image'])
                    <a href="{{ $social['linkaddress'] }}" target="_blank">
                        <img src="{{ $social['image'] }}" alt="{{ $social['sociallink'] }} logo" class="w-24 h-24 mx-auto rounded-full object-cover">
                    </a>

                    @elseif($social['use_svg'] && $social['html_icon'])
                    <a href="{{ $social['linkaddress'] }}" target="_blank">
                       
                    </a>
                    {!! $social['html_icon'] !!}
                    @else
                        <p class="text-gray-500">No image available</p>
                    @endif
                    <button onclick="window.location.href='{{ $social['linkaddress'] }}'" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded w-full">
                        Go to {{ $social['sociallink'] }}
                    </button>
                </div>
            @endforeach
        </div>
    </div> --}}




    <!--Footer container-->
{{-- <footer
class="flex flex-col items-center bg-zinc-50 text-center text-surface dark:bg-neutral-700 dark:text-white">
<div class="container px-6 pt-6">
  <!-- Social media icons container -->

  

  <div class="mb-6 flex justify-center space-x-2">


   
    @foreach ($data['social'] as $social)

    <a
      href="#!"
      type="button"
      class="rounded-full bg-[#3b5998] p-3 uppercase leading-normal text-white shadow-dark-3 shadow-black/30 transition duration-150 ease-in-out hover:shadow-dark-1 focus:shadow-dark-1 focus:outline-none focus:ring-0 active:shadow-1 dark:text-white"
    >
      <span class="">
        
        {!! $social['html_icon'] !!}
        @if($social['use_svg'] && $social['html_icon'])
       
       
        @endif
      </span>
    </a>

   @endforeach
  </div>
</div>

<!--Copyright section-->
<div class="w-full bg-black/5 p-4 text-center">
  © 2023 Copyright:
  <a href="https://tw-elements.com/">TW Elements</a>
</div>
</footer>
</body>
</html> --}}


<div class="px-4 my-4 w-full sm:w-auto xl:w-1/5">
    <div>
      <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Connect With Us</h2>
    </div>
  

    @foreach ($data['social'] as $social)
    <div class="bg-white p-4 rounded shadow-md">
        <h2 class="text-xl font-semibold mb-2">{{ $social['sociallink'] }}</h2>
     
        @if ($social['use_url'] && $social['url'])
<div> {{ $social['linkaddress']  }}</div>
        <a href="{{ $social['linkaddress'] }}" target="_blank">    <img src="{{ $social['url'] }}" alt="{{ $social['sociallink'] }} logo" class="w-24 h-24 mx-auto rounded-full object-cover"></a>
        @elseif($social['uploaded_image'] && $social['image'])
        <a href="{{ $social['linkaddress'] }}" target="_blank">
            <img src="{{ $social['image'] }}" alt="{{ $social['sociallink'] }} logo" class="w-24 h-24 mx-auto rounded-full object-cover">
        </a>

        @elseif($social['use_svg'] && $social['html_icon'])
        <a href="#" class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
            {!! $social['html_icon'] !!}
          </a>
       
        @else
            <p class="text-gray-500">No image available</p>
        @endif
        <button onclick="window.location.href='{{ $social['linkaddress'] }}'" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded w-full">
            Go to {{ $social['sociallink'] }}
        </button>
    </div>
@endforeach

</div>