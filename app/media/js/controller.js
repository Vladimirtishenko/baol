import '../styl/builder_css.styl';

import Gallery from './modules/gallery';
import Header from './modules/header';
import Wow from './modules/wow';

class App {
	constructor(){
		this.init();
	}

	init(){
		new Gallery(document.querySelector('.baol-masonry'));
		new Header();
		new Wow(document.querySelector('.baol-preloads'));
	}
}

window.addEventListener('load', function(){
	new App();
})