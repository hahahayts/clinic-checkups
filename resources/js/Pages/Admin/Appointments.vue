<template>
    <div>
        <h1>Manage Appointments</h1>
        <table>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            <tr v-for="appointment in appointments" :key="appointment.id">
                <td>{{ appointment.patient_name }}</td>
                <td>{{ appointment.doctor_name }}</td>
                <td>{{ appointment.date }}</td>
                <td>
                    <button @click="deleteAppointment(appointment.id)">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script setup>
import { defineProps } from "vue";
import { router } from "@inertiajs/vue3";

defineProps({ appointments: Array });

const deleteAppointment = (id) => {
    if (confirm("Are you sure you want to delete this appointment?")) {
        router.delete(`/admin/appointments/${id}`);
    }
};
</script>
