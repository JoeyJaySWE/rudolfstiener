//runs when site finished loading in
document.addEventListener("DOMContentLoaded", (event) => {

const bodyContent = document.querySelector('.home_container');
const footerContent = document.querySelector(".footer_container");



let footerHeight = footerContent.offsetHeight;
let bodyHeight = bodyContent.offsetHeight;
let windowHeight = window.innerHeight;
	
// the new heigt of content is based on the window height, 
// minus the header,
// and minus the size of the footer
// (so that we can see it without needing to scroll)
let newBodyHeight = windowHeight - 89 - footerHeight;

// if we have too little content, it will push down the footer.
if(bodyHeight < windowHeight){
    bodyContent.style.minHeight = `${newBodyHeight}px`;
}
	});