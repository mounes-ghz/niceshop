import{m as a}from"./alpinejs-uXcmRlT3-v4.3.2.js";import{t as _}from"./wysiwyg-DWLXDX79-v4.3.2.js";import{E as y}from"./Errors-DymF0diZ-v4.3.2.js";import{n as b}from"./NProgress-Byx4Z4Na-v4.3.2.js";import"./tinymce-D10NeNaK-v4.3.2.js";import"./blueimp-md5-ClWCTRan-v4.3.2.js";import"./vue-DkJ1Kgzj-v4.3.2.js";import"./nprogress-D1gHBCIW-v4.3.2.js";window.Alpine=a;let l,c;a.data("postEdit",({formData:o={},meta:s={},tags:u=[]})=>({formSubmitting:!1,formSubmissionType:null,form:{...o,featured_image:Array.isArray(o.featured_image)?{}:o.featured_image},errors:new y,init(){this.form.meta={...s.meta_title&&{meta_title:s.meta_title},...s.meta_description&&{meta_description:s.meta_description}},b(),this.fullscreenMode(),l=this.initTinyMce(),c=this.initTagsSelectize(),c[0].selectize.setValue(u.map(e=>e.id))},fullscreenMode(){$(".fullscreen-mode-open").on("click",e=>{e.preventDefault(),document.fullscreenElement?($(".fullscreen-mode-open .fullscreen-two").removeClass("enter-full-screen"),$(".fullscreen-mode-open .fullscreen-one").addClass("exit-full-screen"),document.exitFullscreen().catch(t=>{alert(`Error attempting to disable full-screen mode: ${t.message} (${t.name})`)})):($(".fullscreen-mode-open .fullscreen-one").removeClass("exit-full-screen"),$(".fullscreen-mode-open .fullscreen-two").addClass("enter-full-screen"),document.documentElement.requestFullscreen().catch(t=>{alert(`Error attempting to enable full-screen mode: ${t.message} (${t.name})`)}))})},initTinyMce(){return _({setup:e=>{e.on("change",()=>{e.save(),e.getElement().dispatchEvent(new Event("input")),this.errors.clear("description")})}})},initTagsSelectize(){return $(".selectize").selectize({plugins:["remove_button"],onChange:e=>{this.form.tags=e}})},focusDescriptionField(){l.get("description").focus()},addFeaturedImage(){new MediaPicker({type:"image"}).on("select",({id:t,path:r})=>{this.form.featured_image={id:+t,path:r}})},removeFeaturedImage(){this.form.featured_image={}},focusFirstErrorField(e){const t=Object.keys(this.errors.errors),r=[...e].find(n=>t.includes(n.name));if(r.classList.contains("wysiwyg")){l.get(r.getAttribute("name")).focus();return}r.focus()},handleSubmit({submissionType:e}){this.formSubmitting=!0,this.formSubmissionType=e;const{id:t,title:r,description:n,slug:d,meta:f,featured_image:m,publish_status:p,blog_category_id:g,tags:h}=this.form;$.ajax({type:"PUT",url:route("admin.blog_posts.update",{id:this.form.id,...e==="save_and_exit"&&{exit_flash:!0}}),data:{id:t,title:r,description:n,slug:d,meta:f,publish_status:p,blog_category_id:g,tags:h,files:{featured_image:m.id?[m.id]:[]}},dataType:"json",success:({message:i})=>{if(e==="save_and_exit"){location.href=route("admin.blog_posts.index");return}success(i)}}).catch(({responseJSON:i})=>{this.errors.reset(),this.errors.record(i.errors),this.focusFirstErrorField(this.$refs.form.elements),error(i.message)}).always(()=>{this.formSubmitting=!1,this.formSubmissionType=null})}}));a.start();
