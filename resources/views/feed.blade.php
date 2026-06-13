<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6F" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('kaaladp.png') }}">
    <title>Kaala</title>
</head>
<body class="md:overflow-hidden lg:flex flex-col min-h-screen justify-center items-center">

    <section class="relative h-screen bg-[url(kaala.png)] bg-cover lg:w-[30vw] z-0">
        <div class="absolute inset-0">
            <div class="text-center my-5">
                <span class="text-7xl bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent font-bold animate-pulse animate-infinite "> Kaala :)</span>
                <p class="text-gray-300 mt-2">I'm hungry! please give me food!</p>
            </div>
            <div class=" text-white inline-flex  mb-3 mx-4  items-center justify-center">
                @if(session('message') || isset($message))
                    <div class=" bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent text-center font-bold px-4 py-2  rounded mb-4">
                        {{ session('message') ?? $message }}
                    </div>
                @endif
            </div>
                <form action="{{ route('feed.form') }}" class=" text-center pt-5 pb-20" method="POST">
                    @csrf
                    <span class="text-3xl text-extrabold text-gray-200">Hey, </span>
                    <span class="text-3xl bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent  font-bold mb-4">{{$name}}</span><br>
                    {{-- <input type="text" name="name" placeholder="Name" class="border rounded-2xl bg-orange/30 bg-transparent backdrop-blur-sm border-orange-300 hover:border-orange-500 text-orange-500 px-6 py-2 text-sm  my-4"><br> --}}
                    <span class="text-gray-300 mt-4">Are you going to feed me?</span><br>
                    <select name="query" id="query" class="border text-center bg-orange/30 bg-transparent backdrop-blur-sm rounded-2xl border-orange-300 hover:border-orange-500 px-9 py-2 text-heading  text-gray-300 text-sm  shadow-xs placeholder:text-body">
                        <option class="bg-orange-300 text-black" value="" selected>Select</option>
                        <option class="bg-orange-300 text-black" value="yes">Yes</option>
                        <option class="bg-orange-300 text-black" value="no">No</option>
                    </select>
                    <button class=" ml-2 rounded-2xl bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 font-bold hover:scale-105 px-10 mt-4 py-2">Submit</button>
                </form>
            </div>
            <div class="absolute w-full bottom-20 text-center mb-6">
                <button class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent shadow-lg font-bold mb-4" onclick="window.location.href='{{ route('list') }}'">See Whole Feeding List..!</button>
            </div>
            <div class="absolute w-full bottom-10 text-center mb-6">
                <span class="text-extrabold text-gray-200 mt-4">If you say yes, I will be happy :) By - </span>
                <a href="https://wa.me/9944370597" class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent  font-bold mb-4">Vicky..!</a>
            </div>
            <div class="absolute bottom-3 w-full text-center mb-4">
<span class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent text-sm">Copyright © 2026 - All rights reserved.</span>
            </div>
            <div class="absolute bottom-0 w-full text-center mb-2">
                <span class="text-gray-400 text-sm">Designed By - ABUBAKKAR SIDHIK</span>
            </div>
        </div>
    </section>
</body>
</html>
