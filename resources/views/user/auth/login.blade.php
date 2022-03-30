<x-app-layout>
    <div class="min-h-screen bg-slate-200 py-6 flex flex-col justify-center relative overflow-hidden sm:py-12">
        <span class="border text-4xl text-yellow-800 px-6 pt-10 pb-8 bg-white w-1/2 max-w-md mx-auto rounded-t-md sm:px-10">Login Form</span>
        <div class="border relative px-4 pt-7 pb-8 bg-white shadow-xl w-1/2 max-w-md mx-auto sm:px-10 rounded-b-md">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                <label for="email" class="block">Email</label>
                <input type="Email" name="email" id="email" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Email" value="{{ old('email') }}">
                <label for="password" class="block">Password</label>
                <input type="password" name="password" id="password" class="border w-full h-10 px-3 mb-5 rounded-md" placeholder="Password">
                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center">
                            <input id="remember_me" aria-describedby="remember_me" type="checkbox" class="bg-gray-50 border border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required="">
                        </div>
                        <div class="text-sm ml-3">
                            <label for="remember_me" class="font-medium text-gray-900">Remember me</label>
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-700 hover:underline ml-auto dark:text-blue-500"> {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>
                <div class="flex items-start mt-3">
                    <a href="{{ route('admin.login') }}" class="inline-block px-6 py-2 border-2 border-purple-600 text-purple-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Admin Login</a>
                    <a href="{{ route('register') }}" class="inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out ml-3">Register</a>
                </div>
                <button class="mt-5 bg-green-500 hover:bg-blue-700 shadow-xl text-white uppercase text-sm font-semibold px-14 py-3 rounded">Login</button>
            </form>
        </div>
    </div>
</x-app-layout>
