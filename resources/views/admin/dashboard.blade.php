<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mx-auto">

                        <div class="bg-white rounded-lg border border-gray-200 w-1/2 mx-auto text-gray-900 text-sm font-medium">
                            <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer">
                                ユーザー管理
                            </a> <a href="{{ route('admin.expired-users.index') }}" class="block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer">
                                退会済みユーザー一覧
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
