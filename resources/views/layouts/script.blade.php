<script>
  // var simplemde = new SimpleMDE({
  //   element: $("#step")['*'],
  //   toolbar: ["bold","strikethrough","quote","unordered-list","ordered-list","link","image","horizontal-rule", "table","preview","side-by-side","fullscreen"],
  //   spellChecker: true
  // });

  var i = 0;
    $("#add").click(function(){
        ++i;
        $("#postTable").append('<tr><td><input type="text" name="step['+i+'][name]" placeholder="Enter step_title" class="form-control" /></td><td><textarea id="step" name="step['+i+'][body]" placeholder="Enter step_body" class="form-control"></textarea></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });

</script>
{{-- vueを用いるためこの位置 --}}
<script src="{{ mix('js/app.js') }}"></script>
