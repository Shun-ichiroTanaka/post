
<template>
    <div id="app">
        <form action="post.newpost" method="POST" @submit.prevent="newpost()">
            <div class="c-post__new-title">
                <input id="title" placeholder=" タイトル（例：「1日5分!マクロ経済のオススメ勉強法」）" 　type="text" name="title" required>
            </div>
            <div class="c-post__new-box">
                <div class="c-post__new-box__tags">
                    <input id="tags" placeholder=" タグを半角スペース区切りで5つまで入力できます')" 　type="text" name="tags" required>
                </div>
                <div class="c-post__new-box__time">目標時間 :
                    <select name="time">
                        <option selected value="指定なし">指定しない</option>
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

            <form-wizard @on-complete="onComplete" color="#4BCFC8" transition="bounce" back-button-text="戻る" next-button-text="追加" finish-button-text="これ以上追加できません">
                <tab-content title="Step1">
                    <!-- <textarea name="step1" class="form-control" id="markdown_editor_textarea" placeholder=" {{ __('ここにはStepの内容について書いてください。Markdown記法で書いてみましょう！') }}"></textarea> -->
                    <vue-editor name="step1" class="form-control" id="editor1" useCustomImageHandler @image-added="handleImageAdded" v-model="editor1Content" placeholder="Stepは最大4つまで登録できます（例：「STEP1：まずはマクロ経済をザックリ理解しよう」）"></vue-editor>
                </tab-content>
                <tab-content title="Step2">
                    <vue-editor name="step2" class="form-control" id="editor2" useCustomImageHandler @image-added="handleImageAdded" v-model="editor2Content" placeholder="（例：「STEP2：次に必須の公式を押さえよう」）"> </vue-editor>
                </tab-content>
                <tab-content title="Step3">
                    <vue-editor name="step3" class="form-control" id="editor3" useCustomImageHandler @image-added="handleImageAdded" v-model="editor3Content" placeholder="（例：「STEP3：頻出の問題系統を押さえよう」）"> </vue-editor>
                </tab-content>
                <tab-content title="Last Step" icon="fas fa-check">
                    <vue-editor name="step4" class="form-control" id="editor4" useCustomImageHandler @image-added="handleImageAdded" v-model="editor4Content" placeholder="（例：「STEP4：試験までにこなしておくべき参考書一覧」）"></vue-editor>
                </tab-content>
            </form-wizard>
            <div class="c-post__new-submit">
                <button type="submit">投稿する</button>
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
    },
    data() {
        return {
            customToolbar: [
                ["bold", "italic", "underline"],
                [{ list: "ordered" }, { list: "bullet" }],
                ["image", "code-block"]
            ],
            editor1Content: "",
            editor2Content: "",
            editor3Content: "",
            editor4Content: "",
        };
    },
    mounted() {
        console.log('NewPostComponent.vueの読み込みに成功')
    },
    methods: {
        newpost() {
            axios.post('./api/newpost', {
                    firstName: 'Fred',
                    lastName: 'Flintstone'
                })
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log("新規投稿に失敗");
                });
            console.log(vueファイルをaxiosでSQLに保存させます);
            // Send a POST request
        },
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
