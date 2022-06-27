const radios = document.querySelectorAll('input[type=radio]');
radios && radios.forEach((item) => {
    item.addEventListener("click", (event) => {
        item.parentElement.submit();
    })
});

const answered = document.querySelectorAll('.answered')
answered && answered.forEach((item)=>{
    item.nextSibling.style.color="lightgrey";
})
