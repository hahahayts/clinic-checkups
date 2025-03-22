<template>
    <div class="p-6">
      <h1 class="text-xl font-bold mb-4">My Appointments</h1>

      <table class="w-full border-collapse border">
        <thead>
          <tr class="bg-gray-200">
            <th class="border p-2">Doctor</th>
            <th class="border p-2">Date</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="appointment in appointments" :key="appointment.id">
            <td class="border p-2">{{ appointment.doctor.name }}</td>
            <td class="border p-2">{{ appointment.appointment_time }}</td>
            <td class="border p-2">{{ appointment.status }}</td>
            <td class="border p-2">
              <button @click="reschedule(appointment.id)" class="bg-yellow-500 text-white px-2 py-1 mr-2">Reschedule</button>
              <button @click="cancelAppointment(appointment.id)" class="bg-red-500 text-white px-2 py-1">Cancel</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script setup>
  import { usePage, useForm } from "@inertiajs/vue3";

  const { props } = usePage();
  const appointments = props.appointments;

  const cancelAppointment = (id) => {
    if (confirm("Are you sure you want to cancel?")) {
      useForm().delete(route("appointments.destroy", id));
    }
  };

  const reschedule = (id) => {
    window.location.href = route("appointments.reschedule", id);
  };
  </script>
