<x-layout>
    <x-heading>Iniciar Sesión</x-heading>
    <x-form method="POST" action="/login">
        <x-form-input label="Email" name="email" type="email" placeholder="Email"></x-form-input>
        <x-form-input label="Contraseña" name="password" type="password" placeholder="Contraseña"></x-form-input>

        <x-divider></x-divider>

        <x-form-button class="text-center">Iniciar Sesión</x-form-button>
    </x-form>


</x-layout>
