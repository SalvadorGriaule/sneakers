function getNav(nav) {
    let arrNav = []
    nav.querySelectorAll("li").forEach(elem => {
        arrNav.push({ name: elem.querySelector("a").textContent, href: elem.querySelector("a").href });
    });

    return arrNav;
}

const navDeskToMob = (tabNav, target) => {
    const ul = document.createElement("ul");
    ul.className = "absolute left-0 -top-[6%] z-10²";
    ul.id = "menuBurger";
    for (let i = 0; i <= tabNav.length - 1; i++) {
        const li = document.createElement("li");
        const a = document.createElement("a");
        //li.className = "text-center w-screen text-xl bg-blue-400 border-[1px] border-solid border-black py-[0.75vh] relative lg:hidden";
        //if (i == tabNav.length - 1) li.classList.add("rounded-b-lg")
        li.style.zIndex = tabNav.length - i;
        a.href = tabNav[i].href;
        a.textContent = tabNav[i].name;
        li.append(a);
        ul.append(li)
    }
    target.append(ul);
    return ul;
}

export { getNav, navDeskToMob }