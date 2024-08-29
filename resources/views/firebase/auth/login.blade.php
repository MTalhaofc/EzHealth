@extends('firebase.layouts.app')

@section('content')

<section class="">
    <div class="relative h-screen w-full bg-no-repeat bg-cover bg-center overflow-hidden">
        <div class="absolute inset-0 bg-no-repeat bg-cover bg-center filter blur-[5px]" style="background-image: url('{{ asset('assets/background_imagelogin.jpg') }}'); z-index: -1;"></div>
        
       
              
          <div class="flex flex-col items-center justify-center px-4 py-6 mx-auto md:h-screen lg:py-0 shadow-xl">
        <h2 class="text-2xl font-bold mb-2" >Login to Admin Panel</h2>
        <div class="w-full bg-gray-50 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold  text-black md:text-2xl ">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{url('loginadmin')}}" method="POST">
                    @csrf
                    @method('post')
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-black">Your email</label>
                        <input type="email" name="admin_email" id="admin_email" class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-black ">Password</label>
                        <input type="password" name="admin_password" id="admin_password" placeholder="••••••••" class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                    </div>
                    
                    <button type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Sign in</button>
                    <p class="text-sm font-light text-black">
                        If you don't have access to login. <span class="text-red-500"> Please Visit Admin Office.</span>
                    </p>
                </form>

                
            </div>
        </div>
    </div>
</div>
</div>
@if (session('status'))
    <h4>{{ session('status') }}</h4>
@endif

  </section>
@endsection