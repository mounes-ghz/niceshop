import{c as n,a as i,b as c}from"./main-D4RKwbcb-v4.3.1.js";import{c as r}from"./countdown-Nj3bx2BM-v4.3.1.js";import{n as e}from"./_plugin-vue2_normalizer-Dh-dUdSv-v4.3.1.js";import"./axios-B4uVmeYG-v4.3.1.js";import"./bootstrap-DTBfG_ne-v4.3.1.js";import"./@popperjs-WhmJkuoZ-v4.3.1.js";import"./jquery-nice-select-BpWpCirC-v4.3.1.js";import"./slick-animation-oqHwU7l4-v4.3.1.js";import"./vue-DkJ1Kgzj-v4.3.1.js";import"./vue-toast-notification-KMO5b-nv-v4.3.1.js";import"./blueimp-md5-ClWCTRan-v4.3.1.js";import"./v-click-outside-C9eqkxfZ-v4.3.1.js";import"./lodash-TQOuIzOY-v4.3.1.js";import"./dateformat-oVxhnyrt-v4.3.1.js";import"./nouislider--DU6hECO-v4.3.1.js";import"./drift-zoom-KJ3HkKpL-v4.3.1.js";import"./glightbox-BzZTJpaq-v4.3.1.js";const d={props:["endDate"],data(){return{date:{},countdown:null}},mounted(){if(new Date>new Date(this.endDate)){this.setInitialDate();return}this.countdown=this.initCountdown()},methods:{initCountdown(){return r(new Date(this.endDate),({days:a,hours:t,minutes:s,seconds:o})=>{if(new Date>new Date(this.endDate)){this.setInitialDate(),window.clearInterval(this.countdown);return}this.date=Object.assign({},this.date,{days:this.leadingZero(a),hours:this.leadingZero(t),minutes:this.leadingZero(s),seconds:this.leadingZero(o)})},r.DAYS|r.HOURS|r.MINUTES|r.SECONDS)},setInitialDate(){this.date=Object.assign({},this.date,{days:"00",hours:"00",minutes:"00",seconds:"00"})},leadingZero(a){return a<10?"0"+a:a}}};var l=function(){var t=this,s=t._self._c;return s("div",{staticClass:"daily-deals-countdown countdown clearfix"},[s("span",{staticClass:"countdown-row"},[s("span",{staticClass:"countdown-section"},[s("span",{staticClass:"countdown-amount"},[t._v(t._s(t.date.days))]),s("span",{staticClass:"countdown-period"},[t._v(" "+t._s(t.$trans("storefront::product_card.days"))+" ")])]),s("span",{staticClass:"countdown-section"},[s("span",{staticClass:"countdown-amount"},[t._v(t._s(t.date.hours))]),s("span",{staticClass:"countdown-period"},[t._v(" "+t._s(t.$trans("storefront::product_card.hours"))+" ")])]),s("span",{staticClass:"countdown-section"},[s("span",{staticClass:"countdown-amount"},[t._v(t._s(t.date.minutes))]),s("span",{staticClass:"countdown-period"},[t._v(" "+t._s(t.$trans("storefront::product_card.minutes"))+" ")])]),s("span",{staticClass:"countdown-section"},[s("span",{staticClass:"countdown-amount"},[t._v(t._s(t.date.seconds))]),s("span",{staticClass:"countdown-period"},[t._v(" "+t._s(t.$trans("storefront::product_card.seconds"))+" ")])])])])},p=[],u=e(d,l,p);const _=u.exports,h={components:{Countdown:_},mixins:[n],props:["product"],computed:{item(){return{...this.product.variant?this.product.variant:this.product}},progress(){return this.product.pivot.sold/this.product.pivot.qty*100+"%"}}};var m=function(){var t=this,s=t._self._c;return s("div",{staticClass:"daily-deals-inner"},[s("div",{staticClass:"daily-deals-top"},[s("a",{staticClass:"product-image",attrs:{href:t.productUrl}},[s("img",{class:{"image-placeholder":!t.hasBaseImage},attrs:{src:t.baseImage,alt:t.product.name}})])]),s("a",{staticClass:"product-name",attrs:{href:t.productUrl}},[s("h6",[t._v(t._s(t.product.name))])]),s("div",{staticClass:"product-info"},[s("div",{staticClass:"product-price",domProps:{innerHTML:t._s(t.item.formatted_price)}}),s("product-rating",{attrs:{ratingPercent:t.product.rating_percent,reviewCount:t.product.reviews.length}})],1),s("countdown",{attrs:{"end-date":t.product.pivot.end_date}}),s("div",{staticClass:"deal-progress"},[s("div",{staticClass:"deal-stock"},[s("div",{staticClass:"stock-available"},[t._v(" "+t._s(t.$trans("storefront::product_card.available"))+" "),s("span",[t._v(t._s(t.product.pivot.qty))])]),s("div",{staticClass:"stock-sold"},[t._v(" "+t._s(t.$trans("storefront::product_card.sold"))+" "),s("span",[t._v(t._s(t.product.pivot.sold))])])]),s("div",{staticClass:"progress"},[s("div",{staticClass:"progress-bar",style:{width:t.progress}})])])],1)},v=[],w=e(h,m,v);const f=w.exports,C={components:{FlashSaleProductCard:f},props:["title","url"],data(){return{products:[]}},computed:{hasAnyProduct(){return this.products.length!==0}},created(){this.fetchProducts()},methods:{async fetchProducts(){await axios.get(this.url).then(a=>{this.products=a.data,this.$nextTick(()=>{$(this.$refs.productsPlaceholder).slick(this.slickOptions())})})},slickOptions(){return{rows:0,dots:!1,arrows:!0,infinite:!0,slidesToShow:1,slidesToScroll:1,rtl:window.NiceShop.rtl,prevArrow:i(),nextArrow:c(),responsive:[{breakpoint:1200,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1}}]}}}};var g=function(){var t=this,s=t._self._c;return t.hasAnyProduct?s("div",{staticClass:"col-xl-6 col-lg-18"},[s("div",{staticClass:"daily-deals-wrap"},[s("div",{staticClass:"daily-deals-header clearfix"},[s("h4",{staticClass:"section-title",domProps:{innerHTML:t._s(t.title)}})]),s("div",{ref:"productsPlaceholder",staticClass:"daily-deals"},t._l(t.products,function(o){return s("FlashSaleProductCard",{key:o.id,attrs:{product:o}})}),1)])]):t._e()},y=[],S=e(C,g,y);const q=S.exports;export{q as default};