<template>
    <div>
      <h1>Welcome, {{ user.name }}!</h1>
      <p>You can book, view, and manage your appointments here.</p>
      <a :href="route('appointments.index')">View Appointments</a>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";

const user = usePage().props.user; // ✅ Correct way to access user
</script>
