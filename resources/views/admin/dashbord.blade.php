@include('template.adminheader', ['title' => 'dashboard'])

<body>
    @include('admin.template.navAdmin')
    <main>
        <div class="flex space-x-3">
            <div>
                <h2>Liste des utilisateur</h2>
                @foreach ($userList as $item)
                    <div class="flex space-x-2">
                        <p>{{ $item['name'] }}</p>
                        <p>{{ $item['created_at'] }}</p>
                    </div>
                @endforeach
            </div>
            <div>
                <h2>Liste des vendeurs</h2>
                @foreach ($sellerList as $item)
                    <div class="flex space-x-2">
                        <p>{{ $item['name'] }}</p>
                        <p>{{ $item['created_at'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
