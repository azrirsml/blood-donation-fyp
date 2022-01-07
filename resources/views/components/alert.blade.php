@if (session('success'))
<div x-data="{ show: true }" x-show="show" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="flex justify-between mb-4 items-center bg-green-200 relative text-green-600 py-3 px-3 rounded-lg">
    <div>
        <span class="font-semibold text-green-700">{{ session('success') }}</span>
    </div>
    <div>
        <button type="button" @click="show = false" class=" text-green-700">
            <span class="text-2xl">&times;</span>
        </button>
    </div>
</div>
@endif

@if (count($errors) > 0)
<div class="bg-red-100 mb-4 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Error in input!</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif