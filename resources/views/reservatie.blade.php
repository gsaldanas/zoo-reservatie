<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservatie Succesvol</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@if(session()->has('success'))
    <p>{{ session()->get('success') }}</p>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if(session()->has('error'))
    <p>{{ session()->get('error') }}</p>
@endif
<div class="max-w-md mx-auto">
    <h1>Reserveer je bezoek aan de zoo</h1>
    <form action="{{ route('reservatie.store') }}" method="POST" class="mt-8">
        @csrf
        <div class="mb-4">
            <label for="datum" class="block text-gray-700 text-sm font-bold mb-2">Datum</label>
            <input type="date" name="datum" id="datum" class="form-input w-full">
        </div>
        <div class="mb-4">
            <label for="tijdslot" class="block text-gray-700 text-sm font-bold mb-2">Tijdslot</label>
            <select name="tijdslot" id="tijdslot" class="form-select w-full">
                <option value="10:00">10:00 - 12:00</option>
                <option value="12:00">12:00 - 14:00</option>
                <option value="14:00">14:00 - 16:00</option>
                <option value="16:00">16:00 - 18:00</option>
                <!-- Voeg hier andere tijdsloten toe zoals nodig -->
            </select>
        </div>
        <fieldset>
            <legend>Bezoekers</legend>
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
            <button type="submit" disabled class="bg-yellow-300 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Voeg nog een bezoeker toe</button>
        </div>
    </fieldset>
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Reserveer</button>
        </div>
    </form>
</div>
</body>
</html>
