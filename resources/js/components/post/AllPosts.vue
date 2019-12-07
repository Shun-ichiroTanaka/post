<template>
    <div id="app">
        <div class="c-post">
            <!-- <div class="c-post__box">
                <div class="c-post__box-img" v-for="(user, u) in users" :key="`${u}-${user.id}`">{{ user.avatar }}</div>
                <div class="c-post__box-title">
                    <h2 v-for="(user, u) in users" :key="`${u}-${user.id}`">{{ user.name }}</h2>
                    <p v-for="post in posts" :key="post.id">{{ post.title }}</p>
                </div>
            </div> -->
            <div class="article-box" v-for="article in articles" :key="article.id">
                <div class="article-box-left">
                    <img src="user.avatar" alt="avatar" style="width:40px; height:40px; border-radius:50%" border-radius="50%">
                    <img src="/img/avatar/user.svg" alt="avatar" style="width:40px; height:40px; border-radius:50%?vertical-align: middle;">
                </div>
                <div class="article-box-right">
                    <a class="article-title" href="'post/{article.id}">{{ article.title }}</a>
                    <div class="article-details">
                        <div class="article-date">{{ article.created_at }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: 'AllPosts',
    props: ['articleId', 'userName', 'userAvatar', 'articleCreatedtime'],
    data() { //データの初期値を設定
      return {
        // axios.get('/api/')でGetしてきた値をpostsの配列に格納
        articles: [],
        users: [],
      };
    },
    mounted() {
        axios.get('/api/').then((res)=>{
          this.articles = res.data
          this.users = res.data
        })
        // var self = this;
        // var url = '/api/';
        // axios.get(url).then((res)=>{
        //     self.articles = response.data;
        //     console.log(articles);
        // });
    },
}
</script>
