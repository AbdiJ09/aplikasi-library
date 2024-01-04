<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Document</title>

</head>

<body class="w-100 h-screen bg-black flex justify-center items-center">
    <div class="flex flex-col lg:flex-row items-center justify-center">
        <h1 class="text-white  font-bold font-sans" style="font-size:8rem">403</h1>
        <h2 class="text-gray-300 font-bold text-2xl">You don't have permission</h2>
        <button onclick="history.back()" class="self-end">Go back</button>
    </div>
</body>

</html>
