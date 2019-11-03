<template>
    <div id="app">
        <!-- <div class="" v-for="post in posts">
            <div>
                <img :src="image" class="" id="" alt="...">
            </div>
            <div>

            </div>
        </div> -->
        <router-link to=""></router-link>
        <div class="c-post">
            <div class="c-post__detail">
                全ての投稿一覧
            </div>
            <div class="c-post__box">
                <div class="c-post__box-img">
                    <img src="/img/avatar/1572574355.png" alt="user-image" style="width:42px; height:auto;">
                </div>
                <div class="c-post__box-title">
                    <h2>これからのマイケル・サンデル</h2>
                    <p>aaaaaaaああああaaaaaaa</p>
                </div>
            </div>
            <div class="c-post__box">
                <div class="c-post__box-img">
                    <img src="/img/avatar/1572574355.png" alt="user-image" style="width:42px; height:auto;">
                </div>
                <div class="c-post__box-title">
                    <h2>これからのマイケル・サンデルこれからのマイケル・サンデルこれからのマイケル・サンデルこれからのマイケル・サンデルこれからのマイケル・サンデルこれからのマイケル・サンデルこれからのマイケル・サンデル</h2>
                    <p>aaaaaaaああああaaaaaaa</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Posts',
        mounted() {
            console.log('PostsComponent.vueの読み込みに成功')
        }
    }
</script>
