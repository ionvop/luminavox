function getScrollPercent() {
    var h = document.documentElement, 
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight';
    return (h[st]||b[st]) / ((h[sh]||b[sh])) * 100;
}

window.onscroll = function scrollUpdate() {
    if (document.querySelector(".-script__parallax") != null) {
        document.querySelector(".-script__parallax").style.backgroundPositionY = getScrollPercent() + "%";
    }

    if (document.querySelector(".-script__parallax2") != null) {
        document.querySelector(".-script__parallax2").style.backgroundPositionY = (0 - getScrollPercent()) + "%";
    }

    if (document.querySelector(".-script__parallax3") != null) {
        document.querySelector(".-script__parallax3").style.backgroundPositionY = ((getScrollPercent() * parseFloat(document.querySelector(".-script__parallax3").dataset.multiplier)) + parseFloat(document.querySelector(".-script__parallax3").dataset.offset)) + "%";
    }
}