var jumiaProduct={
	id:"",
	name:"",
	price:"",
	url:"",
	image:""
};

(function ( $ ) {
	var jps_label="Search Products";
	var jps_placeholder="Type product name here...";
	var jps_button="Search";
	
	var jps_jumia_url="https://www.jumia.co.ke/";
	
	var jps_settings={};
 
    $.fn.jumiaProductSearch = function(settings={}){
		jps_settings=settings;
		
		if(jps_settings.label){
			jps_label=jps_settings.label;
		}
		if(jps_settings.placeholder){
			jps_placeholder=jps_settings.placeholder;
		}
		if(jps_settings.buttonText){
			jps_button=jps_settings.buttonText;
		}
		
		let jps_ui_html = `<div class="jps-row jumia-product-search" >
			<div class="jps-row jumia-product-search-form" >
				<form action="" method="post" >
					<div class="jps-row" >
						<label>`+jps_label+`</label>
						<input type="text" id="prd-search" placeholder="`+jps_placeholder+`" />
					</div>
					<div class="jps-row" >
						<button id="btn-search" type="submit" >`+jps_button+`</button>
					</div>
				</form>
			</div>
			<div class="jps-row jumia-product-search-results" ></div>
		</div>`;
		
        this.html(jps_ui_html);
		
		jQuery(".jumia-product-search-form form").submit(function(){
			jps_searchProducts();
		});
		
        return this;
    };

	function jps_searchProducts(){
		event.preventDefault();
		
		let prdname=jQuery(".jumia-product-search #prd-search").val();
		
		prdname=prdname.toLowerCase();
		prdname=prdname.replace(" ", "+");
		
		url_page=jps_jumia_url+"catalog/?q="+prdname;
		
		jps_loadURLPage(url_page);
	}

	function jps_loadURLPage(url_page){
		jQuery(".jumia-product-search-results").html('<div class="hadia-row" style="text-align:center;" ><i>Searching...</i></div>');
		
		jQuery(".jumia-product-search-results").load(url_page, function(response,status,xhr){
			jQuery(".jumia-product-search-results #pop, .jumia-product-search-results .banner-pop._pp, .jumia-product-search-results .banner, .jumia-product-search-results ._no-go, .jumia-product-search-results ._head, .jumia-product-search-results header, .jumia-product-search-results footer, .jumia-product-search-results .b2top, .jumia-product-search-results .col4.-me-start.-pvs, .jumia-product-search-results .reco._hid.col16.-pvs, .brcbs, .jumia-product-search-results .-df.-fw-w.-pas.-bb, .jumia-product-search-results a.btn").remove();
			
			jQuery(".jumia-product-search-results a[aria-label='First Page']").html("<<");
			jQuery(".jumia-product-search-results a[aria-label='Previous Page']").html("<");
			jQuery(".jumia-product-search-results a[aria-label='Next Page']").html(">");
			jQuery(".jumia-product-search-results a[aria-label='Last Page']").html(">>");
			
			jQuery(".jumia-product-search-results .-pvs.col12").removeClass("col12");
			
			jQuery(".jumia-product-search-results article a").addClass("article-prd-url");
			
			jQuery(".jumia-product-search-results img").each(function(){
				if(jQuery(this).attr("data-src").length>0){
					url_image=jQuery(this).attr("data-src");
					
					jQuery(this).attr("src", url_image);
				}
			});
				
			jQuery(".jumia-product-search-results a").click(function(){
				event.preventDefault();
				
				if(!jQuery(this).hasClass("article-prd-url")){
					url_page=jQuery(this).attr("href");
					
					url_page=jps_setPageUrl(url_page);
					
					jps_loadURLPage(url_page);
				}
			});
				
			jQuery(".jumia-product-search-results article").click(function(){
				if(!jQuery(this).hasClass("prd-selected")){
					jQuery(this).addClass("prd-selected");
					
					jumiaProduct.name=jQuery(this).find("h3.name").text();
					jumiaProduct.price=jQuery(this).find(".prc").text();
					jumiaProduct.id=jQuery(this).find("a.core").attr("data-gtm-id");
					jumiaProduct.image=jQuery(this).find(".img-c img.img").attr("src");

					let prt_url=jQuery(this).find("a.core").attr("href");
					jumiaProduct.url=jps_setPageUrl(prt_url);
					
					
					if(jps_settings.onSelectProduct){
						jps_settings.onSelectProduct();
					}
				}
				else{
					jQuery(this).removeClass("prd-selected");
				}
			});
		});
	}

	function jps_setPageUrl(url_page){
		url_page=jps_jumia_url+url_page;
		url_page=url_page.replaceAll(jps_jumia_url+jps_jumia_url, jps_jumia_url);
		url_page=url_page.replaceAll("//", "/");
		url_page=url_page.replaceAll(":/", "://");
		
		return url_page;
	}
 
}( jQuery ));