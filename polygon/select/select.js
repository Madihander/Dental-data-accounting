let select = function () {
    let selectHead = document.querySelectorAll
    ('.select_head');

    selectHead.forEach(item=>{
        item.addEventListener('click',function () {
            this.parentElement.classList.toggle
            ('is-active')
        })
    })
};
select();