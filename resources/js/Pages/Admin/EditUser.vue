<template>
    <div>
        <h1>Edit User</h1>
        <form @submit.prevent="updateUser">
            <label>Name:</label>
            <input v-model="form.name" required />

            <label>Email:</label>
            <input v-model="form.email" required type="email" />

            <label>Role:</label>
            <select v-model="form.role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({ user: Object });

const form = ref({
    name: props.user.name,
    email: props.user.email,
    role: props.user.role,
});

const updateUser = () => {
    router.post(`/admin/users/${props.user.id}/update`, form.value);
};
</script>
