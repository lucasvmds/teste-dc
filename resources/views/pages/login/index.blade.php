@extends('layout.base')
<main class="container">
    <h1>Login</h1>
    <form id="form-login" class="needs-validation">
        @csrf

        <x-form.input label="E-Mail" type="email" name="email" required />
        <br />
        <x-form.input label="Senha" type="password" name="password" required />
        <br />
        <x-form.checkbox-radio label="Manter conectado" type="checkbox" name="remember" />
        <x-form.error error="login" />
        <br />
        <button type="submit" class="btn btn-primary mt-4">
            Entrar
        </button>
    </form>
</main>