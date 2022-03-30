<x-app-layout>
    <!-- component -->
    <div class="py-20 h-screen">
        <div class="flex w-2/3 mx-auto justify-center rounded-lg overflow-hidden h-56">
            <div class="w-1/3 bg-cover" style="background-image: url({{ asset('/images/product.png') }})">
            </div>
            <div class="w-2/3 bg-white mx-auto px-5 py-6">
                <h1 class="text-gray-900 font-bold text-2xl">{{ $product->name }}</h1>
                <p class="mt-2 text-gray-600 text-sm">{{ $product->comment }}</p>
                <div class="flex item-center justify-between mt-16">
                    <h1 class="text-gray-700 font-bold text-xl">{{ $product->primary_category->name }}</h1>
                    <div id="like-area"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const product = @json($product);

</script>
