import{P as e,a as i,b as l}from"./main-D4RKwbcb-v4.3.1.js";import{n as d}from"./_plugin-vue2_normalizer-Dh-dUdSv-v4.3.1.js";import"./axios-B4uVmeYG-v4.3.1.js";import"./bootstrap-DTBfG_ne-v4.3.1.js";import"./@popperjs-WhmJkuoZ-v4.3.1.js";import"./jquery-nice-select-BpWpCirC-v4.3.1.js";import"./slick-animation-oqHwU7l4-v4.3.1.js";import"./vue-DkJ1Kgzj-v4.3.1.js";import"./vue-toast-notification-KMO5b-nv-v4.3.1.js";import"./blueimp-md5-ClWCTRan-v4.3.1.js";import"./v-click-outside-C9eqkxfZ-v4.3.1.js";import"./lodash-TQOuIzOY-v4.3.1.js";import"./dateformat-oVxhnyrt-v4.3.1.js";import"./nouislider--DU6hECO-v4.3.1.js";import"./drift-zoom-KJ3HkKpL-v4.3.1.js";import"./glightbox-BzZTJpaq-v4.3.1.js";const a={components:{ProductCard:e},props:["products"],computed:{hasAnyProduct(){return this.products.length!==0}},mounted(){$(this.$refs.productsPlaceholder).slick({rows:0,dots:!1,arrows:!0,infinite:!0,slidesToShow:5,slidesToScroll:5,rtl:window.NiceShop.rtl,prevArrow:i(),nextArrow:l(),responsive:[{breakpoint:1761,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:1341,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:992,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:881,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:661,settings:{dots:!0,arrows:!1,slidesToShow:3,slidesToScroll:3}},{breakpoint:641,settings:{dots:!0,arrows:!1,slidesToShow:2,slidesToScroll:2}}]})}};var c=function(){var s=this,o=s._self._c;return s.hasAnyProduct?o("section",{staticClass:"landscape-products-wrap"},[o("div",{staticClass:"products-header"},[o("h5",{staticClass:"section-title"},[s._v(" "+s._s(s.$trans("storefront::product.related_products"))+" ")])]),o("div",{ref:"productsPlaceholder",staticClass:"landscape-products"},s._l(s.products,function(r,t){return o("ProductCard",{key:t,attrs:{product:r}})}),1)]):s._e()},n=[],p=d(a,c,n);const N=p.exports;export{N as default};
