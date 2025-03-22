<template>
    <div class="p-6">
      <h1 class="text-xl font-bold mb-4">Reschedule Appointment</h1>

      <form @submit.prevent="submitForm">
        <label class="block text-gray-700">New Date & Time:</label>
        <input type="datetime-local" v-model="form.appointment_time" required class="w-full border p-2" />

        <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4 rounded">Save Changes</button>
      </form>
    </div>
  </template>

  <script setup>
  import { useForm } from "@inertiajs/vue3";
  import { defineProps } from "vue";

  const props = defineProps(["appointment"]);

  const form = useForm({
    appointment_time: props.appointment.appointment_time,
  });

  const submitForm = () => {
    form.put(route("appointments.update", props.appointment.id));
  };
  </script>
