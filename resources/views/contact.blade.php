@extends('layouts.public')

@section('title', 'Contacto - Muebles Kuatropatas')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Contacta con Nosotros</h1>
                <p class="text-gray-800">Estamos aquí para ayudarte. Envíanos un mensaje.</p>
            </div>

            <form action="/#" method="get" class="max-w-md mb-12 mx-auto bg-gray-300 rounded-xl shadow-md p-8 border border-gray-100">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Envíanos tus dudas</h2>

                <div class="mb-5">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input 
                        type="text" 
                        id="nombre"
                        required
                        name="nombre" 
                        pattern=".{4,}"
                        placeholder="Tu nombre con más de 3 caracteres"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md outline-none transition duration-200
                            focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                    >
                </div>

                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Tu Email</label>
                    <input 
                        type="email" 
                        id="email"
                        required
                        name="email" 
                        placeholder="correo@ejemplo.com"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md outline-none transition duration-200
                            focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                            invalid:border-pink-500 invalid:text-pink-600
                            focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                    >
                </div>

                <div class="mb-5">
                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Tu Teléfono</label>
                    <input 
                        type="tel" 
                        id="telefono"
                        name="telefono" 
                        required
                        placeholder="666111333"
                        pattern="[0-9]{3}[0-9]{3}[0-9]{3}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md outline-none transition duration-200 resize-none
                            focus:ring-2 focus:valid:ring-blue-500 focus:valid:border-blue-500
                            invalid:border-pink-500
                            focus:invalid:ring-pink-500"
                    >
                </div>

                <div class="mb-6">
                    <label for="comentario" class="block text-sm font-medium text-gray-700 mb-1">Comentario</label>
                    <textarea 
                        id="comentario"
                        name="comentario" 
                        required
                        rows="4" 
                        maxlength="400"
                        placeholder="¿En qué podemos ayudarte?"
                        class="w-full h-48 px-4 py-2 border border-gray-300 rounded-md outline-none transition duration-200 resize-none
                            focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                            invalid:border-pink-500
                            focus:invalid:ring-pink-500"
                    ></textarea>
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200"
                >
                    Enviar mensaje
                </button>
            </form>
            
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