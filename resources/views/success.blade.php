<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservatie Succesvol</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Reservatie Succesvol</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="mb-4">Hier zijn de details van uw reservatie:</p>
            <ul class="list-disc pl-5">
                <li><strong>Datum:</strong> {{ $reservatie->datum }}</li>
                <li><strong>Tijdslot:</strong> {{ $reservatie->tijdslot }}</li>
                <li><strong>Voornaam:</strong> {{ $reservatie->voornaam }}</li>
                <li><strong>Familienaam:</strong> {{ $reservatie->familienaam }}</li>
                <li><strong>Abonnementsnummer:</strong> {{ $reservatie->abonnementsnummer }}</li>
            </ul>
        </div>
           <!-- Terug naar reservatie knop -->
           <div class="mt-4">
            <a href="{{ route('reservatie.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Terug naar Reservatie</a>
        </div>
    </div>
</body>
</html>
