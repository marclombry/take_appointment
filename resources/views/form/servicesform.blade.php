<form class="bg-blue p-6 rounded-md shadow-md" method="POST" action="{{ route('home') }}">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">
            Prénom
        </label>
        <input type="text" name="firstname" class="w-full" value="{{ old('firstname') }}">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">
            Nom
        </label>
        <input type="text" name="lastname" class="w-full" value="{{ old('lastname') }}">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
        </label>
        <input type="text" name="email" class="w-full" value="{{ old('email') }}">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="tel">
            Telephone
        </label>
        <input type="text" name="tel" class="w-full" value="{{ old('tel') }}">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="company">
            Company
        </label>
        <input type="text" name="company" class="w-full" value="{{ old('company') }}">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="service">
            Choix du service
        </label>
        <select id="service_id" name="service_id" class="w-full border border-gray-300 p-2 rounded-md">
            @foreach($services as $service)
                <option value="{{ $service->user_id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="date_begin">
            Date de début
        </label>
        <input type="text" name="date_begin" id="datePickerBegin" class="date-picker w-full" value="{{ old('date_begin') }}">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="date_end">
            Date de fin
        </label>
        <input type="text" name="date_end" id="datePickerEnd" class="date-picker w-full" value="{{ old('date_end') }}">
    </div>
    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 text-grey py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Prendre rendez-vous
        </button>
    </div>
</form>
