const _location = `${window.location.origin}/wp-content/themes/kvca`;

function updateBtn() {
    const btnIcon = document.createElement('img');
    btnIcon.src = `${_location}/assets/img/icons/plus-white.svg`;
    const newsBtn = document.querySelector('.news-btn');
    newsBtn.insertAdjacentElement('beforeend', btnIcon);
}

window.almComplete = function(){
	const newsContainer = document.querySelector('[data-news-container]');
	const newsAlm = document.querySelector('.news-wrap-alm');
    newsContainer.insertAdjacentElement('beforeend', newsAlm);
    updateBtn();
};

window.addEventListener('DOMContentLoaded', () => {
    updateBtn();
});

['DOMContentLoaded', 'resize'].forEach(event => {
    window.addEventListener(event, () => {
        const newsTop = document.querySelector('.news-top');
        const mobileBtnContainer = document.querySelector('.news-mobile-btn');
        const newsBtn = document.querySelector('.news-btn');
        if (window.innerWidth < 1024) {
            mobileBtnContainer.insertAdjacentElement('afterbegin', newsBtn);
        } else {
            newsTop.appendChild(newsBtn);
        }
    });
});