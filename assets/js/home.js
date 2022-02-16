if (document.querySelector('.ml3')) {
    var textWrapper = document.querySelector('.ml3');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: true})
        .add({
            targets: '.ml3 .letter',
            opacity: [0, 1],
            easing: "easeInOutQuad",
            duration: 2500,
            delay: (el, i) => 50 * (i + 1)
        }).add({
        targets: '.ml3 .letter',
        opacity: [1, 0],
        duration: 2500,
        easing: "easeInOutQuad",
        delay: (el, i) => 50 * (i + 1)
    });
}