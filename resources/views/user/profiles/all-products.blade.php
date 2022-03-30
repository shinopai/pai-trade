<x-app-layout>
    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium">出品した商品</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @forelse($products as $product)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url({{ asset('/storage/images/'.$product->image) }})">
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                            <span class="text-gray-500 mt-2">{{ $product->primary_category->name }}</span>
                            <p class="mt-3">
                                {{ $product->comment }}
                            </p>
                            <div class="flex gap-2 justify-between">
                                <div class="w-1/2">
                                    <a href="{{ route('users.products.edit', ['user' => $user->id, 'product' => $product->id]) }}" class="mt-3 block w-full py-2 text-center rounded-md border-2 text-md hover:shadow bg-blue-500 hover:bg-blue-700 hover:border-blue-700 text-white cursor-pointer">編集</a>
                                </div>
                                <div class="w-1/2">
                                    <form action="{{ route('users.products.destroy', ['user' => $user->id, 'product' => $product->id]) }}" method="POST" id="delete-product-form{{ $product->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <button class="mt-3 block w-full py-2 text-center rounded-md border-2 text-md hover:shadow bg-red-500 hover:bg-red-700 hover:border-red-700 text-white cursor-pointer" onclick="deleteProduct({{ $product->id }})">削除</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>商品はありません</p>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
    </div>
</x-app-layout>

<script>
    'use strict';

    function deleteProduct(e) {
        if (confirm('削除してよろしいですか？')) {
            document.getElementById('delete-product-form' + e).submit();
        }
    }

</script>
