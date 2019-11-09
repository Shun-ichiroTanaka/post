<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{ asset('js/lib/jquery-steps.js') }}"></script>
<script>
    var steps = $('#demo').steps({
        onFinish: function () {
            alert('Wizard Completed');
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
</script>

{{-- vueを用いるためこの位置 --}}
<script src=" {{ mix('js/app.js') }} "></script>
