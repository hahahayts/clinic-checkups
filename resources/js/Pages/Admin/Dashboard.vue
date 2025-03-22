<template>
    <div>
        <h1>Welcome, {{ user.name }} (Admin)</h1>
        <p>Manage clinic operations here.</p>
        <nav>
            <ul>
                <li><Link :href="route('admin.users')">Manage Users</Link></li>
                <li><Link :href="route('admin.appointments')">Appointments</Link></li>
            </ul>
        </nav>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

const user = usePage().props.user; // ✅ Get user from Laravel Inertia
</script>
