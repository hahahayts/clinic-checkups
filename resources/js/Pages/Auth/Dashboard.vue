<template>
    <div>
        <h1>Dashboard</h1>
        <p>Welcome, {{ user.name }}</p>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
defineProps({ user: Object });
</script>