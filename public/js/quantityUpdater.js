const plus = document.querySelector(".plus");
const minus = document.querySelector(".minus");
const num = document.querySelector(".val");

let a = 1;
plus.addEventListener("click", function () {
    a++;
    num.innerText = a;
    a = (a < 10) ? "0" + a : a;
});

minus.addEventListener("click", function () {
    if (a > 1) {
        a--;
        num.innerText = a;
        a = (a < 10) ? "0" + a : a;
    }
});