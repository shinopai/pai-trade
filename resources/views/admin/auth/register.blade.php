<x-app-layout>
    <div class="min-h-screen bg-slate-200 py-6 flex flex-col justify-center relative overflow-hidden sm:py-12">
        <span class="border text-4xl text-yellow-800 px-6 pt-10 pb-8 bg-white w-1/2 max-w-md mx-auto rounded-t-md sm:px-10">Register Form</span>
        <div class="border relative px-4 pt-7 pb-8 bg-white shadow-xl w-1/2 max-w-md mx-auto sm:px-10 rounded-b-md">
            <form action="{{ url('admin/register') }}" method="POST">
                @csrf
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <label for="name" class="block">Name</label>
                <input type="text" name="name" id="name" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Email" value="{{ old('name') }}">
                <label for="email" class="block">Email</label>
                <input type="Email" name="email" id="email" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Email" value="{{ old('email') }}">
                <label for="password" class="block">Password</label>
                <input type="password" name="password" id="password" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Password">
                <label for="password-confirmation" class="block">Password(Confirmation)</label>
                <input type="password" name="password_confirmation" id="password-confirmation" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Password(Confirmation)">
                <div class="flex items-start">

                </div>
                <div class="flex items-start mt-3">
                    <a href="{{ route('login') }}" class="inline-block px-6 py-2 border-2 border-green-600 text-green-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Login</a>
                    <a href="{{ route('admin.login') }}" class="inline-block px-6 py-2 border-2 border-purple-500 text-purple-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out ml-3">{{ __('Already registered?') }}
                    </a>
                </div>
                <button class="mt-5 bg-green-500 hover:bg-blue-700 shadow-xl text-white uppercase text-sm font-semibold px-14 py-3 rounded">Register</button>
            </form>
        </div>
    </div>
</x-app-layout>
