import{V as i}from"./vue-DkJ1Kgzj-v4.3.1.js";import{P as r}from"./ProductMixin-Cqs6X6Sl-v4.3.1.js";import{E as s}from"./Errors-Dscm1BJ0-v4.3.1.js";import"./blueimp-md5-ClWCTRan-v4.3.1.js";import"./wysiwyg-2WZaFrja-v4.3.1.js";import"./tinymce-D75crZP1-v4.3.1.js";import"./vuedraggable-BZdCgZZv-v4.3.1.js";import"./sortablejs-Dy36omXk-v4.3.1.js";import"./vue2-selectize-BDtudStj-v4.3.1.js";import"./jquery-J9L-zf0Y-v4.3.1.js";import"./vue-flatpickr-component-Bwau1EAQ-v4.3.1.js";import"./flatpickr-Dta993Ce-v4.3.1.js";import"./vue-persian-datetime-picker-BGnMMvXK-v4.3.1.js";import"./moment-jalaali-BWPrxxAq-v4.3.1.js";import"./moment-b__Re8gO-v4.3.1.js";import"./jalaali-js-BsrJmUiw-v4.3.1.js";import"./@melloware-BTYRaMki-v4.3.1.js";import"./NProgress-BQVJao7--v4.3.1.js";import"./nprogress-DKCYbahp-v4.3.1.js";import"./Toaster-euwuEYDO-v4.3.1.js";import"./vue-toast-notification-KMO5b-nv-v4.3.1.js";i.prototype.defaultCurrencySymbol=NiceShop.defaultCurrencySymbol;i.prototype.route=route;new i({el:"#app",mixins:[r],data:{formSubmissionType:null,form:{brand_id:"",tax_class_id:"",is_active:!0,media:[],is_virtual:!1,manage_stock:0,in_stock:1,special_price_type:"fixed",meta:{},attributes:[],downloads:[],variations:[],variants:[],options:[],slug:null},errors:new s,selectizeConfig:{plugins:["remove_button"]},searchableSelectizeConfig:{},categoriesSelectizeConfig:{},flatPickrConfig:{mode:"single",enableTime:!0,altInput:!0}},created(){this.setFormData(),this.setSearchableSelectizeConfig(),this.setCategoriesSelectizeConfig(),this.setDefaultVariantUid(),this.setVariantsLength()},mounted(){this.hideAlertExitFlash()},methods:{prepareFormData(t){return this.prepareAttributes(t.attributes),this.prepareVariations(t.variations),this.prepareVariants(t.variants),this.prepareOptions(t.options),t},setFormData(){this.form={...this.prepareFormData(NiceShop.data.product)}},setDefaultVariantUid(){this.hasAnyVariant&&(this.defaultVariantUid=this.form.variants.find(({is_default:t})=>t===!0).uid)},setVariantsLength(){this.variantsLength=this.form.variants.length},hideAlertExitFlash(){const t=$(".alert-exit-flash");t.length!==0&&setTimeout(()=>{t.remove()},3e3)},submit({submissionType:t}){this.formSubmissionType=t,$.ajax({type:"PUT",url:route("admin.products.update",{id:this.form.id,...t==="save_and_exit"&&{exit_flash:!0}}),data:this.transformData(this.form),dataType:"json",success:e=>{if(t==="save_and_exit"){location.href=route("admin.products.index");return}this.form={...e.product_resource},this.errors.reset(),this.prepareFormData(this.form),this.resetBulkEditVariantFields(),this.hasAnyVariant&&this.setVariantsName(),toaster(e.message,{type:"success"})}}).catch(e=>{if(this.formSubmissionType=null,toaster(e.responseJSON.message,{type:"default"}),e.status===422){this.errors.reset(),this.errors.record(e.responseJSON.errors),this.focusFirstErrorField(this.$refs.form.elements);return}this.hasAnyVariant&&this.regenerateVariationsAndVariantsUid()}).always(()=>{t==="save"&&(this.formSubmissionType=null)})}}});