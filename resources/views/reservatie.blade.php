<div class="max-w-md mx-auto">
    <form action="{{ route('reservatie.store') }}" method="POST" class="mt-8">
        @csrf
        <div class="mb-4">
            <label for="datum" class="block text-gray-700 text-sm font-bold mb-2">Datum</label>
            <input type="date" name="datum" id="datum" class="form-input w-full">
        </div>
        <div class="mb-4">
            <label for="tijdslot" class="block text-gray-700 text-sm font-bold mb-2">Tijdslot</label>
            <input type="time" name="tijdslot" id="tijdslot" class="form-input w-full">
        </div>
        <div class="mb-4">
            <label for="voornaam" class="block text-gray-700 text-sm font-bold mb-2">Voornaam</label>
            <input type="text" name="voornaam" id="voornaam" class="form-input w-full">
        </div>
        <div class="mb-4">
            <label for="familienaam" class="block text-gray-700 text-sm font-bold mb-2">Familienaam</label>
            <input type="text" name="familienaam" id="familienaam" class="form-input w-full">
        </div>
        <div class="mb-4">
            <label for="abonnementsnummer" class="block text-gray-700 text-sm font-bold mb-2">Abonnementsnummer</label>
            <input type="text" name="abonnementsnummer" id="abonnementsnummer" class="form-input w-full">
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Opslaan</button>
        </div>
    </form>
</div>
