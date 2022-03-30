<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-2xl font-medium title-font mb-2 text-gray-900">ユーザー管理</h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                {{ $users->links('vendor.pagination.total') }}
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ユーザー名</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">前回のログイン</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3">
                                @if ($user->created_at->diffInDays(now()) >= 30)
                                {{ $user->created_at->subDays(30)->toDateString() }}
                                @else
                                {{ $user->created_at->diffForHumans() }}
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="text-center inline-block px-6 py-2 bg-green-500 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">
                                    編集
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="POST" id="delete-form{{ $user->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <a class="text-center inline-block px-6 py-2 bg-red-600 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out cursor-pointer" onclick="deleteUser({{ $user->id }})">削除</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex pl-4 mt-8 lg:w-2/3 w-full mx-auto">
                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">
                    {{ $users->links() }}
                </a>
                <a href="{{ route('admin.users.create') }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">新規登録</a>
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
