<template>
   <fa icon="heart" class="mt-3 text-xl" />
</template>

<script>
import { onMounted } from 'vue'
import Axios from 'axios'

export default {
  setup() {
    console.log(product);

    // get current user
    const getCurrentUser = async () => {
      await Axios.get('/api/user')
                 .then( res => {
                   console.log(res.data);
                 })
                 .catch( err => {
                   console.log(err.response.data.message);
                 })
    }

    onMounted(() => {
      getCurrentUser()
    })

    // // like product
    // const addLike = async () => {
    //   await Axios.post('/api/likes/add')
    // }

    return {
      product
    }
  },
}
</script>
