<template>
   <div>
       <button v-if="!stocked" type="button" class="c-button__show-social__stock" @click="stock(postId)">
         <span>
            <i class="fas fa-folder c-button"></i>
            <p class="c-button__show-social__stockcount">{{ stockCount }}</p>
         </span>
          <p class="u-other__fukidashi-stock">マイページに登録します</p>
       </button>
       <button v-else type="button" class="c-button__show-social__unstock" @click="unstock(postId)">
         <span>
            <i class="fas fa-folder-open c-button"></i>
            <p class="c-button__show-social__stockcount">{{ stockCount }}</p>
         </span>
         <p class="u-other__fukidashi-stock">登録を解除します</p>
       </button>
   </div>
</template>

<script>
    export default {
        props: ['postId', 'userId', 'defaultStocked', 'defaultCount'],
        data() {
            return {
                stocked: false,
                stockCount: 0,
            };
        },
        created () {
            this.stocked = this.defaultStocked
            this.stockCount = this.defaultCount
        },

        methods: {
            stock(postId) {
                let url = `/api/posts/${postId}/stock`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.stocked = true
                  this.stockCount = response.data.stockCount
                })
                // .catch(error => {

                // });
            },
            unstock(postId) {
                let url = `/api/posts/${postId}/unstock`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.stocked = false
                  this.stockCount = response.data.stockCount
                })
                // .catch(error => {
                // //   alert(error)
                // });
            }
        }
    }
</script>




