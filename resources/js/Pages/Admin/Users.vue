<template>
    <div>
        <h1>Manage Users</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.role }}</td>
                <td>
                    <Link :href="'/admin/users/' + user.id + '/edit'">Edit</Link>
                    <button @click="deleteUser(user.id)">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script setup>
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";

defineProps({ users: Array });

const deleteUser = (id) => {
    if (confirm("Are you sure you want to delete this user?")) {
        router.delete(`/admin/users/${id}`);
    }
};
</script>
