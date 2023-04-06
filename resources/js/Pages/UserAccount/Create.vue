<template>
  <form @submit.prevent="register">
    <div class="w-1/2 mx-auto">
      <div>
        <label for="email" class="label">E-mail (username)</label>
        <input id="email" v-model="form.email" type="text" class="input" placeholder="Enter email" />
        <div class="mt-1 input-error">{{ form.errors.email }}</div>
      </div>
      <div class="mt-4">
        <label for="name" class="label">Name</label>
        <input id="name" v-model="form.name" type="text" class="input" placeholder="Enter name" />
        <div class="mt-1 input-error">{{ form.errors.name }}</div>
      </div>
      <div class="mt-4">
        <label for="password" class="label">Password</label>
        <input id="password" v-model="form.password" type="password" class="input" placeholder="Enter password" />
        <div class="mt-1 input-error">{{ form.errors.password }}</div>
      </div>
      <div class="mt-4">
        <label for="password_confirmation" class="label">Password Confirmation</label>
        <input id="password_confirmation" v-model="form.password_confirmation" type="password" class="input" placeholder="Enter password confirmation" />
        <div class="mt-1 input-error">{{ form.errors.password }}</div>
      </div>
      <div class="mt-4">
        <button class="px-4 btn-primary" type="submit">Create</button>
        <div class="mt-2 text-center">
          <Link :href="route('login')" class="text-sm text-gray-500">Already register? Click Here</Link>
        </div>
      </div>
    </div>
  </form>
</template>
  
<script setup>
import {useForm, Link} from '@inertiajs/vue3'
  
const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})
  
// eslint-disable-next-line no-undef
const register = () => form.post(route('register'))
  
</script>