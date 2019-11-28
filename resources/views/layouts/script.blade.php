{{-- mouse cursor --}}
<script>
    // カーソルの位置
    const cursor = document.querySelector('.cursor');
    document.addEventListener('mousemove', e => {
        cursor.setAttribute("style", "top: "+(e.pageY - 15)+"px; left: "+(e.pageX - 22)+"px;")
    })
    // クリックした後、再び始まるまでの時間
    document.addEventListener('click', () => {
        cursor.classList.add("expand");
        setTimeout(() => {
            cursor.classList.remove("expand");
        }, 500)
    })
</script>

// {{-- vueを用いるためこの位置 --}}
<script src=" {{ mix('js/app.js') }} "></script>
