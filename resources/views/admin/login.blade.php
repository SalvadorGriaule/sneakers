@include('template.adminheader', ['title' => 'connexion'])

<body>
    <main class="m-0 flex place-content-center flex-wrap bg-gray-600 w-full h-screen">
        <div class="rounded-md shadow-lg flex flex-col items-center bg-white h-fit p-3">
            <h1 class="m-0 text-2xl text-orange-400">Administration</h1>
            <form action="/admin/login" class="flex flex-col justify-center items-center space-y-1" method="post">
                @csrf
                <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" placeholder="email"
                    type="email" name="email" id="" value="{{ old('email') }}">
                <input class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" placeholder="password"
                    type="password" name="password" id="">
                <input class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer" name="adminSub"
                    type="submit">
            </form>
        </div>
    </main>
</body>
