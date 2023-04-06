<template>
  <Box>
    <template #header>
      Offer #{{ offer.id }} <span
        v-if="offer.accepted_at"
        class="p-1 ml-1 text-green-900 uppercase bg-green-200 rounded-md dark:bg-green-900 dark:text-green-200"
      >
        accepted
      </span>
    </template>

    <section class="flex items-center justify-between">
      <div>
        <Price :price="offer.amount" class="text-xl" />
        <div class="text-gray-500">
          Difference <Price :price="difference" />
        </div>

        <div class="text-sm text-gray-500">
          Made by {{ offer.bidder.name }}
        </div>

        <div class="text-sm text-gray-500">
          Made on {{ madeOn }}
        </div>
      </div>
      <div>
        <Link
          v-if="!isSold"
          as="button"
          method="put"
          class="text-xs font-medium btn-outline"
          :href="route('realtor.offer.accept', { offer: offer.id })"
        >
          Accept
        </Link>
      </div>
    </section>
  </Box>
</template>

<script setup>
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  offer: Object,
  listingPrice: Number,
  isSold: Boolean,
})

const difference = computed(
  () =>  props.offer.amount - props.listingPrice,
)
const madeOn = computed(
  () => new Date(props.offer.created_at).toDateString(),
)


</script>