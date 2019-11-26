
<template>
    <div id="app">
        <form action="post.newpost" method="POST" @submit.prevent="newpost()">
            <div class="c-post__new-title">
                <input id="title" placeholder=" タイトル（例：「1日5分!マクロ経済のオススメ勉強法」）" 　type="text" name="title" required>
            </div>
            <div class="c-post__new-tags">
                <input id="tags" placeholder=" タグを半角スペース区切りで5つまで入力できます')" 　type="text" name="tags" required>
            </div>
            <form-wizard @on-complete="onComplete" color="#2cb597" transition="bounce" back-button-text="戻る" next-button-text="追加" finish-button-text="これ以上追加できません">
                <tab-content title="Step1">
                    <vue-editor id="editor1" useCustomImageHandler @image-added="handleImageAdded" v-model="editor1Content" placeholder="Stepは最大4つまで登録できます（例：「STEP1：まずはマクロ経済をザックリ理解しよう」）"></vue-editor>
                </tab-content>
                <tab-content title="Step2">
                    <vue-editor id="editor2" useCustomImageHandler @image-added="handleImageAdded" v-model="editor2Content" placeholder="（例：「STEP2：次に必須の公式を押さえよう」）"> </vue-editor>
                </tab-content>
                <tab-content title="Step3">
                    <vue-editor id="editor3" useCustomImageHandler @image-added="handleImageAdded" v-model="editor3Content" placeholder="（例：「STEP3：頻出の問題系統を押さえよう」）"> </vue-editor>
                </tab-content>
                <tab-content title="Last Step" icon="fas fa-check">
                    <vue-editor id="editor4" useCustomImageHandler @image-added="handleImageAdded" v-model="editor4Content" placeholder="（例：「STEP4：試験までにこなしておくべき参考書一覧」）"></vue-editor>
                </tab-content>
            </form-wizard>
            <div class="c-post__new-submit">
                <button type="submit">Stepに投稿</button>
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
