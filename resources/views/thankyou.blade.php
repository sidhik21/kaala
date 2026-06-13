<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6F" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="kaaladp.PNG">
    <title>Kaala</title>
</head>
<body class="md:overflow-hidden lg:flex flex-col min-h-screen justify-center items-center">

    <section class="relative h-screen bg-[url(kaalahappy.png)] bg-cover lg:w-[30vw] z-0">
        <div class="absolute inset-0">
            <div class="text-center my-5">
                <span class="text-6xl bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent font-bold animate-pulse animate-infinite "> Thank you :)</span>
                <p class="text-gray-300 mb-4 mt-6">Wow! Looks like you're a great person!</p>
                <a href="{{route('login')}}" class=" rounded-2xl bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 font-bold hover:scale-105 px-10 mt-4 py-2">Logout</a>
            </div>
            <div>
            </div>
            <div class="absolute w-full bottom-10 text-center mb-6">
                <span class="text-extrabold text-gray-200 mt-4">I will be happy :) By - </span>
                <span href="https://wa.me/9944370597" class="shadow-lg bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent  font-bold mb-4">Vicky..!</span>
            </div>
            <div class="absolute bottom-3 w-full text-center mb-4">
                <span class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent text-sm">Copyright © 2026 - All rights reserved.</span>
            </div>
            <div class="absolute bottom-0 w-full text-center mb-2">
                <span class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent text-sm">Designed By - ABUBAKKAR SIDHIK</span>
            </div>
        </div>
    </section>
</body>
</html>
