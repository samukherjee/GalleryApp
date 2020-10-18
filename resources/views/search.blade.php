<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>typeahead.js</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
  <body>
    <h2>Typeahead.js Remote + Prefetch</h2>
    
    <label>Search Tags:</label>
    
    <div class="w-1/2 border-2 border-red-500">
      <x-inputs.taginput type="text" id="my_search" name="search" autocomplete="off" spellcheck="false"></x-inputs.taginput>
    </div>

    <script id="result-template" type="text/x-handlebars-template">
      <div class="w-full py-1 px-5 bg-white hover:bg-blue-500">
        @{{name}} 
      </div>
    </script>

    <script id="empty-template" type="text/x-handlebars-template">
      <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
    </script>

    <script src="{{ asset('js/handlebars.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/typeahead-config.js') }}"></script>
</body>
</html>