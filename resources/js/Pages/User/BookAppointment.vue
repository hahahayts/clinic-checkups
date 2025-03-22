<template>
    <div class="p-6">
      <h1 class="text-xl font-bold mb-4">Book an Appointment</h1>
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label class="block text-gray-700">Doctor:</label>
          <select v-model="form.doctor_id" required class="w-full border p-2">
            <option v-for="doctor in doctors" :key="doctor.id" :value="doctor.id">
              {{ doctor.name }}
            </option>
          </select>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700">Date & Time:</label>
          <input type="datetime-local" v-model="form.appointment_time" required class="w-full border p-2" />
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Book Appointment</button>
      </form>
    </div>
  </template>

  <script setup>
  import { ref } from "vue";
  import { useForm } from "@inertiajs/vue3";

  const form = useForm({
    doctor_id: "",
    appointment_time: "",
  });

  const doctors = ref([
    { id: 1, name: "Dr. Smith" },
    { id: 2, name: "Dr. Johnson" },
  ]);

  const submitForm = () => {
    form.post(route("appointments.store"));
  };
  </script>
