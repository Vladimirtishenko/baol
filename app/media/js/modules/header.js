class Header {
	constructor() {
		window.addEventListener('scroll', this.scrollHeaders.bind(this));
		this.header = document.querySelector('.baol-header-menu');
		this.menuButton = document.querySelector('.baol-header-menu__fa');
		this.menu = document.querySelector('.baol-header__menu-list');

		this.menuButton.addEventListener('click', this.menuHandler.bind(this));
	}

	scrollHeaders(event){

		if(document.body.scrollTop > 100){
			this.header.style.padding = "15px 35px";
		} else {
			this.header.removeAttribute('style');
		}
	}

	menuHandler(event){
		this.menu.classList.toggle('baol-menu-slide');
	}
}

export default Header;