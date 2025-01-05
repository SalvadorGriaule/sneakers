@include('template.adminheader', ['title' => 'dashboard'])
<body>
    @include("admin.template.navAdmin")
    <main>
        <div>
            <form class="flex flex-col items-center space-y-2" action="/admin/dashbord/addSeller" method="post">
                @csrf
                <input class="w-2/3 border-2 border-gray-500 border-solid p-1 placeholder:text-center" placeholder="name" type="text" name="name" value="{{ old('name')}}">
                <input class="w-2/3 border-2 border-gray-500 border-solid p-1 placeholder:text-center" placeholder="email" type="email" name="email" value="{{ old('email')}}">
                <input class="w-2/3 border-2 border-gray-500 border-solid p-1 placeholder:text-center" placeholder="password" type="password" name="password">
                <input class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer" type="submit" name="addSeller" value="Crée un nouveau vendeur">
            </form>
        </div>
    </main>
</body>