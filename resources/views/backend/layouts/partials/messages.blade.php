@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-1 mb-2" role="alert">
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close" onclick="this.parentElement.remove()">
            <span class="text-red-500">&times;</span>
        </button>
    </div>
@endif

@if (Session::has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-1 mb-2" role="alert">
        <span>{{ Session::get('success') }}</span>
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close" onclick="this.parentElement.remove()">
            <span class="text-green-500">&times;</span>
        </button>
    </div>
@endif

@if (Session::has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-1 mb-2" role="alert">
        <span>{{ Session::get('error') }}</span>
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close" onclick="this.parentElement.remove()">
            <span class="text-red-500">&times;</span>
        </button>
    </div>
@endif