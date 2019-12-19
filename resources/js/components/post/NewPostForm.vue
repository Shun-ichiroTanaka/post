
<template>
    <div id="app">
        <form @submit.prevent="newpost">
            <div>
                <div class="c-post__new-title">
                    <input v-model="title" placeholder=" タイトル（例：「1日5分!マクロ経済のオススメ勉強法」）" 　type="text" required>
                </div>
                <div class="c-post__new-box">
                    <div class="c-post__new-box__tags">
                        <input v-model="tags" id="tags" placeholder=" タグを半角スペース区切りで5つまで入力できます')" 　type="text" required>
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
                        <select v-model="time">
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

                <form-wizard @on-complete="onComplete" color="#B79B5B" transition="bounce" back-button-text="戻る" next-button-text="ステップを追加.." finish-button-text="これ以上追加できません">
                    <tab-content title="Step1">
                        <div class="c-post__new-subtitle">
                            <input v-model="subtitle1" placeholder="（例：「STEP1：まずはマクロ経済をザックリ理解しよう」" type="text" name="subtitle1">
                        </div>
                        <vue-editor v-model="step1" id="editor1" useCustomImageHandler @image-added="handleImageAdded" placeholder=""></vue-editor>
                    </tab-content>
                    <tab-content title="Step2">
                        <div class="c-post__new-subtitle">
                            <input v-model="subtitle2" placeholder="（例：「STEP2：次に必須の公式を押さえよう」）" type="text" name="subtitle2">
                        </div>
                        <vue-editor v-model="step2" id="editor2" useCustomImageHandler @image-added="handleImageAdded" placeholder=""> </vue-editor>
                    </tab-content>
                    <tab-content title="Step3">
                        <div class="c-post__new-subtitle">
                            <input v-model="subtitle3" placeholder="（例：「STEP3：頻出の問題系統を押さえよう」）" type="text" name="subtitle3">
                        </div>
                        <vue-editor v-model="step3" id="editor3" useCustomImageHandler @image-added="handleImageAdded" placeholder=""> </vue-editor>
                    </tab-content>
                    <tab-content title="Last Step" icon="fas fa-check">
                        <div class="c-post__new-subtitle">
                            <input v-model="subtitle3" placeholder="（例：「STEP4：試験までにこなしておくべき参考書一覧」）" type="text" name="subtitle3">
                        </div>
                        <vue-editor v-model="step4" id="editor4" useCustomImageHandler @image-added="handleImageAdded" placeholder=""></vue-editor>
                    </tab-content>
                </form-wizard>
                <div class="c-post__new-submit">
                    <button type="submit" @click="newpost">投稿する</button>
                </div>
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
            subtitle1: "",
            subtitle2: "",
            subtitle3: "",
            subtitle4: "",
            step1: "",
            step2: "",
            step3: "",
            step4: "",
            time: ""
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
                subtitle1: self.subtitle1,
                subtitle2: self.subtitle2,
                subtitle3: self.subtitle3,
                subtitle4: self.subtitle4,
                step1: self.step1,
                step2: self.step2,
                step3: self.step3,
                step4: self.step4,
                time: self.time,
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
        // step完了
        onComplete: function() {
            // alert('全てのステップが完了しました！！');
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

