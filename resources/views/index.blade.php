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
                <span class="font-semibold text-lg lg:text-xl tracking-tight">Video Compression Test</span>
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
                    <a href="{{route('compressed-videos.index')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        Your Compressions
                    </a>
                </div>
                <div>
                    <a href="#startTest" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Compress</a>
                </div>
            </div>
        </nav>
        <div class="rounded-t-lg overflow-hidden border-t border-l border-r border-gray-400 p-10 lg:p-20 flex justify-center">
            <div class="max-w-sm w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://v1.tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
                </div>
                <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <p class="text-sm text-gray-600 flex items-center">
                            <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"></path>
                            </svg>
                            Members only
                        </p>
                        <div class="text-gray-900 font-bold text-xl mb-2">Can video be compressed and still retain its quality?</div>
                        <p class="text-gray-700 text-base">Let's find out for by trying out different possibilities and combinations, then we conclude.</p>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full mr-4" src="https://v1.tailwindcss.com/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">Christopher Okonkwo</p>
                            <p class="text-gray-600">June 12</p>
                        </div>
                    </div>
                    @if(session('msg'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            {{-- <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" /></svg></div> --}}
                            <div>
                                <p class="font-bold">{{session('msg')}}</p>
                                <p class="text-sm">Video will be deleted periodically to free up disk space.</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <form class="pt-20" method="post" action="{{route('video.upload')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="border-gray-400 bg-gray-200 rounded-b pl-5  justify-enter leading-normal">

                            <div class="w-full px-3 mb-3 p-2">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                    Upload a test video
                                </label>
                                <input name="video" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                <p class="text-gray-600 text-xs italic">Max video size is 200MB</p>
                            </div>

                            <div class="w-full px-3 mt-5">
                                <!-- Using utilities: -->
                                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mb-3">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </form>


                    <form id="startTest" class="pt-20" method="post" action="{{route('video.compress')}}" enctype="multipart/form-data">

                        @if(session('result:size'))
                        <div class="mb-2 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" /></svg></div>
                                <div>
                                    <p class="font-bold"> Video compression successful!</p>
                                    <p class="font-bold"> size: {{session('result:size')}}</p>
                                    <p class="font-bold text-blue-300"> <a href="{{session('result:link')}}"> Play video</a></p>
                                    <p class="text-sm">Video will be deleted periodically to free up disk space.</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @csrf
                        <div class="border-gray-400 bg-gray-200 rounded-b pl-5 flex justify-enter leading-normal">
                            <div class="flex flex-wrap -mx-3 mb-2 p-2">
                                <h2 class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-2 px-3">
                                    Start Testing
                                </h2>
                                {{-- <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                        Title
                                    </label>
                                    <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Video Title">
                                </div> --}}
                                {{-- <div class="w-full px-3 mb-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                        Upload a test video
                                    </label>
                                    <input name="video" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                    <p class="text-gray-600 text-xs italic">Max video size is 200MB</p>
                                </div> --}}

                                <div class="w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        Uploaded Videos
                                    </label>
                                    <div class="relative">
                                        <select name="file_name" class="block appearance-none w-full bg-gray-600 border border-gray-600 text-gray-900 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                            <option value=''>Select</option>
                                            @foreach ($videos as $video)
                                            <option value='{{$video->path}}'>{{$video->original_name}} ({{$video->size_m_b}})</option>
                                            @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        Compression Type
                                    </label>
                                    <div class="relative">
                                        <select id="compressionType" name="compression_type" class="block appearance-none w-full bg-gray-600 border border-gray-600 text-gray-900 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                            <option value=''>Select</option>
                                            <option value='1'>Framerate</option>
                                            <option value='2'>Bitrate</option>
                                            <option value="3">Resolutions</option>
                                            <option value="4">Both</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                        </div>
                                    </div>
                                </div>

                                <div id="bitrate" style="display:none" class="w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        Bitrate
                                    </label>
                                    <div class="relative ">
                                        <select name="bitrate" class="block appearance-none w-full bg-gray-600 border border-gray-600 text-gray-900 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                            <option value="">Select</option>
                                            <option value="100k">100Kbps</option>
                                            <option value="200k">200Kbps</option>
                                            <option value="300k">300Kbps</option>
                                            <option value="400k">400Kbps</option>
                                            <option value="700k">700Kbps</option>
                                            <option value="1000k">1000Kbps</option>
                                            <option value="700k">360p</option>
                                            <option value="1250k">480p</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                        </div>
                                    </div>
                                </div>
                                <div id="frames" style="display:none" class="w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        Framerates
                                    </label>
                                    <div class="relative ">
                                        <select name="frames" class="block appearance-none w-full bg-gray-600 border border-gray-600 text-gray-900 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                            <option value="">Select</option>
                                            <option value="24">24fps</option>
                                            <option value="25">25fps</option>
                                            <option value="30">30fps</option>
                                            <option value="60">60fps</option>
                                            <option value="120">120fps</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                        </div>
                                    </div>
                                </div>
                                <div id="resolution" style="display:none" class="w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        Resolution
                                    </label>
                                    <div class="relative ">
                                        <select name="resolution" class="block appearance-none w-full bg-gray-600 border border-gray-600 text-gray-900 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                            <option value="">Select</option>
                                            <option value="426x240">426x240 (24p)</option>
                                            <option value="640x360">640x360 (360p)</option>
                                            <option value=" 854x480"> 854x480 (480)</option>
                                            <option value=" 1280x720"> 1280x720 (720)</option>
                                            <option value="1920x1080">1920x1080 (1080)</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full px-3 mt-6">
                                    <!-- Using utilities: -->
                                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                        Compress Video
                                    </button>
                                </div>
                                {{-- <div class="w-full px-3 mt-6">
                                    <!-- Using utilities: -->
                                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                        Compressions
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
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

    </script>
</body>
</html>
