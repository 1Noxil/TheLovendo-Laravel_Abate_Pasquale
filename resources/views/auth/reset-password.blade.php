<x-layouts.main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="p-5 border rounded" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <input type="hidden" name="email" value="{{ $request->email }}">

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('ui.Password') }}</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="password_confirmation"
                            class="form-label">{{ __('ui.Password di conferma') }}</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="password_confirmation">
                    </div>


                    <button type="submit" class="btn btn-dark">{{ __('ui.Recupera ora') }}</button>

                </form>
            </div>
        </div>
    </div>
</x-layouts.main>
