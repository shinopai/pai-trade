<x-app-layout>
    <div class="h-screen bg-gray-300">
        <div class="container flex justify-center w-1/2 py-20 mx-auto">
            <div class="p-3 bg-white rounded-xl w-full hover:shadow">
                <div class="flex justify-center w-full"> <img src="{{ asset('images/user.png') }}" width="150" class="rounded-lg">
                    <div class="ml-2">
                        <div class="p-3">
                            <h3 class="text-2xl">{{ $user->name }}</h3> <span>{{ $user->email }}</span>
                        </div>
                        <div class="flex justify-center items-center p-3 bg-gray-200 rounded-lg">
                            <div class="mr-3"> <span class="text-gray-400 block">出品数</span> <span class="font-bold text-black text-xl">{{ $user->products->count() }}</span> </div>
                            <div class="mr-3"> <span class="text-gray-400 block">お気に入り</span> <span class="font-bold text-black text-xl">{{ $user->product_users->count() }}</span> </div>
                            <div> <span class="text-gray-400 block">フォロワー</span> <span class="font-bold text-black text-xl">0</span> </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-8 gap-2">
                    @if($user->id == Auth::id())
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="w-full py-2 text-center rounded-md border-2 text-md hover:shadow bg-blue-500 hover:bg-blue-700 hover:border-blue-700 text-white cursor-pointer">編集</a>
                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" id="remove-form{{ $user->id }}" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                    <button class="w-full py-2 text-center rounded-md border-2 text-md hover:shadow bg-red-500 hover:bg-red-700 hover:border-red-700 text-white cursor-pointer" onclick="removeUser({{ $user->id }})">退会</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    'use strict';

    function removeUser(e) {
        if (confirm('退会してよろしいですか？')) {
            document.getElementById('remove-form' + e).submit();
        }
    }

</script>
