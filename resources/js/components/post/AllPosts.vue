    <tr v-for="todo in todos" v-bind:key="todo.id">  <!-- ←v-forを使ってtodosを表示 -->
      <td>@{{ todo.id }}</td>  <!-- ←todoのIDを表示。@を忘れず！ -->
      <td>@{{ todo.title }}</td>  <!-- ←todoのtitleを表示。@を忘れず！ -->
      <td><button class="btn btn-primary">完了</button></td>
    </tr>  <!-- ←完了処理はまた後で設定します。 -->
