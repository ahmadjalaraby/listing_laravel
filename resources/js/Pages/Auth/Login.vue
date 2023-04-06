<template>
  <form @submit.prevent="login">
    <div class="w-1/2 mx-auto">
      <div>
        <label for="email" class="label">E-mail (username)</label>
        <input id="email" v-model="form.email" type="text" class="input" placeholder="Enter email" />
        <div class="mt-1 input-error">{{ form.errors.email }}</div>
      </div>
      <div class="mt-4">
        <label for="password" class="label">Password</label>
        <input id="password" v-model="form.password" type="password" class="input" placeholder="Enter password" />
      </div>
      <div class="mt-4">
        <button class="px-4 btn-primary" type="submit">Login</button>
        <div class="mt-2 text-center">
          <Link :href="route('register')" class="text-sm text-gray-500">Need an account? Click Here</Link>
        </div>
      </div>
    </div>
  </form>
</template>

<script setup>
import {useForm, Link} from '@inertiajs/vue3'

const form = useForm({
  email: null,
  password: null,
})

// eslint-disable-next-line no-undef
const login = () => form.post(route('login'))

</script>