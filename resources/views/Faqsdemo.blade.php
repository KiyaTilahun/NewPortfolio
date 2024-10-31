<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content=
"width=device-width, initial-scale=1">
    <title>Accordion</title>
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        crossorigin="anonymous" integrity=
"sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN">
</head>

<body>
    <div class=
"container rounded h-75 w-50 m-5 p-5 text-light bg-success">
        <h1>FAQ</h1>
        <div class="accordion" id="accordionExample">
         
            @foreach($faqs as $index => $faq)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $faq->is_active ? 'true' : 'false' }}"
                        aria-controls="collapse{{ $index }}">
                    {{ $faq->question }}
                </button>
            </h2>
            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $faq->is_active ? 'show' : '' }}"
                 aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {!! $faq->answer !!}
                </div>
            </div>
        </div>
    @endforeach
        </div>
    </div>

    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity=
"sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
</body>

</html>
