<template>
  <form @submit.prevent="create">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="label">Beds</label>
        <input v-model.number="form.beds" type="text" class="input" />
        <div v-if="errorModel('beds')" class="input-error">
          {{ errorModel('beds') }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Baths</label>
        <input v-model.number="form.baths" type="text" class="input" />
        <div v-if="errorModel('baths')" class="input-error">
          {{ errorModel('baths') }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Area</label>
        <input v-model.number="form.area" type="text" class="input" />
        <div v-if="errorModel('area')" class="input-error">
          {{ errorModel('area') }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="label">City</label>
        <input v-model="form.city" type="text" class="input" />
        <div v-if="errorModel('city')" class="input-error">
          {{ errorModel('city') }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Post Code</label>
        <input v-model.number="form.code" type="text" class="input" />
        <div v-if="errorModel('code')" class="input-error">
          {{ errorModel('code') }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="label">Street</label>
        <input v-model="form.street" type="text" class="input" />
        <div v-if="errorModel('street')" class="input-error">
          {{ errorModel('street') }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="label">Street Nr</label>
        <input v-model="form.street_nr" type="text" class="input" />
        <div v-if="errorModel('street_nr')" class="input-error">
          {{ errorModel('street_nr') }}
        </div>
      </div>

      <div class="col-span-6">
        <label class="label">Price</label>
        <input v-model.number="form.price" type="text" class="input" />
        <div v-if="errorModel('price')" class="input-error">
          {{ errorModel('price') }}
        </div>
      </div>

      <div class="col-span-6">
        <button type="submit" class="btn-primary">Create</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

// eslint-disable-next-line no-undef
const create = () => form.post(route('realtor.listing.store'))

const form = useForm({
  beds: 0,
  baths: 0,
  area: 0,
  city: null,
  code: null,
  street: null,
  street_nr: null,
  price: 0,
})

/**
 * * Not recommended **
 */

// const errorModel = (key) => computed(() =>
//   form.errors[key] ? form.errors[key] : undefined,
// )

/**
 * * Recommended **
 */

const errorModel = computed(() => (key) => 
  form.errors[key] ? form.errors[key] : null,
)

</script>

<style scoped>
label {
  margin-right: 2em;
}

div {
  padding: 2px;
}
</style>