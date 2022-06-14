<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="white-bg antialiased">
    <div class="relative overflow-hidden mb-8">
        <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" /></svg>
                <a href="{{route('video.index')}}"> <span class="font-semibold text-lg lg:text-xl tracking-tight">Video Compression Test</span></a>
            </div>
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                    <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Docs
                    </a>
                    <a href="{{route('compressed-videos.index')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Examples
                    </a>
                </div>
                <div>
                    <a href="#startTest" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Compress</a>
                </div>
            </div>
        </nav>
        <div class="overflow-hidden border p-5 lg:p-20 flex justify-center">
            {{-- <div class="max-w-sm w-full lg:max-w-full lg:flex"> --}}


            {{-- <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="border-gray-400 bg-gray-200 rounded-b pl-5 flex justify-enter leading-normal"> --}}
            {{-- <div class=" -mx-3 mb-2 p-2"> --}}
            {{-- <h2 class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-2 px-3">
                        Start Testing
                    </h2>
                    @foreach($videos as $video)
                    <div class="flex flex-row">
                        <div class="basis-1/4 p-2 m-2"> {{$video->original_name}}</div>
        <div class="basis-1/4 p-2 m-2">{{$video->size_m_b}}</div>
        <div class="basis-1/2 p-2 m-2">{{$video->original_name}}</div>
    </div>
    @endforeach --}}

    <table class="table-fixed text-sm  text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">
                    File Name
                </th>
                <th class="px-6 py-3">
                    Compressions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
            <tr class="text-left bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                    {{$video->original_name}} - {{$video->size_m_b}}
                </th>
                <td class="px-6 py-4 ">
                    <a target="_blank" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$video->original_name}}</a>,
                    <a target="_blank" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$video->original_name}}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script>
            $(document).ready(function() {
                $("#compressionType").on('change', function() {
                    if ($(this).val() == 4) {
                        $("#bitrate").show();
                        $("#frames").show();
                        $("#resolution").show();
                    }
                    if ($(this).val() == 1) {
                        $("#frames").show();
                        $("#resolution").hide();
                        $("#bitrate").hide();
                    }
                    if ($(this).val() == 2) {
                        $("#bitrate").show();
                        $("#frames").hide();
                        $("#resolution").hide();
                    }
                    if ($(this).val() == 3) {
                        $("#resolution").show();
                        $("#bitrate").hide();
                        $("#frames").hide();
                    }
                });
            });

        </script> --}}
</body>
</html>
