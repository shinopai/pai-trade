<x-app-layout>
    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium">商品一覧</h3>
                {{ $products->links('vendor.pagination.total') }}
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach($products as $product)
                    <a href="{{ route('products.show', ['product' => $product->id]) }}">
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            @if(Storage::exists($product->image))
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url({{ asset('/storage/images/'.$product->image) }})">
                            </div>
                            @else
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url({{ asset('/images/product.png') }})">
                            </div>
                            @endif
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                                <span class="text-gray-500 mt-2">{{ $product->primary_category->name }}</span>
                                <p class="mt-3">
                                    {{ $product->comment }}
                                </p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </main>
</x-app-layout>

<script>
    // send data to javascript
    const products = @json($products);

</script>
