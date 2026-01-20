@extends('layouts.public')

@section('title', 'Contacto - Muebles Kuatropatas')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Contacta con Nosotros</h1>
                <p class="text-gray-800">Estamos aquí para ayudarte. Envíanos un mensaje.</p>
            </div>
            
            <div class="bg-orange-400 rounded-lg shadow-lg p-8 flex flex-col">                
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Contacto directo</h2>
                <p class="text-gray-600 mb-4">Puedes llamarnos al teléfono 676 121 353. El horario de antención al cliente es de 9h a 14h de lunes a viernes.</p>
                <p class="text-gray-600 mb-4">En caso de querer enviar un correo electrónico, nuestra dirección es info@kuatropatas.es .</p>
                <br>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Redes</h2>
                <p class="text-gray-600 mb-4">Instagram: @kuatropatas</p>
                <p class="text-gray-600 mb-4">Twitter: @kuatropatas_es</p>
                <div class="flex flex-col items-center justify-center">
                    <a href="{{ route('welcome') }}" class="inline-block mt-2 px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                    Volver al inicio
                    </a>
                </div>
                
            </div>
        </div>
    </div>
@endsection