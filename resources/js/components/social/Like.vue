<template>
   <div>
       <button v-if="!liked" type="button" class="c-button__show-social__like" @click="like(postId)">
           <span>
                <i class="fas fa-heart c-button"></i>
                <p class="c-button__show-social__count">{{ likeCount }}</p>
           </span>
            <p class="u-other__fukidashi-like">いいねをします</p>
       </button>
       <button v-else type="button" class="c-button__show-social__dislike text" @click="unlike(postId)">
           <span>
                <i class="fas fa-heart c-button"></i>
                <p class="c-button__show-social__count">{{ likeCount }}</p>
           </span>
            <p class="u-other__fukidashi-like">いいねを取り消します</p>
       </button>
   </div>
</template>

<script>
    export default {
        props: ['postId', 'userId', 'defaultLiked', 'defaultlikeCount'],
        data() {
            return {
                liked: false,
                likeCount: 0,
            };
        },
        created () {
            this.liked = this.defaultLiked
            this.likeCount = this.defaultlikeCount
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




