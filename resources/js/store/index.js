import Vue from 'vue';
import Vuex from 'vuex';
// 認証関係のステートを管理する
import auth from "./modules/auth";
// 「ログインしました。」みたいなメッセージを表示する用
import alert from "./modules/alert";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth, alert
    }
});
