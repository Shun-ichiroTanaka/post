<template>
   <div>
       <button v-if="!challenged" type="button" class="c-button__show-social__challange" @click="challenge(postId)">
            <p>チャレンジする</p>
            <p class="u-other__fukidashi-chalange">この記事にチャレンジします</p>
       </button>
       <button v-else type="button" class="c-button__show-social__unchallange text" @click="unchallenge(postId)">
           <p>チャレンジをやめる</p>
           <p class="u-other__fukidashi-challenge">この記事のチャレンジをやめます</p>
       </button>
   </div>
</template>

<script>
    export default {
        props: ['postId', 'userId', 'defaultChallenged', 'defaultchallengeCount'],
        data() {
            return {
                challenged: false,
                challengeCount: 0,
            };
        },
        created () {
            this.challenged = this.defaultChallenged
            this.challengeCount = this.defaultchallengeCount
        },

        methods: {
            challenge(postId) {
                let url = `/api/posts/${postId}/challenge`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.challenged = true
                  this.challengeCount = response.data.challengeCount
                })
                // .catch(error => {

                // });
            },
            unchallenge(postId) {
                let url = `/api/posts/${postId}/unchallenge`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                  this.challenged = false
                  this.challengeCount = response.data.challengeCount
                })
                // .catch(error => {
                // //   alert(error)
                // });
            }
        }
    }
</script>




