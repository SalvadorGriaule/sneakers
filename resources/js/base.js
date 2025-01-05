import anime from "animejs";
import { getNav , navDeskToMob } from "./module/menu.js";

const menuBurger = document.getElementById('burger');
// valeur input
const inPrice = document.querySelectorAll(".inpPrice")
let value = [0, 0, 0];
// valeur menu
let stateBool = false;

menuBurger.addEventListener("click", animeBurgerV2);

// gestion des input du nombre de marchandise voulus

for (let i = 0; i < inPrice.length; i++) {
    let j = i;
    inPrice[j].children[0].addEventListener("click", () => {
        if (value[j] > 0) {
            value[j] -= 1
            inPrice[j].children[1].innerHTML = value[j]
        }
    })
    inPrice[j].children[2].addEventListener("click", () => {
        value[j] += 1
        inPrice[j].children[1].innerHTML = value[j]
    })
}


// animation du menu



navDeskToMob(getNav(document.querySelector("#trueH nav")),document.querySelector("header"));
const menu = document.getElementById('menuBurger');
let lengthMenu = menu.children.length

for (let i = lengthMenu - 1; i >= 0; i--) {
    menu.children[i].style.zIndex = lengthMenu - i;
}

function animeBurgerV2() {
    stateBool = !stateBool;
    let y, startDirection;
    stateBool ? y = menu.clientHeight : y = 0;
    stateBool ? startDirection = 'first' : startDirection = 'last';
    anime({
        targets: menu.children,
        translateY: y,
        duration: 425,
        easing: 'easeOutQuart',
        delay: anime.stagger(200, { from: startDirection })
    });
}
