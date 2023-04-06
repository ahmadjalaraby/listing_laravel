<template>
  <div class="p-4 border border-gray-200 rounded-md shadow-sm dark:border-gray-800 dark:text-gray-300">
    <div class="mb-1 font-medium text-gray-500">
      <slot name="header" />
    </div>
    <slot />
  </div>
</template>