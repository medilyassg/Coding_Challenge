<template>
  
<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="p-8 rounded-t-lg" :src="product.image" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{product.name}}</h5>
        </a>
        <div>
            {{ product.description }}
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ product.price }}</span>
        </div>
    </div>
</div>

</template>

<script setup>
import {defineProps} from 'vue';


defineProps({
    product: {
      type: Object,
      required: true,
    },
})
</script>

<style>

</style>