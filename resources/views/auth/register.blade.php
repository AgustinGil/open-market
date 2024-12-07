<x-layout>
    <x-heading>Registro</x-heading>
    <x-form method="POST" action="/register" class="pb-4">
        <x-form-input label="Nombre" name="name" placeholder="Nombre"></x-form-input>
        <x-form-input label="Email" name="email" type="email" placeholder="Email"></x-form-input>
        <x-form-input label="Contraseña" name="password" type="password" placeholder="Contraseña"></x-form-input>
        <x-form-input label="Repetir contraseña" name="password_confirmation" type="password"
            placeholder="Repetir contraseña"></x-form-input>

        <x-divider></x-divider>

        <x-form-button class="text-center">Crear cuenta</x-form-button>
    </x-form>


</x-layout>
