<template>
  <div>
    <h1 class="font-medium text-gray-200 font-3xl">
      You need to be verified first to view this page.
    </h1>
  </div>
  
  <div>
    <Link
      method="post"
      as="button"
      class="text-indigo-600 dark:text-indigo-400"
      :href="route('verification.send')"
    >
      Resend email
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'


</script>