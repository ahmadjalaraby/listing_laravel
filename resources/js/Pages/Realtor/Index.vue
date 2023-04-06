<template>
  <h1 class="mb-4 text-3xl">Your Listings</h1>
  <section>
    <RealtorFilters :filters="filters" />
  </section>

  
  <section v-if="listings.data.length" class="grid grid-cols-1 gap-2 lg:grid-cols-2">
    <Box v-for="listing in listings.data" :key="listing.id" :class="{ 'border-dashed': listing.deleted_at }">
      <div class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
        <div :class="{ 'opacity-25': listing.deleted_at }">
          <div
            v-if="listing.sold_at != null"
            class="inline-block p-1 mb-2 text-xs font-bold text-green-500 uppercase border border-green-300 border-dashed rounded-md dark:border-green-600 dark:text-green-600"
          >
            sold
          </div>
            
          <div class="items-center gap-2 xl:flex">
            <Price :price="listing.price" class="text-2xl font-medium" />
            <ListingSpace :listing="listing" />
          </div>
          <ListingAddress :listing="listing" class="text-gray-500" />
        </div>
        <section>
          <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
            <Link
              class="text-xs font-medium btn-outline"
              :href="route('listing.show', { listing: listing.id })"
              target="_blank"
            >
              Preview
            </Link>
            <Link
              class="text-xs font-medium btn-outline"
              :href="route('realtor.listing.edit', { listing: listing.id })"
              method="get"
              as="button"
            >
              Edit
            </Link>
            <Link
              v-if="!listing.deleted_at"
              class="text-xs font-medium btn-outline"
              :href="route('realtor.listing.destroy', { listing: listing.id })"
              as="button"
              method="delete"
            >
              Delete
            </Link>
            <Link
              v-else
              class="text-xs font-medium btn-outline"
              :href="route('realtor.listing.restore', { listing: listing.id })"
              as="button"
              method="put"
            >
              Restore
            </Link>
          </div>
          <div class="mt-2">
            <Link
              :href="route('realtor.listing.image.create', { listing: listing.id })"
              class="block w-full text-xs font-medium text-center btn-outline"
            >
              Images ({{ listing.images_count }})
            </Link>
          </div>
          <div class="mt-2">
            <Link
              :href="route('realtor.listing.show', { listing: listing.id })"
              class="block w-full text-xs font-medium text-center btn-outline"
            >
              Offers ({{ listing.offers_count }})
            </Link>
          </div>
        </section>
      </div>
    </Box>
  </section>
  <EmptyState v-else>
    No listings yet!
  </EmptyState>
  
  <section v-if="listings.data.length" class="flex justify-center w-full mt-4 mb-4">
    <Pagination :links="listings.links" />
  </section>
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import EmptyState from '@/Components/UI/EmptyState.vue'
import Pagination from '@/Components/UI/Pagination.vue'
import RealtorFilters from '@/Pages/Realtor/Index/Components/RealtorFilters.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  listings: Object,
  filters: Object,
})
</script>