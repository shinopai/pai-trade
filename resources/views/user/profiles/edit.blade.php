<x-app-layout>
    <div class="min-h-screen bg-slate-200 py-6 flex flex-col justify-center relative overflow-hidden sm:py-12">
        <span class="border text-4xl text-yellow-800 px-6 pt-10 pb-8 bg-white w-1/2 max-w-md mx-auto rounded-t-md sm:px-10">Edit User Form</span>
        <div class="border relative px-4 pt-7 pb-8 bg-white shadow-xl w-1/2 max-w-md mx-auto sm:px-10 rounded-b-md">
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" novalidate>
                @csrf
                @method('patch')
                <label for="name" class="block">Name</label>
                <input type="text" name="name" id="name" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Email" value="{{ old('name', $user->name) }}">
                <label for="email" class="block">Email</label>
                <input type="Email" name="email" id="email" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Email" value="{{ old('email', $user->email) }}">
                <label for="password" class="block">Password</label>
                <input type="password" name="password" id="password" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Password">
                <label for="password-confirmation" class="block">Password(Confirmation)</label>
                <input type="password" name="password_confirmation" id="password-confirmation" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Password(Confirmation)">
                <button type="submit" class="mt-5 bg-green-500 hover:bg-blue-700 shadow-xl text-white uppercase text-sm font-semibold px-14 py-3 rounded">更新</button>
            </form>
        </div>
    </div>
</x-app-layout>
