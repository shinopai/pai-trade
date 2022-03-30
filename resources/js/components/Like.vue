<template>
<div>
  <template v-if="ifLikes">
   <fa icon="heart" class="mt-3 text-xl cursor-pointer text-red-500" @click="removeLike(currentUserId)" />
  </template>
  <template v-else>
   <fa icon="heart" class="mt-3 text-xl cursor-pointer" @click="addLike(currentUserId)" />
  </template>
   <span class="ml-2">{{ likes }}</span>
</div>
</template>

<script>
import { ref, onMounted } from 'vue'
import Axios from 'axios'

Axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};

export default {
  setup() {
    const likes = ref()
    const ifLikes = ref(Boolean)
    const currentUserId = ref()

    // get current user
    const getCurrentUser = async () => {
      await Axios.get('/api/user')
                 .then( res => {
                   checkIfLikes(res.data, product.id)
                   currentUserId.value = res.data
                 })
                 .catch( err => {
                   console.log(err.response.data.message);
                 })
    }

    // get number of likes this product
    const getLikes = async () => {
      await Axios.get('/api/likes/products/' + product.id)
                 .then( res => {
                   likes.value = res.data
                 })
                 .catch( err => {
                   console.log(err.response.data.message);
                 })
    }

    // check if current user likes this product
    const checkIfLikes = async (userId, productId) => {
      await Axios.get('/api/likes/users/' + userId + '/products/' + productId)
                 .then( res => {
                   if(res.data === ''){
                     ifLikes.value = false
                   }else{
                     ifLikes.value = true
                   }
                 })
                 .catch( err => {
                   console.log(err.response.data.message);
                 })
    }

    onMounted(() => {
      getCurrentUser()
      getLikes()
    })

    // like product
    const addLike = async (userId) => {
      await Axios.post('/api/likes/add', {
        user_id: userId,
        product_id: product.id
      })
                 .then( res => {
                  getCurrentUser()
                  getLikes()
                 })
                 .catch( err => {
                   console.log(err.response.data.message);
                 })
    }

    // like product
    const removeLike = async (userId) => {
      await Axios.post('/api/likes/delete', {
        user_id: userId,
        product_id: product.id
      })
                 .then( res => {
                  getCurrentUser()
                  getLikes()
                 })
                 .catch( err => {
                   console.log(err.response.data.message);
                 })
    }

    return {
      product, likes, currentUserId, ifLikes, addLike, removeLike
    }
  },
}
</script>
