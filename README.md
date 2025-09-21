# jQuery Jumia Product Search

A lightweight jQuery plugin that embeds a **search interface for Jumia Kenya products** directly into your website.  
Users can type in a product name, fetch live results from [Jumia Kenya](https://www.jumia.co.ke/), and interact with them.  
When a product is selected, its details are exposed via the global `jumiaProduct` object and an optional callback function.

---

## Features

- 🔎 Simple search form with customizable **label, placeholder, and button text**  
- ⚡ Fetches live product results directly from Jumia’s catalog  
- 🖼 Displays product images, names, and prices  
- ⏩ Handles pagination (First, Previous, Next, Last)  
- 🧹 Cleans up unnecessary Jumia elements for a neat embed  
- 🎯 Selectable products with details (ID, name, price, image, URL)  
- 🔔 Custom **`onSelectProduct` callback** triggered when a product is selected  

---

## Installation

1. Download or clone this repository.  
2. Include jQuery, the plugin JS, and CSS in your webpage:

```html
<link rel="stylesheet" href="jquery-jumia-product-search.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="jquery-jumia-product-search.js"></script>
```

---

## Usage

Create a container where the widget will render:

```html
<div id="jumia-search"></div>
```

Initialize the plugin:

```javascript
$("#jumia-search").jumiaProductSearch();
```

---

## Configuration Options

You can customize the search UI and hook into product selection:

```javascript
$("#jumia-search").jumiaProductSearch({
  label: "Find Products",               // Label above the search box
  placeholder: "Enter product name...", // Placeholder text
  buttonText: "Go",                     // Button text
  onSelectProduct: function() {         // Callback when a product is selected
    console.log("Selected product:", jumiaProduct);
  }
});
```

### Available Options

| Option            | Type     | Default Value                 | Description                                      |
|-------------------|----------|--------------------------------|--------------------------------------------------|
| `label`           | String   | `"Search Products"`           | Text displayed above the search input            |
| `placeholder`     | String   | `"Type product name here..."` | Placeholder text inside the search box           |
| `buttonText`      | String   | `"Search"`                    | Text for the search button                       |
| `onSelectProduct` | Function | `null`                        | Callback function when a product is selected     |

---

## Product Data

When a product is clicked, details are stored in the **global object** `jumiaProduct`:

```javascript
var jumiaProduct = {
  id: "",     // Jumia’s product ID
  name: "",   // Product name
  price: "",  // Product price
  url: "",    // Product page URL
  image: ""   // Product image URL
};
```

Example usage:

```javascript
$("#jumia-search").jumiaProductSearch({
  onSelectProduct: function(){
    alert("You selected: " + jumiaProduct.name + " (" + jumiaProduct.price + ")");
  }
});
```

---

## Styling

Default styles are included in `jquery-jumia-product-search.css`.  
You can override them to match your site’s design.

```css
.jps-row{
	width:100%;
	float:left;
	box-sizing: border-box;
}

.jumia-product-search-form input{
	width:100%;
	padding:10px 8px;
	margin:5px 0px 10px 0px;
	box-sizing: border-box;
}

.jumia-product-search-form #btn-search{
	cursor:pointer;
	background:#000;
	color:#fff;
	border:1px solid #000;
	padding:8px 20px;
	border-radius:3px;
}

.jumia-product-search-results article.prd{
	background:#fff;
	border:2px solid #fff;
}
.jumia-product-search-results article.prd.prd-selected{
	background:#cfd;
	border:2px solid #cfd;
}
.jumia-product-search-results article.prd.prd-selected img{
	opacity:0.8;
}
```

---

## Compatibility

- Requires **jQuery 3.x+**  
- Works in modern browsers  
- Supports **Jumia Kenya (`jumia.co.ke`)** only  

---

## Contributing

Pull requests and suggestions are welcome!  
Steps:  
1. Fork the repo  
2. Create a feature branch  
3. Commit your changes  
4. Open a pull request  

---

## License

MIT License – free to use and modify.  
