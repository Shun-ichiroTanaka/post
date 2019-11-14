<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{ asset('js/lib/jquery-steps.js') }}"></script>
<script>

// step
// ==================>>
var steps = $('#demo').steps({
    onFinish: function () {
        alert('全てのステップが完了しました！');
    }
});
steps_api = steps.data('plugin_Steps');
$('#btnPrev').on('click', function () {
    steps_api.prev();
});
$('#btnNext').on('click', function () {
    steps_api.next();
});
$('#btnFinish').on('click', function () {
    steps_api.finish();
});

// addStep
// ==================>>
$('tbody').delegate('.quantity,.budget','keyup',function(){
    var tr=$(this).parent().parent();
    var quantity=tr.find('.quantity').val();
    var budget=tr.find('.budget').val();
    var amount=(quantity*budget);
    tr.find('.amount').val(amount);
    total();
});
function total(){
    var total=0;
    $('.amount').each(function(i,e){
        var amount=$(this).val()-0;
        total +=amount;
    });
    $('.total').html(total+".00 tk");
}
$('.addStep').on('click',function(){
    addStep();
});
function addStep()
{
    var tr='<tr>'+
        '<td><input type="text" name="product_name[]" class="form-control" required=""></td>'+
        '<td><input type="text" name="brand[]" class="form-control"></td>'+
        '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
        '<td><input type="text" name="budget[]" class="form-control budget"></td>'+
        ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+
        '<td><a href="#" class="remove"><i class="far fa-trash-alt"></i></a></td>'+
        '</tr>';
        $('tbody').append(tr);
};
$('.removeStep').on('click',function(){
    var last=$('tbody tr').length;
    if(last==1){
        alert("Stepは1つ以上にしてください");
    }
    else{
        $(this).parent().parent().remove();
    }

});
</script>

{{-- vueを用いるためこの位置 --}}
<script src=" {{ mix('js/app.js') }} "></script>
