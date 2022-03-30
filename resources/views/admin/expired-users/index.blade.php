<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-2xl font-medium title-font mb-2 text-gray-900">退会済みユーザー一覧</h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ユーザー名</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($expireUsers as $user)
                        <tr>
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3">
                                <form action="{{ route('admin.expired-users.destroy', ['user' => $user->id]) }}" method="POST" id="delete-form{{ $user->id }}">
                                    @csrf
                                </form>
                                <button class="inline-block px-6 py-2 bg-red-600 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" onclick="deleteUser({{ $user->id }})">完全に削除する</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>ユーザーがいません</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>

<script>
    'use strict';

    function deleteUser(e) {
        if (confirm('削除してよろしいですか？')) {
            document.getElementById('delete-form' + e).submit();
        }
    }

</script>
