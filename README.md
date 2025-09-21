# jQuery Jumia Product Search

A lightweight jQuery plugin that embeds a **search interface for Jumia Kenya products** directly into your website.  
Users can type in a product name, fetch live search results from [Jumia Kenya](https://www.jumia.co.ke/), and interact with the products within your site.

---

## Features

- 🔎 Simple product search form with configurable **label, placeholder, and button text**  
- ⚡ Loads live results directly from Jumia’s product catalog  
- 🖼 Automatically displays product images, names, and prices  
- ⏩ Handles Jumia’s pagination links (First, Previous, Next, Last)  
- 🧹 Cleans up Jumia’s page by removing banners, headers, and other clutter  
- 🎨 Basic styling included (customizable via CSS)  

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

Create a container element where the plugin will render:

```html
<div id="jumia-search"></div>
```

Initialize the plugin with jQuery:

```javascript
$("#jumia-search").jumiaProductSearch();
```

---

## Configuration Options

You can customize the search UI by passing an options object:

```javascript
$("#jumia-search").jumiaProductSearch({
  label: "Find Products",              // Label above the search box
  placeholder: "Enter product name...", // Placeholder text
  buttonText: "Go"                      // Button text
});
```

| Option        | Type   | Default Value                   | Description                              |
|---------------|--------|----------------------------------|------------------------------------------|
| `label`       | String | `"Search Products"`             | Text displayed above the search input     |
| `placeholder` | String | `"Type product name here..."`   | Placeholder text inside the search box    |
| `buttonText`  | String | `"Search"`                      | Text for the search button                |

---

## Example

```html
<div id="product-search-widget"></div>

<script>
  $(document).ready(function(){
    $("#product-search-widget").jumiaProductSearch({
      label: "Search Jumia",
      placeholder: "e.g. smartphone, shoes",
      buttonText: "Find"
    });
  });
</script>
```

---

## Styling

Default styles are included in `jquery-jumia-product-search.css`:

```css
.jps-row {
  width: 100%;
  float: left;
  box-sizing: border-box;
}

.jumia-product-search-form input {
  width: 100%;
  padding: 10px 8px;
  margin: 5px 0 10px;
  box-sizing: border-box;
}

.jumia-product-search-form #btn-search {
  cursor: pointer;
  background: #000;
  color: #fff;
  border: 1px solid #000;
  padding: 8px 20px;
  border-radius: 3px;
}
```

Feel free to override these classes in your own stylesheet.

---

## Compatibility

- Requires **jQuery 3.x+**  
- Works in all modern browsers  
- Fetches results from **Jumia Kenya only (`jumia.co.ke`)**  

---

## Contributing

Pull requests and suggestions are welcome!  
If you’d like to contribute:
1. Fork the repo  
2. Create a feature branch  
3. Commit changes  
4. Open a PR  

---

## License

MIT License – free to use and modify.  
