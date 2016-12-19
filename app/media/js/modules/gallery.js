import Masonry from 'masonry-layout';
import Helper from '../helper';

class Gallery extends Helper {
	constructor(el) {
		super();
		if(!el) return;
		this.elem = el;
		this.msnry = null;
		this.offset = 0;

		this.requestHandler();

		window.addEventListener('scroll', this.scrollHandler.bind(this));
		
	}

	scrollHandler(){
		let heightToload = document.body.clientHeight - document.body.scrollTop; 
		if(this.status && heightToload < 1700){
			this.status = false;
			this.requestHandler();
		}
	}

	requestHandler(){
		this.xhrRequest(
				'GET',
				'/site/gallery?offset='+this.offset,
				null,
				null,
				this.afterReques.bind(this)
			);
	}

	afterReques(obj){
		let json;
		try{
			json = JSON.parse(obj);
			this.generateTemplate(json);
		} catch(e){
			console.log(e);
		}
	}

	generateTemplate(json){

		console.log(json);

		let str = '',
			documentBlock = document.createElement('div'),
			length = json.length,
			j = 0;

		for (let i = 0; i < length; i++) {
			
			let image = new Image();
			image.src = json[i].image;

			image.addEventListener('load', handlerToLoadImage.bind(this));

			str += this.templateMasonry(json[i]);
		}
		
		function handlerToLoadImage() {
			if(j == length - 1){
				console.log('this');
				this.appendToPage(str);
			}else {
				j++;
			}
		}


	}


	appendToPage(str){
		
		let documentBlock = document.createElement('div');

		documentBlock.insertAdjacentHTML('beforeend', str);

		let childrens = documentBlock.children;

		console.log(childrens);

		for (var i = 0, l = childrens.length; i < l; i++) {
			let cloned = childrens[i].cloneNode(true);
			this.elem.appendChild(cloned);	
			if(this.msnry){
				this.msnry.appended( cloned );
				this.msnry.layout();
			}
		}

		documentBlock = null;

		if(!this.msnry){
			console.log('no MASONRY');
			this.msnry = new Masonry( this.elem, {
			  itemSelector: '.baol-item-grid'
			});
		}

		this.offset += 6;
		this.status = true;
	}

	templateMasonry(json){
		let tmp = '<figure class="baol-item-grid effect-chico">' + 
						'<figcaption>' + 
							'<h3>' + 
								json.title +
							'</h3>' + 
							'<p> '+json.size_and_year+' <br /> '+json.description+'</p>' +
						'</figcaption>' +
						'<img src="'+json.image+'" />' +
					'</figure>';

			return tmp;
	}
}

export default Gallery;