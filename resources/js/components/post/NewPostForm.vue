
<template>
    <div id="app">
        <form @submit.prevent="newpost">
            <div>
                <!-- ①タイトル　-->
                <div class="c-post__new-title">
                    <input v-model="title" placeholder=" タイトル（例：「1日5分!マクロ経済のオススメ勉強法」）" 　type="text" required>
                </div>
                 <!-- ①タイトル　-->

                 <!-- ②タグ　-->
                <div class="c-post__new-box">
                    <div class="c-post__new-box__tags">
                        <input v-model="tags" id="tags" placeholder=" タグを半角スペース区切りで5つまで入力できます" 　type="text" required>
                        <!-- <tags-input
                            v-model="tags"
                            element-id="tags"
                            placeholder="タグを追加..."
                            :existing-tags="[
                                {key:'web-development',value: 'Web Development' },{ key: 'php', value: 'PHP' },{ key: 'javascript', value: 'JavaScript' },
                                { key: 'ruby', value: 'Ruby' },{ key: 'python', value: 'Python' },{ key: 'マクロ経済学', value: 'マクロ経済学' },{ key: 'ミクロ経済学', value: 'ミクロ経済学' },
                                { key: 'ゲーム理論', value: 'ゲーム理論' },{ key: 'html', value: 'HTML' },{ key: 'css', value: 'CSS' },]"
                            :typeahead="true" :add-tags-on-comma="true"
                            :add-tags-on-space="true"
                            :limit="5"
                            :discard-search-text="'検索結果を表示しない'">
                        </tags-input> -->
                    </div>
                    <div class="c-post__new-box__time">目標時間:
                        <select v-model="clearTime">
                            <option selected value="指定しない">指定しない</option>
                            <option value="30分">30分</option>
                            <option value="1時間">1時間</option>
                            <option value="1時間30分">1時間30分</option>
                            <option value="2時間">2時間</option>
                            <option value="2時間30分">2時間30分</option>
                            <option value="3時間">3時間</option>
                            <option value="3時間30分">3時間30分</option>
                            <option value="4時間">4時間</option>
                            <option value="4時間30分">4時間30分</option>
                            <option value="5時間">5時間</option>
                            <option value="それ以上">それ以上</option>
                        </select>
                    </div>
                </div>
                 <!-- ②タグ　-->

                 <!-- ③、④　各ステップタイトルとコンテンツ　-->
                 <dir class="c-post__new-contents">
                    <div class="c-post__new-subtitle">
                        <input v-model="stepTitles" placeholder="（例：「STEP1：まずはマクロ経済をザックリ理解しよう」" type="text" name="subtitle1">
                    </div>
                    <vue-editor v-model="stepContents" id="editor1" useCustomImageHandler @image-added="handleImageAdded" placeholder=""></vue-editor>
                 </dir>
                <!-- ③、④　各ステップタイトルとコンテンツ　-->

                <!-- ⑤　送信　-->
                <div class="c-post__new-submit">
                    <button type="submit" @click="newpost">投稿する</button>
                </div>
                <!-- ⑤　送信　-->
                
            </div>
        </form>
    </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
import axios from "axios";
export default {
    name: 'NewPostForm',
    components: {
        VueEditor,
        VoerroTagsInput,
    },
    data() {
        return {
            // あらかじめあるタグの選択
            selectedTags: [],
            // テキストエディター
            customToolbar: [
                ["bold", "italic", "underline"],
                [{ list: "ordered" }, { list: "bullet" }],
                ["image", "code-block"]
            ],

            // 投稿情報
            title: "",
            tags: [],
            stepTitles: [],
            stepContents: [],
            clearTime: ""
        };

    },
    mounted() {},
    methods: {
        // 新規投稿
        newpost() {
             // ①送信する記事情報を定義
            var self = this;
            var article = {
                title: self.title,
                tags: self.tags,
                stepTitles: self.stepTitles,
                stepContents: self.stepContents,
                clearTime: self.clearTime,
            };

            // ②パスを定義
            const url = '/api/user/post/new';

            // axiosを使って、入力項目をサーバ側へ
            axios.post( url, article )
            .then(function(response) {
                console.log('新規投稿に成功しました')
                location.href = '/';
                // console.log(e.response.article.errors)
            })
            .catch(e => {
                console.log('新規投稿に失敗しました')
             });
        },
        submitPrepare() {
            const params = new URLSearchParams() //パラメータのインスタンス生成↩
            for(let key in this.formdata) {
                params.append(key, this.formdata[key].data) //キーに値を追加↩
                this.senddata = params //値セット↩
            }
        },
        handleImageAdded: function(file, Editor, cursorLocation, resetUploader) {
            let url = `/api/posts/${postId}/image`
            var formData = new FormData();
            formData.append("image", file);
            axios.post(url, {
                    user_id: this.userId
                })
                .then(result => {
                    let url = result.data.url; // Get url from response
                    Editor.insertEmbed(cursorLocation, "image", url);
                    resetUploader();
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
}
</script>

