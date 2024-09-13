<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create User</title>
</head>
<body class="bg-black">
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="relative w-2/5 h-4/5 group/box">
            <div class="absolute -inset-1 bg-gradient-to-b from-pink-600 to-purple-600 rounded-3xl blur opacity-75 group-hover/box:opacity-100 transition duration-200"></div>
            <div class="w-full h-full relative bg-black rounded-3xl leading-none flex flex-col">
                <form action="{{ route('user.store') }}" method="POST" class="mx-9">
                    @csrf
                    <p class="text-white text-3xl my-9 font-semibold text-center">Masukkan Data</p>

                    <div class="mb-5">
                        <label for="nama" class="block mb-3 text-base font-medium text-white">Nama</label>
                        <input type="text" id="nama" name="nama" class="w-full bg-transparent text-white border-2 border-gray-500 rounded-lg p-2.5 text-sm focus:border-pink-600 focus:bg-transparent focus:outline-none">
                    </div>

                    <div class="mb-5">
                        <label for="kelas" class="block mb-3 text-base font-medium text-white">Kelas</label>
                        <input type="text" maxlength="1" id="kelas" name="kelas" class="w-full bg-transparent text-white border-2 border-gray-500 rounded-lg p-2.5 text-sm focus:border-pink-600 focus:bg-transparent focus:outline-none">
                    </div>

                    <div class="mb-12">
                        <label for="npm" class="block mb-3 text-base font-medium text-white">NPM</label>
                        <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" id="npm" name="npm" class="w-full bg-transparent text-white border-2 border-gray-500 rounded-lg p-2.5 text-sm focus:border-purple-600 focus:bg-transparent focus:outline-none">
                    </div>

                    <div class="flex justify-center">
                        <div class="relative group/submit">
                            <div class="absolute -inset-1 bg-gradient-to-r from-pink-600 to-purple-600 rounded-full blur opacity-75 group-hover/submit:opacity-100 transition duration-200"></div>
                            <button type="submit" class="relative text-white bg-black rounded-full leading-none w-80 p-4">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>