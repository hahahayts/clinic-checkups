<template>
    <div>
      <h1>Register</h1>
      <form @submit.prevent="register">
        <input type="text" v-model="name" placeholder="Name" required />
        <input type="email" v-model="email" placeholder="Email" required />
        <input type="password" v-model="password" placeholder="Password" required />
        <button type="submit">Register</button>
      </form>
      <p>Already have an account? <a href="/login">Login</a></p>
    </div>
  </template>

  <script>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';

  export default {
    setup() {
      const name = ref('');
      const email = ref('');
      const password = ref('');
      const form = useForm({ name, email, password });

      const register = () => {
        form.post('/register');
      };

      return { name, email, password, register };
    }
  };
  </script>
