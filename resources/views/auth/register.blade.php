<x-guest-layout>
    <div class="col-6 mx-auto">
        <div class="bg-white px-4 py-3 rounded">
            <h3 class="text-center py-3">Register now</h3>
            @if (session()->has('invalid'))
                <div class="alert alert-danger">{{session('invalid')}}</div>
            @endif
            <form action="{{route('register.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" value="{{old('name')}}"  name="name" autocomplete="off" id="name" class="form-control">
                </div>
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" value="{{old('email')}}" name="email" autocomplete="off" name="email" id="email" class="form-control">
                </div>
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" name="password" id="password" class="form-control">
                </div>
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password_confirmation" name="password" id="password" class="form-control">
                </div>
                <button class="col-12 btn btn-primary" type="submit">Register</button>
                <div class="py-2 text-center">
                    <a href="{{route('login')}}">Already have an account?</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>