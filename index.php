<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>jQuery Jumia Product Search</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"
			integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
			crossorigin="anonymous"></script>
</head>
<body>

<style>
.hadia-popup{
	position:fixed;
	top:0px;
	bottom:0px;
	left:0px;
	right:0px;
	background:#00000099;
	z-index:10000;
	overflow:auto;
	padding:20px 0px;
}
.hadia-popup-iframe{
	width:94%;
	margin:0px auto;
}
.hadia-popup-content{
	width:100%;
	height:auto;
	min-height:80vh;
	background:#fff;
	padding:20px 20px;
	box-sizing: border-box;
}

article.prd{
	background:#fff;
	border:2px solid #fff;
}
article.prd.prd-selected{
	background:#cfd;
	border:2px solid #cfd;
}
article.prd.prd-selected img{
	opacity:0.8;
}

.hadia-popup-search{
	text-align:left;
	margin:0px 0px 20px 0px;
}
.hadia-popup-search input{
	width:100%;
	padding:10px 8px;
	margin:5px 0px 10px 0px;
	box-sizing: border-box;
}
#btn-search{
	cursor:pointer;
	background:#000;
	color:#fff;
	border:1px solid #000;
	padding:8px 20px;
	border-radius:3px;
}
#btn-search:hover{
	background:#444;
	color:#fff;
}

.hadia-popup-close{
	text-align:right;
}
.hadia-popup-close button{
	cursor:pointer;
	background:#000;
	color:#fff;
	border:1px solid #000;
	padding:3px 8px;
	border-radius:3px;
}
</style>

<div class="hadia-popup" >
	<div class="hadia-row hadia-popup-iframe" >
		<div class="hadia-popup-content" >
			<div class="hadia-row hadia-popup-close" >
				<button onclick="hadiaPopupClose()" >X</button>
			</div>
			<div class="hadia-row hadia-popup-search" >
				<form action="" method="post" onsubmit="searchProducts();" >
					<div class="hadia-row" >
						<label>Search Products</label>
						<input type="text" id="prd-search" placeholder="Type product name here..." />
					</div>
					<div class="hadia-row" >
						<button id="btn-search" type="submit" >Search</button>
					</div>
				</form>
			</div>
			<div class="hadia-row hadia-popup-results" >
			</div>
		</div>
	</div>
</div>

<script>
var current_shop_url="https://www.jumia.co.ke/";

jQuery(document).ready(function(){
	//loadURLPage(current_shop_url);
});

function searchProducts(){
	event.preventDefault();
	
	let prdname=jQuery("#prd-search").val();
	
	prdname=prdname.toLowerCase();
	prdname=prdname.replace(" ", "+");
	
	url_page=current_shop_url+"catalog/?q="+prdname;
	
	loadURLPage(url_page);
}

function loadURLPage(url_page){
	jQuery(".hadia-popup-results").html('<div class="hadia-row" style="text-align:center;" ><i>Searching...</i></div>');
	
	jQuery(".hadia-popup-results").load(url_page, function(response,status,xhr){
		jQuery("#pop, .banner-pop._pp, .banner, ._no-go, ._head, header, footer, .b2top, .col4.-me-start.-pvs, .reco._hid.col16.-pvs, .brcbs, .-df.-fw-w.-pas.-bb, a.btn").remove();
		
		jQuery("a[aria-label='First Page']").html("<<");
		jQuery("a[aria-label='Previous Page']").html("<");
		jQuery("a[aria-label='Next Page']").html(">");
		jQuery("a[aria-label='Last Page']").html(">>");
		
		jQuery(".-pvs.col12").removeClass("col12");
		
		jQuery(".hadia-popup-results article a").addClass("article-prd-url");
		
		jQuery(".hadia-popup-results img").each(function(){
			if(jQuery(this).attr("data-src").length>0){
				url_image=jQuery(this).attr("data-src");
				
				jQuery(this).attr("src", url_image);
			}
		});
			
		jQuery(".hadia-popup-results a").click(function(){
			event.preventDefault();
			
			if(!jQuery(this).hasClass("article-prd-url")){
				url_page=jQuery(this).attr("href");
				
				url_page=setPageUrl(url_page);
				
				loadURLPage(url_page);
			}
		});
			
		jQuery(".hadia-popup-results article").click(function(){
			if(!jQuery(this).hasClass("prd-selected")){
				jQuery(this).addClass("prd-selected");
				
				let prt_name=jQuery(this).find("h3.name").text();
				let prt_price=jQuery(this).find(".prc").text();
				let prt_url=jQuery(this).find("a.core").attr("href");
				let prt_id=jQuery(this).find("a.core").attr("data-gtm-id");
				let prt_img=jQuery(this).find(".img-c img.img").attr("src");

				prt_url=setPageUrl(prt_url);
			}
			else{
				jQuery(this).removeClass("prd-selected");
			}
		});
	});
}

function setPageUrl(url_page){
	url_page=current_shop_url+url_page;
	url_page=url_page.replaceAll(current_shop_url+current_shop_url, current_shop_url);
	url_page=url_page.replaceAll("//", "/");
	url_page=url_page.replaceAll(":/", "://");
	
	return url_page;
}

function hadiaPopupClose(){
	jQuery(".hadia-popup").css("display", "none");
}
function hadiaPopupOpen(){
	jQuery(".hadia-popup").fadeIn(300);
}
</script>
</body>
</html>