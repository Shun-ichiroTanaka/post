<template>
   <div>
       <button v-if="!liked" type="button" class="c-button__show-social__like" @click="like(postId)">
            <i class="fas fa-heart c-button"></i>
            <p class="c-button__show-social__count">{{ likeCount }}</p>
       </button>
       <button v-else type="button" class="c-button__show-social__dislike" @click="unlike(postId)">
            <i class="fas fa-heart c-button"></i>
            <p class="c-button__show-social__count">{{ likeCount }}</p>
       </button>
   </div>
</template>

<script>
    export default {
        props: ['postId', 'userId', 'defaultLiked', 'defaultCount'],
        data() {
            return {
                liked: false,
                likeCount: 0,
            };
        },
        created () {
            this.liked = this.defaultLiked
            this.likeCount = this.defaultCount
        },

        methods: {
            like(postId) {
                let url = `/api/posts/${postId}/like`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.liked = true
                  this.likeCount = response.data.likeCount
                })
                // .catch(error => {

                // });
            },
            unlike(postId) {
                let url = `/api/posts/${postId}/unlike`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.liked = false
                  this.likeCount = response.data.likeCount
                })
                // .catch(error => {
                // //   alert(error)
                // });
            }
        }
    }
</script>




