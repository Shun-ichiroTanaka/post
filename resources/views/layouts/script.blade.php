<script type="application/javascript">
  var i = 0;
    $("#add").click(function(){
        ++i;
        $("#postTable").append('<tr class="c-post__new-table__step"><td><input type="text" name="step['+i+'][name]" placeholder="例：まずは全体をザックリ理解しよう"/></td><td><textarea id="step" name="step['+i+'][body]"></textarea></td><td><button type="button" class="c-button__post-remove remove-tr">Stepを削除</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });
</script>

{{-- vue --}}
<script type="javascript" src="{{ mix('js/app.js') }}"></script>

