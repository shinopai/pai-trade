<x-app-layout>
    <div class="min-h-screen bg-slate-200 py-6 flex flex-col justify-center relative overflow-hidden sm:py-12">
        <span class="border text-4xl text-yellow-800 px-6 pt-10 pb-8 bg-white w-1/2 max-w-md mx-auto rounded-t-md sm:px-10">Edit Product</span>
        <div class="border relative px-4 pt-7 pb-8 bg-white shadow-xl w-1/2 max-w-md mx-auto sm:px-10 rounded-b-md">
            <form action="{{ route('users.products.update', ['user' => $user->id, 'product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method(('patch'))
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <label for="name" class="block">Name</label>
                <input type="text" name="name" id="name" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Name" value="{{ old('name', $product->name) }}">
                <label for="comment" class="block">Comment</label>
                <input type="text" name="comment" id="email" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Comment" value="{{ old('comment', $product->comment) }}">
                <label for="address" class="block">Address</label>
                <select name="address" id="address">
                    <option selected value="">選択してください</option>
                    @foreach (config('address') as $address)
                    @if($loop->index + 1 == $product->address)
                    <option value="{{ $loop->index + 1 }}" selected>{{ $address }}</option>
                    @else
                    <option value="{{ $loop->index + 1 }}">{{ $address }}</option>
                    @endif
                    @endforeach
                </select>
                <label for="category" class="block mt-5">Category</label>
                <select name="primary_category_id" id="category">
                    @foreach ($categories as $category)
                    @if($category->id == $product->primary_category_id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
                <label for="image" class="block mt-5">Image</label>
                <input type="file" name="image" id="image" class="border w-full h-10 px-3 py-1 mb-5 rounded-md">
                <button type="submit" class="mt-5 bg-green-500 hover:bg-blue-700 shadow-xl text-white uppercase text-sm font-semibold px-14 py-3 rounded">出品</button>
            </form>
        </div>
    </div>
</x-app-layout>
