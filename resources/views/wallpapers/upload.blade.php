@extends('layouts.app')

@section('head')
  <link rel="stylesheet" href="{{ url('/css/gallery.css') }}">
  <link rel="stylesheet" href="{{ url('/css/button.css') }}">
@endsection

@section('script')
  <script src="{{ asset('js/jquery.js') }}" defer></script>
  <script src="{{ asset('js/dropzone.js') }}" defer></script>
  <script src="{{ asset('js/dropzone-config.js') }}" defer></script>
@endsection

@section('content')
  <x-gallerylayout>
    <div class="w-full lg:w-10/12 flex items-center h-auto flex-wrap mx-auto">
        <article class="relative w-full mt-3 w-full h-auto bg-gray-800 mx-6 shadow-md rounded">
          <header class="clickable w-full flex items-center justify-center px-3 py-3 font-semibold border-b-2 border-gray-700 text-gray-500">
            <span class="mr-2 font-semibold text-gray-500">Drag and Drop Your Wallpapers Below Or</span>
            
            <x-inputs.button id="button">Select</x-inputs.button>
          </header>

          <section class="clickable h-full w-full overflow-auto flex justify-center py-2">
            <form id="my-dropzone" class="dropzone clickable h-full w-full flex flex-1 flex-wrap justify-center" method="post" action="{{ url('/upload') }}" enctype="multipart/form-data">
              @csrf
              <div class="flex items-center justify-center dz-message py-12">
                  <svg class="fill-current w-20 h-20 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                  </svg>
              </div>
              <div class="fallback">
                <input type="file" name="file" multiple>
              </div>
            </form>
          </section>

          <footer class="w-full flex justify-end items-center py-3 px-3 border-t-2 border-gray-700">
            <x-inputs.button id="upload-clear" class="mr-2">Cancel</x-inputs.button>
            <x-inputs.button id="upload-start">Upload</x-inputs.button>
          </footer>
        </article>
    </div>

    {{--Dropzone Preview Template--}}
    <div id="preview" style="display: none;">
      <figure class="thumbnail dz-preview" style="width:300px;height:200px">
        <img class="object-cover w-full h-full" data-dz-thumbnail>
        <div class="thumbnail-info">
          <span class="wall-res"></span>
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>

        <div class="dz-success-mark">
          <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
            </g>
          </svg>
        </div>

        <a data-dz-remove class="remove dz-error-mark" title="Remove">
          <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                  <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                      <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                  </g>
              </g>
          </svg>
        </a>

        <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
      </figure>
    </div>
    {{--End of Dropzone Preview Template--}}
  </x-gallerylayout>
@endsection