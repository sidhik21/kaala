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
   <section class="relative h-screen bg-[url(kaalasad.png)] bg-cover lg:w-[30vw] z-0">
        <div class="absolute inset-0">
            <div class="text-center my-5">
                <span class="text-7xl bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent font-bold animate-pulse animate-infinite "> Login :)</span>
                <p class="text-gray-300 mt-4">Login fast, I'm waiting for you!</p>
            </div>
            <div>
                <form action="{{ route('login') }}" class=" text-center pt-5 pb-20" method="POST">
                    @csrf
                    <input name="name" class="border rounded-2xl bg-transparent bg-orange/30 backdrop-blur-sm border-orange-300 hover:border-orange-500 text-orange-500 px-6 py-2 text-sm  my-4" type="text" placeholder="Username"><br>
                    <input name="password" class="border rounded-2xl bg-transparent bg-orange/30 backdrop-blur-sm border-orange-300 hover:border-orange-500 text-orange-500 px-6 py-2 text-sm  my-4" type="password" placeholder="Password"><br>
                    <button class=" rounded-2xl bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 font-bold hover:scale-105 px-10 mt-4 py-2">Login</button>
                </form>
            </div>
        </div>
        <div class="absolute bottom-3 w-full text-center mb-4">
            <span class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent text-sm">Copyright © 2026 - All rights reserved.</span>
        </div>
        <div class="absolute bottom-0 w-full text-center mb-2">
            <span class="text-gray-400 text-sm">Designed By - ABUBAKKAR SIDHIK</span>
        </div>
   </section>
</body>
</html>
