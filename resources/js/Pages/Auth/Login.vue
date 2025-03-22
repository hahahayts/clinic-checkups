<template>
    <div>
      <h1>Login</h1>
      <form @submit.prevent="login">
        <input type="email" v-model="form.email" placeholder="Email" required />
        <input type="password" v-model="form.password" placeholder="Password" required />
        <button type="submit">Login</button>
      </form>
      <p>Don't have an account? <a href="/register">Register</a></p>
    </div>
  </template>

  <script>
  import { useForm } from '@inertiajs/vue3';

  export default {
    setup() {
      const form = useForm({
        email: '',
        password: ''
      });

      const login = () => {
        form.post('/login', {
          onSuccess: () => console.log('Login successful!'),
          onError: (errors) => console.error('Login failed', errors),
        });
      };

      return { form, login };
    }
  };
  </script>
