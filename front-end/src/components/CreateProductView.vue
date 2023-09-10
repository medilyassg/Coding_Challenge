<template>
    <div class="w-2/3 mx-auto mt-4 p-4 bg-white shadow-md rounded-lg">
      <h2 class="text-2xl font-semibold mb-4">Create Product</h2>
      <form @submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="mb-4 flex space-x-4">
        <div class="w-1/2">
          <label for="name" class="block text-gray-700">Name:</label>
          <input
            type="text"
            id="name"
            v-model="formData.name"
            class="block w-full mt-2 py-2 px-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:border-blue-500"
            required
          />
        </div>
        <div class="w-1/2">
          <label for="price" class="block text-gray-700">Price:</label>
          <input
            type="number"
            id="price"
            v-model="formData.price"
            class="block w-full mt-2 py-2 px-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:border-blue-500"
            required
          />
        </div>
      </div>
        <div class="mb-4">
            <label for="categories" class="block text-gray-700">Categories:</label>
  <div class="relative">
    <select
      id="categories"
      v-model="formData.categories"
      multiple
      class="block w-full mt-2 py-2 px-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:border-blue-500"
      required
    >
      <!-- Assuming you have category options to select from -->
      <option value="1">Category 1</option>
      <option value="2">Category 2</option>
      <option value="3">Category 3</option>
      <!-- Add more category options as needed -->
    </select>
    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
      <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 4l-4 4m0 0l4 4m-4-4h14"></path>
      </svg>
    </div>
  </div>

        </div>
        <div class="mb-4">
          <label for="description" class="block text-gray-700">Description:</label>
          <textarea
            id="description"
            v-model="formData.description"
            class="block w-full mt-2 py-2 px-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:border-blue-500"
            rows="4"
            required
          ></textarea>
        </div>
        <div class="mb-4">
          <label for="image" class="block text-gray-700">Image:</label>
          <input
            type="file"
            id="image"
            ref="imageInput"
            @change="handleImageChange"
            class="block w-full mt-2 py-2 px-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:border-blue-500"
            accept="image/*"
            required
          />
        </div>
        <div class="mb-4">
          <img
            v-if="formData.image"
            :src="formData.image"
            alt="Selected Image"
            class="max-h-40 mx-auto"
          />
        </div>
        <div class="mt-6">
          <button
            type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded"
          >
            Create Product
          </button>
        </div>
      </form>
    </div>
  </template>
  
  
  <script setup>
  import axios from 'axios';
import { ref } from 'vue';
  const formData = ref({
    name: '',
    price: '',
    categories: [],
    description: '',
    image: null,
  });
  
  const submitForm = async () => {
    axios.post(
      'http://localhost:8000/api/products', formData.value,
      {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                })
  };
  
  const handleImageChange = (event) => {
      formData.value.image = event.target.files[0];
  };
  </script>
  