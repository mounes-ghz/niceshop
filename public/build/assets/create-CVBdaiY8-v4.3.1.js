import{V as i}from"./vue-DkJ1Kgzj-v4.3.1.js";import{V as e}from"./VariationMixin-8gygCOU9-v4.3.1.js";import{t as s}from"./Toaster-euwuEYDO-v4.3.1.js";import"./vuedraggable-BZdCgZZv-v4.3.1.js";import"./blueimp-md5-ClWCTRan-v4.3.1.js";import"./sortablejs-Dy36omXk-v4.3.1.js";import"./Errors-Dscm1BJ0-v4.3.1.js";import"./@melloware-BTYRaMki-v4.3.1.js";import"./vue-toast-notification-KMO5b-nv-v4.3.1.js";new i({el:"#app",mixins:[e],created(){this.setFormDefaultData()},mounted(){this.focusInitialField()},methods:{setFormDefaultData(){this.form={uid:this.uid(),type:"",values:[{uid:this.uid(),image:{id:null,path:null}}]}},focusInitialField(){this.$nextTick(()=>{$("#name").trigger("focus")})},submit(){this.formSubmitting=!0,$.ajax({type:"POST",url:route("admin.variations.store"),data:this.transformData(this.form),dataType:"json",success:t=>{s(t.message,{type:"success"}),this.resetForm(),this.errors.reset()}}).catch(t=>{s(t.responseJSON.message,{type:"default"}),this.errors.reset(),this.errors.record(t.responseJSON.errors),this.focusFirstErrorField(this.$refs.form.elements)}).always(()=>{this.formSubmitting=!1})}}});