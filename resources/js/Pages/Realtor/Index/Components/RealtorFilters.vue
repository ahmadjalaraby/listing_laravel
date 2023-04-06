<template>
  <form>
    <div class="flex flex-wrap gap-4 mt-4 mb-4">
      <div class="flex items-center gap-2 flex-nowrap">
        <input
          id="deleted" v-model="filterFormTwo.deleted" type="checkbox"
          class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
        />
        <label for="deleted">Deleted</label>
      </div>

      <div>
        <select v-model="filterFormTwo.by" class="w-24 input-filter-l">
          <option value="created_at">Added</option>
          <option value="price">Price</option>
        </select>
        <select v-model="filterFormTwo.order" class="w-32 input-filter-r">
          <option v-for="option in sortOptions" :key="option.value" :value="option.value">
            {{ option.label }}
          </option>
        </select>
      </div>
    </div>
  </form>
</template>

<script setup>
// import { Inertia } from '@inertiajs/inertia'
import { useForm } from '@inertiajs/vue3'
import { watch, computed } from 'vue'
import { debounce } from 'lodash'

const props = defineProps({
  filters: Object,
})

const sortLabels = {
  created_at: [
    {
      label: 'Latest',
      value: 'desc',
    },
    {
      label: 'Oldest',
      value: 'asc',
    },
  ],
  price: [
    {
      label: 'Pricey',
      value: 'desc',
    },
    {
      label: 'Chipest',
      value: 'asc',
    },
  ],
}

const sortOptions = computed(
  () => sortLabels[filterFormTwo.by],
)

// const filterForm = reactive({
//   deleted: props.filters.deleted ?? false,
//   by: props.filters.by ?? 'created_at',
//   order: props.filters.order ?? 'desc',
// })

const filterFormTwo = useForm({
  deleted: props.filters.deleted ?? false,
  by: props.filters.by ?? 'created_at',
  order: props.filters.order ?? 'desc',
})

const filter = () => {
  filterFormTwo.get(
    // eslint-disable-next-line no-undef
    route('realtor.listing.index'),
    {
      preserveState: true,
      preserveScroll: true,
      replace: true,
    },
  )
}

// reactive / ref / computed
watch(
  () => filterFormTwo.isDirty,
  debounce(() => {
    console.log(filterFormTwo.isDirty)
    if(filterFormTwo.isDirty)
      filter()
  }, 1000),
)
</script>
