import"./bootstrap-DTBfG_ne-v4.3.1.js";import"./@popperjs-WhmJkuoZ-v4.3.1.js";const r={data(){return{email:"",subscribed:!1,subscribing:!1,error:"",modal:null}},watch:{email(){this.error=""}},mounted(){setTimeout(()=>{$(".newsletter-wrap").modal("show")},1e3)},methods:{closeNewsletterPopup(){$(".newsletter-wrap").modal("hide")},disableNewsletterPopup(){$(".newsletter-wrap").modal("hide"),axios.delete(route("storefront.newsletter_popup.destroy"))},subscribe(){!this.email||this.subscribed||(this.subscribing=!0,document.activeElement.blur(),axios.post(route("subscribers.store"),{email:this.email}).then(()=>{this.email="",this.subscribed=!0}).catch(e=>{if(e.response.status===422){this.error=e.response.data.errors.email[0];return}this.error=e.response.data.message}).finally(()=>{this.subscribing=!1}))}}};export{r as default};
