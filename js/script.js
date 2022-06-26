let radios = document.querySelectorAll('input[type=radio]');

radios && radios.forEach((item) => {
    item.addEventListener("click", (event) => {
        item.parentElement.submit();
    })
});

