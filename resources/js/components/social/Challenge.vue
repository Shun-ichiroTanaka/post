<template>
   <div>
       <button v-if="!challenged" type="button" class="c-button__show-challange" @click="challenge(postId)">
            <p class="">チャレンジする</p>
            <p class="u-other__fukidashi-like">この記事にチャレンジします</p>
       </button>
       <button v-else type="button" class="c-button__show-unchallange text" @click="unchallenge(postId)">
            <p class="">チャレンジをやめる</p>
            <p class="u-other__fukidashi-like">この記事へのチャレンジをやめます</p>
       </button>
   </div>
</template>

<script>
    export default {
        props: ['postId', 'userId', 'defaultchallenged'],
        data() {
            return {
                challenged: false,
            };
        },
        created () {
            this.challenged = this.defaultchallenged
        },

        methods: {
            like(postId) {
                let url = `/api/posts/${postId}/challenge`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.challenged = true
                })
                // .catch(error => {

                // });
            },
            unlike(postId) {
                let url = `/api/posts/${postId}/unchallenge`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.challenged = false
                })
                // .catch(error => {
                // //   alert(error)
                // });
            }
        }
    }
</script>




