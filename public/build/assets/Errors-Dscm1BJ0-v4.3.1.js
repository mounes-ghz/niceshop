import{V as s}from"./vue-DkJ1Kgzj-v4.3.1.js";class o{constructor(){this.errors={}}record(r){this.errors=Object.assign({},this.errors,r)}any(){return Object.keys(this.errors).length>0}has(r){return this.errors.hasOwnProperty(this.normalizeKey(r))}get(r){if(this.errors[this.normalizeKey(r)])return this.errors[this.normalizeKey(r)][0]}set(r={}){this.errors=Object.assign({},this.errors,r)}clear(r){r!==void 0&&(r=Array.isArray(r)?r:[r],r.forEach(e=>{s.delete(this.errors,this.normalizeKey(e))}))}reset(){this.errors={}}normalizeKey(r){let e=r.split("[");return e.length===1?r:e.join(".").slice(0,-1).replace(/]/g,"")}}export{o as E};