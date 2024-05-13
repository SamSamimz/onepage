<x-guest-layout>
    <div class="col-6 mx-auto">
        <div class="bg-white px-4 py-3 rounded">
            <h3 class="text-center py-3">Login here</h3>
            @if (session()->has('invalid'))
                <div class="alert alert-danger text-center">{{session('invalid')}}</div>
            @endif
            <form action="{{route('login.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="text" value="admin@gmail.com" name="email" autocomplete="off" id="email" class="form-control">
                </div>
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" value="password" name="password" id="password" class="form-control">
                </div>
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <button class="col-12 btn btn-primary">Login</button>
                <div class="py-2 text-center">
                    <a href="{{route('register')}}">Don't have an account?</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>