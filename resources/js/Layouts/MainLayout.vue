<template>
  <header class="w-full bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="container mx-auto">
      <nav class="flex items-center justify-between p-4">
        <div class="text-lg font-medium">
          <Link :href="route('listing.index')">Listings</Link>
        </div>
        <div class="text-xl font-bold text-center text-indigo-600 dark:text-indigo-300">
          <Link :href="route('listing.index')">LaraZillow</Link>
        </div>
        <div v-if="user" class="flex items-center gap-4">
          <Link
            class="relative py-2 pr-2 text-lg text-gray-50"
            :href="route('notification.index')"
          >
            🔔
            <div
              v-if="notificationCount"
              class="absolute top-0 right-0 w-5 h-5 text-xs font-medium text-center text-white bg-red-700 border border-white rounded-full dark:bg-red-400 dark:border-gray-900"
            >
              {{ notificationCount }}
            </div>
          </Link>
          
          <Link class="text-sm text-gray-500" :href="route('realtor.listing.index')">{{ user.name }}</Link>
          <Link
            :href="route('realtor.listing.create')" as="button" class="btn-primary"
          >
            + New Listing
          </Link>
          <div>
            <Link method="delete" as="button" :href="route('logout')" class="btn-primary">Logout</Link>
          </div>
        </div>
        <div v-else>
          <Link :href="route('login')">Login</Link>&nbsp;|&nbsp;<Link :href="route('register')">Register</Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container w-full p-4 mx-auto">
    <div v-if="flashSuccess" class="p-2 mb-4 border border-green-200 rounded-md shadow-sm dark:border-green-800 bg-green-50 dark:bg-green-900">
      {{ flashSuccess }}
    </div>
    <slot />
  </main>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

// when using page as a var the main layout doesn't refresh when the 
// values of shared data update
// const page = usePage()

// Here i convert the page to computed and it worked :)
const page = computed(
  () => usePage(),
)

const flashSuccess = computed(
  () => page.value.props.flash.success,
)

const user = computed(
  () => page.value.props.user,
)

const notificationCount = computed(
  () => Math.min(usePage().props.user.notificationCount, 9),
)
</script>
